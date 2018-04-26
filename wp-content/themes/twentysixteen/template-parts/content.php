<?php
global $wp_query;
$image = get_the_post_thumbnail_url(get_the_ID(), 'large');
if(in_array($wp_query->query['current_menu']['title'], ['仪器设备', ['科研']])) {?>
<ul class="list-yjsgzz mt-10 clearfix">
    <li>
        <a href="<?php echo esc_url( get_permalink() )?>">
            <div class="list-yjsgzz-pic"><img src="<?php echo $image?>" width="424" height="190" alt=""><div class="bg"></div><h2><?php the_title()?></h2></div>
            <div class="list-yjsgzz-con">
                <div class="lyc-l">介绍</div>
                <div class="lyc-r">
                    <p class="lcc"><?php echo mb_substr(strip_tags(get_the_content()), 0, 30)?>...</p>
                    <p class="lcm">MORE&gt;</p>
                </div>
            </div>
        </a>
    </li>
</ul>
<?php } else {?>
<ul class="list-ej mt-10">
    <li><span class="data"><?php echo get_the_date()?></span><a href="<?php echo esc_url( get_permalink() )?>"><?php the_title()?></a></li>
</ul>
<?php } ?>


