<?php
/**
 * @package storefront
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
    <header class="full-size-bar" id="message-01">
        <div class="col-full">
            <h1><?php the_title(); ?></h1>
            <h2><?php if (get_field('subheadline')) : echo the_field('subheadline');
endif; ?></h2>
        </div>
    </header>
    <section class="col-full">
        <?php if (has_post_thumbnail()) :?>   
            <aside class="thumbnail">
                <?php the_post_thumbnail(); ?>
                 <?php if (get_field('preis')) : ?>
                    <div class="badge"><?php the_field('preis'); ?></div>
                <?php endif; ?>
            </aside>
        <?php endif; ?>
         
        <div class="post_content"><?php the_content(); ?>

            <?php if (get_field('link') & get_field('linktext')) : ?>
                <a class="button" href="<?php the_field('link') ?>"><?php the_field('linktext') ?></a>
            </div>
            <?php endif; ?>
    </section>
    <?php
    /**
     * @hooked storefront_post_header - 10
     * @hooked storefront_post_meta - 20
     * @hooked storefront_post_content - 30
     */
    #do_action('storefront_single_programme');
    ?>

</article><!-- #post-## -->
