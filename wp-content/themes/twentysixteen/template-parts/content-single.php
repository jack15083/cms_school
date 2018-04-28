<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$leftHtml = get_left_menu();
if($leftHtml) {
?>
    <!--右侧开始-->
    <div class="gride-r fr">
        <?php get_breadcrumbs()?>
        <?php the_title( '<h1 class="ej-bigtit">', '</h1>' ); ?>
        <div class="about mt-45"><?php the_content();?></div>
        <?php

        // If comments are open or we have at least one comment, load up the comment template.
        /*if ( comments_open() || get_comments_number() ) {
            comments_template();
        }*/

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '下一篇', 'twentysixteen' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '上一篇', 'twentysixteen' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
        ?>
    </div>
<!--右侧结束-->
<?php } else {?>
    <?php get_breadcrumbs()?>
    <?php the_title( '<h1 class="ej-bigtit">', '</h1>' ); ?>
    <div class="about mt-45"><?php the_content();?></div>
    <?php

    // If comments are open or we have at least one comment, load up the comment template.
    /*if ( comments_open() || get_comments_number() ) {
        comments_template();
    }*/

    if ( is_singular( 'attachment' ) ) {
        // Parent post navigation.
        the_post_navigation( array(
            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
        ) );
    } elseif ( is_singular( 'post' ) ) {
        // Previous/next post navigation.
        the_post_navigation( array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '下一篇', 'twentysixteen' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
                '<span class="post-title">%title</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '上一篇', 'twentysixteen' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
                '<span class="post-title">%title</span>',
        ) );
    }
    ?>
<?php }?>


