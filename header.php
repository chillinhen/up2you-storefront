<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header">
            <div class="col-full">
                <div class="col_primary">
                    <?php
                    /* @hooked storefront_skip_links - 0
                     */
                    do_action('storefront_header');
                    ?>
                    <?php
                    /* @hooked storefront_sitebranding - 0 */
                    do_action('storefront_my_header_primary');
                    ?>
                </div>
                <!-- left side -->
                 <?php
                    /* @hooked storefront_skip_links - 0 */
                    do_action('storefront_my_header_left');
                    ?>
                <!-- right side -->
                 <?php
                    /*
                     * @hooked storefront_product_search - 40
                     * @hooked storefront_secondary_navigation - 50
                     * @hooked storefront_header_cart - 60 */
                    do_action('storefront_my_header_right');
                 ?>
                <div class="site-header-badge">
                 <?php
                    /*
                     * @hooked storefront_product_search - 40
                     * @hooked storefront_secondary_navigation - 50 */
                    do_action('storefront_my_header_badge');
                 ?>
                </div>
                
                
            </div>
	</header><!-- #masthead -->
        <div id="banner" class="site-banner" role="banner" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');"'; } ?>>
            <div class="col-full">
                Wunschgewicht verloren! 
            </div>
        </div>

	<?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' ); ?>
