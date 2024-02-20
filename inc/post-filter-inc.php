<?php

/**
 * Post filter
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_show_news_type_column($columns)
{
    $columns['the-post-type-column'] = 'News Type';
    return $columns;
}
add_filter('manage_posts_columns', 'mm_show_news_type_column');

function mm_sortable_news_type_column($columns)
{
    $columns['the-post-type-column'] = 'the_post_type';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'mm_sortable_news_type_column');

function mm_populate_new_column($column_name, $post_id)
{
    if ($column_name == 'the-post-type-column') {
        $value = carbon_get_post_meta($post_id, 'the_post_type');
        $url = add_query_arg(['the_post_type_filter' => $value], admin_url('edit.php'));
        echo sprintf('<a href="%s" target="_blank">%s</a>', esc_url($url), esc_html($value));
    }
}
add_action('manage_posts_custom_column', 'mm_populate_new_column', 10, 2);
function mm_filter_posts_by_the_post_type($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && !empty($_GET['the_post_type_filter'])) {
        $meta_query = array(
            array(
                'key' => 'the_post_type',
                'value' => $_GET['the_post_type_filter'],
                'compare' => '='
            )
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'mm_filter_posts_by_the_post_type');
