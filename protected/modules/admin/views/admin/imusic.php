<td valign="top">
<div class="title"><h2>我的音乐</h2></div>
<div class="maincon">
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('admin/upmusic'); ?>">上传音乐</a></div>
<table class="tablelist" width="100%">
<tr>
	<td colspan=5 style="text-align:center;border:0;">
	<?php 
		if(Yii::app()->user->hasFlash('delmusicstatus')){
			echo Yii::app()->user->getFlash('delmusicstatus');
		}
	
	?>
	</td>
</tr>
<tr>
	<th>序列ID</th><th>歌曲名</th><th>地址</th><th>排序</th><th>操作</th>
</tr>
<?php foreach($songInfo as $key=>$s): ?>
<tr>
	<td style='color:#48B9EF;'><?php echo $key+1; ?></td>
	<td style='color:#48B9EF;'><?php echo $s->name; ?></td>
	<td style='color:#48B9EF;'><?php echo $url.$s->song; ?></td>
	<td style='color:#48B9EF;'><?php echo $s->sort; ?></td>
	<td style='color:#48B9EF;'><a href="<?php echo $this->createUrl('admin/editmusic',array('id'=>$s->id));?>">编辑</a>
	<span class="lr10">|</span><a href="<?php echo $this->createUrl('admin/delmusic',array('id'=>$s->id));?>" onclick="return confirm('你是否确定删除此音乐，删除后不可恢复？');">删除</a></td>
</tr>
<?php endforeach; ?>
</table>
</div>
	
</td>