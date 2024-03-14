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
add_theme_support('widgets');





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
require_once get_template_directory() . '/sections/sections.php';
require_once get_template_directory() . '/components/components.php';
require_once get_template_directory() . '/plugins/plugins.php';
require_once get_template_directory() . '/queries/queries.php';
require_once get_template_directory() . '/assets/images/images.php';
require_once get_template_directory() . '/widgets/widgets.php';
require_once get_template_directory() . '/sidebars/sidebars.php';
require_once get_template_directory() . '/fields/fields.php';
require_once get_template_directory() . '/ads/ads.php';


// experimental 1 start

function mm_enqueue_monaco_editor()
{
    wp_enqueue_script('monaco-editor', '//cdn.jsdelivr.net/npm/monaco-editor/min/vs/loader.js', array(), null, true);
    // Inisialisasi Monaco Editor pada textarea
    wp_add_inline_script('monaco-editor', '
        require.config({ paths: { vs: "//cdn.jsdelivr.net/npm/monaco-editor/min/vs" }});
        require(["vs/editor/editor.main"], function () {
            var editor = monaco.editor.create(document.querySelector(".custcss"), {
                language: "css",
                theme: "vs-dark"
            });
            // Simpan nilai editor ke textarea asli saat form disubmit
            document.querySelector("form").addEventListener("submit", function() {
                document.querySelector(".custcss").value = editor.getValue();
            });
        });
    ');
}
// add_action('admin_enqueue_scripts', 'mm_enqueue_monaco_editor');


function mm_apply_custom_css()
{
    $custom_css = carbon_get_theme_option('custom_css');
    if (!empty($custom_css)) {
        echo '<style>' . esc_html($custom_css) . '</style>';
    }
}
// add_action('wp_head', 'mm_apply_custom_css');






// experimental 1 end


//experimental 2 start

function mm_add_promo_date_column($columns)
{
    $columns['promo_date'] = 'Tanggal Akhir';
    $columns['post_type'] = 'Tipe Post'; // Menambahkan kolom baru untuk tipe post
    $columns['promo_limit_by'] = 'Promo Limit By'; // Menambahkan kolom baru untuk tipe post
    return $columns;
}
// add_filter('manage_posts_columns', 'mm_add_promo_date_column');

function mm_show_promo_date_column_content($column, $post_id)
{
    if ('promo_date' === $column) {
        $promo_date = carbon_get_post_meta($post_id, 'promo_date_limit');
        echo $promo_date ? $promo_date : 'N/A';
    } elseif ('post_type' === $column) { // Menampilkan tipe post dalam kolom baru
        $post_type = carbon_get_post_meta($post_id, 'the_post_type');
        echo $post_type ? $post_type : 'N/A';
    } elseif ('promo_limit_by' === $column) { // Menampilkan tipe post dalam kolom baru
        $promo_limit_by = carbon_get_post_meta($post_id, 'promo_limit');
        echo $promo_limit_by ? $promo_limit_by : 'N/A';
    }
}
// add_action('manage_posts_custom_column', 'mm_show_promo_date_column_content', 10, 2);

// experimental 2 end

//experimental 3 start
// experimental 3 end
