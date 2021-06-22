<section <?php if( get_sub_field('id_certificates') ): ?>id="<?php the_sub_field('id_certificates'); ?>"<?php endif; ?> class="certificates">
    <div class="certificates_block content_width section_padding">
        <?php if( get_sub_field('certificates_title') ): ?>
            <div class="certificates_title title_large">
                <?php the_sub_field('certificates_title'); ?>
            </div>
        <?php endif; ?>

        <?php if( have_rows('certificates_items') ): ?>
            <div class="certificates_items">
                <?php while( have_rows('certificates_items') ): the_row();
                    $image = get_sub_field('certificates_item');
                    ?>
                    <div class="certificates_item">
                        <div class="certificates_content">
                            <img src="<?php echo $image; ?>" alt="img">
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>