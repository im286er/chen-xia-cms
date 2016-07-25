<?php
    
    class LoginController extends Controller{
        
        //Login to Index
        public function actionIndex(){
            /**
             * Test DB Connection
             * var_dump(Yii::app()->db);
             * $userInfo = User::model()->find("username=:name",array(':name'=>'zhuwanxiong'));
             *    p($userInfo);die;
             */
            
            $loginForm = new LoginForm();
            if(isset($_POST['LoginForm'])){
                $loginForm->attributes = $_POST['LoginForm'];
                if($loginForm->validate() && $loginForm->login()){
                    
                    Yii::app()->session['logintime'] = time();
                    $this->redirect(array('admin/index'));
                }
            }
            
            //User Load Layout
            $this->layout = "/layouts/login";
            $randkey = rand(1, 2);
            $this->render("login2",array('loginForm'=>$loginForm));
        }
        
        //CheckCode
        public function actions(){
            return array(
                'captcha' => array(
                    'class' => 'system.web.widgets.captcha.CCaptchaAction',
                    'width' => '100',
                    'height'=> '39',
                    'minLength'=>  4,
                    'maxLength'=> 4,
                    
                ),
            );
        }
        
        //Layout
        public function actionOut(){
            Yii::app()->user->logout();
            $this->redirect(array('index'));
        }
    }

?>