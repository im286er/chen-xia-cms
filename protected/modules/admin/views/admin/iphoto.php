<td valign="top">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/fancybox/css/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/fancybox/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/fancybox/js/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/fancybox/js/jquery.mousewheel-3.0.4.js"></script>
<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/jBox/Skins/Gray/jbox.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/jBox/jquery.jBox-2.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$("a.example1").fancybox();

		$("a#example2").fancybox({
			'overlayShow':false,
			'transitionIn':'elastic',
			'transitionOut':'elastic'
		});

		$("a#example3").fancybox({
			'transitionIn':'none',
			'transitionOut':'none'	
		});

		$("a#example4").fancybox({
			'opacity':true,
			'overlayShow':false,
			'transitionIn':'elastic',
			'transitionOut':'none'
		});

		$("a#example5").fancybox();

		$("a#example6").fancybox({
			'titlePosition':'outside',
			'overlayColor':'#000',
			'overlayOpacity':0.9
		});

		$("a#example7").fancybox({
			'titlePosition':'inside'
		});

		$("a#example8").fancybox({
			'titlePosition':'over'
		});

		$("a[rel=example_group]").fancybox({
			'transitionIn':'none',
			'transitionOut':'none',
			'titlePosition':'over',
			'titleFormat':function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});

		$("#various1").fancybox({
			'titlePosition':'inside',
			'transitionIn':'none',
			'transitionOut':'none'
		});

		$("#various2").fancybox();

		$("#various3").fancybox({
			'width':'75%',
			'height':'75%',
			'autoScale':false,
			'transitionIn':'none',
			'transitionOut':'none',
			'type':'iframe'
		});

		$("#various4").fancybox({
			'padding':0,
			'autoScale':false,
			'transitionIn':'none',
			'transitionOut':'none'
		});

		//异步删除图片
		$(".imagebox").mouseenter(function(){
			$(this).find(".deletebutton").show();
			$(this).find(".setbackground").show();
		}).mouseleave(function(){
			$(this).find(".deletebutton").hide();
			$(this).find(".setbackground").hide();
		});

		$(".deletebutton").click(function(){

			//异步请求地址
			var url = "<?php echo $this->createUrl($ajaxurl); ?>";
			var iid = $(this).siblings('.imageid').val();
			var obj = $(this).parent();
			$.ajax({url: url, 

				type: 'POST', 

				data:{iid:iid}, 

				dataType: 'text', 

				timeout: 5000, 

				error: function(){alert('Error loading PHP document');}, 

				success: function(result){
					if(result){
						obj.fadeOut(500,function(){
							obj.remove();
						});
					}
				} 
			});	
		});

	//异步设置背景
	$(".setbackground").click(function(){

		//异步请求地址
		var url = "<?php echo $this->createUrl($ajaxset); ?>";
		var iid = $(this).siblings('.imageid').val();
		var obj = $(this).parent();
		$.ajax({url: url, 

			type: 'POST', 

			data:{iid:iid}, 

			dataType: 'text', 

			timeout: 5000, 

			error: function(){alert('Error loading PHP document');}, 

			success: function(result){
				if(result){
					//alert("设置成功!");
					$.jBox.tip("设置主页背景成功！");
				}
			} 
		});	
	});
});
</script>
<style>
.imagestyle{width:100px;height:100px;}
.deletebutton{position:absolute;cursor:pointer;display:none;margin-left:70px;margin-top:2px;background-color:#FFF2EA;border:1px solid #FFD0B1;color:#FF6600;}
.setbackground{position:absolute;cursor:pointer;display:none;margin-left:5px;margin-top:2px;background-color:#FFF2EA;border:1px solid #FFD0B1;color:#FF6600;}
.imagebox{float:left;margin-left:10px;border:1px solid #EEEEEE;margin-top:10px;}
</style>
<div class="title"><h2>照片管理</h2></div>
<div class="maincon">
<div><a style="margin:10px;font-size:15px;margin-bottom:10px;display:block;width:100;" href="<?php echo $this->createUrl('admin/upphoto'); ?>">上传照片</a></div>
<div id="content">
<p>
<!-- 
	<div class="imagebox">
		<span class='deletebutton'>删除</span>
		<input type="hidden" value="" class='imageid'/>
		<a class="example1" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/fancybox/example/1_b.jpg"><img alt="example1" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/fancybox/example/1_b.jpg" class='imagestyle'/></a>
	</div>
 -->
 
 <?php foreach ($photos as $key=>$p): ?>
	<div class="imagebox">
		<span class='setbackground'>设置为背景</span>
		<span class='deletebutton'>删除</span>
		<input type="hidden" value="<?php echo $p->id; ?>" class='imageid'/>
		<a class="example1" href="<?php echo $url.$p->picture;  ?>"><img alt="example1" src="<?php echo $url.$p->picture; ?>" class='imagestyle'/></a>
	</div>
<?php endforeach; ?>
</p>
</div>
<div style="width:100%;height:10px;clear:both;"></div>
<div class="pagination">
		<?php 
			
			$this->widget('CLinkPager',array(
				'header'	=>	'',
				'firstPageLabel'	=>	'首页',
				'lastPageLabel'	=>	'末页',
				'prevPageLabel'		=>	'上一页',
				'nextPageLabel'		=>	'下一页',
				'pages'				=>	$pages,
				'maxButtonCount'	=>	5,
				
			));
		
		?>
</div>
</div>
</td>