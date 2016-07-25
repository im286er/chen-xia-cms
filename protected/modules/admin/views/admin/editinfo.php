<td valign="top">
<div class="title"><h2>修改基本信息</h2></div>
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
					if(Yii::app()->user->hasFlash('edituserinfoerror')){
						echo Yii::app()->user->getFlash('edituserinfoerror');
					}
				?>
			</td>
		</tr>
		<tr >
			<td width="180px" align="right" style="border:none;">姓名：</td>
			<td colspan="3" style="border:none;">
				<div class="stext"><!-- <input type="text" name="" value="" id="" />  -->
				<?php echo $form->textField($userinfoModel,'truename'); ?>
				<?php echo $form->error($userinfoModel,'truename'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" >昵称：</td>
			<td colspan="3">
				<div class="stext"><!--  <input type="text" name="" value="" id="" />-->
				<?php echo $form->textField($userinfoModel,'nickname'); ?>
				<?php echo $form->error($userinfoModel,'nickname'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right" style="border:none;">QQ：</td>
			<td width="210px" colspan=3; style="border:none;">
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:180px;" /> -->
				<?php echo $form->textField($userinfoModel,'qq'); ?>
				<?php echo $form->error($userinfoModel,'qq'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right">电话：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" style="width:180px;" /> -->
				<?php echo $form->textField($userinfoModel,'phone'); ?>
				<?php echo $form->error($userinfoModel,'phone'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td align="right" valign="top">简介：</td>
			<td colspan="3">
				<?php echo $form->textArea($userinfoModel,'introduce',array('style'=>'width:96%;height:180px;','id'=>'introduce')); ?>
				<?php echo $form->error($userinfoModel,'introduce'); ?>
				<!-- <textarea id="democontent" name="introduce" style="width:96%;height:180px;" ></textarea>  -->
			</td>
		</tr>
		<tr>
			<td style="border:0;"></td>
			<td style="border:0;"><input type="submit" name="" value="提交修改" id="" class="btn-img" /></td>
		</tr>
	</table>
<?php $this->endWidget(); ?>
</div>

<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/kindeditor-4.1/kindeditor-min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/kindeditor-4.1/lang/zh_CN.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K) {
	editor = K.create('#introduce', {
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : false,
		items : [
				'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
				'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
				'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
				'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
				'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
				'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
				'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
				'anchor', 'link', 'unlink', '|', 'about'
				]
	});
});
</script>
	
</td>