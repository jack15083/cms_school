<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
show_admin_bar( false );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> style="">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/jquery.flexslider-min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        // JavaScript Document
        $("document").ready(function() {
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
            $(".flexslider").flexslider();
        });
    </script>

</head>

<body <?php body_class(); ?> style="background: #f6f6f6;">
<div class="header clearfix">
    <div class="header-bar clearfix">
        <div class="toenglish fr">

            <a style="margin-left: 10px;" href="<?php echo esc_url( admin_url( '/' ) ); ?>" target="_blank">办公入口</a></div>
        <div class="top-search fr clearfix">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="top-s fl">
                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                </div>
                <div class="top-tj fl">
                    <input class="top-sub" type="submit" value="在线搜索">
                </div>
            </form>

        </div>
    </div>

    <div class="header-box clearfix">
        <div class="logo fl">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img width="100%" src="<?php echo get_stylesheet_directory_uri()?>/images/logo.png"></a></div>
        <div class="nav fr">
            <ul class="navbox">
                <?php

                    $menu_items = get_menu_items_by_location('primary');
                    foreach ($menu_items as $item) {?>
                <li>
                    <a class="<?php echo $item['menu_act_class']?>" href="<?php echo $item['url']?>"><?php echo $item['title']?></a>
                    <ul class="pop-up">
                        <?php foreach ($item['child'] as $item1) {?>
                        <li><a class="" href="<?php echo $item1['url']?>"><?php echo $item1['title']?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</div>
<!--头部 end-->
<?php

 if(is_home()) {
     $content = do_shortcode("[huge_it_slider id='1']");
     preg_match_all('/<a href\="(.*?)".*?>\s+<img\s+id\="huge.*?src\="(.*?)"\s+alt\="(.*?)"\s+.*?\/>/is', $content, $matches);

 ?>
<!-- 轮播 开始 -->
<div class="flexslider">
    <ul class="slides">
        <?php foreach ($matches[1] as $key=>$url) {?>
        <li>
            <a href="<?php echo $url?>" target="_blank">
                <img src="<?php echo $matches[2][$key]?>"></a>
            <div class="show_text">
                <h4>
                    <a href="<?php echo $url?>"><?php echo $matches[3][$key]?></a></h4>
            </div>
        </li>
        <?php }?>
    </ul>
</div>
<!-- 轮播 结束 -->
<?php } else {
$content = do_shortcode("[huge_it_slider id='2']");
preg_match_all('/<a href\="(.*?)".*?>\s+<img\s+id\="huge.*?src\="(.*?)"\s+alt\="(.*?)"\s+.*?\/>/is', $content, $matches);
preg_match_all('/<div class="huge_it_slideshow_description_text_\d\s+".*?>(.*?)<\/div>/is', $content, $matches1);
     ?>
<div class="banner" style="background-image: url(<?php echo $matches[2][0]?>)">
    <div class="banner-box">
        <div class="con">
            <h4><?php echo $matches[3][0]?></h4>
            <p class="clearfix"><?php echo str_replace("\n", '<br/>', $matches1[1][0])?></p>
        </div>
    </div>

</div>
<?php }
