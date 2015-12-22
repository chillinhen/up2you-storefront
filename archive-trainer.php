<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 *
 */

get_header(); ?>
<?php get_template_part('partials/message', 'first'); ?>
<div id="content" class="site-content" tabindex="-1">
    
        <main id="main" class="site-main" role="main">
            <div class="col-full">
                <div id="primary" class="content-area">
                <?php 
                    $filter = array(
                        'post_type'         => 'trainer',
                        'post_status'       => 'publish',
                        'posts_per_page'    => 5,
                        'orderby'           => 'date',
                        'order'             => 'DESC' 
                    );
                    $stories = new WP_Query($filter);
                ?>
		<?php if ( $stories->have_posts() ) : ?>

<!--			<header class="page-header">
				<h1 class="page-title">
					<?php #the_archive_title(); ?>
				</h1>

				<?php #the_archive_description(); ?>
			</header> .page-header -->

                            <?php
                            do_action('storefront_loop_before');

                            while ($stories->have_posts()) : $stories->the_post();

                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('content', 'stories');

                            endwhile;

                            /**
                             * @hooked storefront_paging_nav - 10
                             */
                            do_action('storefront_loop_after');
                            ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
                        
                </div>
                <?php do_action( 'storefront_sidebar' ); ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
