<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>瀑布流</title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/waterfall.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/waterfall.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.fancybox').fancybox();
});
</script>
<script type="text/javascript">
var sync = '<?php echo $this->createUrl("index/g"); ?>' ;
var usid = '<?php echo $uid; ?>' ; 
</script>
</head>

<body>
<ul class="clearfix" id="stage">
</ul>

</body>
</html>


