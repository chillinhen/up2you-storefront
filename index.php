<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header(); ?>
<?php
/**
 * @hooked storefront_header_widget_region - 10
 */
do_action('storefront_before_content');
?>
<div id="content" class="site-content" tabindex="-1">
    
        <main id="main" class="site-main" role="main">
            <div class="col-full">
                <div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<?php get_template_part( 'loop' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
            </div>
        </main>
</div>
<?php do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>
