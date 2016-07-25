<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $webconfig['title'];?></title>
<link rel="Shortcut Icon" href="<?php echo $webconfig['icon']; ?>" />
<meta name="keywords" content="<?php echo $webconfig['seo']; ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/waterfall.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/panel.css' type='text/css' />
<link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/sweetalert.css' type='text/css' />
<link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/jBox/Skins/Gray/jbox.css' type='text/css' />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/jBox/jquery.jBox-2.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/imagesloaded.pkgd.min.js"></script>
<script type='text/javascript' language='javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/sweetalert.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/waterfall.js"></script>
<script type='text/javascript' language='javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/panel.js'></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.fancybox').fancybox();
});

$(function(){
/*设置播放器位置 默认中间位置*/
var width = window.screen.width - 20 - 750;	
$(".thisismyplayerdiv").css({"margin-left":(width/2+70)+"px"});
});
</script>
<script type="text/javascript">
var sync = '<?php echo $this->createUrl("index/g"); ?>' ;
var usid = '<?php echo $uid; ?>' ; 
var taid = '<?php echo isset($tid) ? $tid : ""; ?>' ;
var keys = '<?php echo isset($key) ? $key : ""; ?>' ;
<?php
//generate label to view
$label = array();
foreach ($labelInfo as $key=>$l) {$label[$l['label']] = $this->createUrl("index/t",array('uid'=>$uid,'id'=>$l['id']));}
?>
var label= '<?php echo json_encode($label); ?>';
</script>
<style type="text/css">
.thisismyplayerdiv{position:fixed;width:600px;height:450px;margin-left:400px;margin-top:120px;border:0px solid red;z-index:-20;}
#closemv{margin-left:580px;position:absolute;z-index:2222;margin-top:-477px;width:27px;height:27px;background:url('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/images/red-close-btn.gif');-webkit-transform: translateZ(0);}	
</style>
</head>
<body>
<!-- ckplayer播放器begin -->
<div class="thisismyplayerdiv">
<div id="videoplayer"></div>
<div id="closemv"></div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
var mvurl;
function ckmarqueeadv(){
    return '';
}
$(function(){
$(".mymv").live("click",function(){
	//var content = $("#playerdiv").clone();
	mvurl = $(this).attr("data");
	//设置播放器的z-index
	$(".thisismyplayerdiv").css({"z-index":"22"});
	mvurl = ""+mvurl;
	$(".thisismyplayerdiv").fadeIn(500);
	var flashvars={f:mvurl, c:0, b:1, p:1};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
	CKobject.embedSWF('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf','videoplayer','ckplayer_a1','600','450',flashvars,params);
	swfobject.embedSWF('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf', 'videoplayer', '600', '400', '10.0.0','<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf', flashvars, params, attributes);
	var video=['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4','http://www.ckplayer.com/webm/0.webm->video/webm','http://www.ckplayer.com/webm/0.ogv->video/ogg'];
	var support=['iPad','iPhone','ios','android+false','msie10+false'];
	CKobject.embedHTML5('video','ckplayer_a1',600,450,video,flashvars,support);

});

//关闭播放器
$("#closemv").live("click",function(){
	//设置播放器的z-index为0
	$(".thisismyplayerdiv").css({"z-index":"2222"});
	icontents = $(this).parent().children().clone();
	iparent = $(this).parent();
	$(this).parent().fadeOut(300,function(){
		iparent.children().remove();
		iparent.empty().append(icontents);
	});
});

//模态窗口内容
$(".panelMnu").live("click", function(){
	records = eval("("+label+")");
	style = "<style>.a_link{display:inline-block;padding:8px;border:1px solid black;text-align:center;text-decoration:none;color:black;font-family:微软雅黑;border-radius:80px;margin-left:5px;margin-bottom:15px;}.a_link:hover{border:1px solid #E61736;color:#E61736;}</style>";
	content = style;
	for (var i in records) {
		content += "<a class='a_link' href='"+records[i]+"'>"+i+"</a>";
	}
	swal({html:true, title: "标签", text: content, allowOutsideClick:true, showConfirmButton:false});
});

});
</script>
<!-- ckplayer播放器end -->
<div style="display:none;">逗趣娱乐，找寻快乐</div>
<ul class="clearfix" id="stage">
</ul>
</body>
</html>


