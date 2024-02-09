<?php

/**
 * Pageview Plugin
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_is_bot()
{
    $bot_keywords = array(
        'bot', 'crawl', 'slurp', 'spider', 'curl', 'facebook', 'fetch', 'google', 'bing', 'yandex', 'twitter'
    );

    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);

    foreach ($bot_keywords as $keyword) {
        if (strpos($user_agent, $keyword) !== false) {
            return true;
        }
    }

    return false;
}

function mm_update_post_views($post_id)
{
    if (!mm_is_bot()) {
        $count_key = 'mm_post_views_count';
        $count = get_post_meta($post_id, $count_key, true);
        if ($count == '') {
            $count = 0;
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '1');
        } else {
            $count++;
            update_post_meta($post_id, $count_key, $count);
        }
    }
}

function mm_track_post_views($post_id = null)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    mm_update_post_views($post_id);
}

add_action('wp_head', 'mm_track_post_views');




function mm_get_post_views($post_id)
{
    $count_key = 'mm_post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        // return;
    }
    return $count;
}

function mm_show_post_views($post_id = null)
{
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    $post_views = mm_get_post_views($post_id);
    if ($post_views != 0) {
        $post_views = $post_views;
    } else {
        $post_views = '';
    }
    return $post_views;
}





/**
 * Menambah Kolom
 */

function mm_add_custom_columns($columns)
{
    $columns['mm_post_views'] = 'Jumlah View';
    $columns['mm_reset_post_views'] = 'Reset Post View';
    return $columns;
}
add_filter('manage_posts_columns', 'mm_add_custom_columns');

function mm_custom_columns_content($column, $post_id)
{
    switch ($column) {
        case 'mm_post_views':
            echo mm_get_post_views($post_id);
            break;
        case 'mm_reset_post_views':
            echo '<a href="#" class="mm-reset-view-button" data-post-id="' . esc_attr($post_id) . '">Reset</a>';
            break;
    }
}
add_action('manage_posts_custom_column', 'mm_custom_columns_content', 10, 2);

// Script untuk menghandle reset view
function mm_reset_post_views_script()
{
?>
    <script>
        jQuery(document).ready(function($) {
            $('.mm-reset-view-button').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                var data = {
                    'action': 'mm_reset_post_views',
                    'post_id': postId
                };
                $.post(ajaxurl, data, function(response) {
                    alert('Post view reset to 0');
                    location.reload();
                });
            });
        });
    </script>
<?php
}
add_action('admin_footer', 'mm_reset_post_views_script');

function mm_reset_post_views_ajax()
{
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']);
        delete_post_meta($post_id, 'mm_post_views_count');
        add_post_meta($post_id, 'mm_post_views_count', '0');
        echo 'Success';
    }
    wp_die();
}
add_action('wp_ajax_mm_reset_post_views', 'mm_reset_post_views_ajax');


/**
 * Menambahkan Opsi Bulk Select untuk Reset Post View
 */

function mm_add_bulk_actions($bulk_actions)
{
    $bulk_actions['reset_post_views'] = 'Reset Post Views';
    return $bulk_actions;
}
add_filter('bulk_actions-edit-post', 'mm_add_bulk_actions');

function mm_handle_bulk_action_edit_post($redirect_to, $doaction, $post_ids)
{
    if ($doaction === 'reset_post_views') {
        foreach ($post_ids as $post_id) {
            delete_post_meta($post_id, 'mm_post_views_count');
            add_post_meta($post_id, 'mm_post_views_count', '0');
        }
        $redirect_to = add_query_arg('bulk_reset_post_views', count($post_ids), $redirect_to);
    }
    return $redirect_to;
}
add_filter('handle_bulk_actions-edit-post', 'mm_handle_bulk_action_edit_post', 10, 3);

function mm_bulk_action_admin_notice()
{
    if (!empty($_REQUEST['bulk_reset_post_views'])) {
        $post_count = intval($_REQUEST['bulk_reset_post_views']);
        printf('<div id="message" class="updated fade"><p>' .
            _n(
                '%s post view reset to 0.',
                '%s post views reset to 0.',
                $post_count,
                'mm'
            ) . '</p></div>', $post_count);
    }
}
add_action('admin_notices', 'mm_bulk_action_admin_notice');
