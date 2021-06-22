<section class="order_baner">
    <div class="order_baner_block">
        <div class="order_baner_left">

        </div>
        <div class="order_baner_right">
            <?php if( get_field('order_baner_image','option') ): ?>
                <img src="<?php the_field('order_baner_image','option'); ?>" alt="img">
            <?php endif; ?>
        </div>

    </div>
    <div class="order_baner_content">
        <div class="ob_content_block">
            <?php if( get_field('ob_title','option') ): ?>
                <div class="ob_title title_large">
                    <?php the_field('ob_title','option'); ?>
                </div>
            <?php endif; ?>
            <?php if( get_field('ob_circle_link','option') && get_field('ob_circle_text','option') ): ?>
                <div class="order_baner_button">
                    <noindex>
                        <a href="<?php the_field('ob_circle_link','option'); ?>" rel="nofollow"><?php the_field('ob_circle_text','option'); ?>
                        </a>
                    </noindex>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>