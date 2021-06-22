<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
define( 'WTHEME_THEME_URI', get_template_directory_uri().'/' );
// URI to css folder
define( 'WTHEME_CSS_URI', WTHEME_THEME_URI.'css/' );
// URI to assets folder
define( 'WTHEME_ASSETS_URI', WTHEME_THEME_URI.'assets/' );
// URI to js forlder
define( 'WTHEME_JS_URI', WTHEME_THEME_URI.'js/' );
// URI to image forlder
define( 'WTHEME_IMG_URI', WTHEME_THEME_URI.'img/' );
// URI to templates
define( 'WTHEME_TEMPLATES_URI', WTHEME_THEME_URI.'template-parts/' );

// Path to theme
define( 'WTHEME_THEME_PATH', get_template_directory().'/' );
// Path to image forlder
define( 'WTHEME_IMG_PATH', WTHEME_THEME_PATH.'img/' );
// Path to inc forlder
define( 'WTHEME_INC_PATH', WTHEME_THEME_PATH.'inc/' );
// Path to templates
define( 'WTHEME_TEMPLATES_DIR', '/template-parts/' );

/**
 * Theme functions
 */
require WTHEME_INC_PATH . 'functions/functions.inc.php';


/* hide css version */
function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

// thumbnail list

add_action( 'after_setup_theme', 'setup_woocommerce_support' );

function setup_woocommerce_support()
{
    add_theme_support('woocommerce');
}

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
/**
 * @desc Remove in all product type
 */
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 9999 );

function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}

/**
 * Disable reviews.
 */
function iconic_disable_reviews() {
    remove_post_type_support( 'product', 'comments' );
}

add_action( 'init', 'iconic_disable_reviews' );


/**
 * Remove the breadcrumbs
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


add_action( 'after_setup_theme', 'my_remove_product_result_count', 99 );
function my_remove_product_result_count() {
    remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
}