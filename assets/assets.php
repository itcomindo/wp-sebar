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

    //load fontawesome 5.15.3
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all');

    //load fontawesome 6.5.1
    wp_enqueue_style('fontawesome-651', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1', 'all');

    //style.css from the theme
    wp_enqueue_style('mm-global-style', get_template_directory_uri() . '/style.css', array('normalize'), $theme_version, 'all');

    $style_is = carbon_get_theme_option('style_is');
    if ($style_is == 'style-1') {
        wp_enqueue_style('mm-style-1', get_template_directory_uri() . '/assets/css/style-1.css', array('mm-global-style'), $theme_version, 'all');
    } elseif ($style_is == 'style-2') {
        wp_enqueue_style('mm-style-2', get_template_directory_uri() . '/assets/css/style-2.css', array('mm-global-style'), $theme_version, 'all');
    }

    //for logged admin user
    if (current_user_can('administrator') && is_user_logged_in()) {

        // load css
        wp_enqueue_style('mm-admin-frontend', get_template_directory_uri() . '/assets/css/admin-frontend.css', array(), $theme_version, 'all');


        // load js
        wp_enqueue_script('mm-admin-frontend-js', get_template_directory_uri() . '/assets/js/admin-frontend.js', array('jquery'), $theme_version, true);
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
    wp_enqueue_script('mm-global-js', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), $theme_version, true);

    if (is_home()) {

        //load slick css
        wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array('mm-global-style'), '1.8.1', 'all');


        //load slick js
        wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '11.0.5', true);


        //load home js
        wp_enqueue_script('mm-home-js', get_template_directory_uri() . '/assets/js/home.js', array(), $theme_version, true);
    }



    if (is_single()) {
        //load single.css from assets/css
        wp_enqueue_style('mm-single-style', get_template_directory_uri() . '/assets/css/single.css', array('mm-global-style'), $theme_version, 'all');

        //load single-js.js from assets/js
        wp_enqueue_script('mm-single-js', get_template_directory_uri() . '/assets/js/single.js', array('jquery'), $theme_version, true);
    }


    if (is_tag() || is_category()) {
        //load infinite-scroll.js
        wp_enqueue_script('infinite-scroll-js', 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', array('jquery'), '2.2.2', true);


        wp_enqueue_script('cat-tag-js', get_template_directory_uri() . '/assets/js/cat-tag.js', array(), $theme_version, true);
    }
}

add_action('wp_enqueue_scripts', 'mm_load_assets');
