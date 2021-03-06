<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>

    <div class="gride clearfix">
        <?php $leftHtml = get_left_menu();
        if($leftHtml) {
            echo $leftHtml;
        ?>
        <div class="gride-r fr">
        <?php get_breadcrumbs()?>
            <h1 class="ej-bigtit"><?php echo str_replace('分类：', '', get_the_archive_title())?></h1>
		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '上一页', 'twentysixteen' ),
				'next_text'          => __( '下一页', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        </div>
        <?php } else {?>
            <?php get_breadcrumbs()?>
            <h1 class="ej-bigtit"><?php echo str_replace('分类：', '', get_the_archive_title())?></h1>
            <?php if ( have_posts() ) : ?>

                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_format() );

                    // End the loop.
                endwhile;

                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( '上一页', 'twentysixteen' ),
                    'next_text'          => __( '下一页', 'twentysixteen' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
                ) );

            // If no content, include the "No posts found" template.
            else :
                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        <?php }?>
	</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
