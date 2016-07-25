<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),
	'defaultController' => 'index',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		//gii模块
		// uncomment the following to enable the Gii tool
		
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		//创建模块后要在此处添加
		'admin',
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,

			//权限验证失败后登陆地址
			'loginUrl'	=>	array('admin/login/index'),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			
			//自定义规则
			'showScriptName'=>false,		//不显示index.php
			
//			'rules'=>array(
//			
//			),
			
//			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		//数据库配置
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=iapp',
			'emulatePrepare' => true,
			'username' => 'iapp_f',
			'password' => 'smileatlife2010',
			'charset' => 'utf8',
			'tablePrefix' => 'ws_',
			//开启调试
			'enableParamLogging' => true,
			
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				
				//开启调试信息
				/*
				 array(
					'class'=>'CWebLogRoute',
				),
				*/
				
			),
		),
	),

	//配置项
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		//'adminEmail'=>'webmaster@example.com',
		
		//图片上传配置
		'imageSize'	=>	2024000,			//允许默认2M
		'imageType'	=>	'jpg,png,jpeg,gif',	//注意格式
	
	
		//歌曲上传配置
		'songSize'	=>	52428800,			//允许50M
		'songType'	=>	'ape,mp3',
	
		//视频上传配置
		'mvSize'	=>	512000000,			//允许500M
		'mvType'	=>	'flv,f4v,mp4,avi',
	
		
		//七牛配置
		'domain'	=>	'qiniudn.com',		//七牛域名
		'bucket'	=>	'wansun-iblog',		//七牛空间名
		'accessKey'	=>	'RRWXj222j-jFGyxn2h0RpOWunHiMApM-stHOo7b8',
		'secretKey' =>	'kmnZ2X8JomE89Ak60pA7FNgkPm4rYTO6GSsy9Xn_',
	
		//七牛图片处理配置
		'smallImageWidth'	=>	'120',
		'smallImageHeight'	=>	'120',
		'bigImageWidth'		=>	'400',
		'bigImageHeight'	=>	'300',
	
		//文章分页大小
		'blogCount'			=>	30,

		//音乐播放器页面
		'allowMusicPlayer'	=>	"my,",

		//邮箱账号
		'smtpserver'		=>	'smtp.sina.com',
		'smtpuser'			=>	'zhuwanxiong@sina.com',
		'smtppassword'		=>	'smileatlife2010',

		//使用用户自定义的head信息的页面
		'defaultheadpage'	=>	'my,intag,search,contact',
		


	),
	
);