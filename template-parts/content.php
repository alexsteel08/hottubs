<?php if( have_rows('content') ): ?>
    <?php while( have_rows('content') ): the_row(); ?>
        <?php if( get_row_layout() == 'slider' ): ?>
            <?php get_template_part( 'template-parts/blocks/slider' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'profit' ): ?>
            <?php get_template_part( 'template-parts/blocks/profit' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'video' ): ?>
            <?php get_template_part( 'template-parts/blocks/video' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'products' ): ?>
            <?php get_template_part( 'template-parts/blocks/products' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'gallery' ): ?>
            <?php get_template_part( 'template-parts/blocks/gallery' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'blog' ): ?>
            <?php get_template_part( 'template-parts/blocks/blog' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'certificates' ): ?>
            <?php get_template_part( 'template-parts/blocks/certificates' );?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

