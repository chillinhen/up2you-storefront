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

    <main id="main" class="site-main" role="main">
        <div class="col-full">
            <div id="primary" class="content-area">
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    do_action('storefront_page_before');
                    ?>

                    <?php get_template_part('content', 'page'); ?>
                    <hr>
                    <?php
                    $parent = $post->ID;
                    $filter = array(
                        'post_type' => 'page',
                        'post_parent' => $parent,
                        'posts_per_page' => -1,
                        'post_status' => array('publish'),
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    );
                    $childLoop = new WP_Query($filter);
                    if ($childLoop->have_posts()) : while ($childLoop->have_posts()) : $childLoop->the_post();
                            ?>
                            <?php the_title(); ?>
                            <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    <?php endif; ?>
                    <?php
                    /**
                     * @hooked storefront_display_comments - 10
                     */
                    do_action('storefront_page_after');
                    ?>


                <?php endwhile; // end of the loop. ?>
            </div>
            <?php do_action('storefront_sidebar'); ?>

    </main><!-- #main -->
</div><!-- #primary --> 
</div>
<?php get_template_part('partials/message', 'second'); ?>
</div><!-- #content -->
<?php get_footer(); ?>
