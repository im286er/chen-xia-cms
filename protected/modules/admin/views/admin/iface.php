<td valign="top">
<div class="title"><h2>上传头像</h2></div>
<style>
.stext div{display:inline;font-size:13px;}
h1,h3{margin:15px 0 5px 0;padding:0;font-size:17px;font-family:microsoft yahei;font-weight:normal;border-bottom: 1px solid #CCC;}
</style>
<!--放入项目中 start -->
<script type="text/javascript">
   function uploadevent(status){
	//alert(status);
        status += '';
     switch(status){
     case '1':
	break;
     break;
     case '-1':
	  window.location.reload();
     break;
     default:
	window.location.reload();
    } 
   }
  </script>
  <!--放入项目中 start -->
<div class="maincon">


<!--<h1>Flash头像上传</h1>-->

<!--放入项目中 start -->
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
WIDTH="650" HEIGHT="450" id="myMovieName">
<PARAM NAME=movie VALUE="<?php echo Yii::app()->request->baseUrl;?>/assets/admin/iface/avatar.swf">
<PARAM NAME=quality VALUE=high>
<PARAM NAME=bgcolor VALUE=#FFFFFF>
<param name="flashvars" value="imgUrl=<?php echo Yii::app()->request->baseUrl;?>/assets/admin/iface/default.jpg&uploadUrl=<?php echo Yii::app()->request->baseUrl;?>/assets/admin/iface/upfile.php&uploadSrc=false" />
<EMBED src="<?php echo Yii::app()->request->baseUrl;?>/assets/admin/iface/avatar.swf" quality=high bgcolor=#FFFFFF WIDTH="650" HEIGHT="450" wmode="transparent" flashVars="imgUrl=<?php echo Yii::app()->request->baseUrl;?>/assets/admin/iface/default.jpg&uploadUrl=<?php echo Yii::app()->request->baseUrl;?>/assets/admin/iface/upfile.php&uploadSrc=false"
NAME="myMovieName" ALIGN="" TYPE="application/x-shockwave-flash" allowScriptAccess="always"
PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
</EMBED>
</OBJECT>
<!--放入项目中 end -->


</div>
	
</td>