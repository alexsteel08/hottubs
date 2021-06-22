<section <?php if( get_sub_field('id_gallery') ): ?>id="<?php the_sub_field('id_gallery'); ?>"<?php endif; ?> class="gallery">
    <div class="gallery_block content_width section_padding">
        <div class="gallery_content title_large">
            <?php if( get_sub_field('gallery_title') ): ?>
                <div class="gallery_title">
                    <?php the_sub_field('gallery_title'); ?>
                </div>
            <?php endif; ?>
            <div class="">
                <?php
                $images = get_sub_field('gallery_photos');
                if( $images ): ?>
                    <div id="gallery_items" class="slider-for homepage_gallery_images">
                        <?php foreach( $images as $image ): ?>
                            <a href="<?php echo $image['url']; ?>">
                                <div class="gallery_item pads_gallery_images">
                                    <img src="<?php echo $image['url']; ?>"/>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if( have_rows('pads_gallery_images') ): ?>
                <div class="pads_gallery_images">
                    <?php while( have_rows('pads_gallery_images') ): the_row();
                        $image = get_sub_field('pads_gallery_image');
                        ?>
                        <div class="pads_gallery_image" data-src="<?php echo $image; ?>">
                            <a href="">
                                <div class="image_item_gallery">
                                    <img src="<?php echo $image; ?>" alt="<?php the_sub_field('pads_gallery_img_decsr'); ?>">

                                    <div class="image_description"><?php the_sub_field('pads_gallery_img_decsr'); ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

