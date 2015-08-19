<td valign="top">
<div class="title"><h2>文章评论</h2></div>
<div class="maincon">
<div>
<a style="margin:10px;font-size:15px;margin-bottom:10px;width:100;margin-right:20px;" href="<?php echo $this->createUrl('article/comments',array('m'=>2)); ?>">全部</a>
<a style="margin:10px;font-size:15px;margin-bottom:10px;width:100;margin-right:20px;" href="<?php echo $this->createUrl('article/comments',array('m'=>0)); ?>">未读</a>
<a style="margin:10px;font-size:15px;margin-bottom:10px;width:100;margin-right:20px;" href="<?php echo $this->createUrl('article/comments',array('m'=>1)); ?>">已读</a>
</div>
<table class="tablelist" width="100%">
<tr>
	<td colspan=5 style="text-align:center;border:0;color:red;">
	<?php 
		if(Yii::app()->user->hasFlash('actiontsataus')){
			echo Yii::app()->user->getFlash('actiontsataus');
		}
	
	?>
	</td>
</tr>
<tr>
	<th>评论文章ID</th><th width='35%'>内容</th><th>发送者</th><th>IP</th><th>时间</th><th width=12%>操作</th>
</tr>
<?php foreach ($commentInfo as $key=>$c): ?>
<tr>
	<td style='color:#48B9EF;' width=''><a target="_blank" href="<?php echo $this->createUrl("/index/content",array('uid'=>$uid,'id'=>$c['bid'])); ?>"><?php echo $c['btitle']; ?></a></td>
	<td style='color:#48B9EF;'><?php echo $c['content']; ?></td>
	<td style='color:#48B9EF;'><span title="用户ID：<?php echo $c['cuid']; ?>"><?php echo $c['username']; ?></span></td>
	<td style='color:#48B9EF;'><?php echo $c['ip']; ?></td>
	<td style='color:#48B9EF;'><?php echo date("Y-m-d H:i:s",$c['time']); ?></td>
	<td style='color:#48B9EF;' width='10%'>
	<?php if($c['isread'] == 1): ?>
		<a style="color:silver;" href="#" onclick="return false;">已读</a><span class="lr10">|</span>
	<?php else: ?>
		<a style="color:#48B9EF;" href="<?php echo $this->createUrl('article/markread',array('id'=>$c['id'])); ?>">标记已读</a><span class="lr10">|</span>
	<?php endif; ?>
	<a style="color:#ff6600;" href="<?php echo $this->createUrl('article/delcomment',array('id'=>$c['id']));?>" onclick="return confirm('你是否确定删除此视频，删除后不可恢复？');">删除</a>
	</td>
</tr>
<?php endforeach; ?>
</table>

<div id="" style="margin-top:30px;">
	<?php

	$this->widget('CLinkPager',array(
		'header'=>'',
		'firstPageLabel' => '首页',
		'lastPageLabel' => '末页',
		'prevPageLabel' => '上一页',
		'nextPageLabel' => '下一页',
		'pages' => $pages,
		'maxButtonCount'=>13
		)
	);
	?>
	</div>
</div>
	
</td>