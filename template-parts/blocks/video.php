<section <?php if( get_sub_field('id_video') ): ?>id="<?php the_sub_field('id_video'); ?>"<?php endif; ?> class="video">
    <div class="video_block content_width section_padding">
        <div class="video_content title_large">
            <?php if( get_sub_field('video_title') ): ?>
                <div class="video_title">
                    <?php the_sub_field('video_title'); ?>
                </div>
            <?php endif; ?>

            <?php if( have_rows('video_list') ): ?>
                <div class="video_items">
                    <?php while( have_rows('video_list') ): the_row();

                        ?>
                        <div class="video_item">
                            <div class="video_item_content">
                                <div class="video_item_text"><?php the_sub_field('video_list_link'); ?></div>
                                <div class="video_item_title title_medium"><?php the_sub_field('video_list_title'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>