var offset = 1 ;
var reset  = 0 ;
var allpages = 1 ;
var canload = 1;
var surplusHeight = 900 ;
var browser = getBrowser() ;
$(function(){
	loadMore();
	$('#stage').masonry({
	  itemSelector: '.grid-item'
	});
});

$(window).scroll(function(){
	//body height 
	var topAll = (browser == "Firefox") ? document.documentElement.scrollHeight : document.body.scrollHeight; 
	//roll height
	var top_top = document.body.scrollTop || document.documentElement.scrollTop; 
	//roll bar times and judge bottom
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


$(".loadMore").live("click", function(){
	loadMore(); 
});

function getMyColor()
{
	var color = ["#6DB5FF", "#4285F4", "#EA4335", "#FBBC05", "#34A853", "#FABF8F", "#E26B0A", "#DA9694", "#CCC0DA"];
	var index = Math.floor((Math.random()*color.length));
	return color[index];
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

function loadMore()
{
	if (canload == 0) return false;
    if (offset >  allpages)	{return false;}
	$.ajax({
		url : sync,
		dataType : 'json',
		type: 'POST', 
		data : {who:usid,taid:taid,keys:keys,offset:offset} ,
		success : function(json)
		{
			var $item, $container=$("#stage"), iHeight, iTempHeight, time, content, blogurl, bigimage, smlimage, title ; 
			if (0 == json.blogs.length)
			{
				canload = 0;
				$.jBox.tip("没有更多内容了:(");
				return false; 
			}
			for(var i=0, l=json.blogs.length; i<l; i++)
			{
				if (json.blogs[i].image != "" )
				{
					bigimage = json.url + json.blogs[i].image[0] ; 
					smaimage = json.url + json.blogs[i].image[0] + "?imageMogr2/thumbnail/300x" ;
				}
				blogurl  = json.blogs[i].blogurl ;
				allpages = json.allpages ;
				time     = json.blogs[i].time ;
				title    = "<a href= '"+blogurl+"' target='_blank' >" + json.blogs[i].title + "</a>";
				content  = json.blogs[i].content ;
				blogtype = json.blogs[i].type;
				vlinkurl = json.blogs[i].videolink;
				color    = getMyColor();
				
				if (json.blogs[i].image != "")
				{
					if (blogtype == 2) {
						$item = $('<li class="grid-item"><div><a class="fancybox" data-fancybox-group="gallery" title="" href="'+bigimage+'"><img src="'+smaimage+'" class="lazy" border="0" ></a><span>'+time+"，"+title+'</span></div></li>');
					}
					if (blogtype == 3) {
						$item = $('<li class="grid-item"><div><div class="mymv" data="'+vlinkurl+'" style="cursor:pointer;position:absolute;color:'+color+';border:1px solid '+color+';padding:1px;width:25px;height:25px;line-height:25px;text-align:center;border-radius:20px;margin-top:1px;margin-left:1px;">视频</div><a title="" href="'+blogurl+'" target="_blank"><img src="'+smaimage+'" class="lazy" border="0"></a><span>'+time+"，"+title+'</span></div></li>');
					}
				} else {
					$item = $('<li class="grid-item"><div><span>'+time+"，"+title+"，"+content+'</span></div></li>');
				}
				$container.append($item).masonry('appended', $item).imagesLoaded().done(function(instance) {
					$container.masonry({
						itemSelector: '.grid-item',
						transitionDuration: 0,
					})
					canload = 1;
				}).fail( function() {
					canload = 0;
				})
				
			}
			
			offset = offset + 1 ;
			
		}
	});
}

