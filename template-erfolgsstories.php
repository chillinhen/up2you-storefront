<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * Template name: Erfolgsstories
 *
 * @package storefront
 *
 */
get_header();
?>
<div id="content" class="site-content" tabindex="-1">
    <header class="full-size-bar" id="message-01">
        <h1><?php the_title(); ?></h1>
    </header>
    <main id="main" class="site-main" role="main">
        <!-- Trainer Thumbns -->
        <?php
        $filter = array(
            'post_type' => 'erfolgsstories',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $trainer = new WP_Query($filter);
        ?>
        <?php if ($trainer->have_posts()) : ?>
            <?php
            do_action('storefront_loop_before');

            while ($trainer->have_posts()) : $trainer->the_post();
                get_template_part('content', 'erfolgsstories');
                
                endwhile; wp_reset_query(); ?>
        <?php else : ?>

            <?php get_template_part('content', 'none'); ?>

        <?php endif; ?>
        <!-- Eigentlicher Post -->
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-full">
                <div id="primary" class="content-area check-list">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php
            do_action('storefront_loop_after');?>
    </main>
    
</div>

<?php get_footer(); ?>