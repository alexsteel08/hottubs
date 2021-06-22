<section <?php if( get_field('id_contacts','option') ): ?>id="<?php the_field('id_contacts','option'); ?>"<?php endif; ?> class="contacts">
    <div class="contacts_block content_width">
        <?php if( get_field('contacts_title','option') ): ?>
            <div class="contacts_title title_large">
                <?php the_field('contacts_title','option'); ?>
            </div>
        <?php endif; ?>
        <div class="contacts_content">
            <div class="contacts_left">
                <div class="contacts_left_content">
                    <?php if( get_field('logo_1','option') && get_field('text_1','option') ): ?>
                        <div class="work_time contact_align">
                            <img style="width: 33px" src="<?php the_field('logo_1','option'); ?>" alt="logo"><?php the_field('text_1','option'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('logo_2','option') && get_field('text_2','option') ):  ?>
                        <div class="phone contact_align">
                            <img style="width: 33px" src="<?php the_field('logo_2','option'); ?>" alt="logo">

                            <a href="tel:<?php $phone1=get_field('text_2','option');if($phone1) {echo preg_replace('/[^0-9]/', '', $phone1);}?>"><?php if($phone1){echo $phone1;}?></a>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('logo_3','option') && get_field('text_3','option') ): ?>
                        <div class="email contact_align">
                            <img style="width: 33px" src="<?php the_field('logo_3','option'); ?>" alt="logo"><?php the_field('text_3','option'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('logo_4','option') && get_field('text_4','option') ): ?>
                        <div class="location contact_align">
                            <img style="width: 33px" src="<?php the_field('logo_4','option'); ?>" alt="logo"><?php the_field('text_4','option'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="messangers">
                        <div class="messanger">
                            <a href="#">
<!--                                <img src="" alt="logo">-->
                            </a>
                        </div>
                    </div>
                    <?php if( get_field('map','option') ): ?>
                        <div class="map">
                            <?php the_field('map','option'); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="contacts_right">
                <div class="contacts_form">
                    <?php echo do_shortcode('[contact-form-7 id="11" title="cf"]');?>
                </div>
            </div>
        </div>
    </div>
</section>