<td valign="top">
<div class="title"><h2>基本配置</h2></div>
<div class="maincon">
<?php foreach ($configs as $c): ?>
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('admin/editconfig',array('cid'=>$c->id)); ?>">修改</a></div>
	<table class="tablelist" width="100%">
		<tr>
			<th>用户ID</th><th>标徽</th><th>网站标题</th><th>访问权限</th><th>SEO</th><th>版权信息</th>
		</tr>
		<tr>
			<td height><?php echo $c->userid; ?></td>
			<td><img src='<?php echo $c->icon; ?>'></td>
			<td><?php echo $c->title; ?></td>
			<td><?php if(!$c->iaccess) echo '允许所有';else echo '仅登陆用户'; ?></td>
			<td width=35%><?php echo $c->seo; ?></td>
			<td><?php echo $c->copyright; ?></td>
		</tr>
		
		</table>
<?php endforeach; ?>
	</div>
</td>