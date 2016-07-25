<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的微博客登陆</title>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/login.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/ilogindemo.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/Validform_v5.3.2_min.js"></script>

<script>
$(function(){

$(".i-text").focus(function(){
$(this).addClass('h-light');
});

$(".i-text").focusout(function(){
$(this).removeClass('h-light');
});

$("#username").focus(function(){
 var username = $(this).val();
 if(username=='输入账号'){
 $(this).val('');
 }
});

$("#username").focusout(function(){
 var username = $(this).val();
 if(username==''){
 $(this).val('输入账号');
 }
});


$("#password").focus(function(){
 var username = $(this).val();
 if(username=='输入密码'){
 $(this).val('');
 }
});


$("#yzm").focus(function(){
 var username = $(this).val();
 if(username=='输入验证码'){
 $(this).val('');
 }
});

$("#yzm").focusout(function(){
 var username = $(this).val();
 if(username==''){
 $(this).val('输入验证码');
 }
});



$(".registerform").Validform({
	tiptype:function(msg,o,cssctl){
		var objtip=$(".error-box");
		cssctl(objtip,o.type);
		objtip.text(msg);
	},
	ajaxPost:true
});

});




</script>


</head>

<body>


<div class="header">
  <h1 class="headerLogo"><a title="后台管理系统" target="_blank" href="#"><img alt="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/images/logo2.gif" /></a></h1>
	<div class="headerNav">
		<a href="#">微博客首页</a>
		<a href="#">关于项目</a>
		<a href="#">开发团队</a>
		<a href="#">意见反馈</a>
		<a href="#">帮助</a>	
	</div>
</div>

<div class="banner">

<div class="login-aside">
  <div id="o-box-up"></div>
  <div id="o-box-down"  style="table-layout:fixed;">
  
  
   <!--<form class="registerform"action="demo/ajax_post.jsp">-->
   <?php $form = $this->beginWidget('CActiveForm') ?>
   <!-- <div class="error-box"></div> -->
  <div class="error-box"><?php echo $form->error($loginForm,'username'); ?><?php echo $form->error($loginForm,'password'); ?><?php echo $form->error($loginForm,'inverify'); ?></div>
   
   <div class="fm-item">
	   <label for="logonId" class="form-label">微博客用户名：</label>
	   <!-- <input type="text" value="输入账号" maxlength="100" id="username" class="i-text"   datatype="s6-18" errormsg="用户名至少6个字符,最多18个字符！"  />   -->
	   <?php echo $form->textField($loginForm,'username',array('class'=>'i-text','id'=>'username','placeholder'=>'用户名')); ?>  
       <div class="ui-form-explain"></div>
  </div>
  
  <div class="fm-item">
	   <label for="logonId" class="form-label">登陆密码：</label>
	   <!-- <input type="password" value="" maxlength="100" id="password" class="i-text" datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" />    -->
	   <?php echo $form->passwordField($loginForm,'password',array('class'=>'i-text','id'=>'password','placeholder'=>'密码')); ?> 
       <div class="ui-form-explain"></div>
  </div>
  
  <div class="fm-item pos-r">
	   <label for="logonId" class="form-label">验证码</label>
	  <!--  <input type="text" value="输入验证码" maxlength="100" id="yzm" class="i-text yzm" nullmsg="请输入验证码！" />    -->
	  <?php echo $form->textField($loginForm,'inverify',array('class'=>'i-text yzm','id'=>'yzm','placeholder'=>'验证码','maxlength'=>'100')); ?>
       <div class="ui-form-explain">
       		<!--  <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/images/yzm.jpg" class="yzm-img" />-->
       		<?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,
					 'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','class'=>'yzm-img'))); ?>
       </div>
  </div>
  
  <div class="fm-item">
	   <label for="logonId" class="form-label"></label>
	   <input type="submit" value="" tabindex="4" id="send-btn" class="btn-login" /> 
       <div class="ui-form-explain"></div>
  </div>
  
 <?php $this->endWidget(); ?>
  
  </div>

</div>

	<div class="bd">
		<ul>
			<li style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/themes/theme-pic1.jpg) #CCE1F3 center 0 no-repeat;"><a href="#"></a></li>
			<li style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/themes/theme-pic2.jpg) #BCE0FF center 0 no-repeat;"><a href="#"></a></li>
		</ul>
	</div>

	<div class="hd"><ul></ul></div>
</div>
<script type="text/javascript">jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });</script>


<div class="banner-shadow"></div>

<div class="footer">
   <p>版权所有 walksun Copyright 2014 - 2015   zhuwanxiong Corporation, All Rights Reserved</p>
</div>



</body>
</html>
