<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('wp_enqueue_scripts', 'template_page_enqueue_styles');
function template_page_enqueue_styles()
{
    wp_enqueue_style('single', get_template_directory_uri() . '/css/single.css', array(), '1.0');
}
get_header(); ?>
    <div class="blog_page cont">
        <?php if( get_field('blog_page_title', 'option') ): ?>
            <div class="blog_page_title">
                <h1><?php the_field('blog_page_title', 'option'); ?></h1>
            </div>
        <?php endif; ?>
        <?php if( get_field('blog_page_subtitle', 'option') ): ?>
            <div class="blog_page_subtitle">
                <?php the_field('blog_page_subtitle', 'option'); ?>
            </div>
        <?php endif; ?>
    </div>
    <section class="blog-section">

        <div class="content_width">

            <div class="blog-post-list">
                <?php
                $new_loop = new WP_Query(array(
                    'post_type' => 'post',
                    'category_name' => 'Uncategorized'

                ));
                ?>
                <?php if ($new_loop->have_posts()) : ?>
                    <?php while ($new_loop->have_posts()) : $new_loop->the_post(); ?>

                        <?php get_template_part('template-parts/postitem');?>


                    <?php endwhile; ?>
                    <div class="loadmore-block">
                        <?php
                        global $wp_query;
                        if ($wp_query->max_num_pages > 1) : ?>
                            <script>
                                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                            </script>

                            <div id="true_loadmore">OLDER POSTS</div>
                        <?php endif; ?>
                    </div>


                <?php else: ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
                <!-- Button -->
            </div>


        </div>


    </section>

<?php get_template_part( 'template-parts/blog_order' );?>




<?php get_footer(); ?>