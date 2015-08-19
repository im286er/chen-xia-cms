<td valign="top">
<div class="title"><h2>修改登陆密码</h2></div>
<style>
.stext div{display:inline;font-size:13px;}
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
			<td width="180px" align="right"><?php echo $form->labelEx($userModel,'password'); ?></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<?php echo $form->passwordField($userModel,'password'); ?>
				<?php echo $form->error($userModel,'password'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"><?php echo $form->labelEx($userModel,'newpassword'); ?></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<?php echo $form->passwordField($userModel,'newpassword'); ?>
				<?php echo $form->error($userModel,'newpassword'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"><?php echo $form->labelEx($userModel,'conpassword'); ?></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<?php echo $form->passwordField($userModel,'conpassword'); ?>
				<?php echo $form->error($userModel,'conpassword'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan=2 align=center style="border:0;">
			
				<?php 
				/**
				 * 打印闪存信息
				 */
					if(Yii::app()->user->hasFlash('success')){
						echo Yii::app()->user->getFlash('success');
					}
				?>
			
			</td>
		</tr>
		<tr>
				<td style="border:0;"></td>
				<td style="border:0;"><input type="submit" name="" value="确认修改" id="" class="btn-img" /></td>
		</tr>	
		</table>
<?php $this->endWidget(); ?>
	</div>
	
</td>