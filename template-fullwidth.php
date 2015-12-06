<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package storefront
 */
get_header();
?>

<?php
/**
 * @hooked storefront_header_widget_region - 10
 */
do_action('storefront_before_content');
?>
<div id="content" class="site-content" tabindex="-1">
    <?php get_template_part('partials/message', 'first'); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="col-full">
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    do_action('storefront_page_before');
                    ?>

                    <?php get_template_part('content', 'page'); ?>

                    <?php
                    /**
                     * @hooked storefront_display_comments - 10
                     */
                    do_action('storefront_page_after');
                    ?>


                <?php endwhile; // end of the loop. ?>

            </div>
        </main><!-- #main -->
    </div><!-- #primary --> 
</div>
<?php get_template_part('partials/message', 'second'); ?>
</div><!-- #content -->
<?php get_footer(); ?>
