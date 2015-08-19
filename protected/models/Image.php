<?php

	class Image extends CActiveRecord{
		
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
			
			return "{{image}}";
		}
		
	}	

?>