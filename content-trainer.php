
<article id="trainer-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
    <header class="full-size-bar" id="message-01">
        <div class="col-full">
        <h1><?php the_title(); ?></h1>
        <h2><?php
            if (get_field('subheadline')) : echo the_field('subheadline');
            endif;
            ?></h2>
        </div>
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
	'include'  => $thumb_id
	); 

   $thumb_images = get_posts($args);
   foreach ($thumb_images as $thumb_image) {
   echo $thumb_image->post_excerpt;
   }
?>
                </div>
            </aside>
        <?php endif; ?>
        <?php if (get_field('steckbrief')) : ?>
            <div class="post_content">
                <div class="steckbrief">
                    <?php echo the_field('steckbrief'); ?></div>
                    <?php the_content(); ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('conclusion')) : ?>
        <div class="post_content col-full">
            <?php echo the_field('conclusion'); ?></div>
        </div>
        <?php endif; ?>
    </section>
</article>