<?php

	class Userinfo extends CActiveRecord{
		
		public static function model($className = __CLASS__ ){
			
			return parent::model($className);
		}
		public function tableName(){
			
			return "{{user}}";
		}
		
		
		//定义属性name
		public $nickname;
		public $truename;
		public $password;
		public $phone;
		public $qq;
//		public $headpicture;
		public $introduce;

		
		
//		//定义规则
		public function rules(){
			
			return array(
				array('nickname','safe'),
				array('truename','safe'),
				array('password','safe'),
				array('phone','safe'),
				array('qq','safe'),
				array('introduce','safe'),
				
			);
		}

		
		
	}

?>