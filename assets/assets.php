<?php

/**
 * Assets
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_load_assets()
{
    $theme_version = wp_get_theme()->get('Version');


    /**
     * Load styles that need to every page
     * we call this as global styles
     */
    //load normalize
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), '8.0.1', 'all');

    //load fontawesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all');

    //style.css from the theme
    wp_enqueue_style('mm-global-style', get_template_directory_uri() . '/style.css', array('normalize'), $theme_version, 'all');

    $style_is = carbon_get_theme_option('style_is');
    if ($style_is == 'style-1') {
        wp_enqueue_style('mm-style-1', get_template_directory_uri() . '/assets/css/style-1.css', array('mm-global-style'), $theme_version, 'all');
    } elseif ($style_is == 'style-2') {
        wp_enqueue_style('mm-style-2', get_template_directory_uri() . '/assets/css/style-2.css', array('mm-global-style'), $theme_version, 'all');
    }



    /**
     * Load scripts that need to every page
     * we call this as global scripts
     */
    //dequeue jquery from wordpress default to change it to the latest version
    wp_deregister_script('jquery');

    //load jquery 3.7.1 from cdn
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);

    //load global-js.js from assets/js
    wp_enqueue_script('mm-global-js', get_template_directory_uri() . '/assets/js/global-js.js', array('jquery'), $theme_version, true);
}

add_action('wp_enqueue_scripts', 'mm_load_assets');
