<td valign="top">
<div class="title"><h2>菜单管理</h2></div>
<div class="maincon">

<!-- <div><a style="margin:10px;color:#FF6600;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('/admin/admin/addmenu',array('pid'=>0)); ?>">添加菜单</a></div> -->
	<table class="tablelist" width="100%">
		<!-- 
		<tr>
			<td colspan=7 style="border:0">
				<div style="width:100%;height:30px;border:1px solid #FFD0B1;line-height:30px;text-align:center;background-color:#FFF2EA;color:#FF6600;">
				注意：菜单从首页依次从1开始排序，从左到右依次对应首页顶部的菜单。
				</div>
			</td>
		</tr>
		 -->
		<tr>
			<td colspan=6 style='border:0;'>
			<?php 
				if(Yii::app()->user->hasFlash('deletestatus')){
					echo Yii::app()->user->getFlash('deletestatus');
				}
				
			?>
			</td>
		</tr>
		<tr>
			<th>ID</th><th>PID</th><th>菜单名称</th><th>位置</th><th>排序</th><th>链接</th><th>操作</th>
		</tr>
		
		<?php foreach($menus as $key=>$m): ?>
		<tr>
			<td><?php echo $m->id; ?></td>
			<td><?php echo $m->pid; ?></td>
			<td><?php echo $m->name ?></td>
			<td><?php if($m->position == 1) echo '顶部';else echo '底部'; ?></td>
			<td><?php echo $m->sort ?></td>
			<td><?php echo $m->link ?></td>
			
			<td>
			
			<?php if($m->position == 1 && $m->sort == 3 && $m->pid == 0): ?> <a href="<?php echo $this->createUrl('admin/addmenu',array('pid'=>$m->id)); ?>">添加子菜单</a> <?php endif; ?>
			<span class="lr10">|</span>
			<a <?php if(($m->position == 2 && $m->sort == 6) || ($m->position == 1 && $m->sort == 1) ): ?> title="亲，这个不需要你改了~~" <?php endif; ?>  href="<?php echo $this->createUrl('admin/editmenu',array('id'=>$m->id)); ?>">编辑</a>
			<!-- <span class="lr10">|</span>  -->
			<?php if($m->pid != 0): ?><a style="margin-left:8px;" href="<?php echo $this->createUrl('admin/delmenu',array('id'=>$m->id)); ?>" onclick="return confirm('你是否确定删除此片文章，删除后不可恢复？');">删除</a><?php endif; ?>
			
			</td>
		</tr>
		<?php endforeach; ?>
		</table>

	</div>
</td>