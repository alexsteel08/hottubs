<footer id="site-footer" role="contentinfo">


    <?php get_template_part( 'template-parts/blocks/contacts' );?>
    <div class="footer_block">
        <div class="footer_content content_width section_padding">
            <div class="footer_logo">
                <a href="/">
                    <?php if( get_field('logo_image','option') ): ?>
                        <img itemprop="logo" src="<?php the_field('logo_image','option'); ?>" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="footer_menu">
                <ul>
                    <li><a href="#">Вигоди</a></li>
                    <li><a href="#">Прайс</a></li>
                    <li><a href="#">Галерея</a></li>
                    <li><a href="#">Блог</a></li>
                    <li><a href="#">Контакти</a></li>
                </ul>
            </div>
            <div class="footer_phone">
                <a href="tel:+380978789817">+38 (097) 87 89 817</a>
            </div>
            <div class="footer_lang">
                <?php echo do_shortcode('[wpml_language_selector_footer]');?>
            </div>

        </div>
    </div>

    <div class="footer_copyright content_width">
        <div class="social_logo">
            <ul>
                <li><a href="#"><img src="/wp-content/uploads/2021/06/fb.svg" alt="#"></a></li>
                <li><a href="#"><img src="/wp-content/uploads/2021/06/pt.svg" alt="#"></a></li>
                <li><a href="#"><img src="/wp-content/uploads/2021/06/youtube.svg" alt="#"></a></li>
                <li><a href="#"><img src="/wp-content/uploads/2021/06/ins.svg" alt="#"></a></li>
                <li><a href="#"><img src="/wp-content/uploads/2021/06/tw.svg" alt="#"></a></li>
            </ul>
        </div>

        <div class="copyright_text">
            <span>© 2021. Всі права захищені</span>
        </div>
    </div>


</footer>

<?php wp_footer(); ?>


</div>
</body>
</html>
