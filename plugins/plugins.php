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
