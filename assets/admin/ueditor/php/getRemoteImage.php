<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 11-12-28
     * Time: 上午9:54
     * To change this template use File | Settings | File Templates.
     */
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ERROR|E_WARNING);
    //远程抓取图片配置
    $config = array(
        "savePath" => "upload/" ,            //保存路径
        "allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" ) , //文件允许格式
        "maxSize" => 3000                    //文件大小限制，单位KB
    );
    $uri = htmlspecialchars( $_POST[ 'upfile' ] );
    $uri = str_replace( "&amp;" , "&" , $uri );
    getRemoteImage( $uri,$config );

    /**
     * 远程抓取
     * @param $uri
     * @param $config
     */
    function getRemoteImage( $uri,$config)
    {
        //忽略抓取时间限制
        set_time_limit( 0 );
        //ue_separate_ue  ue用于传递数据分割符号
        $imgUrls = explode( "ue_separate_ue" , $uri );
        $tmpNames = array();
        foreach ( $imgUrls as $imgUrl ) {
            //http开头验证
            if(strpos($imgUrl,"http")!==0){
                array_push( $tmpNames , "error" );
                continue;
            }
            //获取请求头
            $heads = get_headers( $imgUrl );
            //死链检测
            if ( !( stristr( $heads[ 0 ] , "200" ) && stristr( $heads[ 0 ] , "OK" ) ) ) {
                array_push( $tmpNames , "error" );
                continue;
            }

            //格式验证(扩展名验证和Content-Type验证)
            $fileType = strtolower( strrchr( $imgUrl , '.' ) );
            if ( !in_array( $fileType , $config[ 'allowFiles' ] ) || stristr( $heads[ 'Content-Type' ] , "image" ) ) {
                array_push( $tmpNames , "error" );
                continue;
            }

            //打开输出缓冲区并获取远程图片
            ob_start();
            $context = stream_context_create(
                array (
                    'http' => array (
                        'follow_location' => false // don't follow redirects
                    )
                )
            );
            //请确保php.ini中的fopen wrappers已经激活
            readfile( $imgUrl,false,$context);
            $img = ob_get_contents();
            ob_end_clean();

            //大小验证
            $uriSize = strlen( $img ); //得到图片大小
            $allowSize = 1024 * $config[ 'maxSize' ];
            if ( $uriSize > $allowSize ) {
                array_push( $tmpNames , "error" );
                continue;
            }
            //创建保存位置
            $savePath = $config[ 'savePath' ];
            if ( !file_exists( $savePath ) ) {
                mkdir( "$savePath" , 0777 );
            }
            
            //写入文件
            //$tmpName = $savePath . rand( 1 , 10000 ) . time() . strrchr( $imgUrl , '.' );
//            try {
//                $fp2 = @fopen( $tmpName , "a" );
//                fwrite( $fp2 , $img );
//                fclose( $fp2 );
//                array_push( $tmpNames ,  $tmpName );
//            } catch ( Exception $e ) {
//                array_push( $tmpNames , "error" );
//            }

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
			list($ret, $err) = Qiniu_Put($upToken, $newname, $img, null);
			
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
			
			
			
			//返回图片地址  编辑器中引用改地址
			//$url = "http://".$qiniu['bucket'].".".$qiniu['domain']."/".$newname."?".'imageMogr2/thumbnail/540x335!';
			$url = "http://".$qiniu['bucket'].".".$qiniu['domain']."/".$newname;
            
        }
        /**
         * 返回数据格式
         * {
         *   'url'   : '新地址一ue_separate_ue新地址二ue_separate_ue新地址三',
         *   'srcUrl': '原始地址一ue_separate_ue原始地址二ue_separate_ue原始地址三'，
         *   'tip'   : '状态提示'
         * }
         */
          
        
        echo "{'url':'" . $url . "','tip':'远程图片抓取成功！','srcUrl':'" . $uri . "'}";
    }