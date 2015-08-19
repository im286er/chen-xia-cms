<?php 

	class Comment extends CActiveRecord{
		
		
		public static function model($className = __CLASS__ ){
			
			return parent::model($className);
		}
		
		public function tableName(){
			
			return "{{comment}}";
		}
		
		public $name;
		public $email;
		public $content;
		public $verify;
		

		//过滤规则
		public function rules(){
			
			return array(
				array('name','safe'),
				array('email','safe'),
				array('verify','captcha','message'=>'验证码错误'),
				array('content','required','message'=>'内容必填'),
			);
		}
	
	}

?>