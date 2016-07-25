<td valign="top">
<div class="title"><h2>上传视频</h2></div>
<style>
#uploadvideo{margin-left:30px;}
</style>
<script type="text/javascript">
var sync = '<?php echo $requestUrl; ?>';
var file;
var token;
$(function(){
	$(".uploadvideo_btn").click(function(){
		file=$(".filename").val();
		pos=file.lastIndexOf("\\");
		file=$.trim(file.substring(pos+1)); 
		//console.log(file);
		$.ajax({
			url : sync,
			dataType : 'text',
			type: 'POST', 
			data : {'file':file} ,
			success : function(token)
			{
				$("#upload_key").val(file);
				$("#upload_token").val(token);
				$("#uploadvideo").submit();
			}
		})
		return false;
	});
})
</script>
<form method="post" action="http://upload.qiniu.com/" enctype="multipart/form-data" id="uploadvideo">
  <div><input name="key" type="hidden" value="" id="upload_key"></div>
  <!--<div><input name="x:<custom_name>" type="hidden" value="<custom_value>"></div>-->
  <div><input name="token" type="hidden" value="" id="upload_token"></div>
  <div><input name="file" type="file" class='filename'/></div>
  <div><br/><hr/><br/></div>
  <div><input type="submit" value='上传' class='uploadvideo_btn'/></div>
</form>
</td>
