<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register to WalkSun</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/register.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css' />
<style type="text/css">
body {
background: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/bg2.jpg) no-repeat;font-family: 'Open Sans', sans-serif;
}
.errorinfo{display:inline;color:white;clear:both;}
</style>
</head>
	<body>
		<div class="wrap">
			<div class="content">
				<div class="logo">
					<a href="index.html"><h1>walking in the sun</h1></a>
				</div>
				<p>Be ready, open blog launching soon &#33;</p>
				 

				<div>
					<?php $form = $this->beginWidget("CActiveForm",array('htmlOptions'=>array('class'=>'registerform'))); ?>
						<table style="align:center;width:auto;margin:0 auto;">
							<tr>
								<td><!-- <input type="text" name='username' placeholder='UserName' style="margin-top:60px;"/> -->
								<?php echo $form->textField($registerModel,'username',array('placeholder'=>'UserName','style'=>'margin-top:60px;clear:both;display:block;'));?>
								<?php echo $form->error($registerModel,'username',array('class'=>'errorinfo'));?>
								</td>
							</tr>
							<tr>
								<td><!-- <input type="password" name='password' placeholder='PassWord'/> -->
								<?php echo $form->passwordField($registerModel,'password',array('placeholder'=>'PassWord','style'=>'clear:both;display:block;'));?>
								<?php echo $form->error($registerModel,'password',array('class'=>'errorinfo'));?>
								</td>
							</tr>
							<tr><td><div>
							
							<!-- <img src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/bg2.jpg' style='width:100px;height:52px;display:block;float:left;margin-top:20px;'/> -->
							
							<?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,
					 		'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer;width:100px;height:52px;display:block;float:left;margin-top:20px;'))); ?>
							
							<!-- <input type='text' style="display:block;float:left;width:200px;margin-left:20px;"/> -->
							<?php echo $form->textField($registerModel,'checkcode',array('placeholder'=>'CheckCode','style'=>'display:block;float:left;width:239px;margin-left:0px;border:1px solid #EEEEEE;border-top:none;border-right:none;border-bottom:none;'));?>
							<input type="submit" value='Register' style="display:block;height:52px;float:left;width:160px;background-color:#FA9E27;color:white;"/></div></td></tr>
						</table>
					
					<?php $this->endwidget(); ?>
				</div>

				<div class="footer">
				<div class="social-icons">
					   <a href="#"><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/f.png" /></span></a>
				       <a href="#"> <span class="simptip-position-bottom simptip-movable" data-tooltip="Rss"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/r.png" /></span></a>
				       <a href="#">  <span class="simptip-position-bottom simptip-movable" data-tooltip="Twitter"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/t1.png" /></span></a>
					<div class="clear"> </div>
				</div>
				</div>
			</div>
		</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html> 