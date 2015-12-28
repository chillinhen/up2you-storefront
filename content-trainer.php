<article id="trainer-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

    <section class="col-full">
        <?php if (has_post_thumbnail()) : ?>
            <aside class="thumbnail">
                <?php the_post_thumbnail(); ?>
            </aside>
        <?php endif; ?>
        <div class="post_content"> 
            <header>      
                <h1><?php the_title(); ?></h1>
                <h2><?php
                    if (get_field('subheadline')) : echo the_field('subheadline');
                    endif;
                    ?>
                </h2>
            </header>
            <?php the_content(); ?>
        </div>        
    </section>
</article>