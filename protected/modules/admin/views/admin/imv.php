<td valign="top">
<div class="title"><h2>我的mv视频</h2></div>
<div class="maincon">
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('admin/upmv'); ?>">上传视频</a></div>
<table class="tablelist" width="100%">
<tr>
	<td colspan=5 style="text-align:center;border:0;">
	<?php 
		if(Yii::app()->user->hasFlash('delmvstatus')){
			echo Yii::app()->user->getFlash('delmvstatus');
		}
	
	?>
	</td>
</tr>
<tr>
	<th>序列ID</th><th>Mv名称</th><th>地址</th><th>排序</th><th>操作</th>
</tr>
<?php foreach ($mvInfo as $key=>$m): ?>
<tr>
	<td style='color:#48B9EF;'><?php echo $key+1; ?></td>
	<td style='color:#48B9EF;text-align:left;'><?php echo $m->name; ?></td>
	<td style='color:#48B9EF;text-align:left;'><?php echo $url.$m->mv; ?></td>
	<td style='color:#48B9EF;'><?php echo $m->sort; ?></td>
	<td style='color:#48B9EF;'><a href="<?php echo $this->createUrl('admin/editmv',array('id'=>$m->id));?>">编辑</a>
	<span class="lr10">|</span><a href="<?php echo $this->createUrl('admin/delmv',array('id'=>$m->id));?>" onclick="return confirm('你是否确定删除此视频，删除后不可恢复？');">删除</a></td>
</tr>
<?php endforeach; ?>
</table>
</div>
	
</td>