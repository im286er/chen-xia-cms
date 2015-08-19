<?php

	if(!isset($_SESSION)){
		session_start();
	}
	$file_src = "src.png"; 
	$filename162 = "1.png"; 
	$filename48 = "2.png"; 
	$filename20 = "3.png";   
	
	$src=base64_decode($_POST['pic']);
	$pic1=base64_decode($_POST['pic1']);   
	$pic2=base64_decode($_POST['pic2']);  
	$pic3=base64_decode($_POST['pic3']);  
	
//	if($src) {
//		file_put_contents($file_src,$src);
//	}
	
//	file_put_contents($filename162,$pic1);
//	file_put_contents($filename48,$pic2);
//	file_put_contents($filename20,$pic3);
	
	$rs['status'] = 1;
	
	/**
	 * 上传头像到七牛pic1
	 * 1.查看用户是否有原头像并删除
	 * 2.上传新头像
	 * 3.保存一份图片到本地
	 */
	
	if(!empty($_SESSION['uid'])){
		
		$uid = $_SESSION['uid'];
		require_once '../qiniu/io.php';
		require_once '../qiniu/rs.php';
	    $qiniu = parse_ini_file('../qiniu/qiniu.ini');
	
	    require_once '../connect/PdoConnect.class.php';
		$db = parse_ini_file('../connect/dbconfig.ini');
		
		$accessKey = $qiniu['accessKey'];
		$secretKey = $qiniu['secretKey'];
		$bucket	   = $qiniu['bucket'];
		
		$pdo = new PDO_CON($db['dbtype'], $db['host'], $db['user'], $db['pasw'], $db['dbname']);
		$conn=$pdo->get_conId();
		
		Qiniu_SetKeys($accessKey, $secretKey);
		//1
		$sql = "select headpicture from ws_user where id = $uid ";
		$res = $pdo->ExceSQL($sql, $conn);
		
		if(!empty($res[0]['headpicture'])){
			
			$client = new Qiniu_MacHttpClient(null);
			$err = Qiniu_RS_Delete($client, $bucket, $res[0]['headpicture']);
			
		}
		
		//2
		$newname = time().rand(10000, 99999).'.jpg';

		$putPolicy = new Qiniu_RS_PutPolicy($bucket);
		$upToken = $putPolicy->Token(null);
		list($ret, $err) = Qiniu_Put($upToken, $newname, $pic1, null);
		
		$sql = "update ws_user set headpicture = '$newname' where id = $uid ";
		$pdo->ExceSQL($sql, $conn);
		
		//3省
		
		
	}
	
	
	print json_encode($rs);

?>
