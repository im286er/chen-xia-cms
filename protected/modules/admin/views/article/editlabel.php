<td valign="top">
<div class="title"><h2>修改标签</h2></div>
<style>
#errorinfo{display:inline;color:red;}
</style>
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
			<td width="180px" align="right" valign="top">标签名称：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" />  -->
					<?php echo $form->textField($articleModel,'label'); ?>
					<?php echo $form->error($articleModel,'label',array('id'=>'errorinfo')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" valign="top">排序：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:90px;"/> -->
					<?php echo $form->textField($articleModel,'sort'); ?>
					<?php echo $form->error($articleModel,'sort',array('id'=>'errorinfo')); ?>
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