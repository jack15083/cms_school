<?php
global $wp_query;
$image = get_the_post_thumbnail_url(get_the_ID(), 'large');
if(in_array($wp_query->query['current_menu']['title'], ['仪器设备', ['科研']])) {?>
    <div class="box-con-left">
        <div class="ky-new-t">
            <a href="<?php echo esc_url( get_permalink() )?>">
                <img src="<?php  echo $image?>"></a>
        </div>
        <div class="ky-new-b">
            <h3>
                <a href="<?php echo esc_url( get_permalink() )?>"><?php the_title()?></a></h3>
            <P> <?php echo mb_substr(strip_tags(get_the_content()), 0, 30)?>...</P>

        </div>
    </div>

<?php } else {?>
<ul class="list-ej mt-10">
    <li><span class="data"><?php echo get_the_date()?></span><a href="<?php echo esc_url( get_permalink() )?>"><?php the_title()?></a></li>
</ul>
<?php } ?>


