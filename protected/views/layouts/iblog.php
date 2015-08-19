<?php 
	/**
	 * 获取菜单及各项公共配置
	 */
	$menuModel = new Blog();
	$menuInfo  = $menuModel->common($this->uid);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $defaultheadpage = array_filter(explode(",", Yii::app()->params['defaultheadpage'])); ?>
<?php if(in_array($this->getAction()->getId(), $defaultheadpage)):?>
<title><?php echo $menuInfo['webconfig']['title'];?></title>
<meta name="keywords" content="<?php echo $menuInfo['webconfig']['seo']; ?>"/>
<meta name="description" content="<?php echo $menuInfo['webconfig']['seo']; ?>"/>
<?php endif;?>
<link rel="Shortcut Icon" href="<?php echo $menuInfo['webconfig']['icon']; ?>" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/iblog.css" type="text/css" media="screen" />
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js'></script>	
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/gotop.css" type="text/css" media="screen" />
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/gotop.js'></script>	
<style type="text/css">
.thisismyplayerdiv{position:fixed;width:600px;height:450px;margin-left:400px;margin-top:120px;border:0px solid red;}
#closemv{margin-left:580px;position:absolute;z-index:2222;margin-top:-477px;width:27px;height:27px;background:url('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/red-close-btn.gif');-webkit-transform: translateZ(0);}	
body{background: url('<?php  echo Yii::app()->session['ws_backgroundofuser'];  ?>') no-repeat fixed top;)}
</style>
<script type="text/javascript">
$(function(){

/*设置播放器位置 默认中间位置*/
var width = window.screen.width - 20 - 600;	
$(".thisismyplayerdiv").css({"margin-left":(width/2+70)+"px"});

});
</script>
</head>
<body class="archive category category-photography category-15">
<!-- ckplayer播放器begin -->
<div class="thisismyplayerdiv">
<div id="videoplayer"></div>
<div id="closemv"></div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
var mvurl;
$(function(){
$(".mymv").click(function(){
	//var content = $("#playerdiv").clone();
	mvurl   = $(this).find('.mvid').val();

	//设置播放器的z-index
	$(".thisismyplayerdiv").css({"z-index":"22"});
	
	//mv地址
	mvurl = "<?php echo $menuInfo['url']; ?>"+mvurl;
	$(".thisismyplayerdiv").fadeIn(500);
	var flashvars={
			f:mvurl,
			c:0,
			b:1
			};
		var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
		CKobject.embedSWF('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf','videoplayer','ckplayer_a1','600','450',flashvars,params);
		/*
		CKobject.embedSWF(播放器路径,容器id,播放器id/name,播放器宽,播放器高,flashvars的值,其它定义也可省略);
		下面三行是调用html5播放器用到的
		*/
		swfobject.embedSWF('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf', 'videoplayer', '600', '400', '10.0.0','<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf', flashvars, params, attributes);
		var video=['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4','http://www.ckplayer.com/webm/0.webm->video/webm','http://www.ckplayer.com/webm/0.ogv->video/ogg'];
		var support=['iPad','iPhone','ios','android+false','msie10+false'];
		CKobject.embedHTML5('video','ckplayer_a1',600,450,video,flashvars,support);

});

//关闭播放器
$("#closemv").live("click",function(){

	//设置播放器的z-index为0
	$(".thisismyplayerdiv").css({"z-index":"0"});
	icontents = $(this).parent().children().clone();
	iparent = $(this).parent();
	$(this).parent().hide(300,function(){
		iparent.children().remove();
		iparent.empty().append(icontents);
	});
});
	
});
</script>
<!-- ckplayer播放器end -->
<div id="wrapper" class="clearfix">
<div class="top-bar">
<div class="frame">
	<div class="frame-inside">
		<!-- header navigation menu -->
		<div class="menu-header-container">
		<ul id="menu-header" class="nav">
<li id="menu-item-109" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-109"><a href="<?php echo $menuInfo['upmenu_1']['link'];?>" style="font-family:'幼圆';font-size:13px;"><?php echo $menuInfo['upmenu_1']['name'];?></a></li>
<li id="menu-item-110" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-110"><a href="<?php echo $menuInfo['upmenu_2']['link'];?>" target="_blank" style="font-family:'幼圆';font-size:13px;"><?php echo $menuInfo['upmenu_2']['name'];?></a></li>
<li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-85"><a href="<?php echo $menuInfo['upmenu_3']['link'];?>" style="font-family:'幼圆';font-size:13px;"><?php echo $menuInfo['upmenu_3']['name'];?></a>
	<ul class="sub-menu">

	<?php foreach ($menuInfo['uplistmenu_3'] as $key=>$uml):?>
		<li id="" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a href="<?php echo $uml->link; ?>" target="_blank" style="font-family:'幼圆';font-size:13px;"><?php echo $uml->name; ?></a></li>
		
	<?php endforeach; ?>
	</ul>
