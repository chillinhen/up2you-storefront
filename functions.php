<?php

add_action('after_setup_theme', 'sf_child_theme_setup');

function sf_child_theme_setup() {
    
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 30);
    function theme_enqueue_styles() {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/custom.css', array('parent-style')
        );
        wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans:400,300,300italic,400italic,600,600italic,700,700italic|Cardo:400,400italic,700', 'style', '1.0', 'all', array('custom'));
        wp_enqueue_style('fontawseome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', 'style', '4.4.0', 'all',array('custom'));
    }
    
        add_action('wp_enqueue_scripts', 'theme_enqueue_scripts', 40);
        if (!function_exists("theme_enqueue_scripts")) {
        if (!is_admin()) {

            function theme_enqueue_scripts() {
                //check if mobile
//                if (wp_is_mobile()) {
//                    wp_enqueue_script('responsive', get_stylesheet_directory_uri() . '/library/js/responsive.js', array('jquery'), '1.2', true);
//                }

                wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.2', true);
            }

        }
    }
    
    
    // Additional Hooks
    //TestHook
    
    function remove_storefront_widgets() {
        remove_action('storefront_header', 'storefront_secondary_navigation', 30);
        remove_action('storefront_header', 'storefront_product_search', 30);
        remove_action('storefront_header', 'storefront_header_cart', 60);
        remove_action('storefront_header', 'storefront_site_branding', 20);
        remove_action('storefront_header', 'storefront_primary_navigation', 50);
    }

    add_action('init', 'remove_storefront_widgets', 0);

    //new Order of widgets
    function my_sf_header_widgets_primary() {
        add_action('storefront_my_header_primary', 'storefront_site_branding', 0);
    }
    add_action('init', 'my_sf_header_widgets_primary',5);
    
    function my_sf_header_widgets_left() {
        add_action('storefront_my_header_left', 'storefront_primary_navigation', 10);
    }
    add_action('init', 'my_sf_header_widgets_left',10);



    function my_sf_header_widgets_right() {
        add_action('storefront_my_header_right', 'storefront_header_cart', 0);
        //add_action('storefront_my_header_right', 'storefront_secondary_navigation', 10);
        //add_action('storefront_my_header_right', 'storefront_product_search', 20);
    }
    add_action('init', 'my_sf_header_widgets_right',20);
    
    function my_sf_header_badge() {
        add_action('storefront_my_header_badge', 'storefront_secondary_navigation', 10);
        add_action('storefront_my_header_badge', 'storefront_product_search', 20);
    }
    add_action('init', 'my_sf_header_badge',30);

}

