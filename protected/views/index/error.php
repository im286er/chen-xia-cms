<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Error了哟~</title>
<style>
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
a{text-decoration:none;color:#535353;font-size:12px;font-family:"arial","微软雅黑";}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
#setp_quicklogin{width:90%;margin:0 auto;border:0px solid red;text-align:center;padding-top:100px;font-size:18pt;}
.back_setp{height:50px;width:200px;line-height:50px;text-align:center;background:#6BC30D;color:#fff;cursor:pointer;font-size:22px;text-align:center;left:20px;top:20px;margin:20px;}
</style>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
	var n = 6;
	function showTime() {
		n--;
		$('#back_setp').html(n + ' 秒后关闭');
		if (n == 0) 
			window.close();
		else
			setTimeout('showTime()', 1000);
	}
</script>
</head>
<body onload ="showTime()" >
<div id="reg_setp">
	<div class="back_setp" id="back_setp"></div>
	<div id="setp_quicklogin">
		<?php echo $message; ?>
	</div>
</div><!--reg_setp end-->

</body>
</html>

