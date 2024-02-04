<?php

/**
 * Custom Post Title INC
 */

defined('ABSPATH') or die('No script kiddies please!');



function mm_get_custom_post_title($length = 80)
{
    $title = get_the_title();
    $title = substr($title, 0, $length);
    return $title;
}
