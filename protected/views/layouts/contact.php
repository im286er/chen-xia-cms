<?php 
//获取菜单及各项公共配置
$menuModel = new Blog();
$menuInfo  = $menuModel->common($this->uid);
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="Shortcut Icon" href="<?php echo $menuInfo['webconfig']['icon']; ?>" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/iblog.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/gotop.css" type="text/css" media="screen" />
    <link href='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/e_style.css' rel='stylesheet' type='text/css' />
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js'></script>    
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/gotop.js'></script>    
<style type="text/css">
.thisismyplayerdiv{position:fixed;width:600px;height:450px;margin-left:400px;margin-top:120px;border:0px solid red;}
#closemv{margin-left:580px;position:absolute;z-index:2222;margin-top:-477px;width:27px;height:27px;background:url('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/red-close-btn.gif');-webkit-transform: translateZ(0);}    
body{background: url('<?php  echo Yii::app()->session['ws_backgroundofuser'];  ?>') no-repeat fixed top;);}
#content {width:100%;border:0px solid red;float:left;background:#eee;}
.post .frame {float: left;width: auto;padding: 30px 30px 15px 30px;border: solid 0px #e7e7e7;border-bottom: none;}
#respond{width:1080px;border:0px solid red;}
.mainresponsebtn,.submitcommentbtn{margin-left: 20px;width: 60px;height: 35px;border: 0;color: #333333;background-color: #F7F7F7;border-radius: 5px;border-radius: 35px;font-size: 14px;color: white;background-color: black;}
.comment{width:100%;}
</style>
<script type="text/javascript">
$(function(){
    /*设置播放器位置 默认中间位置*/
    var width = window.screen.width - 20 - 600;    
    $(".thisismyplayerdiv").css({"margin-left":(width/2+70)+"px"});
});
</script>
</head>
<body class="archive category category-photography category-15">
<div style="clear:both;"></div>		
<style>
#sendbtn{font-family:'幼圆';background:none;font-weight:normal;font-size:15px;margin-top:20px;border:1px solid black;width:100px;height:35px;}
#sendbtn:hover{background:black;color:white;}
</style>
<div id="main" class="clearfix">
			
			<!-- grab the sidebar -->
						<div id="sidebar-wrap" class="clearfix">
	 
				 <div id="sticky" class="clearfix" style="background:white;">
					<h2 class="sticky-title">标签墙</h2>
															
					<div class="widget">			
					<div class="twitter-box">
						 <h2>I Tages</h2>
						 <ul class="tweet-scroll">
							 <li>
								 <?php foreach ($labelInfo as $key=>$l): ?>
							 	<a class="mytags" href="<?php echo $this->createUrl("index/t",array('uid'=>$uid,'id'=>$l['id'])); ?>"><?php echo $l['label']; ?></a>
							 	<?php endforeach; ?>
							 
								 <!-- all固定写法 -->
							 	<a class="mytags" href="<?php echo $this->createUrl("index/t",array('uid'=>$uid,'id'=>'')); ?>">全部</a>
							 </li>
						 </ul>
						 <!-- 
						 <a class="tweets-more" href="#" target="_blank" title="twitter">More Tweets &rarr;</a>
						  -->
					</div>
			
					</div><div class="widget">
					<form action="<?php echo $this->createUrl("index/search"); ?>" class="search-form clearfix">
						<fieldset>
							<input type="hidden" name='uid' value="<?php echo $uid; ?>"/>
							<input type="text" class="search-form-input text" name="s" onfocus="if (this.value == 'search the site') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search the site';}" value="search the site"/>
							<input type="submit" value="Go" class="submit" />
						</fieldset>
					</form></div>					
				</div><!-- sticky -->
							
			<div style="clear:both;"></div>				
								
			</div><!-- sidebar wrap -->			
			<div id="content" class="filter-posts">
				<!-- grab the posts -->
				
				<div data-id="post-216" data-type="" class="post-216 post clearfix project" style="background:white;">
					<div class="box" >
						<div class="">
							<div class="frame" style="border:0px;">
								
								<div class="okvideo"></div>																	
								<!-- <p>Say Something to ME</p> -->
								<div class="wpcf7" id="wpcf7-f1-p216-o1">
								<!-- 
								<form action="#" method="post" class="wpcf7-form">
								 -->
								 <?php $form = $this->beginWidget('CActiveForm',array('htmlOptions'=>array('class'=>'wpcf7-form'))); ?>
									<!-- 
									<div style="display: none;">
									<input type="hidden" name="_wpcf7" value="1" />
									<input type="hidden" name="_wpcf7_version" value="2.4.6" />
									<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1-p216-o1" />
									</div>
									 -->
									 
									 <p style="color:red;font-family:'幼圆';font-weight:normal;">
									 <?php echo $form->error($contactModel,'message'); ?>
									 <?php echo $form->error($contactModel,'verify'); ?>
									 <?php 
									 		if(Yii::app()->user->hasFlash('contactstatus')){
												echo Yii::app()->user->getFlash('contactstatus');
											}
									 ?>
									 </p>
									 
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">您的姓名(*)<br />
									    <span class="wpcf7-form-control-wrap your-name">
									    <!-- 
									    <input type="text" name="your-name" value="" class="wpcf7-text wpcf7-validates-as-required" size="40" />
									     -->
									     <?php echo $form->textField($contactModel,'tourist',array('style'=>'border:1px solid black;background:none;width:260px;height:23px;')); ?>
									    </span>
									 </p>
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">您的邮箱(方便我联系您)<br />
									    <span class="wpcf7-form-control-wrap your-email">
									    <!-- 
									    <input type="text" name="your-email" value="" class="wpcf7-text wpcf7-validates-as-email wpcf7-validates-as-required" size="40" />
										-->
										<?php echo $form->textField($contactModel,'email',array('style'=>'border:1px solid black;background:none;width:260px;height:23px;')); ?>
										</span> 
									</p>
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">主题<br />
									    <span class="wpcf7-form-control-wrap your-subject">
									    <!-- 
									    <input type="text" name="your-subject" value="" class="wpcf7-text" size="40" />
									     -->
									     <?php echo $form->textField($contactModel,'subject',array('style'=>'border:1px solid black;background:none;width:260px;height:23px;')); ?>
									    </span> 
									    </p>
									<p style="font-family:'幼圆';font-weight:normal;font-size:15px;">信息内容<br />
									    <span class="wpcf7-form-control-wrap your-message">
									    <!-- 
									    <textarea name="your-message" cols="40" rows="10"></textarea>
									     -->
									     <?php echo $form->textArea($contactModel,'message',array('cols'=>'40','rows'=>'10',"style"=>"resize:none;border:1px solid black;background:none;")); ?>
									    </span> 
									</p>
									
									<p>
									<?php echo $form->textField($contactModel,'verify',array('id'=>'email','size'=>'22','tabindex'=>'2','aria-required'=>'true','style'=>'border:1px solid black;background:none;width:200px;height:23px;display:block;float:left;margin-top:8px;')); ?>
									<?php 
										$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,
										'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'display:block;float:left;border:0px solid #68AECF;margin-left:5px;')));
									?>
									</p>
									
									<p style="clear:both;"><input type="submit" value="发送" id="sendbtn"/>
									<img class="ajax-loader" style="visibility: hidden;" alt="Sending ..." src="http://okaythemes.com/dispatch/wp-content/plugins/contact-form-7/<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/ajax-loader.gif" /></p>
									<div class="wpcf7-response-output wpcf7-display-none"></div>
								<!-- </form> -->
								<?php $this->endWidget(); ?>
								
								</div>
							</div><!-- frame -->
						</div><!-- shadow -->
						
						
					</div><!-- box -->
				</div><!--writing post-->
				
				<div style="clear:both;"> </div>
								
				<div class="post-nav">
					<div class="postnav-left"></div>
					<div class="postnav-right"></div>
					<div style="clear:both;"> </div>
				</div><!--end post navigation-->
				
								
				<!-- grab comments on single pages -->
							</div><!--content-->
			<div class="push"></div>
		</div><!--main-->
</body>
</html>