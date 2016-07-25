<?php 
	//获取菜单及各项公共配置
	$menuModel = new Blog();
	$menuInfo  = $menuModel->common($this->uid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $blogInfo[0]['title']; ?>"/>
<meta name="description" content="<?php echo ""; ?>"/>
<title><?php echo $blogInfo[0]['title'];?></title>
<link rel="Shortcut Icon" href="<?php echo $menuInfo['webconfig']['icon']; ?>" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/iblog.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/gotop.css" type="text/css" media="screen" />
<link href='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/e_style.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js'></script>	
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/gotop.js'></script>
<style type="text/css">
.thisismyplayerdiv{width:1160px;height:450px;margin-left:18px;margin-top:20px;border:0px solid red;}
#closemv{margin-left:1140px;position:absolute;z-index:2222;margin-top:-477px;width:27px;height:27px;-webkit-transform: translateZ(0);}	
body{background: url('<?php  echo Yii::app()->session['ws_backgroundofuser'];  ?>') no-repeat fixed top;);}
#content {width:100%;border:0px solid red;float:left;background:#eee;}
.post .frame {float: left;width: auto;padding: 30px 30px 15px 30px;border: solid 0px #e7e7e7;border-bottom: none;}
#respond{width:1080px;border:0px solid red;}
.mainresponsebtn,.submitcommentbtn{margin-left: 20px;width: 60px;height: 35px;border: 0;color: #333333;background-color: #F7F7F7;border-radius: 5px;border-radius: 35px;font-size: 14px;color: white;background-color: black;}
.comment{width:100%;}
</style>
</head>
<body class="archive category category-photography category-15">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.js" charset="utf-8"></script>

<div id="wrapper" class="clearfix">
<div id="main" class="clearfix">
<?php foreach ($blogInfo as $key=>$b): ?>
	<div id="content" class="filter-posts">
	<!-- ckplayer播放器begin -->
	<?php if($b['videolink']): ?>
	<script type="text/javascript">
	var mvurl;
	$(function(){
		mvurl = "<?php echo $b['videolink']; ?>";
		$(".thisismyplayerdiv").fadeIn(500);
		var flashvars={f:mvurl, c:0, b:1, p:1};
		var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
		CKobject.embedSWF('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf','videoplayer','ckplayer_a1','1160','450',flashvars,params);
		swfobject.embedSWF('<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf', 'videoplayer', '600', '400', '10.0.0','<?php echo Yii::app()->request->baseUrl; ?>/assets/index/ckplayer/ckplayer.swf', flashvars, params, attributes);
		var video=['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4','http://www.ckplayer.com/webm/0.webm->video/webm','http://www.ckplayer.com/webm/0.ogv->video/ogg'];
		var support=['iPad','iPhone','ios','android+false','msie10+false'];
		CKobject.embedHTML5('video','ckplayer_a1',600,450,video,flashvars,support);
	});
	</script>
	<div class="thisismyplayerdiv">
	<div id="videoplayer"></div>
	</div>
	<?php endif ?>
	<!-- ckplayer播放器end -->
		<!-- grab the posts -->		
			<div data-id="post-159" data-type="articles" class="post-159 articles post clearfix project" style="padding-bottom:0px;">
				<div class="box">
					<div class="shadow clearfix">
					<div class="frame" style="margin-bottom: -12px;">
							<!--
							<h2 class="entry-title" style="text-align:center;"><a href="#" title=""><?php echo $b['title']; ?></a></h2>
							-->
							<div class="okvideo"></div>	
							<p><?php echo $b['content']; ?></p>
					</div><!-- frame -->
					</div><!-- shadow -->
				</div><!-- box -->
			</div><!--writing post-->
			
<!--
<div class="bdsharebuttonbox" style="margin-left:30px;">
<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
</div>
-->
<script>/*window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];*/</script>
<!--
<div style="margin-left:30px;margin-top:10px;"><span>--</span>&nbsp;[<a href="<?php echo $category; ?>">分类</a>]&nbsp;&nbsp;&nbsp;[<a href="<?php echo $music; ?>">音乐</a>]&nbsp;&nbsp;&nbsp;[<a href="<?php echo $message; ?>">投诉举报</a>]</div>
-->

<div class='commentscontainer'>
     <div class="comments" id="lookcontent">
		<h3><span class='totalcount'>&nbsp;<?php echo $total; ?></span>条评论<button type="button" class="mainresponsebtn">评论</button></h3>
		<?php echo $comments;?>
     </div>  
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/layer/layer.min.js"></script>
	<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/jBox/Skins/Gray/jbox.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/jBox/jquery.jBox-2.2.min.js"></script>
	<script type="text/javascript">
	/**
	*异步评论参数
	*1.评论人  注册用户提取id  未注册id为-1表示匿名网友
	*2.评论文章id
	*3.父评论id
	*4.评论内容
	*/
	//var ComentUserId;//session中取
	var BlogId = "<?php foreach ($blogInfo as $bi){echo $bi['bid'];} ?>";
	var ParentId;
	var Content;
	var index;
	var reply;
	//弹出评论框  主评论时关掉所有子评论框
	//1.主评论
	$('.mainresponsebtn').on('click', function(){
		ParentId = 0;
		reply    = 0;
		layer.closeAll();//关闭当前打开窗口
	    index = $.layer({
	        type: 1,
	        title: true, //不显示默认标题栏
	        shade: [0],  //不显示遮罩
	        area: ['600px', '300px'],
	        page: {html: '<div style="padding:20px;font-family:微软雅黑;"><h3>评论内容</h3><div><textarea class="responsecontent" style="width:550px;height:160px;border-radius:5px;resize:none;"></textarea><button style="margin-top:20px;float:right;" class="submitcommentbtn" type="submit">提交</button></div></div>'}
	    });
	});
	
	//2.子评论
	$('.responsetarget').on('click', function(){
		ParentId = $(this).parent().find(".parentid").val();
		reply    = 1;
		layer.closeAll();//关闭当前打开窗口
	    index = $.layer({
	        type: 1,
	        title: true, //不显示默认标题栏
	        shade: [0],  //不显示遮罩
	        area: ['600px', '300px'],
	        page: {html: '<div style="padding:20px;font-family:微软雅黑;"><h3>评论内容</h3><div><textarea class="responsecontent" style="width:550px;height:160px;border-radius:5px;resize:none;"></textarea><button style="margin-top:20px;float:right;" class="submitcommentbtn" type="submit">提交</button></div></div>'}
	    });
	});

	//提交按钮
	$(".submitcommentbtn").live("click",function(){
		Content = $(".responsecontent").val();
		if(Content == ""){	//评论内容为空
			layer.close(index);
			$.jBox.tip("评论内容不允许为空");
			
			return false;
		}
		$.ajax({
			url: "<?php echo $this->createUrl('/index/AddComment'); ?>", 
			type: 'POST', 
			data:{blogid:BlogId,parentid:ParentId,content:Content,replytype:reply}, 
			dataType: 'text', 
			timeout: 5000, 
			error: function(result){ layer.close(index); $.jBox.tip("服务器忙，请稍后...");/*alert(console.log(result));*/}, 
			success: function(result){
				//alert(result);
				if(result != "fail"){
					var resobj = eval("("+result+")");
					var pid  = resobj['pid'];
					var text = resobj['text'];
					
					var commentcount = 0;	//评论条数
					$(".comment").each(function(){
						commentcount = commentcount+1;
					});
					
					if(pid == 0 ){	//主评论添加到最后

						if(commentcount == 0){
							$(".comments h3").after(text);
						}else{
							
							$(".comment:last").after(text);
						}
						
					}else{			//子评论需要插入到当前pid后

						var tmpobj;
						$(".comment").each(function(e){
							if($(this).find(".parentid").val() == pid){
								tmpobj = this;
								return false;	//跳出循环
							}	
						});
						
						$(tmpobj).after(text);
					}

					//增加评论数量
					$(".totalcount").text(parseInt($(".totalcount").text())+1);
					
					layer.close(index);//关闭当前打开窗口
					$.jBox.tip("评论成功！");
		
				}
				if(result == "fail"){
					$.jBox.tip("服务器忙，请稍后...");
				}
			} 
		});
	});
	//随鼠标显示回复按钮
	$(".comment").live("mouseenter",function(){
		$(this).find(".responsetarget").show();
	});
	$(".comment").live("mouseleave",function(){
		$(this).find(".responsetarget").hide();
	});
	
	</script>
    </div>
	</div><!--content-->
	<?php endforeach; ?>			
	<div class="push" style="clear:both;height:50px;"></div>
</div><!--main-->
</div><!-- wrapper -->
</body>
</html>