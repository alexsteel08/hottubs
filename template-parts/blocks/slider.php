<?php if( have_rows('slides') ): ?>
    <section class="slides">
        <?php while( have_rows('slides') ): the_row(); $slide = get_sub_field('slides_img');
            ?>
            <div class="content_width slider_container">
                <div class="slider_left">
                    <?php if( get_sub_field('slides_text') ): ?>
                        <div class="slider_title">
                            <?php the_sub_field('slides_text'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_sub_field('slides_btn_link') && get_sub_field('slides_btn_text') ): ?>
                        <div class="slider_btn">
                            <noindex>
                                <a href="<?php the_sub_field('slides_btn_link'); ?>" rel="nofollow"><?php the_sub_field('slides_btn_text'); ?>
                                </a>
                            </noindex>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="slider_right">
                    <div class="slider_image" style="background-image: url(<?php echo $slide; ?>)">

                    </div>
                </div>

                <p><?php the_sub_field('caption'); ?></p>
            </div>
        <?php endwhile; ?>
    </section>
<?php endif; ?>