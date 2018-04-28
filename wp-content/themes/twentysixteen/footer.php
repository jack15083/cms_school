<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$bottom_items = [];
if ( has_nav_menu( 'social' ) ) {
    $locations    = get_nav_menu_locations();
    $center_menus = wp_get_nav_menu_object( $locations['social'] );
    $bottom_items =  wp_get_nav_menu_items($center_menus);
}

$friend_items = [];
if ( has_nav_menu( 'friend_link' ) ) {
    $locations    = get_nav_menu_locations();
    $center_menus = wp_get_nav_menu_object( $locations['friend_link'] );
    $friend_items =  wp_get_nav_menu_items($center_menus);
}

?>

<?php wp_footer(); ?>
<div class="footer">
    <div class="footer-con">
        <div class="footer-con-l fl">
            <div class="foot-lj">
                <?php foreach ($bottom_items as $key => $item) {?>
                <A href="<?php echo $item->url?>"><?php echo $item->title?></A>
                    <?php if(($key + 1) != count($bottom_items)) {?>
                <span>|</span>
                <?php }}?>
            </div>
            <div class="foot-conect">

                <P class="c-name">郑州大学化学实险中心</P>
                <P class="clearfix">电话：0371-67780037  传真：0371-67780037</P>
                <P class="clearfix">电子邮件：ecc@zzu.edu.cn</P>
                <P class="clearfix"> 地址：郑州市科学大道100号</P></div>
        </div>
        <div class="footer-con-r fr">
            <div class="flink clearfix">
                <div class="flink-l fl">友情链接：</div>
                <div class="flink-r fr">
                    <script language="Javascript">function MM_o(selObj) {
                            window.open(selObj.options[selObj.selectedIndex].value);
                        }</script>
                    <select name="select" onchange="MM_o(this)">
                        <OPTION value="">选择友情链接地址</OPTION>
                        <?php foreach ($friend_items as $key => $item) {?>
                        <OPTION value="<?php echo $item->url?>"><?php echo $item->title?></OPTION>
                        <?php }?>
                    </select>
                </div>
            </div>
            <P class="cright mt-10">Copyright © 2018郑州大学化学实险中心. All Rights Reserved</P>
        </div>
    </div>
</div>
<!--底部 end-->
</body>
</html>
