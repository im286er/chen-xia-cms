<?php 

	class ArticleController extends Controller{
		
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
		
		//Lables List
		public function actionLabels(){
			
			$criteria = new CDbCriteria();		//AR的另一种写法
			$criteria->condition = "userid=".Yii::app()->session['uid'];
			$labelModel = new Article();
			$total = $labelModel->count($criteria);	//统计条数
			
			$pager = new CPagination($total);
			$pager->pageSize = 7;
			$pager->applyLimit($criteria);
			$labels = $labelModel->findAll($criteria);
			$data = array('pages'=>$pager,'labels'=>$labels);
			$this->render('labels',$data);
		}
		
		//Add Lable
		public function actionAddlabel(){
			
			$articleModel = new Article();
			if(isset($_POST['Article'])){
				/*
				 * 这里注意将post的值压入属性中
				 * 并向里压入一个userid
				 */
				$_POST['Article']['userid'] = Yii::app()->session['uid'];
				$articleModel->attributes = $_POST['Article'];
				if($articleModel->validate()){
					
					if($articleModel->save()){
						//Yii::app()->user->setFlash('success','添加标签成功 :)');
						$this->redirect(array('labels'));
					}
				}
			}
			$this->render("addlabel",array('articleModel'=>$articleModel));
		}
		
		//Edit Label
		public function actionEditlabel($id){
			
			$label = Article::model();
			$labels = $label->findByPk($id);
			
			if(isset($_POST['Article'])){
				
				$_POST['Article']['userid'] = Yii::app()->session['uid'];
				$labels->attributes = $_POST['Article'];
				
				if($labels->validate()){
					if($labels->save()){
						$this->redirect(array('article/labels'));
					}
				}
				
			}
			
			$this->render('editlabel',array('articleModel'=>$labels));
		}
		
		
		//Del Label
		public function actionDellabel($id){
			
			$label = Article::model();
			$uid = Yii::app()->session['uid'];
			$sql = "select id from {{blog}} where userid = $uid and labelid = $id ";
			$blog = $label->findBySql($sql);
			
			if(is_object($blog)){
				
				Yii::app()->user->setFlash("hasBlog","此标签下有文章，删除文章先 :(");
				$this->redirect(array('labels'));
			}else{
				if($label->deleteByPk($id)){
					$this->redirect(array('labels'));
				}
			}
			
			$this->render($view);
		}
		
		//Blog List
		public function actionArticles(){
			
			$uid = Yii::app()->session['uid'];
			$sql = "select b.*,l.label from {{blog}} b,{{label}} l where b.userid = $uid and b.labelid = l.id order by b.time desc ";
			
			$criteria = new CDbCriteria;
			$model= Yii::app()->db->createCommand($sql)->queryAll();

			$pages = new CPagination(count($model));               
			$pages->pageSize = 7;
			$pages->applylimit($criteria);
			
			$model=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
			$model->bindValue(':offset', $pages->currentPage*$pages->pageSize);
			$model->bindValue(':limit', $pages->pageSize);
			$blogs = $model->queryAll();
			
			$data['pages'] = $pages;
			$data['blogs'] = $blogs;
			$this->render('articles',$data);

		}
		
		
		//Add Blog
		public function actionWrite(){
			
			$label = new Article();
			$labels = $label->findAll('userid=:uid',array(':uid'=>Yii::app()->session['uid']));
			
			//$labesArray是对应于id,label键值的一维数组
			$labesArray[0] = '--请选择--';
			foreach ($labels as $l){
				$labesArray[$l->id] = $l->label;
			}
			
			$blog = Blog::model();
			if(isset($_POST['Blog'])){
				$post = $_POST['Blog'];
				if (!$blog->attributes['time']) {$post['time']=time();}
				if (!$blog->attributes['updatetime']) {$post['updatetime']=time();}
				$post['view'] = 0;
				$post['time'] = time();
				$post['updatetime'] = time();
				$post['userid'] = Yii::app()->session['uid'];
				
				$blog->attributes = $post;
				
				if($blog->validate()){
					
					//$blog = Blog::model();
					if(!empty(Yii::app()->session['blogid'])){
						//根据blogid查询后更新数据
						$blog = $blog->findByPk(Yii::app()->session['blogid']);
					}else{
						//insert一条记录
						$blog = new Blog();
						$blog->userid = Yii::app()->session['uid'];
						$blog->save(FALSE);
						Yii::app()->session['blogid'] = $blog->attributes['id'] ;
					}

					Yii::import('application.vendors.*'); 
					require_once 'Qiniu/io.php';				//七牛上传类
					require_once 'Qiniu/rs.php';

					$images = "";								//拼接图片以@方式
					if(CheckUploadFiles($_FILES['thumb'])){
						
						$file = $_FILES['thumb'];
						$type = ".jpg";
						
						$bucket = Yii::app()->params['bucket'];
						$accessKey = Yii::app()->params['accessKey'];
						$secretKey = Yii::app()->params['secretKey'];
						
						foreach ($file['name'] as $key=> $f){
							if(empty($file['name'][$key])) {continue;}
							if(ImageTypeCheck($file['name'][$key],$file['size'][$key])){
								
								$newname = time().rand(10000,99999).$type;
								Qiniu_SetKeys($accessKey, $secretKey);
								$putPolicy = new Qiniu_RS_PutPolicy($bucket);
								$upToken = $putPolicy->Token(null);
								list($ret, $err) = Qiniu_Put($upToken, $newname, file_get_contents($file['tmp_name'][$key]), null);
								
								if($err === null) {	//OK
								  	$images .= $newname."@";
									
								}else {				//NO
								   
								}

							}
						}
						
					}
					
					$post['image'] = $images;
					$post['content'] = $_POST['content'];
					$blog->attributes = $post;

					if($blog->save()){
						Yii::app()->session['blogid'] = null;
						Yii::app()->user->setFlash('sendblogsuccess','发布文章成功 :)');
						$this->redirect(array('articles'));
					}
				}
			}

			$data = array(
				'labels'	=>	$labesArray,
				'blogModel'	=>	$blog,
			);
			$this->render('addarticle',$data);
		}
		
		
		//Del Blog
		public function actionDelblog($id){
			
			$blogModel = Blog::model();
			$blogInfo  = $blogModel->findByPk($id); 
			
			Yii::import('application.vendors.*'); 
			require_once 'Qiniu/rs.php';
					
			$bucket = Yii::app()->params['bucket'];
			$accessKey = Yii::app()->params['accessKey'];
			$secretKey = Yii::app()->params['secretKey'];
			
			//删除缩略图
			Qiniu_SetKeys($accessKey, $secretKey);
			$client = new Qiniu_MacHttpClient(null);
			$images = GetImageFileName($blogInfo->image);

			foreach($images as $i){
				if(!isset($client))
					$client = new Qiniu_MacHttpClient(null);
				$err = Qiniu_RS_Delete($client, $bucket, $i);

			}
			
			//删除评论
			$sql = "delete from {{comment}} where blogid = $id ";
			Yii::app()->db->createCommand($sql)->execute();
			
			//删除文章文字配图 和业务数据库中的记录
			Qiniu_SetKeys($accessKey, $secretKey);
			$client = new Qiniu_MacHttpClient(null);
			$imgageModel = Image::model();
			$textImage = $imgageModel->findAll('blogid=:bid',array('bid'=>$id));
			foreach ($textImage as $ti){
				if(!isset($client))
						$client = new Qiniu_MacHttpClient(null);
						
					$err = Qiniu_RS_Delete($client, $bucket, $ti->image);
			}
			$imgageModel->deleteAll('blogid=:bid',array('bid'=>$id));
			
			
			if($blogModel->deleteByPk($id)){
				Yii::app()->user->setFlash('deleteblogstatus','删除文章成功 :)');
			}else{
				Yii::app()->user->setFlash('deleteblogstatus','Sorry，系统错误，删除文章失败 :(');
			}
			$this->redirect(array('articles'));
		}
		
		
		//Look Blog
		public function actionIlookblog($bid){
			
			$url = "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
			$blogModel = Blog::model();
			$blogInfo = $blogModel->findAll('id=:id',array('id'=>$bid));

			//传递图片地址字符串儿  以@拼接

			$blogInfo[0]->image = GetSpecialImage($blogInfo[0]['image']);
			$data = array(
				'blogInfo'	=>	$blogInfo,
				//'url'		=>	$url,
			);
			$this->renderPartial('ilookblog',$data);
		}
		
		
		//Edit BLog
		public function actionEditblog($id){
		
			$label = new Article();
			$labels = $label->findAll('userid=:uid',array(':uid'=>Yii::app()->session['uid']));
			
			//$labesArray是对应于id,label键值的一维数组
			$labesArray[0] = '--请选择--';
			foreach ($labels as $l){
				$labesArray[$l->id] = $l->label;
			}
			
			$blog = Blog::model();
			$blogInfo = $blog->findByPk($id);
			$blogInfotmp = $blogInfo;
			
			//存储到session[blogid] 防止imageUP后台处理时有添加一条记录到blog表中
			Yii::app()->session['blogid'] = $id;
			
			
			//七牛上传类
			Yii::import('application.vendors.*'); 
			require_once 'Qiniu/io.php';				
			require_once 'Qiniu/rs.php';
			
			$bucket = Yii::app()->params['bucket'];
			$accessKey = Yii::app()->params['accessKey'];
			$secretKey = Yii::app()->params['secretKey'];
			
			if(isset($_POST['Blog'])){
				
				$post = $_POST['Blog'];
				//$post['view'] = 0;
				$post['updatetime'] = time();
				$post['userid'] = Yii::app()->session['uid'];
				
				$blogInfo->attributes = $post;
				
				if($blogInfo->validate()){
					
					/**
					 * 处理图片
					 * require_once 'UPimage/UPimage.php';		//图片缩略类
					 * $resizeimage = new resizeimage("1.jpg", "320", "240", "1","2.jpg");
					 * 1.缩略图
					 * 2.文章图片 删除就行  添加记录由后台异步处理	//删除文章时处理
					 */
					
					//echo CheckUploadFiles($_FILES['thumb']);die;
					
					//1
					//a 查出缩略图片并 b删除七牛上的图片	传递一个特殊的字符串
					
					
					$images = "";								//拼接图片以@方式
					
					if(CheckUploadFiles($_FILES['thumb'])){
						
						//删除图片
						$file = $_FILES['thumb'];
						$type = ".jpg";
						
						if(count($file['name']) != 0){
							foreach ($file['name'] as $key=> $f){
								if(ImageTypeCheck($file['name'][$key],$file['size'][$key])){
									
									$newname = time().rand(10000,99999).$type;
									Qiniu_SetKeys($accessKey, $secretKey);
									$putPolicy = new Qiniu_RS_PutPolicy($bucket);
									$upToken = $putPolicy->Token(null);
									list($ret, $err) = Qiniu_Put($upToken, $newname, file_get_contents($file['tmp_name'][$key]), null);
									
									if($err === null) {	//成功
									   	$images .= "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/".$newname."@";
									  
									}else {				//失败
									   
									}
									
								}
							}
						}
						
						//删除图片
						$imgs = GetImageFileName($blogInfotmp->image);
						
						Qiniu_SetKeys($accessKey, $secretKey);
						$client = new Qiniu_MacHttpClient(null);
						
						foreach ($imgs  as $i){
							if(!isset($client)) {$client = new Qiniu_MacHttpClient(null);}
							$err = Qiniu_RS_Delete($client, $bucket, $i);
						}
						
					}else{								//没有上传图片 不做任何操作 保持原来的图片
						$images = $blogInfo->image;
					}
					
					//$post['image'] = $images;
					$blogInfo->attributes = $post;
					
					$blogInfo->image = $images;
					$blogInfo->content = $_POST['content'];
					if($blogInfo->save()){
						Yii::app()->session['blogid'] = null;
						Yii::app()->user->setFlash('sendblogsuccess','修改文章成功 :)');
						$this->redirect(array('articles'));
					}
					
				}
				
			}

			$data = array(
				'labels'	=>	$labesArray,
				'blogModel'	=>	$blogInfo,
			);
			$this->render('editblog',$data);
			
		}
		
	}
	
?>