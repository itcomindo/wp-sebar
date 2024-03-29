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

    //load animate.css
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'all');

    //style.css from the theme
    wp_enqueue_style('mm-global-style', get_template_directory_uri() . '/style.css', array('normalize'), $theme_version, 'all');

    //global.css from assets/css
    wp_enqueue_style('mm-global-css', get_template_directory_uri() . '/assets/css/global.css', array('mm-global-style'), $theme_version, 'all');

    $style_is = carbon_get_theme_option('style_is');
    if ($style_is == 'style-1') {
        wp_enqueue_style('mm-style-1', get_template_directory_uri() . '/assets/css/style-1.css', array('mm-global-style'), $theme_version, 'all');
    } elseif ($style_is == 'style-2') {
        wp_enqueue_style('mm-style-2', get_template_directory_uri() . '/assets/css/style-2.css', array('mm-global-style'), $theme_version, 'all');
    }
    wp_enqueue_style('mm-custom-post-type', get_template_directory_uri() . '/assets/css/custom-post-type.css', array('mm-global-style'), $theme_version, 'all');

    //for logged admin user
    if (current_user_can('administrator') && is_user_logged_in()) {

        // load css
        wp_enqueue_style('mm-admin-frontend', get_template_directory_uri() . '/assets/css/admin-frontend.css', array(), $theme_version, 'all');


        // load js
        wp_enqueue_script('mm-admin-frontend-js', get_template_directory_uri() . '/assets/js/admin-frontend.js', array('jquery'), $theme_version, true);
    }


    /**
     *  Temporary Styles
     * This is for temporary styles that need to be loaded on every page
     * @todo Temporary style
     */

    //ads.css
    wp_enqueue_style('mm-ads-css', get_template_directory_uri() . '/assets/css/ads.css', array('mm-global-style'), $theme_version, 'all');


    //topbar.css
    wp_enqueue_style('mm-topbar-css', get_template_directory_uri() . '/assets/css/topbar.css', array('mm-global-style'), $theme_version, 'all');


    //news-ticker.css
    wp_enqueue_style('mm-news-ticker-css', get_template_directory_uri() . '/assets/css/news-ticker.css', array('mm-global-style'), $theme_version, 'all');

    //header.css
    wp_enqueue_style('mm-header-css', get_template_directory_uri() . '/assets/css/header.css', array('mm-global-style'), $theme_version, 'all');

    //header-menu.css
    wp_enqueue_style('mm-header-menu-css', get_template_directory_uri() . '/assets/css/header-menu.css', array('mm-global-style'), $theme_version, 'all');

    //headline.css
    wp_enqueue_style('mm-headline-css', get_template_directory_uri() . '/assets/css/headline.css', array('mm-global-style'), $theme_version, 'all');

    //sidebar.css
    wp_enqueue_style('mm-sidebar-css', get_template_directory_uri() . '/assets/css/sidebar.css', array('mm-global-style'), $theme_version, 'all');

    //widget.css
    wp_enqueue_style('mm-widget-css', get_template_directory_uri() . '/assets/css/widget.css', array('mm-global-style'), $theme_version, 'all');

    //hot-topic.css
    wp_enqueue_style('mm-hot-topic-css', get_template_directory_uri() . '/assets/css/hot-topic.css', array('mm-global-style'), $theme_version, 'all');

    //footer.css
    wp_enqueue_style('mm-footer-css', get_template_directory_uri() . '/assets/css/footer.css', array('mm-global-style'), $theme_version, 'all');

    //post-custom-section.css
    wp_enqueue_style('mm-post-custom-section-css', get_template_directory_uri() . '/assets/css/post-custom-section.css', array('mm-global-style'), $theme_version, 'all');

    //rest-posts.css
    wp_enqueue_style('mm-rest-posts-css', get_template_directory_uri() . '/assets/css/rest-posts.css', array('mm-global-style'), $theme_version, 'all');

    //post-by-category.css
    wp_enqueue_style('mm-post-by-category-css', get_template_directory_uri() . '/assets/css/post-by-category.css', array('mm-global-style'), $theme_version, 'all');

    //most-view-post.css
    wp_enqueue_style('mm-most-view-post-css', get_template_directory_uri() . '/assets/css/most-view-post.css', array('mm-global-style'), $theme_version, 'all');


    //mobile-app-component.css
    wp_enqueue_style('mm-mobile-app-component-css', get_template_directory_uri() . '/assets/css/mobile-app-component.css', array('mm-global-style'), $theme_version, 'all');









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


    //load temporary.css
    wp_enqueue_style('mm-temporary-css', get_template_directory_uri() . '/assets/css/temporary.css', array('mm-global-style'), $theme_version, 'all');

    if (is_home()) {

        //load webticker.js
        wp_enqueue_script('webticker-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.webticker/3.0.0/jquery.webticker.min.js', array('jquery'), '3.0.0', true);


        //load slick css
        wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array('mm-global-style'), '1.8.1', 'all');


        //load slick js
        wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '11.0.5', true);

        //load jquery.sticky.js from assets/libs
        wp_enqueue_script('mm-jquery-sticky', get_template_directory_uri() . '/assets/libs/jquery.sticky.js', array(), $theme_version, true);

        //load home js
        wp_enqueue_script('mm-home-js', get_template_directory_uri() . '/assets/js/home.js', array(), $theme_version, true);


        //mobile-app.js
        wp_enqueue_script('mm-mobile-app-js', get_template_directory_uri() . '/assets/js/mobile-app.js', array(), $theme_version, true);
    }



    if (is_single()) {
        //load single.css from assets/css
        wp_enqueue_style('mm-single-style', get_template_directory_uri() . '/assets/css/single.css', array('mm-global-style'), $theme_version, 'all');

        //load jquery.sticky.js from assets/libs
        wp_enqueue_script('mm-jquery-sticky', get_template_directory_uri() . '/assets/libs/jquery.sticky.js', array(), $theme_version, true);

        //load single-js.js from assets/js
        wp_enqueue_script('mm-single-js', get_template_directory_uri() . '/assets/js/single.js', array(), $theme_version, true);

        $the_post_type = carbon_get_post_meta(get_the_ID(), 'the_post_type');
        if ($the_post_type == 'gallery') {
            //load lightbox.css from assets/libs
            wp_enqueue_style('mm-lightbox-css', get_template_directory_uri() . '/assets/libs/lightbox.css', array(), $theme_version, 'all');

            //load lightbox.js from assets/libs
            wp_enqueue_script('mm-lightbox-js', get_template_directory_uri() . '/assets/libs/lightbox.js', array(), $theme_version, true);

            //load single-gallery.js from assets/js
            wp_enqueue_script('mm-single-gallery-js', get_template_directory_uri() . '/assets/js/single-gallery.js', array(), $theme_version, true);
        }
    }


    if (is_tag() || is_category()) {
        //load infinite-scroll.js
        wp_enqueue_script('infinite-scroll-js', 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', array('jquery'), '2.2.2', true);


        wp_enqueue_script('cat-tag-js', get_template_directory_uri() . '/assets/js/cat-tag.js', array(), $theme_version, true);
    }
}

add_action('wp_enqueue_scripts', 'mm_load_assets');






function mm_admin_backend()
{
    //load admin-backend.css from assets/css
    wp_enqueue_style('mm-admin-backend', get_template_directory_uri() . '/assets/css/admin-backend.css', array(), '1.0.0', 'all');

    //load admin-backend.js from assets/js
    wp_enqueue_script('mm-admin-backend-js', get_template_directory_uri() . '/assets/js/admin-backend.js', array('jquery'), '1.0.0', true);
}

add_action('admin_enqueue_scripts', 'mm_admin_backend');





function mm_load_responsive_css()
{
    //responsive.css
    wp_enqueue_style('mm-responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), $theme_version, 'all');
}

add_action('wp_head', 'mm_load_responsive_css', 101);
