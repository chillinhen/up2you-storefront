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
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <?php do_action('storefront_before_header'); ?>

            <header id="masthead" class="site-header">
                <div class="col-full">

                    <div class="col-left nav"><?php do_action('storefront_child_nav'); ?></div>
                    <div class="col-center branding"><?php do_action('storefront_child_branding'); ?></div>
                    <div class="col-right">     
                        <?php do_action( 'storefront_child_cart' );?>
                        <?php do_action( 'storefront_child_meta' );?>
                    </div>


                </div>
            </header><!-- #masthead -->


