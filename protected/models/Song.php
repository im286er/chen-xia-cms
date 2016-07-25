<?php 

	class Song extends CActiveRecord{
		
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
			return "{{song}}";
		}
		
		public $name;
		public $song;
		public $sort;
		public $userid;
		
		public function rules(){
			
			return array(
				array('name','required','message'=>'歌曲名称必填'),
				array('song','safe','message'=>'音乐文件必选'),
				array('sort','safe'),
				array('userid','safe'),
			);
		}
		
		
		
	}


?>