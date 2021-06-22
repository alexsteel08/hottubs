<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// auto add alt text to image
function change_empty_alt_to_title($response)
{
    if (!$response['alt']) {
        $response['alt'] = sanitize_text_field($response['title']);
    }

    return $response;
}

add_filter('wp_prepare_attachment_for_js', 'change_empty_alt_to_title');


function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

