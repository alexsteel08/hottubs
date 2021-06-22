<?php
if ( ! isset( $content_width ) ) $content_width = 900;
add_theme_support( "custom-header" );
add_theme_support( "custom-background" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "title-tag" );
add_theme_support( 'post-thumbnails');
add_editor_style();
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');



//register menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary', 'alexweb' ),
            'footer-horizontal' => __('Horizontal menu', 'alexweb' ),
            'footer-menu1' => __('Footer menu 1', 'alexweb' ),
            'footer-menu2' => __('Footer menu 2', 'alexweb' ),
            'footer-menu3' => __('Footer menu 3', 'alexweb' ),
            'footer-menu4' => __('Footer menu 4', 'alexweb' ),
            'footer-menu5' => __('Footer menu 5', 'alexweb' ),
        )
    );
}
add_action('init', 'register_my_menus');
function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="menu__link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');
// widget area
function a_theme_widgets_init()
{

    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="rounded">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Archive',
        'id' => 'archive_sitebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="rounded">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Post',
        'id' => 'post_sitebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="rounded">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer left',
        'id' => 'footer_left',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-item-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer menu 1',
        'id' => 'footer_menu1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-item-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer menu 2',
        'id' => 'footer_menu2',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-item-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer menu 3',
        'id' => 'footer_menu3',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-item-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer menu 4',
        'id' => 'footer_menu4',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-item-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Footer Bottom menu',
        'id' => 'footer_menu5',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-item-title">',
        'after_title' => '</div>',
    ));

}

add_action('widgets_init', 'a_theme_widgets_init');


//rus to lat
function rutranslit($title) {
    $chars = array(
//rus
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
        "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
        "З"=>"Z","И"=>"I","Й"=>"Y","К"=>"K","Л"=>"L",
        "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
        "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
        "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"",
        "Ы"=>"Y","Ь"=>"","Э"=>"YE","Ю"=>"YU","Я"=>"YA",
        "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
        "е"=>"e","ё"=>"yo","ж"=>"zh",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
        "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
        "ы"=>"y","ь"=>"","э"=>"ye","ю"=>"yu","я"=>"ya",
//spec
        "—"=>"-","«"=>"","»"=>"","…"=>"","№"=>"N",
        "—"=>"-","«"=>"","»"=>"","…"=>"",
        "!"=>"","@"=>"","#"=>"","$"=>"","%"=>"","^"=>"","&"=>"",
//ukr
        "Ї"=>"Yi","ї"=>"i","Ґ"=>"G","ґ"=>"g",
        "Є"=>"Ye","є"=>"ie","І"=>"I","і"=>"i",

    );

    if (seems_utf8($title)) $title = urldecode($title);
    $title = preg_replace('/\.+/','.',$title);
    $r = strtr($title, $chars);
    return $r;
}
add_filter('sanitize_file_name','rutranslit');
add_filter('sanitize_title','rutranslit');

//rus to lat end

// Disable Gutenberg.
if ('disable_gutenberg') {
    add_filter('use_block_editor_for_post_type', '__return_false', 100);

    // Move the Privacy Policy help notice back under the title field.
    add_action('admin_init', function () {
        remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
        add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
    });
}
// Disable Gutenberg end

// Remove aithor name
function remove_comment_author_class( $classes ) {
    foreach( $classes as $key => $class ) {
        if(strstr($class, "comment-author-")) {
            unset( $classes[$key] );
        }
    }
    return $classes;
}
add_filter( 'comment_class' , 'remove_comment_author_class' );

// Remove aithor name end

// Excerpt length
add_filter( 'excerpt_length', function(){
    return 20;
} );

// Excerpt length end

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

