<?php
/**
 * @package storefront
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
   
    <section class="col-full">
   
         
        <div class="post_content">
            
            <?php the_content(); ?>
           
            
        
        <!-- begin custom related loop, isa -->
 

 
 
<!-- end custom related loop, isa -->
        
        
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
