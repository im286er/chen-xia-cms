<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微博客注册__walksun</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/iregister.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery.easing.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var k=!0;

	$(".loginmask").css("opacity",0.8);
	
	if($.browser.version <= 6){
		$('#reg_setp,.loginmask').height($(document).height());
	}
	
	$(".thirdlogin ul li:odd").css({marginRight:0});	
	
	
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
	
	
	$(".loginmask,.closealert").click(function(){
		//k&&(k=!1,$("#loginalert").animate({top:-600},400,"easeOutQuart",function(){$("#loginalert").hide();k=!0}),$(".loginmask").fadeOut(500))
	});

	$(".closealert").click(function(){
		window.location.href = "<?php echo $this->createUrl($backup); ?>";
	});
	
	
	$("#sigup_now,.reg a").click(function(){
		//$("#reg_setp,#setp_quicklogin").show();
		//$("#reg_setp").animate({left:0},500,"easeOutQuart")
		//window.location.href = 'http://www.baidu.com';
	});																																																																																				
	$(".back_setp").click(function(){
		"block"==$("#setp_quicklogin").css("display")&&$("#reg_setp").animate({left:"100%"},500,"easeOutQuart",function(){$("#reg_setp,#setp_quicklogin").hide()})
	});
	
}); 
</script>

</head>
<body>

<div id="header">
	
</div>


<div class="loginmask"></div>

<div id="loginalert" style="display:block;margin-top:0px;">
	
	<div class="pd20 loginpd" >
		<h3><i class="closealert fr"></i><div class="clear"></div></h3>
		<div class="loginwrap" style="display:block;">
			<div class="loginh">
				<div class="fl">微博客注册</div>
				<div class="fr">已有账号<a id="sigup_now" href="<?php echo $this->createUrl($login); ?>" target="_blank">立即登陆</a></div>
			</div>
			<h3><!--<span class="fl">邮箱登录</span>-->
			<div class="clear"></div></h3>
			<!-- <form action="" method="post" id="login_form"> -->
			<?php $form = $this->beginWidget("CActiveForm",array('htmlOptions'=>array('id'=>'login_form'))); ?>
				<div class="logininput">
				<span class="login_warning" >
					<?php echo $form->error($registerModel,'username');?>
					<?php echo $form->error($registerModel,'password');?>
					<?php echo $form->error($registerModel,'checkcode');?>
				</span><br/>
				
					<!--  <input type="text" name="username" class="loginusername" value="" placeholder="邮箱/用户名" /> -->
					<?php echo $form->textField($registerModel,'username',array('placeholder'=>'邮箱/用户名','class'=>'loginusername'));?>
					
					<!-- <input type="text" class="loginuserpasswordt" value="" placeholder="输入密码" /> -->
					<?php echo $form->passwordField($registerModel,'password',array('placeholder'=>'输入密码','class'=>'loginusername'));?>
					
					<!--<input type="text" name="username" class="loginusername" value="" placeholder="确认密码" />-->
					
					<!-- <input type="text" name="username" class="loginusername" value="" placeholder="验证码" />  -->
					<?php echo $form->textField($registerModel,'checkcode',array('placeholder'=>'验证码','class'=>'loginusername'));?>
				</div>
				<div class="loginbtn">
					<div class="loginsubmit fl" style="float:left;"><input type="submit" value="注册" class="btn" /></div>
					<!-- <img src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/securimage_show.png' style='display:block;float:left;margin-top:15px;'/>  -->
					<?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,
					'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'display:block;float:left;margin-top:15px;'))); ?>
					<div class="clear"></div>
				</div>
			<?php $this->endwidget(); ?>
		</div>
	</div>
	
	<div class="thirdlogin">
		<div class="pd50">
			<h4>用第三方帐号直接登录</h4>
			<ul>
				<li id="sinal"><a href="#">微博账号关联</a></li>
				<li id="qql"><a href="#">QQ账号互联</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div><!--loginalert end-->


<div id="reg_setp">
	<div class="back_setp">返回</div>
	<div class="blogo"></div>
	<div id="setp_quicklogin">
		<h3>您可以选择以下第三方帐号直接登录17素材网，一分钟完成注册</h3>
		<ul class="quicklogin_socical">
			<li class="quicklogin_socical_weibo"><a href="http://www.17sucai.com/oauth/weibo/login">微博帐号注册</a></li>
			<li class="quicklogin_socical_qq" style="margin:0;"><a href="http://www.17sucai.com/oauth/qq/login">QQ帐号注册</a></li>
		</ul>
	</div>
</div><!--reg_setp end-->

</body>
</html>

