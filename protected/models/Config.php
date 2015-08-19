<?php
	
	class Config extends CActiveRecord{
		
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
			return "{{webconfig}}";
		}
		
		public $icon;
		public $seo;
		public $title;
		public $copyright;
		public $iaccess;
		public $titlecolor;
		public $contentcolor;
		
		public function rules(){
			
			return array(
				array('title','required','message'=>'网站标题必填'),
				array('icon','safe','message'=>'网站标徽必选'),
				array('seo','required','message'=>'SEO文字必填'),
				array('copyright','required','message'=>'版权信息必填'),
				array('iaccess','safe'),
				array('titlecolor','safe'),
				array('contentcolor','safe'),
			);
		}
		
	}

?>