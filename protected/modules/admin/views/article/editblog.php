<td valign="top">
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript">
window.UEDITOR_HOME_URL = "<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/ueditor/";
window.onload = function(){

	 window.UEDITOR_CONFIG.initialFrameWidth = 800;
	 window.UEDITOR_CONFIG.initialFrameHeight = 300;
	 UE.getEditor('editor');
}
</script>
<script type="text/javascript">
var addcontent = "<div><span style='margin-right:2px;font-size:18px;' class='cutthumbbutton'>-</span><input type='file' name='thumb[]'/></div>";
$(function(){

	//添加file
	$(".addthumbbutton").click(function(){
		$(".thumbtd").append(addcontent);
	});

	//删除file
	$(".cutthumbbutton").live('click',function(){
		$(this).parent().remove();
	});
	
	//radio type
	$(".blogtype").find("input:radio").live("click",function(){
		if($(this).val() == 2){
			$(".linkurl").hide();
		} else {
			$(".linkurl").show();
		}
	})
});
</script>
<style type="text/css">
#errorfield{display:inline;color:red;}
.addthumbbutton,.cutthumbbutton{cursor:pointer;}
</style>
<div class="title"><h2>编辑文章</h2></div>
<div class="maincon">
<?php $form = $this->beginWidget('CActiveForm',array(
	'htmlOptions'	=>	array('enctype'=>'multipart/form-data'),
)); ?>
	<table class="formtable" width="100%">
		<tr>
			<td width="180px" align="right" valign="top">文章标题：</td>
			<td>
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<?php echo $form->textField($blogModel,'title'); ?>
				<?php echo $form->error($blogModel,'title',array('id'=>'errorfield')); ?>
				</div>
				<div class="append blogtype">
					<?php echo $form->radioButtonList($blogModel,'type',array('2'=>'普通','3'=>'视频'),array('separator'=>'&nbsp;&nbsp')); ?>
					<?php echo $form->error($blogModel,'type',array('id'=>'errorfield')); ?>
				</div>
				<div class="stext linkurl" title="视频URL">
				<?php echo $form->textField($blogModel,'videolink'); ?>
				<?php echo $form->error($blogModel,'videolink',array('id'=>'errorfield')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td align="right" valign="top">标签：</td>
			<td>
				<?php echo $form->dropDownList($blogModel,'labelid',$labels); ?>
				<?php echo $form->error($blogModel,'labelid',array('id'=>'errorfield')); ?>

			</td>
		</tr>
		<tr>
			<td align="right" valign="top">设置访问权限：</td>
			<td>
				<?php echo $form->dropDownList($blogModel,'readaccess',array(0=>'所有人可见',1=>'仅自己可见')); ?>
				<?php echo $form->error($blogModel,'readaccess',array('id'=>'errorfield')); ?>

			</td>
		</tr>
		<tr>
			<td align="right" valign="top">缩略图：</td>
			<td class='thumbtd'>
				<div><span style="margin-right:2px;font-size:18px;" class='addthumbbutton'>+</span><input type='file' name='thumb[]'/></div>
			</td>
			</tr>
			<tr>
			<td align="right" valign="top">内容：</td>
			<td>
				<script id="editor" type="text/plain" name='content'><?php echo $blogModel['content']; ?></script>
				</td>
			</tr>
			<tr>
				<td colspan=2 align=center style='border:0;color:red;'>提示</td>
			</tr>
			<tr>
				<td style="border:0;"></td>
				<td style="border:0;"><input type="submit" name="" value="提交修改" id="" class="btn-img" /></td>
			</tr>
		</table>
		
<?php $this->endWidget(); ?>
	</div>
	
</td>