// CPT
// Register Custom Post Type
function custom_post_type()
{

//    $labels = array(
//        'name' => _x('Team', 'Post Type General Name', 'text_domain'),
//        'singular_name' => _x('Team', 'Post Type Singular Name', 'text_domain'),
//        'menu_name' => __('Team', 'text_domain'),
//        'name_admin_bar' => __('Team', 'text_domain'),
//        'archives' => __('Item Archives', 'text_domain'),
//        'attributes' => __('Item Attributes', 'text_domain'),
//        'parent_item_colon' => __('Parent Item:', 'text_domain'),
//        'all_items' => __('All Team', 'text_domain'),
//        'add_new_item' => __('Add item', 'text_domain'),
//        'add_new' => __('Add item', 'text_domain'),
//        'new_item' => __('Add new', 'text_domain'),
//        'edit_item' => __('Edit', 'text_domain'),
//        'update_item' => __('Update', 'text_domain'),
//        'view_item' => __('View', 'text_domain'),
//        'view_items' => __('View', 'text_domain'),
//        'search_items' => __('Search', 'text_domain'),
//        'not_found' => __('Not found', 'text_domain'),
//        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
//        'featured_image' => __('Featured image', 'text_domain'),
//        'set_featured_image' => __('Select the main image', 'text_domain'),
//        'remove_featured_image' => __('Delete image', 'text_domain'),
//        'use_featured_image' => __('Use as featured image', 'text_domain'),
//        'insert_into_item' => __('Insert into item', 'text_domain'),
//        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
//        'items_list' => __('Items list', 'text_domain'),
//        'items_list_navigation' => __('Items list navigation', 'text_domain'),
//        'filter_items_list' => __('Filter items list', 'text_domain'),
//    );

    $labels1 = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Testimonials', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Testimonials', 'text_domain'),
        'name_admin_bar' => __('Testimonials', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('All Testimonials', 'text_domain'),
        'add_new_item' => __('Add item', 'text_domain'),
        'add_new' => __('Add item', 'text_domain'),
        'new_item' => __('Add new', 'text_domain'),
        'edit_item' => __('Edit', 'text_domain'),
        'update_item' => __('Update', 'text_domain'),
        'view_item' => __('View', 'text_domain'),
        'view_items' => __('View', 'text_domain'),
        'search_items' => __('Search', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured image', 'text_domain'),
        'set_featured_image' => __('Select the main image', 'text_domain'),
        'remove_featured_image' => __('Delete image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );

    $labels2 = array(
        'name' => _x('Reviews', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Reviews', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Reviews', 'text_domain'),
        'name_admin_bar' => __('Reviews', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('All Reviews', 'text_domain'),
        'add_new_item' => __('Add item', 'text_domain'),
        'add_new' => __('Add item', 'text_domain'),
        'new_item' => __('Add new', 'text_domain'),
        'edit_item' => __('Edit', 'text_domain'),
        'update_item' => __('Update', 'text_domain'),
        'view_item' => __('View', 'text_domain'),
        'view_items' => __('View', 'text_domain'),
        'search_items' => __('Search', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured image', 'text_domain'),
        'set_featured_image' => __('Select the main image', 'text_domain'),
        'remove_featured_image' => __('Delete image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );

//    $args = array(
//        'label' => __('Team', 'text_domain'),
//        'description' => __('Post Type Description', 'text_domain'),
//        'labels' => $labels,
//        'supports' => array('title'),
////        'taxonomies'            => array( 'category', 'post_tag', 'location' ),
//        'hierarchical' => true,
//        'public' => true,
//        'show_ui' => true,
//        'show_in_menu' => true,
//        'menu_position' => 5,
//        'show_in_admin_bar' => true,
//        'show_in_nav_menus' => true,
//        'can_export' => true,
//        'has_archive' => true,
//        'exclude_from_search' => false,
//        'publicly_queryable' => false,
//        'menu_icon'           => 'dashicons-id-alt',
////        'capability_type'       => 'page',
//
//    );
    $args1 = array(
        'label' => __('Testimonials', 'text_domain'),
        'description' => __('Post Type Description', 'text_domain'),
        'labels' => $labels1,
        'supports' => array('title'),
//        'taxonomies'            => array( 'category', 'post_tag', 'location' ),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'menu_icon'           => 'dashicons-id-alt',
//        'capability_type'       => 'page',

    );




//    register_post_type('writers', $args);
    register_post_type('testimonials', $args1);
//    register_post_type('reviews', $args2);

}

add_action('init', 'custom_post_type', 0);
//

remove_filter( 'the_excerpt', 'wpautop' );


function true_load_posts(){

    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts( $args );
    if( have_posts() ) :
        while( have_posts() ): the_post();

            ?>
            <?php get_template_part('template-parts/postitem');?>
        <?php

        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

function change_wp_nav_menu( $classes, $args, $depth ) {
    foreach ( $classes as $key => $class ) {
        if ( $class == 'sub-menu' ) {
            $classes[ $key ] = 'menu__sub-list';
        }
    }

    return $classes;
}




add_filter('wpseo_robots', 'yoast_no_home_noindex', 999);
function yoast_no_home_noindex($string= "") {
    if (is_404()) {
        $string= "noindex, nofollow";
    }
    return $string;
}


add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
        'label'			=> 'Default Image',
        'instructions'		=> 'Appears when creating a new post',
        'type'			=> 'image',
        'name'			=> 'default_value',
    ));
}