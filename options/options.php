<?php

/**
 * Options
 */

defined('ABSPATH') or die('No script kiddies please!');

add_filter('body_class', 'mm_body_class');
function mm_body_class($classes)
{
    $style_is = carbon_get_theme_option('style_is');
    if (!empty($style_is) && is_string($style_is)) {
        $classes[] = esc_attr($style_is);
    } else {
        $classes[] = 'style-1';
    }
    return $classes;
}


require_once get_template_directory() . '/options/theme-options.php';
