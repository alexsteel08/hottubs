<section <?php if( get_sub_field('id_profit') ): ?>id="<?php the_sub_field('id_profit'); ?>"<?php endif; ?> class="profit">
    <div class="profit_block content_width section_padding">
        <?php if( get_sub_field('profit_title') ): ?>
            <div class="profit_title title_large">
                <?php the_sub_field('profit_title'); ?>
            </div>
        <?php endif; ?>
        <?php if( have_rows('profit_list') ): ?>
            <div class="profit_items">
                <?php while( have_rows('profit_list') ): the_row();
                    $image = get_sub_field('profit_list');
                    ?>
                    <div class="profit_item">
                        <div class="profit_item_content">
                            <?php if( get_sub_field('profit_title') ): ?>
                                <div class="profit_title title_large">
                                    <?php the_sub_field('profit_title'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="profit_item_title title_medium"><?php the_sub_field('profit_list_title'); ?></div>
                            <div class="profit_item_text more"><?php the_sub_field('profit_list_text'); ?></div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>