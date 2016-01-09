<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
    <header class="full-size-bar" id="message-01">
        <div class="col-full">
            <h1><?php the_title(); ?></h1>
            <h2><?php
                if (get_field('subheadline')) : echo the_field('subheadline');
                endif;
                ?></h2>
        </div>
    </header>
    <section class="col-full top-fold">
        <?php if (has_post_thumbnail()) : ?>   
            <aside class="thumbnail">
                <?php the_post_thumbnail(); ?>
            </aside>
        <?php endif; ?>
        <div class="post_content">
            <?php the_content(); ?>
        </div>
        <?php if (get_field('preis')) : ?>
            <div class="badge"><?php the_field('preis'); ?></div>
        <?php endif; ?>
    </section>
    <section class="col-full bottom-fold">
        <?php if (get_field('checklist')) : ?>
            <div class="check-list">
                <?php the_field('checklist'); ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('motivationlist')) : ?>
            <div class="motivation-list">
                <?php the_field('motivationlist'); ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('shoppinglist')) : ?>
            <div class="shopping-list">
                <?php the_field('shoppinglist'); ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('link') & get_field('linktext')) : ?>
        <div class="cta-link">   <a class="button" href="<?php the_field('link') ?>"><?php the_field('linktext') ?></a></div>
        <?php endif; ?>


        <?php
        $args = array(
            'post_type' => 'programme',
            'post_status' => 'publish',
            'posts_per_page' => 2, // you may edit this number
            'orderby' => 'rand',
            'post__not_in' => array($post->ID),
        );
        $related_items = new WP_Query($args);
// loop over query
        if ($related_items->have_posts()) : ?>
        <h2 align="center">Oder wähle ein anderes Programm:</h2>
        <div class="related">
            <?php while ($related_items->have_posts()) : $related_items->the_post();
                ?>
              <div class="related_post">
                <?php if (has_post_thumbnail()) : ?>   
                <div class="thumb">
                        <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
                  <div class="content">
                    <h3>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>
                    <?php if (get_field('subheadline')) : ?>
                        <span><?php echo the_field('subheadline');?></span>
               <?php  endif; ?>
                    </a></h3>
                  </div>
                  </div>
                <?php
            endwhile;?>
          
                 </div>
       <?php  endif;
// Reset Post Data
        wp_reset_postdata();
        ?>
    </section>
</article>