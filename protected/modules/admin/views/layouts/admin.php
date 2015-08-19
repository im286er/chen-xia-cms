<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>I CMS Manager</title>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/admin.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
var isindex = true;
var visitor = true;
</script>
</head>
<style type="text/css">
#fontstyle dt{font-size:11pt;color:#000000;}
#fontstyle dd a{font-size:11pt;color:#000000;}
</style>
<body>

	<table width="100%" height="100%" border=0 cellpadding="0" cellSpacing=0 style="background:white;">
		<tr>
			<td height="80" style='border-bottom:1px solid black;'>
				<!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/images/logo.gif"  alt="后台博客logo" class="logo" />-->
				<span class='logo' style="font-weight:bold;font-size:35pt;color:black;font-family:'微软雅黑';">A Simple CMS . Do Anything . </span>
				<div class="user">当前用户：<?php echo Yii::app()->user->name; ?>(<a href="<?php echo $this->createUrl('login/out'); ?>">退出登陆</a>)</div>
			</td>
		</tr>
		<tr>
			<td height="100%" bgcolor="#ffffff">
				<table width="100%" height="100%" cellpadding="0" cellSpacing=0 border=0 borderColor="#ff0000">
					<tbody>
						<tr> 
							<td width="200" id="frmtitle" valign="top">
								<dl class="sort" id='fontstyle'>
									<dt class="current">个人资料</dt>
									<dd><a href="<?php echo $this->createUrl('admin/myinfo'); ?>" >基本信息</a><a href="<?php echo $this->createUrl('admin/editiface');?>">上传头像</a><!-- <a href="#">我的简历</a><a href="#">作品展览</a> --><a href="<?php echo $this->createUrl('admin/photo'); ?>">相册管理</a><a href="<?php echo $this->createUrl('admin/imusic'); ?>">我的音乐</a><a href="<?php echo $this->createUrl('admin/imv'); ?>">视频播客</a></dd>
								</dl>
								
								<dl class="sort" id='fontstyle'>
									<dt class="current">文章管理</dt>
									<dd><a href="<?php echo $this->createUrl('article/write'); ?>">发布文章</a><a href="<?php echo $this->createUrl('article/articles'); ?>">博文列表</a><a href="<?php echo $this->createUrl('article/labels'); ?>">标签管理</a><!-- <a href="<?php echo $this->createUrl('article/comments',array('m'=>2)); ?>">文章评论</a> --></dd>
								</dl>
								
								<dl class="sort" id='fontstyle'>
									<dt class="current">留言管理</dt>
									<dd><a href="<?php echo $this->createUrl('admin/message',array('m'=>2)); ?>">收到留言</a></dd>
								</dl>
								
								<dl class="sort" id='fontstyle'>
									<dt class="current">网站管理</dt>
									<dd><a href="<?php echo $this->createUrl('/index/m',array('who'=>Yii::app()->session['uid'])); ?>" target="_blank">前台首页</a><a href="<?php echo $this->createUrl('admin/webconfig'); ?>">基本配置</a><a href="<?php echo $this->createUrl('admin/webmenu'); ?>">菜单管理</a><a href="<?php echo $this->createUrl('admin/editpass'); ?>">修改密码</a></dd>
								</dl>
								
							</td>
							<td bgcolor="white" title="打开/关闭左边导航栏" onClick="switchSysBar()" style="border-right:1px solid black;height:100%;width:12px;text-align:center;cursor:pointer;">
								<span id="switchPoint"  style="color:#666;cursor:hand;font-family:Webdings;font-size:12px;">3</span>
							</td>
							
							
							
							<?php echo $content; ?>
							

							
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>