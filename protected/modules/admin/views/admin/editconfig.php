<td valign="top">
<div class="title"><h2>修改配置</h2></div>
<style>
.stext div{display:inline;font-size:13px;}
.errorstyle{color:red;}
</style>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/cxColor/css/jquery.cxcolor.css">
<div class="maincon">
<?php $form = $this->beginWidget('CActiveForm',array(
	'htmlOptions'	=>	array('enctype'=>'multipart/form-data'),
)); ?>

	<table class="formtable" width="100%">
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<span>网站名称：</span>
				<?php echo $form->textField($editModel,'title'); ?>
				<?php echo $form->error($editModel,'title',array('class'=>'errorstyle')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<span>SEO文字：</span>
				<?php echo $form->textField($editModel,'seo'); ?>
				<?php echo $form->error($editModel,'seo',array('class'=>'errorstyle')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<span>网站标徽：</span>
				<input type="file" name='icon'/>

				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<span>版权信息：</span>
				<?php echo $form->textField($editModel,'copyright'); ?>
				<?php echo $form->error($editModel,'copyright',array('class'=>'errorstyle')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<span>标题颜色：</span>
				<?php echo $form->textField($editModel,'titlecolor',array('id'=>'color_a','class'=>'input_cxcolor')); ?>
				<?php echo $form->error($editModel,'titlecolor',array('class'=>'errorstyle')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="3">
				<div class="stext"><!-- <input type="text" name="" value="" id="" /> -->
				<span>内容颜色：</span>
				<?php echo $form->textField($editModel,'contentcolor',array('id'=>'color_b','class'=>'input_cxcolor')); ?>
				<?php echo $form->error($editModel,'contentcolor',array('class'=>'errorstyle')); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="180px" align="right"></td>
			<td colspan="2">
				<div class="stext" id="readAccess"><!-- <input type="text" name="" value="" id="" /> -->
				<span>访问权限：</span>
				</div>
				<span style="margin-left:70px;"></span><?php echo $form->radioButtonList($editModel,'iaccess',array(0=>'允许所有人',1=>'只允许登陆用户'),array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;')); ?>
			</td>
		</tr>
		<tr>
			<td colspan=2 align=center style="border:0;">
			
				<?php 
				/**
				 * 打印闪存信息
				 */
					if(Yii::app()->user->hasFlash('state')){
						echo Yii::app()->user->getFlash('state');
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/cxColor/js/jquery-1.4.4.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/cxColor/js/jquery.cxcolor.min.js"></script>
<script>
$("#color_a").cxColor();

$("#color_c").cxColor({
	color:"#0066ff"
});

$("#color_b").cxColor();
	
(function(){
	var color=$("#color_d");
	var title=$("#title");
	var acts=$("#acts");
	var mycolor;

	color.bind("change",function(){
		title.css("color",this.value)
	});

	mycolor=$("#color_d").cxColor();
	
	acts.delegate("button","click",function(){
		var _val=this.value;
		var _this=$(this);
		
		switch (_val){
			case "show":
				mycolor.show();
				break;
			case "hide":
				mycolor.hide();
				break;
			case "color":
				mycolor.color(_this.data("color"));
				break;
			case "reset":
				mycolor.reset();
				break;
			case "clear":
				mycolor.clear();
				break;
		};
		
	});

	$("#btn_red").bind("click",function(){
		mycolor.color("#ff0000");
	});

	$("#btn_show").bind("click",function(){
		mycolor.show();
	});
})();
</script>
	</div>
	
</td>