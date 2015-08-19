<td valign="top">
<div class="title"><h2>上传音乐</h2></div>
<style>
#errorinfo{display:inline;color:red;}
</style>
<div class="maincon">
<?php $form = $this->beginWidget("CActiveForm",array(
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)
); 
?>

	<table class="formtable" width="100%">
		<tr>
			<td colspan=2 style="border:0;color:red;text-align:center;">
			<?php 
				if(Yii::app()->user->hasFlash('upstatus')){
					echo Yii::app()->user->getFlash('upstatus');
				}
			
			?>
			
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" valign="top">歌曲名称：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" />  -->
					<?php echo $form->textField($songModel,'name'); ?>
					<?php echo $form->error($songModel,'name',array('id'=>'errorinfo')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" valign="top">音乐文件：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:90px;"/> -->
					<input type="file" name="songname" style="width:auto;"/>
				</div>
			</td>
		</tr>
		
		<tr>
			<td width="180px" align="right" valign="top">排序：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:90px;"/> -->
					<?php echo $form->textField($songModel,'sort'); ?>
					<?php echo $form->error($songModel,'sort',array('id'=>'errorinfo')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan = 2 align=center style='border:0;'>
			<?php 
			if(Yii::app()->user->hasFlash('success')){
				
				echo Yii::app()->user->getFlash('success');
			}	
			?>
			</td>
		</tr>
		<tr>
			<td style="border:0;"></td>
			<td style="border:0;"><input type="submit" name="" value="确认添加" id="" class="btn-img" /></td>
		</tr>
		
		</table>
<?php $this->endWidget(); ?>
	</div>
	
</td>