<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
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

    <div class="col-full">
        <?php
        /**
         * @hooked woocommerce_breadcrumb - 10
         */
        do_action('storefront_content_top');
        ?>
        <div id="primary" class="content-area">
            <div class="thumbnails">
                <!-- Thumbnails -->
                <?php
                $argsMain = array(
                    'post_type' => 'programme',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );
                ?>
                <?php
                $firstQuery = new WP_Query($argsMain);
                if ($firstQuery->have_posts()): while ($firstQuery->have_posts()) : $firstQuery->the_post();
                        ?>
                        <?php get_template_part('partials/panels'); ?>
                        <?php
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </div>
        </div><!-- #primary -->
    </div><!-- .col-full -->
    <?php get_template_part('partials/message', 'second'); ?>
    
    <main id="story" class="" role="main">
        <div class="col-full">
            <?php while (have_posts()) : the_post();
                the_content();
            endwhile; ?>
        </div>
    </main>
    <?php get_template_part('partials/parallax');?>

</div><!-- #content -->
<?php get_footer(); ?>
