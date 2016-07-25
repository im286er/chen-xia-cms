<td valign="top">
<div class="title"><h2>修改视频</h2></div>
<div class="maincon">
<?php $form = $this->beginWidget("CActiveForm",array(
	'enableClientValidation'	=>	true,
	'clientOptions'				=>	array(
		'validateOnSubmit'	=>	true,
	),
)); 
?>
	<table class="formtable" width="100%">
		<tr>
			<td colspan="4" align=center style="color:red;font-size:15px;border:0;">
				<?php 
					if(Yii::app()->user->hasFlash('editmvstatus')){
						echo Yii::app()->user->getFlash('editmvstatus');
					}
				?>
			</td>
		</tr>
		<tr >
			<td width="180px" align="right" style="border:none;">MV名称：</td>
			<td colspan="3" style="border:none;">
				<div class="stext"><!-- <input type="text" name="" value="" id="" />  -->
				<?php echo $form->textField($mvInfo,'name'); ?>
				<?php echo $form->error($mvInfo,'name'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" >排序：</td>
			<td colspan="3">
				<div class="stext"><!--  <input type="text" name="" value="" id="" />-->
				<?php echo $form->textField($mvInfo,'sort'); ?>
				<?php echo $form->error($mvInfo,'sort'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td style="border:0;"></td>
			<td style="border:0;"><input type="submit" name="" value="提交修改" id="" class="btn-img" /></td>
		</tr>
	</table>
<?php $this->endWidget(); ?>
</div>

</td>