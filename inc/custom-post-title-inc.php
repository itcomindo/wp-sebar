<?php

/**
 * Custom Post Title INC
 */

defined('ABSPATH') or die('No script kiddies please!');



function mm_get_custom_post_title($length = 120)
{
    global $post;
    $title = get_the_title($post->ID);
    $title = wp_trim_words($title, $length, '...');
    return $title;
}
