<?php
$center_items = [];
if ( has_nav_menu( 'index' ) ) {
    $locations    = get_nav_menu_locations();
    $center_menus = wp_get_nav_menu_object( $locations['index'] );
    $center_items =  wp_get_nav_menu_items($center_menus);
}

$total_items = count($center_items);

?>
<div class="index-bg">
    <div class="index-box clearfix">
        <div class="index-box-l fl">
            <?php foreach ($center_items as $key => $item) {
                if($item->object != 'category') {
                    continue;
                }

                if(($key + 1) % 2 == 1 && ($key+1) != $total_items) {
                    $posts = wp_get_recent_posts(['category' => $item->object_id, 'numberposts' => 9]);
                    $first_post = array_shift($posts);
                    //print_r($first_post);die();
                    $first_post_image = get_the_post_thumbnail_url($first_post['ID'], 'large');
                    ?>
                    <!--新闻begin-->
                    <div class="box newbox">
                        <h2 class="bt">
                            <a href="<?php echo $item->url;?>">MORE &gt;</a>
                            <span><?php echo $item->title;?></span></h2>
                        <div class="box-con">
                            <div class="first-new clearfix">
                                <div class="first-new-l fl">
                                    <a href="<?php echo $first_post['guid']?>">
                                        <img src="<?php echo $first_post_image?>"></a>
                                </div>
                                <div class="first-new-r fr">
                                    <h3>
                                        <a href="<?php echo $first_post['guid']?>"><?php echo $first_post['post_title']?></a></h3>
                                    <P><?php echo mb_substr(strip_tags($first_post['post_content']), 0, 80)?> ...</P>
                                    <P class="more-box">
                                        <a class="more" href="<?php echo $first_post['guid']?>">更多</a></P>
                                </div>
                            </div>
                            <ul class="list-50 mt-10">
                                <?php foreach ($posts as $post) {?>
                                <li>
                                    <span class="data"><?php echo substr($post['post_date'], 0, 10)?></span>
                                    <a href="<?php echo $post['guid']?>"><?php echo $post['post_title']?></a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!--新闻end-->
                <?php } ?>

            <?php }?>

        </div>
        <div class="index-box-r fr">

            <?php
            foreach ($center_items as $key => $item) {
                if($item->object != 'category') {
                    continue;
                }

                if(($key + 1) % 2 == 0) {
                    $posts = wp_get_recent_posts(['category' => $item->object_id, 'numberposts' => 5]);

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
                                <div class="tx fl">
                                    <a href="<?php echo $post['guid']?>">
                                        <img width="70" height="82" src="<?php echo $post_image?>"></a>
                                </div>
                                <div class="info fr">
                                    <P class="tit">
                                        <a href="<?php echo $post['guid']?>"><?php echo str_replace(' ', '<br/>', $post['post_title'])?></a></P>
                                    <P class="time"><?php echo substr($post['post_date'], 0, 10)?></P></div>
                            </li>
                            <?php }?>

                        </ul>
                    </div>
                    <div class="i-ad">
                        <a href="http://www.tsinghua.edu.cn/publish/ess/10533/index.html">
                            <img src="http://www.tsinghua.edu.cn/publish/ess/images/index_25.jpg"></a>
                    </div>
                </div>

            <?php }}?>

        </div>

    </div>
    <?php if($total_items % 2 == 1 ) {
        $item = array_pop($center_items);
        $posts = wp_get_recent_posts(['category' => $item->object_id, 'numberposts' => 2]);
        $first_post = array_shift($posts);
        $last_post = $posts[0];
        $first_post_image = get_the_post_thumbnail_url($first_post['ID'], 'large');
        $last_post_image = get_the_post_thumbnail_url($last_post['ID'], 'large');
    ?>
    <div class="index-box" style="margin-top:-40px;">
        <div class="i-xsgz  mt-45">
            <h2 class="bt">
                <a href="http://www.tsinghua.edu.cn/publish/ess/8911/index.html">MORE &gt;</a>
                <span>学生工作</span></h2>
            <div class="box-con clearfix">
                <div class="sxgz-l fl">
                    <a class="tj" href="<?php echo $first_post['guid']?>">
                        <IMG src="<?php echo $first_post_image?> ">
                        <P class="title"><?php echo $first_post['post_title']?></P></a>
                    <ul class="list-50 mt-10"></ul>
                </div>
                <div class="sxgz-r fr">
                    <div class="ky-new-t">
                        <a href="<?php echo $last_post['guid']?>">
                            <img src="<?php echo $last_post_image?>"></a>
                    </div>
                    <div class="ky-new-b">
                        <h3>
                            <a href="<?php echo $last_post['guid']?>"><?php echo $last_post['post_title']?></a></h3>
                        <P> <?php echo mb_substr(strip_tags($last_post['post_content']), 0, 80)?> ...</P>
                        <P class="more-box">
                            <a class="more" href="<?php echo $last_post['guid']?>">更多</a></P>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<!--底部 begin-->