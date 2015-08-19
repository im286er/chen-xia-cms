<div style="clear:both;"></div>
<?php if(!empty($blogInfo)):?>
	<?php foreach ($blogInfo as $key=>$b): ?>
		<title><?php echo $b['title']?></title>
		<meta name="keywords" content="<?php echo $b['title']; ?>"/>
		<meta name="description" content="<?php echo strip_tags($b['content']); ?>"/>
	<?php endforeach;?>
<?php endif;?>
<!-- 返回顶部 -->
<link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/GOTOP.css' type='text/css' />
<script type='text/javascript' language='javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/GOTOP.js'></script>
<div id="main" class="clearfix" style="width:100%;">
<style>
#content {width:100%;border:0px solid red;float:left;background-color:white;}
.post .frame {
    float: left;
    width: auto;
    padding: 30px 30px 15px 30px;
    border: solid 1px #e7e7e7;
    border-bottom: none;
    background: #fff;
}
#respond{width:1080px;border:0px solid red;}
.mainresponsebtn{margin-left:20px;width:150px;height:28px;border:0;color:#333333;background-color:#F7F7F7;border-radius:5px;}
.submitcommentbtn:hover,.mainresponsebtn:hover{color:#5ABFEA;}
.comment{width:50%;}
</style>
<?php foreach ($blogInfo as $key=>$b): ?>
	<div id="content" class="filter-posts">
		<!-- grab the posts -->		
			<div data-id="post-159" data-type="articles" class="post-159 articles post clearfix project" style="padding-bottom:0px;">
				<div class="box">
					<div class="shadow clearfix">
					<div class="frame" style="margin-bottom: -12px;">
							<h2 class="entry-title"><a href="#" title=""><?php echo $b['title']; ?></a></h2>
							
							<div class="okvideo"></div>	
							<p><?php echo $b['content']; ?></p>
						</div><!-- frame -->
						</div><!-- shadow -->
					</div><!-- box -->
				</div><!--writing post-->
<link href='<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/e_style.css' rel='stylesheet' type='text/css' />
<div class="bdsharebuttonbox" style="margin-left:30px;"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<div class='commentscontainer'>
     <div class="comments" id="lookcontent">
     <h3><span class='totalcount'><?php echo $total; ?></span>条评论<button type="button" class="mainresponsebtn">我要评论</button></h3>
      <?php 
      		echo $comments;
      ?>
      </div>  
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/layer/layer.min.js"></script>
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
	        page: {html: '<div style="padding:20px;font-family:微软雅黑;"><h3>评论内容</h3><div><textarea class="responsecontent" style="width:550px;height:160px;border-radius:5px;resize:none;"></textarea><button style="margin-top:20px;float:right;width:70px;height:27px;border:0px;background-color:#EAEAEA;border-radius:5px;" class="submitcommentbtn" type="submit">提交</button></div></div>'}
	    });
	});
	
	//2.子评论
	$('.responsetarget').on('click', function(){
		ParentId = $(this).parent().parent().find(".parentid").val();
		reply    = 1;
		layer.closeAll();//关闭当前打开窗口
	    index = $.layer({
	        type: 1,
	        title: true, //不显示默认标题栏
	        shade: [0],  //不显示遮罩
	        area: ['600px', '300px'],
	        page: {html: '<div style="padding:20px;font-family:微软雅黑;"><h3>评论内容</h3><div><textarea class="responsecontent" style="width:550px;height:160px;border-radius:5px;resize:none;"></textarea><button style="margin-top:20px;float:right;width:70px;height:27px;border:0px;background-color:#EAEAEA;border-radius:5px;" class="submitcommentbtn" type="submit">提交</button></div></div>'}
	    });
	});

	//提交按钮
	$(".submitcommentbtn").live("click",function(){
		Content = $(".responsecontent").val();
		if(Content == ""){	//评论内容为空
			alert("评论内容不允许为空");
			return false;
		}
		$.ajax({
			url: "<?php echo $this->createUrl('/index/AddComment'); ?>", 

			type: 'POST', 

			data:{blogid:BlogId,parentid:ParentId,content:Content,replytype:reply}, 

			dataType: 'text', 

			timeout: 5000, 

			error: function(){layer.msg("服务器忙，请稍后...", 2, -1);layer.close(index);}, 

			success: function(result){
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
						var padding = $(tmpobj).css("padding-left");
						padding = padding.split("px");
						padding = padding[0];
						padding = (parseInt(padding)+50)+"px";
						$(tmpobj).after(text);
						$(tmpobj).next(".comment").css("padding-left",padding);
					}

					//增加评论数量
					$(".totalcount").text(parseInt($(".totalcount").text())+1);

					layer.msg("评论成功", 2, -1);
					layer.close(index);//关闭当前打开窗口
		
				}
				if(result == "fail"){
					layer.msg("服务器忙，请稍后...", 2, -1);
					
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
	