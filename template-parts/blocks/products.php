<section <?php if( get_sub_field('id_products') ): ?>id="<?php the_sub_field('id_products'); ?>"<?php endif; ?> class="products">
    <div class="products_block content_width section_padding">
        <?php if( get_sub_field('products_title') ): ?>
            <div class="products_title title_large">
                <?php the_sub_field('products_title'); ?>
            </div>
        <?php endif; ?>

        <?php
        $posts = get_sub_field('products_list');
        global $post;
        if ($posts): ?>
            <div class="products_block_items">
                <?php foreach ($posts as $post): ?>
                    <?php setup_postdata($post); ?>
                    <div class="products_block_item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="product_image">
                                <?php if ( wp_is_mobile() ) : ?>
                                    <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
                                <?php else : ?>
                                    <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
                                <?php endif; ?>
                            </div>
                            <div class="product_name">
                                <?php the_title(); ?>
                            </div>
                            <div class="product_parameter">
                                <?php
                                global $product;
                                $material = $product->get_attribute('pa_material');
                                $mistkist = $product->get_attribute('pa_mistkist');
                                $obyem = $product->get_attribute('pa_obiem');
                                $price = get_post_meta(get_the_ID(), '_regular_price', true);
                                ?>
                                <div class="product_parameter_list">
                                    <div class="product_parameter_option">
                                        <span><?php _e('Material', 'hottub'); ?></span> : <?php echo $material; ?>
                                    </div>
                                    <div class="product_parameter_option">
                                        <span><?php _e('Volume', 'hottub'); ?></span> : <?php echo $obyem; ?>
                                    </div>
                                    <div class="product_parameter_option">
                                        <span><?php _e('Capacity', 'hottub'); ?></span> : <?php echo $mistkist; ?>
                                    </div>
                                    <div class="product_parameter_option">
                                        <span><?php _e('Cost', 'hottub'); ?></span> : <?php echo $price ?> грн
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="order_btn">
                            <a href="<?php
                            $add_to_cart = do_shortcode('[add_to_cart_url id="' . $post->ID . '"]');
                            echo $add_to_cart; ?>" class="more"><?php _e('Order', 'hottub'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
