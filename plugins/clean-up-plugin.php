<?php

defined('ABSPATH') or die('No script kiddies please!');

function clean_up_wordpress_header()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');

    wp_dequeue_script('wp-embed');

    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action('wp_head', 'rest_output_link_wp_head', 10);

    remove_action('wp_head', 'rsd_link');

    remove_action('wp_head', 'wlwmanifest_link');

    remove_action('wp_head', 'wp_shortlink_wp_head');
}

add_action('wp_enqueue_scripts', 'clean_up_wordpress_header', 9999);