</li>
<li id="menu-item-218" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-218"><a style="font-family:'幼圆';font-size:13px;" href="<?php echo $menuInfo['upmenu_4']['link'];?>" target="_blank"><?php echo $menuInfo['upmenu_4']['name'];?></a></li>
</ul></div>			
		<ul class="style-switcher nav">
			<li><a style="font-family:'幼圆';font-size:13px;" href="<?php echo $menuInfo['upmenu_5']['link'];?>" ><?php echo $menuInfo['upmenu_5']['name'];?></a>
				<ul class="sub-menu">
				<?php foreach ($menuInfo['mvlist'] as $key=>$mv): ?>
					<li class='mymv'><input type="hidden" value="<?php echo $mv->mv; ?>" class='mvid' /><a href="#" style="font-family:'幼圆';font-size:12px;"><?php echo $mv->name; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</li>
		</ul>
			<ul class="nav filter-list filter imusiclist" id="imusiclist">
				<li id="menu-item-27" class="sort-posts all-projects" >
					
					 <?php 
						
						/*播放音乐的页面控制*/
						$allowPage  = array_filter(explode(",", Yii::app()->params['allowMusicPlayer']));
						$currentAction = $this->getAction()->getId();
						if(in_array($currentAction, $allowPage)):
					 ?>
					 
					 <span style="background-color:#313131;display:block;margin-top:8px;">
						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" style="width:100%;height:25px;">
						  <param name="movie" value="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/mplayer/player_S.swf?listfile=<?php echo Yii::app()->request->baseUrl; ?>/music/<?php echo $menuInfo['uid']; ?>/mylist.php?nocache=<?php echo time(); ?>" />
						  <param name="quality" value="high" />
						  <param name="allowScriptAccess" value="always" />
						  <param name="wmode" value="transparent">
						   <embed src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/mplayer/player_S.swf?listfile=<?php echo Yii::app()->request->baseUrl; ?>/music/<?php echo $menuInfo['uid']; ?>/mylist.php?nocache=<?php echo time(); ?>" type="application/x-shockwave-flash" WMODE="transparent" style="width:100%;height:25px;" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always" />
						</object>
					 </span>
					<?php endif; ?>
				</li>
			</ul><!-- filter list -->
		</div><!-- frame inside -->
	</div><!-- frame -->
</div><!-- top bar -->
<?php echo $content; ?>
		
<!-- grab footer -->
<div id="footer" class="clearfix">
<div class="frame">
		<div class="bar">
<p class="copyright"><a href="<?php echo $menuInfo['downmenu_1']['link'];?>" style="font-family:'幼圆';font-size:13px;font-weight:bold;"><?php echo $menuInfo['downmenu_1']['name'];?></a></p>
<div class="menu-footer-container"><ul id="menu-footer" class="footernav"><li id="menu-item-29" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-29"><a style="font-family:'幼圆';font-size:13px;font-weight:bold;" href="<?php echo $menuInfo['downmenu_2']['link'];?>" target="_blank"><?php echo $menuInfo['downmenu_2']['name'];?></a></li>
<li id="menu-item-30" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-30"><a href="<?php echo $menuInfo['downmenu_3']['link'];?>" target="_blank" style="font-family:'幼圆';font-size:13px;font-weight:bold;"><?php echo $menuInfo['downmenu_3']['name'];?></a></li>
<li id="menu-item-31" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31"><a href="<?php echo $menuInfo['downmenu_4']['link'];?>" target="_blank" style="font-family:'幼圆';font-size:13px;font-weight:bold;"><?php echo $menuInfo['downmenu_4']['name'];?></a></li>
<li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32"><a href="<?php echo $menuInfo['downmenu_5']['link'];?>" target="_blank" style="font-family:'幼圆';font-size:13px;font-weight:bold;"><?php echo $menuInfo['downmenu_5']['name'];?></a></li>
<li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33"><a target="_blank" href="<?php echo $menuInfo['downmenu_6']['link'];?>" style="font-family:'幼圆';font-size:13px;font-weight:bold;"><?php echo $menuInfo['downmenu_6']['name'];?></a></li>
</ul></div></div><!--bar-->
	</div><!--frame-->
</div><!--footer-->
			
</div><!-- wrapper -->
</body>
</html>