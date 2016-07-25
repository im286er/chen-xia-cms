<?php 


	class Menu extends CActiveRecord{
	
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
		return "{{menu}}";
	}
	
	/*
	 * 声明name变量
	 */
	public $name;
	public $sort;
	public $link;
	public $position;
	public $pid;
	
	public function rules(){
		
		return array(
			array('name','required','message'=>'菜单名称必填'),
			array('position','in','range'=>array(1,2),'message'=>'请选择类型'),
			array('link','required','message'=>'链接必填'),
			array('sort','safe'),
			array('pid','safe'),
			
		);
	}
	
	
	//检查标签合法性
//	public function check_label(){
//		if($this->labelid <= 0){
//			$this->addError('labelid', "请选择标签");
//		}
//		
//	}
//	
//	//关联模型
//	public function relations(){
//		
//		/*
//		 * Article为定义的表模型,labelid为关联的字段
//		 */
//		return array(
//			'label'	=>	array(self::BELONGS_TO,'Article','labelid'),
//		);
//	}
	
	
}

?>