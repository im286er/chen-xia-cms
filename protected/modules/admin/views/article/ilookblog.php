<!DOCTYPE td PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/admin.css" type="text/css" rel="stylesheet" media="all" />
<style>
#errorinfo{display:inline;color:red;}
table,tr,td{width:100%;}
</style>
</head>
<body>
<table>
<tr>
<td valign="top">
<div class="title"><h2>查看文章</h2></div>


<div class="maincon">

	<table class="formtable" width="100%">
	<?php foreach ($blogInfo as $key=>$ib): ?>
		<tr>
			<td width="180px" align="center" valign="top" style="border:1px dotted #EEEEEE;border-top:none;border-left:none;border-right:none;">
			<span style='font-size:12pt;'><?php echo $ib->title; ?></span>
			<span style="margin-left:100px;"><?php echo date("Y-m-d H:i:s",$ib->time); ?></span>
			</td>
		</tr>
		<tr>
		<td colspan=2 style="border:0px;">
			<?php foreach ($ib->image as $i): ?>
			<img src="<?php echo $i ?>" />
			<?php endforeach; ?>
		</td>
		</tr>
		<tr>
		<td colspan=2 style="border:0px;text-indent:20px;font-size:11pt;"><?php echo $ib->content;?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	</div>
	
</td>
</tr>
</table>
</body>
</html>