// JavaScript Document
$("document").ready(function(e) {
    /*导航*/
	$(".navbox li").hover(function(){
		$(this).siblings().children(".pop-up").hide();
		$(this).siblings().children("a").removeClass("hover");
		$(this).children(".pop-up").show();
		$(this).children("a").addClass("hover");
		},function(){
			$(this).children(".pop-up").hide();
			$(this).children("a").removeClass("hover");
			});
	$("#show-down").click(function(){
		$(".nav").slideToggle();
		});		
	/*研究方向*/
	$(".yjfx>li>a").hover(function(){
		$(this).parent().siblings().children("a").removeClass("hover");
		$(this).addClass("hover");
		})
	/*切换*/	
	$.jqtab = function(tabtit,tab_conbox,shijian) {
		$(tab_conbox).children("div").hide();
		$(tabtit).children("li:first").addClass("act").show(); 
		$(tab_conbox).children("div:first").show();
	
		$(tabtit).find("li").bind(shijian,function(){
		    $(this).addClass("act").siblings("li").removeClass("act"); 
			var activeindex = $(tabtit).children("li").index(this);
			$(tab_conbox).children().eq(activeindex).show().siblings().hide();
			return false;
		});
	
	};
	/*切换调用方法如下：*/
	$.jqtab("#zytit","#zybox","mouseenter");
});
/*导航吸顶
	$(window).scroll(function(){
		var navtop=$("#header").offset().top;
		var scolltop=$(this).scrollTop();
		if(parseInt(navtop)-parseInt(scolltop)<0){
			$("#nav").addClass("navfix").fadeIn(200);
			$("body").css("padding-top","35px;")
			}else{
			$("#nav").removeClass("navfix");
			$("body").css("padding-top","35px;")
				}
	});*/