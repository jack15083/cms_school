<?php
$center_items = [];
if ( has_nav_menu( 'index' ) ) {
    $locations    = get_nav_menu_locations();
    $center_menus = wp_get_nav_menu_object( $locations['index'] );
    $center_items =  wp_get_nav_menu_items($center_menus);
}

$total_items = count($center_items);

?>

    <div class="index-box clearfix">
        <div class="index-box-l fl">
            <?php foreach ($center_items as $key => $item) {

                if(($key + 1) % 2 == 1 && ($key+1) != $total_items) {
                    if ($item->object == 'category') {
                        $posts = wp_get_recent_posts(['category' => $item->object_id, 'numberposts' => 9]);
                        $first_post = array_shift($posts);
                        $first_post_image = get_the_post_thumbnail_url($first_post['ID'], 'large');
                        ?>
                        <!--新闻begin-->
                        <div class="box newbox">
                            <h2 class="bt">
                                <a href="<?php echo $item->url; ?>">MORE &gt;</a>
                                <span><?php echo $item->title; ?></span></h2>
                            <div class="box-con">
                                <div class="first-new clearfix">
                                    <div class="first-new-l fl">
                                        <a href="<?php echo $first_post['guid'] ?>">
                                            <img src="<?php echo $first_post_image ?>"></a>
                                    </div>
                                    <div class="first-new-r fr">
                                        <h3>
                                            <a href="<?php echo $first_post['guid'] ?>"><?php echo $first_post['post_title'] ?></a>
                                        </h3>
                                        <P><?php echo mb_substr(strip_tags($first_post['post_content']), 0, 80) ?>
                                            ...</P>
                                        <P class="more-box">
                                            <a class="more" href="<?php echo $first_post['guid'] ?>">更多</a></P>
                                    </div>
                                </div>
                                <ul class="list-50 mt-10">
                                    <?php foreach ($posts as $post) { ?>
                                        <li>
                                            <span class="data"><?php echo substr($post['post_date'], 0, 10) ?></span>
                                            <a href="<?php echo $post['guid'] ?>"><?php echo $post['post_title'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!--新闻end-->
                    <?php }  else if ($item->object == 'page') {
                        global $pages, $page;
                        $post = get_post($item->object_id);
                        $page = 1;
                        $pages[0] = $post->post_content;
                        ?>
                    <div class="box newbox">
                        <h2 class="bt">
                            <a href="<?php echo $post->guid; ?>">MORE &gt;</a>
                            <span><?php echo $post->post_title; ?></span></h2>
                        <div class="box-con"><?php the_content() ?></div>
                    </div>
                <?php
                    }
                }
                ?>

            <?php }?>

        </div>
        <div class="index-box-r fr">

            <?php
            foreach ($center_items as $key => $item) {

                if(($key + 1) % 2 == 0) {
                    if($item->object == 'category') {
                    $posts = wp_get_recent_posts(['category' => $item->object_id, 'numberposts' => 10]);

                ?>

                <div class="box">
                    <h2 class="bt">
                        <a href="<?php echo $item->url;?>">MORE &gt;</a>
                        <span><?php echo $item->title;?></span></h2>
                    <div class="box-con">
                        <ul class="i-zjlt">
                            <?php foreach ($posts as $post) {
                                $post_image = get_the_post_thumbnail_url($post['ID'], 'large');
                                ?>
                            <li class="clearfix">
                                <!--<div class="tx fl">
                                    <a href="<?php /*echo $post['guid']*/?>">
                                        <img width="70" height="82" src="<?php /*echo $post_image*/?>"></a>
                                </div>-->
                                <!--<div class="info ">-->
                                    <P class="tit">
                                        <a href="<?php echo $post['guid']?>"><?php echo $post['post_title']?></a></P>
                                    <P class="time"><?php echo substr($post['post_date'], 0, 10)?></P>
                                <!--</div>-->

                            </li>
                            <?php }?>

                        </ul>
                    </div>
                    <!--<div class="i-ad">
                        <a href="http://www.tsinghua.edu.cn/publish/ess/10533/index.html">
                            <img src="http://www.tsinghua.edu.cn/publish/ess/images/index_25.jpg"></a>
                    </div>-->
                </div>

            <?php } elseif($item->object === 'custom') {
                        $menu_items = get_menu_items_by_location('normal');
                        ?>
            <div class="box">
                <h2 class="bt">
                    <!--<a href="<?php /*echo $item->url;*/?>">MORE &gt;</a>-->
                    <span><?php echo $item->title;?></span></h2>
                <div class="box-con box-custom">
                    <ul class="yjfx  clearfix">
                        <?php
                        $key1 = 0;
                        foreach ($menu_items as $menu) {
                            $hover = '';
                            if($key1 == 0) {
                                $hover = 'hover';
                            }
                            $key1++;
                            ?>
                            <li><a href="<?php echo $menu['url']?>" style="background-image:url(<?php echo get_stylesheet_directory_uri()?>/images/fx_0<?php echo ($key1%4 + 1)?>.jpg);" class="<?php echo $hover?>"><span><?php echo $menu['title']?></span></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>

            <?php }}}?>

        </div>

    </div>
    <?php if($total_items % 2 == 1 ) {
        $item = array_pop($center_items);
        $posts = wp_get_recent_posts(['category' => $item->object_id, 'numberposts' => 4]);
    ?>
    <div class="index-box" style="margin-top:-40px;">
        <div class="i-xsgz  mt-45">
            <h2 class="bt">
                <a href="<?php echo $item->url;?>">MORE &gt;</a>
                <span><?php echo $item->title;?></span></h2>
            <div class="box-con clearfix">
                <?php foreach ($posts as $post) {?>
                <div class="box-con-left">
                    <div class="ky-new-t">
                        <a href="<?php echo $post['guid']?>">
                            <img src="<?php echo get_the_post_thumbnail_url($post['ID'], 'large');?>"></a>
                    </div>
                    <div class="ky-new-b">
                        <h3>
                            <a href="<?php echo $post['guid']?>"><?php echo $post['post_title']?></a></h3>
                        <P> <?php echo mb_substr(strip_tags($post['post_content']), 0, 30)?> ...</P>

                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
