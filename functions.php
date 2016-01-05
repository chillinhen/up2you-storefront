<?php
add_action('after_setup_theme', 'sf_child_theme_setup');

function sf_child_theme_setup() {
        // Add Translation Option
    load_theme_textdomain('storefront', get_template_directory() . '/languages');

    $locale = get_locale();
    $locale_file = get_stylesheet_directory_uri() . "/languages/$locale.php";
    //init styles
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 30);
    if (!function_exists("theme_enqueue_styles")) {
        if (!is_admin()) {

            function theme_enqueue_styles() {
                wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');              //wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/bower_components/bootstrap/css/bootstrap.css');
                wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/screen.css', array('parent-style')
                );
                wp_dequeue_style( 'storefront-woocommerce-style', get_template_directory_uri() . '/inc/woocommerce/css/woocommerce.css', $storefront_version );
                 wp_enqueue_style( 'storefront-woocommerce-child-style', get_stylesheet_directory_uri() . '/inc/woocommerce/css/woocommerce.css', array('child-style') );
                wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Josefin+Slab:400,300italic,300,400italic,600,700,600italic,700italic|Josefin+Sans:400,600,400italic,600italic,700,700italic|Merriweather:400,300,300italic,700,400italic,700italic|Schoolbell', 'style', '1.0', 'all', array('child-style'));
                wp_enqueue_style('fontawseome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', 'style', '4.4.0', 'all', array('child-style'));
            }

        }
    }

    //init scripts
    add_action('wp_enqueue_scripts', 'theme_enqueue_scripts', 40);
    if (!function_exists("theme_enqueue_scripts")) {
        if (!is_admin()) {

            function theme_enqueue_scripts() {
                //wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bower_components/bootstrap/js/bootstrap.js');
                wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.2', true);
            }

        }
    }  

//remove some parent actions
// Header    
remove_action( 'storefront_header', 'storefront_skip_links',                    0 );
remove_action( 'storefront_header', 'storefront_social_icons',			10 );
remove_action( 'storefront_header', 'storefront_site_branding',			20 );
remove_action( 'storefront_header', 'storefront_secondary_navigation',		30 );
remove_action( 'storefront_header', 'storefront_product_search',		40 );
remove_action( 'storefront_header', 'storefront_primary_navigation',		50 );
remove_action( 'storefront_header', 'storefront_header_cart',                   60 );
}

// add some child actions
//child header
add_action( 'storefront_child_branding', 'storefront_site_branding',0 );
add_action( 'storefront_child_nav', 'storefront_primary_navigation',10 );
add_action( 'storefront_child_meta', 'storefront_secondary_navigation',20 );
add_action( 'storefront_child_cart', 'storefront_header_cart',30 );

//Post Thumbnail Hooks
function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="thumbnail-caption">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}
//Footer Hooks
//add menu
function register_my_menu() {
    register_nav_menu('footer-links', __('Footer Links'));
}

add_action('init', 'register_my_menu');

//replace footer credits 
remove_action('storefront_footer', 'storefront_credit', 20);
add_action('storefront_child_footer', 'storefront_child_credit', 20);
//new credits
if (!function_exists('storefront_child_credit')) {

    /**
     * Display the theme credit
     * @since  1.0.0
     * @return void
     */
    function storefront_child_credit() {
        ?>
        <div class="site-info">
        <?php echo esc_html(apply_filters('storefront_copyright_text', $content = '&copy; ' . get_bloginfo('name') . ' ' . date('Y'))); ?>
        <?php if (apply_filters('storefront_credit_link', true)) { ?>
                - <?php printf(__('%1$s designed by %2$s.', 'storefront'), 'based on Storefront Childtheme', '<a href="http://www.chilliscope.de" alt="Freelance Webdesigner Claudia Hillen">chilliscope</a> & <a href="http://www.woothemes.com" alt="Premium WordPress Themes & Plugins by WooThemes" title="Premium WordPress Themes & Plugins by WooThemes" rel="designer">WooThemes</a>'); ?>
        <?php } ?>
        </div><!-- .site-info -->
        <?php
    }

}

//Programme Hooks
add_action( 'storefront_single_programme', 'storefront_post_content',	10 );

//Thumbnail captions
function wpse_138126_thumbnail_caption( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if ( $post = get_post( $post_thumbnail_id ) ) {
        if ( $size = wp_get_attachment_image_src( $post->ID, $size ) )
            $width = $size[1];
        else
            $width = 0;

        $html = img_caption_shortcode(
            array(
                'caption' => trim( "$post->post_excerpt $post->post_content" ),
                'align'   => 'alignright',
                'width'   => $width,
            ),
            $html       
        );
    }

    return $html;
}

add_filter( 'post_thumbnail_html', 'wpse_138126_thumbnail_caption', 10, 5 );
?>