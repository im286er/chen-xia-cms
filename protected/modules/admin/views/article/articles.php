<td valign="top">
<div class="title"><h2>博文列表</h2></div>
<div class="maincon">
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('article/write'); ?>">发布文章</a></div>
<div style="width:100%;height:30px;text-align:center;color:#FF6600;">
<?php 
	if(Yii::app()->user->hasFlash('deleteblogstatus')){
		echo Yii::app()->user->getFlash('deleteblogstatus');
	}
	if(Yii::app()->user->hasFlash('sendblogsuccess')){
		echo Yii::app()->user->getFlash('sendblogsuccess');
	}
	
?>
</div>
	<table class="tablelist" width="100%">
		<tr>
			<th>ID</th><th>标题</th><th>栏目</th><th>发布时间</th><th>操作</th>
		</tr>
		<?php foreach ($blogs as $key => $b): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo $this->createUrl('/index/c',array('who'=>$b['userid'],'id'=>$b['id']));?>" title='随便一览' target="_blank"><?php echo $b['title']; ?></a></td>
			<td><?php echo $b['label']; ?></td>
			<td><?php echo date("Y-m-d H:i:s",$b['time']); ?></td>
			<td><a href="<?php echo $this->createUrl('Article/editblog',array('id'	=>	$b['id'])); ?>">编辑</a><span class="lr10">|</span><a  href="<?php echo $this->createUrl('Article/delblog',array('id'	=>	$b['id'])); ?>" onclick="return confirm('你是否确定删除此片文章，删除后不可恢复？');">删除</a></td>
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