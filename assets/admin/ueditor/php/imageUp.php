<?php
	
	
    /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 12-7-18
     * Time: 上午10:42
     */
    header("Content-Type: text/html; charset=utf-8");
    //error_reporting(E_ERROR | E_WARNING);
    error_reporting(0);
    date_default_timezone_set("Asia/chongqing");
    include "Uploader.class.php";
    //上传图片框中的描述表单名称，
    $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
    $path = htmlspecialchars($_POST['dir'], ENT_QUOTES);

    //上传配置
    $config = array(
        "savePath" => ($path == "1" ? "upload/" : "upload/"),
        "maxSize" => 1000, //单位KB
        "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
    );

    //生成上传实例对象并完成上传
    $up = new Uploader("upfile", $config);

    /**
     * 得到上传文件所对应的各个参数,数组结构
     * array(
     *     "originalName" => "",   //原始文件名
     *     "name" => "",           //新文件名
     *     "url" => "",            //返回的地址
     *     "size" => "",           //文件大小
     *     "type" => "" ,          //文件类型
     *     "state" => ""           //上传状态，上传成功时必须返回"SUCCESS"
     * )
     */
    $info = $up->getFileInfo();

    /**
     * 向浏览器返回数据json数据
     * {
     *   'url'      :'a.jpg',   //保存后的文件路径
     *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
     *   'original' :'b.jpg',   //原始文件名
     *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
     * }
     */
    
    
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
	
    echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";


    
    
    