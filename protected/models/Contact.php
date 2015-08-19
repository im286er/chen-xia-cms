<?php 

	class Contact extends CActiveRecord{
		
		
		public static function model($className = __CLASS__ ){
			
			return parent::model($className);
		}
		
		public function tableName(){
			
			return "{{icontact}}";
		}
		
		public $tourist;
		public $email;
		public $message;
		public $verify;
		public $subject;
		

		//过滤规则
		public function rules(){
			
			return array(
				array('tourist','safe'),
				array('email','safe'),
				array('subject','safe'),
				array('verify','captcha','message'=>'验证码错误'),
				array('message','required','message'=>'内容必填'),
			);
		}
	
	}

?>