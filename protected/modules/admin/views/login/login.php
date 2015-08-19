<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的微博客登陆</title>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/main.css" rel="stylesheet" type="text/css" />
<style>
#value_7{margin-top:5px;width:80px;display:block;float:left;margin-left:4px;}
</style>
</head>
<body>


<div class="login">
    <div class="box png">
		<div class="logo png"></div>
		<div class="input">
		<!-- <form action="{:U('/Login/Login/Check')}" method="post">  -->
		<?php $form = $this->beginWidget('CActiveForm') ?>
			<div class="log">
				<div class="name">
					<label>用户名</label>
					<!-- <input type="text" class="text" id="value_1" placeholder="用户名" name="manager" tabindex="1" />  -->
					<?php echo $form->textField($loginForm,'username',array('class'=>'text','id'=>'value_1','placeholder'=>'用户名')); ?>
				</div>
				
				<div class="pwd">
					<label>密　码</label>
					<!-- <input type="password" class="text" id="value_2" placeholder="密码" name="password" tabindex="2" /> -->
					<?php echo $form->passwordField($loginForm,'password',array('class'=>'text','id'=>'value_2','placeholder'=>'密码')); ?>
					
					<label style='margin-top:5px;display:block;float:left;'>验证码</label>
					<!-- <input style='margin-top:5px;width:80px;' type="text" class="text" id="value_1" placeholder="验证码" name="inverify" tabindex="1" /> -->
					<?php echo $form->textField($loginForm,'inverify',array('class'=>'text','id'=>'value_7','placeholder'=>'验证码')); ?>
					
					<!-- 
					<img src='{:U("/login/login/verify")}' onClick="changeVerify()" id="verifyImg" title="点击刷新验证码"  style="margin-top:5px;display:block;float:right;margin-right:70px;"/>
					<script language="JavaScript">
					function changeVerify(){
						var timenow = new Date().getTime(); document.getElementById('verifyImg').src='{:U("/login/login/verify")}'+"?"+timenow;
					}
					</script>
					 -->
					 
					 
					 <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,
					 'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer;margin-top:5px;display:block;float:left;'))); ?>
					
					<span style="width:80px;height:20px;text-align:left;border:0px solid red;display:block;margin-top:6px;float:left;margin-left:-30px;"><?php echo $form->error($loginForm,'username'); ?><?php echo $form->error($loginForm,'password'); ?><?php echo $form->error($loginForm,'inverify'); ?></span>
					 
					<input type="submit" class="submit" tabindex="3" value="登录" />
					<div class="check"></div>
				</div>
				
				<div class="tip"></div>
			</div>
			<!-- </form>  -->
			<?php $this->endWidget(); ?>
		</div>
	</div>
    <div class="air-balloon ab-1 png"></div>
	<div class="air-balloon ab-2 png"></div>
    <div class="footer"></div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/fun.base.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/script.js"></script>


<!--[if IE 6]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/DD_belatedPNG.js" type="text/javascript"></script>
<script>DD_belatedPNG.fix('.png')</script>
<![endif]-->

</body>
</html>