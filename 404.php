<?php
/*
Template Name: 404
 */

get_header(); ?>
    <section class="page_404">
        <div class="page_404_block">
            <div class="page_404_text">
                <div class="page_404_text_1 label_orange">ooops......</div>
                <div class="page_404_text_2 title_large">404 <br>Page not found</div>
                <div class="page_404_btns">
                    <div class="page_404_home">
                        <a href="/">Back to home</a>
                    </div>
                    <div class="page_404_order">
                        <noindex>
                            <a href="/order/">Order Now</a>
                        </noindex>
                    </div>
                </div>
            </div>
            <div class="page_404_img">
                <div class="shape_top"></div>
                <div class="shape_button"></div>
                <img src="<?php if( get_field('404_page_backround','option') ): ?><?php the_field('404_page_backround','option'); ?><?php endif; ?>" alt="">
            </div>
        </div>
    </section>



<?php get_footer(); ?>