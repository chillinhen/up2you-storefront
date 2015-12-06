<article id="thumb-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
    <header>
        <?php
        if (has_post_thumbnail()) :
            the_post_thumbnail();
        endif;
        ?>
        <h3 class="badge">
            <a href="<?php the_permalink();?>">
                <?php the_title() ?>
            </a>
        </h3>
    </header>
    <section>
        
        <?php
        $excerpt = get_field("auszug");
        if ($excerpt) : ?>
        <div class="excerpt"><?php echo $excerpt;?></div>
        <?php endif;?>
            
    </section>
</article>