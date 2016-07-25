<td valign="top">
<div class="title"><h2>基本信息</h2></div>
<div class="maincon">
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('admin/editinfo'); ?>">修改</a></div>
	<table class="tablelist" width="100%">
		<tr>
			<td>姓名：</td><td style='color:#48B9EF;'><?php echo $userinfo->truename; ?></td>
		</tr>
		<tr>
			<td>昵称：</td><td style='color:#48B9EF;'><?php echo $userinfo->nickname; ?></td>
		</tr>
		<tr>
			<td>QQ：</td><td style='color:#48B9EF;'><?php echo $userinfo->qq; ?></td>
		</tr>
		<tr>
			<td>联系电话：</td><td style='color:#48B9EF;'><?php echo $userinfo->phone; ?></td>
		</tr>
		<tr>
			<td width=20%;>简介：</td>
			<td >
				<?php echo $userinfo->introduce; ?>
			</td>
		</tr>
		</table>
	</div>
</td>