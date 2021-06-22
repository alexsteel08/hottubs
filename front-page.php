<?php

/*
Template Name: Front Page
*/

get_header(); ?>

    <div class="content">



<?php get_template_part( 'template-parts/content' );?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $(".pads_gallery_images").lightGallery({
                pager: true,
                lazyLoad: 'ondemand'
            });
        });


        jQuery(document).ready(function($){
            $(".homepage_gallery_images").lightGallery({
                pager: true,
                lazyLoad: 'ondemand'
            });
        });
    </script>
<?php //get_template_part('template-parts/subscribe');?>
<?php get_footer(); ?>