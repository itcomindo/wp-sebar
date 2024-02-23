<?php

/**
 * Functions and definitions
 */

defined('ABSPATH') or die('No script kiddies please!');




/**
 * Add theme Supports
 */

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');





/**
 * get Theme version from the style.css
 */
function mm_get_theme_version()
{
    $theme = wp_get_theme();
    return $theme->get('Version');
}







/**
 * Check if the current environment is development mode or on production
 * development mode is when the server is localhost
 * output: boolean
 */
function mm_is_devmode()
{
    if (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'), true)) {
        return true;
    }
    return false;
}



/**
 * Load the Carbon Fields
 * define the container and fields
 */
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}


/**
 * Load the Required Files
 */

//call that require_once function to load
require_once get_template_directory() . '/options/options.php';
require_once get_template_directory() . '/assets/assets.php';
require_once get_template_directory() . '/inc/inc.php';
require_once get_template_directory() . '/components/components.php';
require_once get_template_directory() . '/plugins/plugins.php';
require_once get_template_directory() . '/queries/queries.php';



// experimental 1 start

function mm_check_theme_update()
{
    $theme_data = wp_get_theme('wp-sebar');
    $current_version = $theme_data->Version;
    $update_check_url = 'https://budiharyono.com/themes/sebar/latest_version.json';
    $response = wp_remote_get($update_check_url);

    if (is_wp_error($response) || wp_remote_retrieve_response_code($response) != 200) {
        return;
    }

    $latest_info = json_decode(wp_remote_retrieve_body($response), true);
    if (version_compare($current_version, $latest_info['version'], '<')) {
        set_transient('mm_wp_sebar_theme_update', $latest_info, DAY_IN_SECONDS);
    } else {
        delete_transient('mm_wp_sebar_theme_update');
    }
}
add_action('wp_update_themes', 'mm_check_theme_update');

function mm_theme_update_notice()
{
    $theme_update = get_transient('mm_wp_sebar_theme_update');
    if ($theme_update) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>Ada versi baru dari tema WP Sebar tersedia. <a href="' . esc_url($theme_update['download_url']) . '">Unduh versi ' . esc_html($theme_update['version']) . '</a></p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'mm_theme_update_notice');


// experimental 1 end


//experimental 2 start
// experimental 2 end

//experimental 3 start
// experimental 3 end
