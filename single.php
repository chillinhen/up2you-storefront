<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <div id="primary" class="content-area">
        <?php
            if (is_singular('programme')) :
            get_template_part('content', 'programme');

        elseif ( is_singular( 'erfolgsstories' ) ) :
            get_template_part('content', 'erfolgsstories');
        elseif ( is_singular( 'trainer' ) ) :
            get_template_part('content', 'trainer');
        else : ?>
            <main id="main" class="site-main" role="main">
                <?php
                do_action('storefront_single_post_before');

                get_template_part('content', 'single');

                /**
                 * @hooked storefront_post_nav - 10
                 * @hooked storefront_display_comments - 20
                 */
                do_action('storefront_single_post_after');
                ?>
            </main><!-- #main -->
            <?php endif; ?>


        
    </div><!-- #primary -->
<?php endwhile; // end of the loop.   ?>

<?php do_action('storefront_sidebar'); ?>
<?php get_footer(); ?>
