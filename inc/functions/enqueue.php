<?php
/*
 *	ENQUEUE SCRIPTS AND STYLES
 *
 *****************************************************/

add_action('wp_enqueue_scripts', 'theme_front_end_styles');
function theme_front_end_styles()
{
    wp_enqueue_style('nice-select', WTHEME_CSS_URI . 'nice-select.css', array(), false, 'all');
    wp_enqueue_style('calc', WTHEME_CSS_URI . 'calc.css', array(), false, 'all');
    wp_enqueue_style('header', WTHEME_CSS_URI . 'header.css', array(), false, 'all');
    wp_enqueue_style('footer', WTHEME_CSS_URI . 'footer.css', array(), false, 'all');
    wp_enqueue_style('slick-style', WTHEME_CSS_URI . 'slick-style.css', array(), false, 'all');
    wp_enqueue_style('lightgallery', 'https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css');
    wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'theme_front_end_script');


function theme_front_end_script()
{

    wp_enqueue_script('slick.min-js', WTHEME_JS_URI . 'slick.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.nice-select', WTHEME_JS_URI . 'jquery.nice-select.min.js', array('jquery'), '1.0', true);

        wp_enqueue_script('jsdelivr', 'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js');
        wp_enqueue_script('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/js/lightgallery-all.min.js');

    wp_enqueue_script('main', WTHEME_JS_URI . 'main.js', array('jquery'), '', true);

}