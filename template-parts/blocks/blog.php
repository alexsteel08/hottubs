<section <?php if( get_sub_field('id_blog') ): ?>id="<?php the_sub_field('id_blog'); ?>"<?php endif; ?> class="blog">
    <div class="blog_block content_width section_padding">
        <?php if( get_sub_field('blog_title') ): ?>
            <div class="blog_title title_large">
                <?php the_sub_field('blog_title'); ?>
            </div>
        <?php endif; ?>

        <?php
        $featured_posts = get_sub_field('blog_posts');
        if( $featured_posts ): ?>
            <div class="blog_posts">
                <?php foreach( $featured_posts as $post ):

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="blog_post_item">
                            <div class="blog_post_content">
                                <div class="blog_post_img">
                                    <img src="<?php the_post_thumbnail_url();?>" alt="">
                                </div>
                                <div class="blog_post_title"><?php the_title(); ?></div>
                                <div class="blog_post_excerpt"><?php the_excerpt();?></div>
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>