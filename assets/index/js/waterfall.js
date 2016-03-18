var offset = 1 ;
var reset  = 0 ;
var allpages = 1 ;
var surplusHeight = 900 ;
var browser = getBrowser() ;
$(function(){
	
	windowInitialized();
	/**
	$(window).resize(function(){
		windowInitialized();
		window.location.reload();
	});
	 */
	
});

function windowInitialized()
{
	var width = document.body.clientWidth ;
	var rooms = width / 220 ;
	var surplus = (width % 220 / 2 - 20) + "px";
	
	for (i = 1 ; i <= rooms ; i++)
	{
		row = "<li></li>";
		$("#stage").append(row);
	}
	
	$("#stage li:first").css({"margin-left":surplus});
}

$(document).ready(function(){
	loadMore();
});	

/**
$(window).scroll(function(){
	// 当滚动到最底部以上100像素时， 加载新内容
	// if ($(document).height() - $(this).scrollTop() - $(this).height()<100) {loadMore(); alert(offset);};
	
	//body的高度 
	var topAll = (browser == "Firefox") ? document.documentElement.scrollHeight : document.body.scrollHeight; 
	//卷上去的高度 
	var top_top = document.body.scrollTop || document.documentElement.scrollTop; 
	//控制滚动条次数以及判断是否到达底部 
	if (reset == 0) { 
		result = topAll - top_top; 
		if (result < surplusHeight && offset <= allpages) { 
			setTimeout(loadMore, 500); 
			reset = 1; 
		} 
	} else { 
		setTimeout(function () { reset = 0; }, 1000); 
	}
});
 */

$(".backToTop").live("click", function(){
	loadMore(); 
});

function loadMore()
{
    //if (offset >  allpages)	return false ;
	$.ajax({
		url : sync,
		dataType : 'json',
		type: 'POST', 
		data : {who:usid,taid:taid,keys:keys,offset:offset} ,
		success : function(json)
		{
			if(typeof json == 'object')
			{
				var oProduct, $row, iHeight, iTempHeight, time, content, blogurl, bigimage, smlimage, title ;
				//第一列
				$row = $("#stage li:first") ; 
				//blogs为空 -> 去后台
				if (0 == json.blogs.length)
				{
					/*
					adminurl = json.adminurl ;
					bigimage = json.url + "95F039A2.gif" ;
                    smaimage = json.url + "95F039A2.gif" + "?imageMogr2/thumbnail/200x" ;
					title    = "<a style='color:white;text-decoration:none;' href= '"+adminurl+"' target='_blank' >写文章</a>";
					$item = $('<div><a class="fancybox" data-fancybox-group="gallery" title="'+title+'" href="'+bigimage+'"><img src="'+smaimage+'" border="0" ></a></div>').hide();
					$row.append($item);
					$item.fadeIn();
					*/
					$.jBox.tip("没有更多内容了:(");
					return false; 
				}

				//blogs非空  -> 展示
				for(var i=0, l=json.blogs.length; i<l; i++)
				{
					if (json.blogs[i].image != "" )
					{
						bigimage = json.url + json.blogs[i].image[0] ; 
						smaimage = json.url + json.blogs[i].image[0] + "?imageMogr2/thumbnail/200x" ;
					}
					
					blogurl  = json.blogs[i].blogurl ;
					allpages = json.allpages ;
					time     = json.blogs[i].time ;
					title    = "<a href= '"+blogurl+"' target='_blank' >" + json.blogs[i].title + "</a>";
					content  = json.blogs[i].content ;
					blogtype = json.blogs[i].type;
					vlinkurl = json.blogs[i].videolink;

                    // 找出当前高度最小的列, 新内容添加到该列
					iHeight = -1;
					$('#stage li').each(function(){
						iTempHeight = Number( $(this).height());
						if(iHeight==-1 || iHeight>iTempHeight)
						{
							iHeight = iTempHeight;
							$row = $(this);
						}
					});
					
					if (json.blogs[i].image != "")
					{
						if (blogtype == 2) {
							$item = $('<div><a class="fancybox" data-fancybox-group="gallery" title="" href="'+bigimage+'"><img src="'+smaimage+'" border="0" ></a><span>'+time+"，"+title+'</span></div>').hide();
						}
						if (blogtype == 3) {
							$item = $('<div><a class="mymv" data="'+vlinkurl+'" title="" href="#mymv"><div style="position:absolute;padding:0px;color:#6DB5FF;border:1px solid #6DB5FF;margin-top:1px;margin-left:1px;">视频</div><img src="'+smaimage+'" border="0"></a><span>'+time+"，"+title+'</span></div>').hide();
						}
					} else {
					    $item = $('<div><span>'+time+"，"+title+"，"+content+'</span></div>').hide();
					}
					
					$row.append($item);
					$item.fadeIn();
				}
			}
			offset = offset + 1 ;
		}
	});
}

function getBrowser() { 
	var OsObject = ""; 
	if (navigator.userAgent.indexOf("MSIE") > 0) { 
		return "MSIE"; 
	} 
	if (isFirefox = navigator.userAgent.indexOf("Firefox") > 0) { 
		return "Firefox"; 
	} 
	if (isSafari = navigator.userAgent.indexOf("Safari") > 0) { 
		return "Safari"; 
	} 
	if (isCamino = navigator.userAgent.indexOf("Camino") > 0) { 
		return "Camino"; 
	} 
	if (isMozilla = navigator.userAgent.indexOf("Gecko/") > 0) { 
		return "Gecko"; 
	} 
}