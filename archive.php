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

<div id="content" class="site-content" tabindex="-1">
    
        <main id="main" class="site-main" role="main">
            <div class="col-full">
                <div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php the_archive_title(); ?>
				</h1>

				<?php the_archive_description(); ?>
			</header><!-- .page-header -->

			<?php get_template_part( 'loop' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
                        
                </div>
                <?php do_action( 'storefront_sidebar' ); ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
