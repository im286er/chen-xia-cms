<?php
	
	class AdminController extends Controller{
	
		//权限验证
		public function filters(){
			
			return array(
				'accessControl',
			);
		}
		public function accessRules(){
			//'actions'=>array(),不写或空表示验证所有方法	
			return array(
				array(
					'allow',
					'actions'=>array(),
					'users'  =>array('@'),	
				),
				array(
					'deny',
					'users'=>array('*'),
				),
			);
		}
		
		
		//后台首页
		public function actionIndex(){
			$this->render("home");
		}
		
		//基本信息
		public function actionMyinfo(){
			
			$userinfoModel = new Userinfo();
			$userInfo = $userinfoModel->findByPk(Yii::app()->session['uid']);
			$this->render("myinfo",array('userinfo'=>$userInfo));
		}
		
		//修改信息
		public function actionEditinfo(){
			
			$userinfoModel = new Userinfo();
			$userInfo = $userinfoModel->findByPk(Yii::app()->session['uid']);
			if($userInfo != NULL){
				$userinfoModel = $userInfo;
			}
			
			if(isset($_POST['Userinfo'])){
				$userinfoModel->attributes = $_POST['Userinfo'];
				if($userinfoModel->validate()){
					if($userinfoModel->save()){

						$this->redirect(array('myinfo'));
					}else{
						
						Yii::app()->user->setFlash('edituserinfoerror','Sorry，系统错误，修改失败。:(');
						$this->redirect(array('myinfo'));
					}
				}
			}

			$data = array("userinfoModel"=>$userinfoModel);
			$this->render("editinfo",$data);
		}
		
		//修改密码
		public function actionEditpass(){
			
			$userModel = new User();
			$userInfo = $userModel->find('username=:name',array(':name'=>Yii::app()->user->name));
			if(isset($_POST['User'])){
				$userModel->attributes = $_POST['User'];
				//p($userModel->attributes);die;
				if($userModel->validate()){
					$newpass = md5($_POST['User']['newpassword']);
					if($userModel->updateByPk($userInfo->id, array('password'=>$newpass))){
						
						//保存闪存信息，前台打印
						Yii::app()->user->setFlash('success','修改密码成功。:)');
					}
					
				}
			}
			$this->render("editpass",array('userModel'=>$userModel));
		}
		
		
		
		//网站配置
		public function actionWebconfig(){
			
			$configModel = Config::model();
			$configInfo  = $configModel->findAll('userid=:uid',array('uid'=>Yii::app()->session['uid']));
			$this->render('webconfig',array('configs'=>$configInfo));
		}
		
		//修改配置
		public function actionEditconfig($cid){
			
			$configModel = Config::model();
			$configInfo  = $configModel->findByPk($cid);
			$configInfotmp = $configInfo;
			
			Yii::import('application.vendors.*'); 
			require_once 'Qiniu/rs.php';
			require_once 'Qiniu/io.php';
			
			$bucket = Yii::app()->params['bucket'];
			$accessKey = Yii::app()->params['accessKey'];
			$secretKey = Yii::app()->params['secretKey'];
			
			if(isset($_POST['Config'])){
				
				$post = $_POST['Config'];
				$configInfo->attributes = $post;
				
				if($configInfo->validate()){
					
					$images = "";
					if(!empty($_FILES['icon']['tmp_name'])){
						
						$file = $_FILES['icon'];
						$type = ".jpg";
						
						if(ImageTypeCheck($file['name'],$file['size'])){
							
							$newname = time().rand(10000,99999).$type;
							Qiniu_SetKeys($accessKey, $secretKey);
							$putPolicy = new Qiniu_RS_PutPolicy($bucket);
							$upToken = $putPolicy->Token(null);
							list($ret, $err) = Qiniu_Put($upToken, $newname, file_get_contents($file['tmp_name']), null);
							
							if($err === null) {	//成功
							   	$images = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/".$newname;
							  
							}else {				//失败
							   
							}
						}
						
						//获取原图片并删除
						$icon = GetImageFileName($configInfotmp->icon);
						Qiniu_SetKeys($accessKey, $secretKey);
						$client = new Qiniu_MacHttpClient(null);
						$err = Qiniu_RS_Delete($client, $bucket, $icon[0]);
						
						
					}else{
						
						$images  = $configInfo->icon;
					}
					
					$configInfo->icon = $images;
					if(!$configInfo->save()){
						Yii::app()->user->setFlash('state',"Sorry，系统错误，修改配置失败 :(");
					}else{
						$this->redirect(array('webconfig'));
					}
					
				}
				
			}
			
			
			$data = array(
				'editModel'	=>	$configInfo,
			);

			$this->render('editconfig',$data);
		}
		
		
		//修改头像
		public function actionEditiface(){
			
			//交给assets中iface异步处理
			$this->render("iface");
		}
		
		//菜单管理
		public function actionWebmenu(){
			
			$menuModel = Menu::model();
			$menuInfo = $menuModel->findAll('userid=:uid',array('uid'=>Yii::app()->session['uid']));
			$data = array(
				'menus'	=>	$menuInfo,
			);
			$this->render("webmenu",$data);
		}
		
		//添加菜单
		public function actionAddmenu($pid){

			$menuModel = new Menu();
			if(isset($_POST['Menu'])){
				$menuModel->attributes = $_POST['Menu'];
				$menuModel->userid = Yii::app()->session['uid'];
				$menuModel->pid = $pid;
				if($menuModel->validate()){
					if($menuModel->save()){
						$this->redirect(array("webmenu"));
					}else{
						Yii::app()->user->setFlash("addmenustatus",'Sorry，系统错误，添加菜单失败 :(');
					}
					
				}
			}
			$data = array(
				'menuModel'	=>	$menuModel,
			);
			$this->render("addmenu",$data);
		}
		
		//删除菜单
		public function actionDelmenu($id){
			
			$menuModel = new Menu();
			if($menuModel->deleteByPk($id)){
				Yii::app()->user->setFlash('deletestatus',"OK，删除菜单成功 :)");
				$this->redirect(array("Webmenu"));
			}else{
				Yii::app()->user->setFlash('deletestatus',"Sorry，系统错误，删除菜单失败 :(");
				$this->redirect(array("Webmenu"));
			}
		}
		
		//编辑菜单
		public function actionEditmenu($id){
			
			$menuModel = Menu::model();
			$menuModel  = $menuModel->findByPk($id);
			
			if(isset($_POST['Menu'])){
				$menuModel->attributes = $_POST['Menu'];
				$menuModel->save(false);
				$this->redirect(array("Webmenu"));
	
			}
			
			$data = array(
				'menuModel'	=>	$menuModel,
			);
			$this->render("editmenu",$data);
		}
		
		//相册管理
		public function actionPhoto(){
			
			
			$criteria = new CDbCriteria();		//AR的另一种写法
			$criteria->condition = "userid=".Yii::app()->session['uid'];
			$photoModel = new Photo();
			$total = $photoModel->count('userid=:uid',array('uid'=>Yii::app()->session['uid']),$criteria);	//统计条数

			$pager = new CPagination($total);
			$pager->pageSize = 27;
			$pager->applyLimit($criteria);
			$photos = $photoModel->findAll($criteria);

			$url = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
			$data = array(
				'photos'	=>	$photos,
				'pages'		=>	$pager,
				'url'		=>	$url,
				'ajaxurl'	=>	"admin/Ajaxdelimage",
				'ajaxset'	=>	"admin/Ajaxsetimage",
			);
			$this->render("iphoto",$data);
		}
		
		
		//上传图片-->交给assets中CFUpload异步处理
		public function actionUpphoto(){
			
			$this->render("upphoto");
		}
		
		//删除图片
		public function actionAjaxdelimage(){
			
			Yii::import('application.vendors.*'); 
			require_once 'Qiniu/rs.php';
			require_once 'Qiniu/io.php';
			
			$bucket = Yii::app()->params['bucket'];
			$accessKey = Yii::app()->params['accessKey'];
			$secretKey = Yii::app()->params['secretKey'];
			
			$id = $_POST['iid'];
			$photoModel = new Photo();
			$photoInfo  = $photoModel->findByPk($id);
			if($photoInfo != NULL){
				
				Qiniu_SetKeys($accessKey, $secretKey);
				$client = new Qiniu_MacHttpClient(null);
				$err = Qiniu_RS_Delete($client, $bucket, $photoInfo['picture']);
					
			}
			
			//删除数据库中的记录
			if($photoModel->deleteByPk($id)){
				echo 1;
			}else{
				echo 0;
			}
			
		}
		
		//设置皮肤背景
		public function actionAjaxsetimage(){
			
			$id = $_POST['iid'];
			$uid = Yii::app()->session['uid'];
			$sql = "update {{webconfig}} set background = $id where userid = $uid ";
			Yii::app()->db->createCommand($sql)->execute();
			
			//重新设置session中的皮肤图片地址
			$sql = "select picture from {{photo}} where id = $id";
			$background = Yii::app()->db->createCommand($sql)->queryAll();
			$url  = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
			Yii::app()->session['ws_backgroundofuser'] = !empty($background[0]['picture'])?$url.$background[0]['picture']:null;
			
			echo "setbackgroundsuccessed";
			
		}
		
		
		//音乐
		public function actionImusic(){
			
			Createmusiclist();
			
			$url = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
			$songModel = New Song();
			$songInfo  = $songModel->findAll('userid=:uid',array(':uid'=>Yii::app()->session['uid']));
			$data = array('songInfo'=>$songInfo,'url'=>$url);
			$this->render("imusic",$data);
		}
		
		
		//上传音乐
		public function actionUpmusic(){
			
			$songModel = New Song();
			if(isset($_POST['Song'])){
				$songModel->attributes = $_POST['Song'];
				$songModel->userid = Yii::app()->session['uid'];
				if($songModel->validate()){
					
					if(!empty($_FILES['songname']['tmp_name'])){
						
						$file = $_FILES['songname'];
						if(!MusicTypeCheck($file['name'],$file['size'])){
							 Yii::app()->user->setFlash('upstatus','Sorry， 音乐文件大小或格式错误 :(');
							 $this->redirect(array("Upmusic"));
							 die;
						}
						
						$type = ".".GetFileExtension($file['name']);
						
						Yii::import('application.vendors.*'); 
						require_once 'Qiniu/rs.php';
						require_once 'Qiniu/io.php';
						
						$bucket = Yii::app()->params['bucket'];
						$accessKey = Yii::app()->params['accessKey'];
						$secretKey = Yii::app()->params['secretKey'];
						
						$newname = time().rand(10000,99999).$type;
						
						//先保存记录
						$songModel->song = $newname;
						if($songModel->save()){

							/**
							 * 
							 */
							
						}else{
							Yii::app()->user->setFlash('upstatus','Sorry，系统错误，上传音乐失败 :(');
						}
							
							
						Qiniu_SetKeys($accessKey, $secretKey);
						$putPolicy = new Qiniu_RS_PutPolicy($bucket);
						$upToken = $putPolicy->Token(null);
						list($ret, $err) = Qiniu_Put($upToken, $newname, file_get_contents($file['tmp_name']), null);
						
						if($err === null) {	//成功
							/***
							 * 
							 */
							$this->redirect(array('admin/Imusic'));

						}else {				//失败
						   Yii::app()->user->setFlash('upstatus','Sorry，系统错误，上传音乐失败 :(');
						}
						
					}
					
					
				}
				
			}
			$data = array('songModel'=>$songModel);
			$this->render("upmusic",$data);
		}
		
	
		
		//删除音乐
		public function actionDelmusic($id){
			
			$songModel = New Song();
			$songInfo  = $songModel->findByPk($id);
			
			Yii::import('application.vendors.*'); 
			require_once 'Qiniu/rs.php';
			require_once 'Qiniu/io.php';
			
			$bucket = Yii::app()->params['bucket'];
			$accessKey = Yii::app()->params['accessKey'];
			$secretKey = Yii::app()->params['secretKey'];
			
			if($songInfo['name'] != ""){
				Qiniu_SetKeys($accessKey, $secretKey);
				$client = new Qiniu_MacHttpClient(null);
				$err = Qiniu_RS_Delete($client, $bucket, $songInfo['song']);
			}
			
			if(!$songModel->deleteByPk($id)){
				
				Yii::app()->user->setFlash('delmusicstatus','Sorry,系统错误，删除音乐失败 :(');
			}
			
			$this->redirect(array("admin/Imusic"));
			
		}
		
		
		
		//修改音乐
		public function actionEditmusic($id){
			
			$songModel = Song::model();
			$songModel = $songModel->findByPk($id);
			if(isset($_POST['Song'])){
				$songModel->attributes = $_POST['Song'];
				if($songModel->save()){
					Yii::app()->user->setFlash('editmusicstatus','修改音乐成功 :)');
				}else{
					
					Yii::app()->user->setFlash('editmusicstatus','系统错误，修改失败 :(');
				}
			}
			
			$data  = array(
				'songModel'	=>	$songModel,
			);
			$this->render('editmusic',$data);
		}
		
		
		
		//mv视频
		public function actionImv(){
			
			$url = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
			$uid = Yii::app()->session['uid'];
			$mvModel = new Mv();
			$mvInfo  = $mvModel->findAllBySql("select * from {{mv}} where userid = $uid order by sort asc ");

			$data = array(
				'mvInfo'	=>	$mvInfo,
				'url'		=>	$url,	
			);
			
			$this->render("imv",$data);
			
		}
		
		
		
		//上传视频	-->	assets中swf/upload.php异步处理
		public function actionUpmv(){
			$data = array(
				'flashUrl'	=>	Yii::app()->request->baseUrl."/assets/admin/swfupload/swfupload/swfupload.swf",
				'uploadUrl'	=>	Yii::app()->request->baseUrl."/assets/admin/swfupload/upload.php",
			);
			$this->render("upmv",$data);
		}
		
		
		//编辑mv
		public function actionEditmv($id){
			
			$mvModel = Mv::model();
			$mvModel = $mvModel->findByPk($id);
			
			if(isset($_POST['Mv'])){
				$mvModel->name = $_POST['Mv']['name'];
				$mvModel->sort = $_POST['Mv']['sort'];
				
				if($mvModel->save(false)){
					$this->redirect(array("imv"));
				}else{
					Yii::app()->user->setFlash('editmvstatus','Sorry，系统错误，修改视频失败 :(');
				}
				
			}
			$data    = array(
				'mvInfo'	=>	$mvModel,
			);
			$this->render('editmv',$data);
		}
		
		
		//上传视频
		public function actionDelmv($id){
			
			Yii::import('application.vendors.*'); 
			require_once 'Qiniu/rs.php';
			require_once 'Qiniu/io.php';
			
			$bucket = Yii::app()->params['bucket'];
			$accessKey = Yii::app()->params['accessKey'];
			$secretKey = Yii::app()->params['secretKey'];
			
			$mvModel = new Mv();
			$mvInfo  = $mvModel->findByPk($id);
			if($mvInfo != NULL){
				
				Qiniu_SetKeys($accessKey, $secretKey);
				$client = new Qiniu_MacHttpClient(null);
				$err = Qiniu_RS_Delete($client, $bucket, $mvInfo['mv']);
				
			}
			
			
			//上传业务数据库中数据
			
			if($mvModel->deleteByPk($id)){
				Yii::app()->user->setFlash('delmvstatus','YES，删除视频成功 :)');
			}else{
				Yii::app()->user->setFlash('delmvstatus','Sorry，系统出错，删除视频失败 :(');
			}
			$this->redirect(array("imv"));
			
		}
		
		
		//留言
		public function actionMessage($m){
			
			$uid = Yii::app()->session['uid'];
			$data['uid'] = $uid;
			
			$sql = "select * from {{icontact}} where userid = $uid ";
			switch ($m){
				
				case 2:
					break;
				case 1:
					$sql .= " and isread = 1 ";
					break;
				case 0:
					$sql .= " and isread = 0 ";
					break;
				
			}
			$order = " order by time desc ";
			$sql .= $order;
			
			$criteria = new CDbCriteria;
			$model= Yii::app()->db->createCommand($sql)->queryAll();

			$pages = new CPagination(count($model));               
			$pages->pageSize = 7;
			$pages->applylimit($criteria);
			
			$model=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
			$model->bindValue(':offset', $pages->currentPage*$pages->pageSize);
			$model->bindValue(':limit', $pages->pageSize);
			$commentInfo=$model->queryAll();
			
			$data['pages'] = $pages;
			$data['messageInfo'] = $commentInfo;
			$this->render("imessage",$data);
			
		}
		
		//删除留言
		public function actionDelmessage($id){

			if(Contact::model()->deleteByPk($id)){
				Yii::app()->user->setFlash('actiontsataus','YES，删除留言成功 :)');
			}else{
				Yii::app()->user->setFlash('actiontsataus','Sorry，系统错误，删除留言失败 :(');
			}
			$this->redirect(array('admin/message','m'=>2));
		}
		
		//标记留言已读
		public function actionMarkread($id){
			
			$contactModel = Contact::model();
			$contactModel = $contactModel->findByPk($id);
			$contactModel->isread = 1;
			$contactModel->save(false);
			$this->redirect(array('admin/message','m'=>2));
			
		}
		
	}

?>