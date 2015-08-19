<?php

	class Blog extends CActiveRecord{
		
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
			return "{{blog}}";
		}
		
		/*
		 * 声明name变量
		 */
		public $type;
		public $labelid;
		public $content;
		public $title;
		public $view;
		public $image;
		public $readaccess;
		
		public function rules(){
			
			return array(
				array('title','required','message'=>'标题必填'),
				array('type','in','range'=>array(1,2),'message'=>'请选择类型'),
				array('readaccess','in','range'=>array(0,1),'message'=>'请设置阅读权限'),
				array('labelid','check_label'),
				array('content','safe'),
				array('view','safe'),
				array('time','safe'),
				array('userid','safe'),
				array('image','safe'),
				
			);
		}
		
		
		//检查标签合法性
		public function check_label(){
			if($this->labelid <= 0){
				$this->addError('labelid', "请选择标签");
			}
			
		}
		
		//关联模型
		public function relations(){
			
			/*
			 * Article为定义的表模型,labelid为关联的字段
			 */
			return array(
				'label'	=>	array(self::BELONGS_TO,'Article','labelid'),
			);
		}
		
		
		//前台公共数据
		public function common($uid){
			
			$result = array();
			$menuModel = new Menu();
			
			//顶部菜单/底部菜单
			for($i = 1;$i < 7; $i++){
				
				$sql = "select * from {{menu}} where sort = $i and position = 1 and userid = $uid and pid = 0 ";
				$data["upmenu_$i"] = $menuModel->findBySql($sql);
				
				$sql = "select * from {{menu}} where sort = $i and position = 2 and userid = $uid and pid = 0";
				$data["downmenu_$i"] = $menuModel->findBySql($sql);
				
				
			}
			
			//下拉菜单
			$sql = "select * from {{menu}} where pid = (select id from {{menu}} where position = 1 and userid = $uid and sort = 3 and pid = 0) and position = 1 and userid = $uid order by sort asc ";
			$data["uplistmenu_3"] = $menuModel->findAllBySql($sql);
			
			
			//视频列表
			$mvModel = new Mv();
			$sql = "select * from {{mv}} where userid = $uid order by sort asc ";
			$data['mvlist'] = $mvModel->findAllBySql($sql);
			
			
			//音乐列表
//			$songModel = new Song();
//			$sql = "select * from {{song}} where userid = $uid order by sort asc ";
//			$data['musiclist'] = $songModel->findAllBySql($sql);
			
			
			//网站个性配置
			$webModel = new Config();
			$sql = "select * from {{webconfig}} where userid = $uid ";
			$data['webconfig'] = $webModel->findBySql($sql);
			$data['url']	= "http://".Yii::app()->params['bucket'].".".Yii::app()->params['domain']."/";
			$data['uid']	= $uid;

			
			return $data;
			
		}
		
		
	}

?>