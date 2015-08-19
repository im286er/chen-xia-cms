<td valign="top">
<div class="title"><h2>标签管理</h2></div>
<div class="maincon">
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('article/addlabel'); ?>">添加新标签</a></div>
<div style="width=100%;height:25px;text-align:center;color:red;">
<?php 

	if(Yii::app()->user->hasFlash('hasBlog')){
		echo Yii::app()->user->getFlash('hasBlog');
	}
	
?>
</div>
	<table class="tablelist" width="100%">
		<tr>
			<th>ID</th><th>标签名称</th><th>操作</th>
		</tr>
		
		<?php foreach ($labels as $key=> $l): ?>
		<tr>
			<td><?php echo $key+1 ?></td><td style='color:#48B9EF;'><?php echo $l->label; ?></td>
			<td><a href="<?php echo $this->createUrl('article/editlabel',array('id'=>$l->id)); ?>">编辑</a><span class="lr10">|</span>
			<a href="<?php echo $this->createUrl('article/dellabel',array('id'=>$l->id)); ?>" onclick="return confirm('您是否确定删除选中项？')">删除</a></td>
		</tr>
		<?php endforeach; ?>
		
		</table>
		<div class="pagination">
		<?php 
			
			$this->widget('CLinkPager',array(
				'header'	=>	'',
				'firstPageLabel'	=>	'首页',
				'lastPageLabel'	=>	'末页',
				'prevPageLabel'		=>	'上一页',
				'nextPageLabel'		=>	'下一页',
				'pages'				=>	$pages,
				'maxButtonCount'	=>	5,
				
			));
		
		?>
		</div>
	</div>
</td>