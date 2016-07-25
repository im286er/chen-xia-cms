<?php

	class Register extends CActiveRecord{
		
		/**
		 * 返回模型
		 * Enter description here ...
		 * @param unknown_type $className
		 */
		public static function model($className = __CLASS__ ){
			
			return parent::model($className);
		}
		
		/**
		 * 返回表名
		 * @see CActiveRecord::tableName()
		 */
		public function tableName(){
			
			//自动处理表前缀
			return "{{user}}";
		}
		
		/*
		 * 声明name变量
		 */
		public $username;
		public $password;
		public $checkcode;
		
		public function rules(){

			return array(
				array('username','length','tooShort'=>'密码长度不小于6位'),
				array('password','length','min'=>6,'max'=>64,'tooShort'=>'密码长度不小于6位','tooLong'=>'密码长度不大于20位'),
				array('checkcode','captcha','message'=>'验证码错误'),
				//array('username','RegisterCheck'),
			);
		}
		
	}

?>