<?php

	class Article extends CActiveRecord{
		
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
			return "{{label}}";
		}
		
		/*
		 * 声明name变量
		 */
		public $label;
		public $sort;
		public $userid;
		
		
		public function rules(){
			
			return array(
				array('label','required','message'=>'标签名称必填'),
				array('sort','default'),
				array('userid','default'),
				
			);
		}
		
		
	}

?>