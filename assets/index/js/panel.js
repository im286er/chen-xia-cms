$(function(){
    //var $loadMoreTxt = "加载";
	//var $loadMoreEle = $('<div class="loadMore"></div>').appendTo($("body")).text($loadMoreTxt).attr("title", $loadMoreTxt);
	
	var $panelMnuTxt = "标签";
	var $panelMnuEle = $('<div class="panelMnu"></div>').appendTo($("body")).text($panelMnuTxt).attr("title", $panelMnuTxt);
	
	var $backToTopFun = function() {
        var st = $(document).scrollTop(), winh = $(window).height();
		st = 1;
        //(st > 0)? $loadMoreEle.show(): $loadMoreEle.hide();
		(st > 0)? $panelMnuEle.show(): $panelMnuEle.hide();
        //IE6下的定位
        if (!window.XMLHttpRequest) {
            //$loadMoreEle.css("top", st + winh - 166);
			$panelMnuEle.css("top", st + winh - 166);    
        }
    };
    //$(window).bind("scroll", $backToTopFun);
    $(function() { $backToTopFun(); });
	
});