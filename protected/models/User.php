<?php
	
	class User extends CActiveRecord{
		
		//修改密码模型
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
		
		
		/**
		 * 自定义标签
		 * 自定义规则
		 * 没有的name先声明
		 */
		public $newpassword;
		public $conpassword;
		
		public function attributeLabels(){
			return array(
				'password'		=>	'原始密码',
				'newpassword'	=>	'新密码',
				'conpassword'	=>	'确认密码',
			);
		}
		
		public function rules(){
			
			return array(
				
				array('password','required','message'=>'原始密码必填'),
				array('password','db_passcheck'),								//自定义方法判断原密码是否合法
				array('newpassword','required','message'=>'新密码必填'),
				array('conpassword','required','message'=>'确认密码必填'),
				array('conpassword','compare','compareAttribute'=>'newpassword','message'=>'两次输入的密码不一致'),
			);
		}
		
		
		/**
		 * 自定义函数判断用户原始密码是否合法
		 * Yii::app()->user->name是从session中取值
		 */
		public function db_passcheck(){
			
			$userInfo = $this->find('username=:name',array(':name'=>Yii::app()->user->name));
			if(md5($this->password) != $userInfo->password )
				$this->addError('password','原始密码错误');
		}
		
	}

?>