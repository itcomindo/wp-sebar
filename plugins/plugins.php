<?php

/**
 * Plugins
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once get_template_directory() . '/plugins/pageview-plugin.php';




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
