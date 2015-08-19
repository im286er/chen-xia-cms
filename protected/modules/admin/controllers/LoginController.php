<?php
	
	class LoginController extends Controller{
		
		//登陆首页
		public function actionIndex(){
			
			/**
			 * 测试连接数据库
			 * var_dump(Yii::app()->db);
			 * $userInfo = User::model()->find("username=:name",array(':name'=>'zhuwanxiong'));
			 *	p($userInfo);die;
			 */
			
			
			$loginForm = new LoginForm();
			
			if(isset($_POST['LoginForm'])){
				//固定写法
				$loginForm->attributes = $_POST['LoginForm'];

				if($loginForm->validate() && $loginForm->login()){
					
					Yii::app()->session['logintime'] = time();
					$this->redirect(array('admin/index'));
				}
				
			}
			
			//手动加载布局
			$this->layout = "/layouts/login";
			$randkey = rand(1, 2);
			$this->render("login2",array('loginForm'=>$loginForm));
			/*
			switch ($randkey){
				case 1:
					$this->render("login",array('loginForm'=>$loginForm));
					break;
				case 2:
					$this->render("login2",array('loginForm'=>$loginForm));
				
			}
			*/
			
			
		}
		
		//验证码
		public function actions(){
			
			return array(
				'captcha'	=>	array(
					'class'	=>	'system.web.widgets.captcha.CCaptchaAction',
					'width'	=>	'100',
					'height'=>	'39',
					'minLength'=>	 4,
					'maxLength'=>	4,
					
				),
			);
		}
		
		//退出登陆
		public function actionOut(){
			
			Yii::app()->user->logout();
			$this->redirect(array('index'));
		}
		
		
	}

?>