<?php

add_action('wp_enqueue_scripts', 'template_page_enqueue_styles');
function template_page_enqueue_styles()
{
    wp_enqueue_style('single', get_template_directory_uri() . '/css/single.css', array(), '1.0');

    wp_enqueue_script('sitebar', get_template_directory_uri() . '/js/sitebar.js', array(), '1.0');



}




get_header(); ?>

<?php get_template_part( 'template-parts/blogbaner' ); ?>

<?php get_template_part( 'template-parts/content' );?>
<?php

get_footer();