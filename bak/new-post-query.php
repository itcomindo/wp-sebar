<?php

/**
 * New Post Query
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_new_posts_query()
{
    $mm_args = array(
        'post_type' => 'post',
        'posts_per_page' => 7,
        'orderby' => 'date',
        'order' => 'DESC',
        'ignore_sticky_posts' => true
    );

    if (is_tag()) {
        $mm_args['tag__in'] = array(get_queried_object_id());
    } elseif (is_category()) {
        $mm_args['category__in'] = array(get_queried_object_id());
    } elseif (is_search()) {
        $mm_args['s'] = get_search_query();
    }

    $np_query = new WP_Query($mm_args);

    return $np_query;
}
