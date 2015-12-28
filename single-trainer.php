<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
<article id="trainer-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
    <header class="full-size-bar" id="message-01">      
        <h1><?php the_title(); ?></h1>
        <h2><?php
            if (get_field('subheadline')) : echo the_field('subheadline');
            endif;
            ?></h2>
    </header>
    <section class="col-full">

        <?php if (has_post_thumbnail()) : ?>
            <aside class="thumbnail">
                <?php the_post_thumbnail(); ?>
                <div class="thumbnail-caption">
                    <!-- Todo make a hook/action -->
                    <?php
                    $thumb_id = get_post_thumbnail_id($post->id);
                    $args = array(
                        'post_type' => 'attachment',
                        'post_status' => null,
                        'post_parent' => $post->ID,
                        'include' => $thumb_id
                    );

                    $thumb_images = get_posts($args);
                    foreach ($thumb_images as $thumb_image) {
                        echo $thumb_image->post_excerpt;
                    }
                    ?>
                </div>
            </aside>
        <?php endif; ?>
        <div class="post_content">
            <?php
            if (get_field('steckbrief')) : echo the_field('steckbrief'); ?>
                    <a class="toggle-button" title="mehr lesen "role="button" data-toggle="collapse" href="#trainer-content-<?php the_ID(); ?>" aria-expanded="false" aria-controls="trainer-content-<?php the_ID(); ?>"></a>
            <div class="collapse" id="trainer-content-<?php the_ID(); ?>">
                <?php the_content(); ?>
            </div>
            <?php endif; ?>
            
        </div>        
    </section>
</article>
<?php endwhile; // end of the loop.   ?>
<?php do_action('storefront_sidebar'); ?>
<?php get_footer(); ?>