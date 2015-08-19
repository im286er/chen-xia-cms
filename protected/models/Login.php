<?php
	
	class Login extends CActiveRecord{
		
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

		public $loginname;
		public $loginpass;
		

		public function rules(){

			return array(
				
				array('loginname,loginpass','required','message'=>'用户名或密码错误'),
				//array('loginname,loginpass','user_check'),
			);
		}
		
		
		/**
		 * 自定义函数判断用户原始密码是否合法
		 * Yii::app()->user->name是从session中取值
		 */
		public function user_check(){

			$userInfo = $this->find('username=:name',array(':name'=>$this->loginname));
			if(md5($this->loginpass) != $userInfo->password )
				$this->addError('password','原始密码错误');
			else
				Yii::app()->session['uid'] = $userInfo->id;
		}
		
	}

?>