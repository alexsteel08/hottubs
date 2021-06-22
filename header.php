<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <?php
    if( get_field('noindex') ) {

        echo '<meta name="robots" content="noindex">';
    }
    ?>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
    if ( is_404() ) {?>
        <meta name="robots" content="noindex">
    <?}
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open();?>
<div class="wr">
    <header id="site-header" class="header" role="banner">
        <div class="header__container">
            <a itemprop="url" href="<?php echo get_home_url(); ?>" class="header-logo">
                <?php if( get_field('logo_image','option') ): ?>
                    <img itemprop="logo" src="<?php the_field('logo_image','option'); ?>" />
                <?php endif; ?>
                <span><?php the_field('text_after_logo','option'); ?></span>
            </a>

            <div id="menu" class="header__menu menu">
                <div class="menu__icon">
                    <span></span>
                </div>
                <?php
                wp_nav_menu( [
                    'theme_location'  => 'primary-menu',
                    'menu'            => '',
                    'container'       => 'nav',
                    'container_class' => 'menu__body',
                    'container_id'    => '',
                    'menu_class'      => 'menu__list',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'add_li_class'    => 'menu__link',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ] );

                ?>
        </div>
            <div class="order_header" data-da="menu__list,20,992">
                <noindex>
                    <a class="menu__link" href="#">Безкоштовний дзвінок</a>
                </noindex>
            </div>


    </header>

    <div class="content_width">

        <?php if ( ! is_front_page() && !is_page('13') && !is_page('About') ) : ?>
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        <?php endif; ?>

    </div>