<td valign="top">
<div class="title"><h2>编辑菜单</h2></div>
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
			<td width="180px" align="right" valign="top">菜单名称：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" />  -->
					<?php echo $form->textField($menuModel,'name'); ?>
					<?php echo $form->error($menuModel,'name',array('id'=>'errorinfo')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" valign="top">链接地址：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:90px;"/> -->
					<?php echo $form->textField($menuModel,'link'); ?>
					<?php echo $form->error($menuModel,'link',array('id'=>'errorinfo')); ?>
				</div>
			</td>
		</tr>
		
		<tr style="display:none;">
			<td width="180px" align="right" valign="top">排序：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:90px;"/> -->
					<?php echo $form->textField($menuModel,'sort'); ?>
					<?php echo $form->error($menuModel,'sort',array('id'=>'errorinfo')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" valign="top">位置：</td>
			<td>
				<div class=""><!-- <input type="text" name="" value="" id="" style="width:90px;"/> -->
					<?php echo $form->radioButtonList($menuModel,'position',array('1'=>'顶部','2'=>'底部'),array('separator'=>'&nbsp;&nbsp;&nbsp;')); ?>
					<?php echo $form->error($menuModel,'position',array('id'=>'errorinfo')); ?>
					<?php echo $form->hiddenField($menuModel,'pid'); ?>
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
			<td style="border:0;"><input type="submit" name="" value="确认更新" id="" class="btn-img" /></td>
		</tr>
		
		</table>
<?php $this->endWidget(); ?>
	</div>
	
</td>