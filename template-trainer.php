<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * Template name: Trainer
 *
 * @package storefront
 *
 */
get_header();
?>
<div id="content" class="site-content" tabindex="-1">
    <header class="full-size-bar" id="message-01">
        <h1><?php the_title(); ?></h1>
        <h2><?php
            if (get_field('subheadline')) : echo the_field('subheadline');
            endif;
            ?></h2>
    </header>
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-full">
                <div id="primary" class="content-area">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <!-- Trainer Thumbns -->
        <?php
        $filter = array(
            'post_type' => 'trainer',
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
                get_template_part('content', 'trainer');
                
                endwhile; wp_reset_query(); ?>
        <?php else : ?>

            <?php get_template_part('content', 'none'); ?>

        <?php endif; ?>
            <?php if (get_field('conclusion')) : ?>
            <div class="col-full">
            <?php echo the_field('conclusion'); ?>
            </div>
<?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>