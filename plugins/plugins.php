<?php

/**
 * Plugins
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once get_template_directory() . '/plugins/pageview-plugin.php';
require_once get_template_directory() . '/plugins/admin-front-end-plugin.php';
require_once get_template_directory() . '/plugins/clean-up-plugin.php';




//function to filter to remove url field from comment form
function remove_comment_url($fields)
{
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_url');

//remove comment-notes
function remove_comment_notes($defaults)
{
    $defaults['comment_notes_before'] = '';
    return $defaults;
}
add_filter('comment_form_defaults', 'remove_comment_notes');





/**
 *  Disable Guttenberg
 */
function mm_disable_guttenberg()
{
    if (carbon_get_theme_option('disable_guttenberg')) {
        add_filter('use_block_editor_for_post', '__return_false', 10);
    }
}
add_action('init', 'mm_disable_guttenberg');



/**
 *  disable xmlrpc
 */

function mm_disable_xmlrpc()
{
    if (carbon_get_theme_option('disable_xmlrpc')) {
        add_filter('xmlrpc_enabled', '__return_false');
    }
}
add_action('init', 'mm_disable_xmlrpc');



/**
 * disable_forgot_password
 */
function disable_forgot_password()
{
    if (carbon_get_theme_option('disable_forgot_password')) {
        add_action('login_form_lostpassword', function () {
            wp_redirect(home_url());
            exit;
        });
        add_action('lostpassword_form', function () {
            wp_redirect(home_url());
            exit;
        });
    }
}
add_action('init', 'disable_forgot_password');



/**
 *  open_image_directly_to_image_file
 */

function mm_prevent_attachment_page()
{
    if (carbon_get_theme_option('open_image_directly_to_image_file')) {
        global $post;
        if (is_attachment()) {
            $mime_type = get_post_mime_type($post->ID);
            if (strpos($mime_type, 'image') !== false) {
                $url = wp_get_attachment_url($post->ID);
                wp_redirect($url);
                exit;
            }
        }
    }
}
add_action('template_redirect', 'mm_prevent_attachment_page');
