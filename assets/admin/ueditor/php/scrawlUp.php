<?php
    header("Content-Type:text/html;charset=utf-8");
    error_reporting( E_ERROR | E_WARNING );
    include "Uploader.class.php";
    //上传配置
    $config = array(
        "savePath" => "upload/" ,             //存储文件夹
        "maxSize" => 1000 ,                   //允许的文件最大尺寸，单位KB
        "allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" )  //允许的文件格式
    );
    //临时文件目录
    $tmpPath = "tmp/";

    //获取当前上传的类型
    $action = htmlspecialchars( $_GET[ "action" ] );
    if ( $action == "tmpImg" ) { // 背景上传
        //背景保存在临时目录中
        $config[ "savePath" ] = $tmpPath;
        $up = new Uploader( "upfile" , $config );
        $info = $up->getFileInfo();
        /**
         * 返回数据，调用父页面的ue_callback回调
         */
        echo "<script>parent.ue_callback('" . $info[ "url" ] . "','" . $info[ "state" ] . "')</script>";
    } else {
        //涂鸦上传，上传方式采用了base64编码模式，所以第三个参数设置为true
        $up = new Uploader( "content" , $config , true );
        //上传成功后删除临时目录
        if(file_exists($tmpPath)){
            delDir($tmpPath);
        }
        $info = $up->getFileInfo();
        
        
	     /***
	     * 保存图片文件到七牛
	     * 1.引入七牛类文件
	     * 2.引入七牛配置文件
	     */
		require_once '../../qiniu/io.php';
		require_once '../../qiniu/rs.php';
	    $qiniu = parse_ini_file('../../qiniu/qiniu.ini');
	    
		$newname = time().rand(10000, 99999).'.jpg';
		$accessKey = $qiniu['accessKey'];
		$secretKey = $qiniu['secretKey'];
		$bucket	   = $qiniu['bucket'];
		
		Qiniu_SetKeys($accessKey, $secretKey);
		
		if(!is_object($putPolicy))
			$putPolicy = new Qiniu_RS_PutPolicy($bucket);
		
		$upToken = $putPolicy->Token(null);
		list($ret, $err) = Qiniu_Put($upToken, $newname, file_get_contents($info["url"]), null);
		@unlink($info["url"]);
		
		
    	/**
		 * 为blog中生成一条记录 返回blogid 插入到images中
		 */
		if(!isset($_SESSION)){
			session_start();
		}
		if(!empty($_SESSION['uid'])){
			
			require_once '../../connect/PdoConnect.class.php';
			$db = parse_ini_file('../../connect/dbconfig.ini');
			
			$pdo = new PDO_CON($db['dbtype'], $db['host'], $db['user'], $db['pasw'], $db['dbname']);
			$conn=$pdo->get_conId();
			
			/**
			 * 此处数据库中表名是写的死的   若有改变  请直接替换
			 * 博文与图片是以一对多的关系   用session机制限制一对一关系
			 * 一次发布文章动作成功后  注销session['blogid']
			 */
			$uid  = $_SESSION['uid'];
			if(empty($_SESSION['blogid'])){
				
				$time = time();
				$sql = "insert into ws_blog(userid,time) values($uid,$time)";
				$res = $pdo->ExceSQL($sql, $conn);
				
				if($res){
					$sql = "select id from ws_blog where userid = $uid and time = $time ";
					$res = $pdo->ExceSQL($sql, $conn);
					$id  = $res[0]['id'];
				}
				$_SESSION['blogid'] = $id;
				
			}else{
				
				$id = $_SESSION['blogid'];
			}
			
			/**
			 * 保存图片到image表
			 */
			$sql = "insert into ws_image(blogid,image) value($id,'$newname')";
			$res = $pdo->ExceSQL($sql, $conn);
	
		}
		/**
		 * 插入到image表完成
		 */
	
	    //file_put_contents("./test.txt", $info['url']." || ".$title." || ".$info['originalName']." || ".$info['state']);
	    
		//$info['url'] = "http://".$qiniu['bucket'].".".$qiniu['domain']."/".$newname."?".'imageMogr2/thumbnail/540x335!';
		$info['url'] = "http://".$qiniu['bucket'].".".$qiniu['domain']."/".$newname;

        echo "{'url':'" . $info[ "url" ] . "',state:'" . $info[ "state" ] . "'}";
    }
    /**
     * 删除整个目录
     * @param $dir
     * @return bool
     */
    function delDir( $dir )
    {
        //先删除目录下的所有文件：
        $dh = opendir( $dir );
        while ( $file = readdir( $dh ) ) {
            if ( $file != "." && $file != ".." ) {
                $fullpath = $dir . "/" . $file;
                if ( !is_dir( $fullpath ) ) {
                    unlink( $fullpath );
                } else {
                    delDir( $fullpath );
                }
            }
        }
        closedir( $dh );
        //删除当前文件夹：
        return rmdir( $dir );
    }



