<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_left_menu();
?>
<div class="gride-r fr">
    <?php get_breadcrumbs()?>
    <?php the_title( '<h1 class="ej-bigtit">', '</h1>' ); ?>
    <div class="about mt-45"><?php the_content();?></div>

</div>
