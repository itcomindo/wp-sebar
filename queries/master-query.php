<?php

/**
 * Master query
 */

defined('ABSPATH') or die('No script kiddies please!');

/**
 * Master Query
 * @param string $what the query type
 * @param int $post_perpage the number of post per page
 * @param int $ignore_sticky ignore sticky post
 * @param string $post_type the post type
 */
function mm_get_master_query($what = 'news-ticker', $post_perpage = 10, $ignore_sticky = 1, $post_type = 'post')
{
    if ($what == 'news-ticker') {
        $mq = [
            'post_type' => $post_type,
            'posts_per_page' => $post_perpage,
            'ignore_sticky_posts' => $ignore_sticky
        ];
    } elseif ($what == 'hot-topic') {
        $sticky = get_option('sticky_posts');
        $mq = [
            'post_type' => $post_type,
            'posts_per_page' => $post_perpage,
            'post__in' => $sticky,
            'ignore_sticky_posts' => $ignore_sticky
        ];
    } elseif ($what == 'headline') {

        $mq = array(
            'post_type' => $post_type,
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => $ignore_sticky
        );

        if (is_tag()) {
            $mq['tag__in'] = array(get_queried_object_id());
        } elseif (is_category()) {
            $mq['category__in'] = array(get_queried_object_id());
        } elseif (is_search()) {
            $mq['s'] = get_search_query();
        }
    } elseif ($what == 'most-post-views') {
        $most_view_post_number = carbon_get_theme_option('most_view_post_number');
        $mq = array(
            'post_type' => $post_type,
            'posts_per_page' => $post_perpage,
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_key' => 'mm_post_views_count',
            'ignore_sticky_posts' => $ignore_sticky,
            'meta_query' => array(
                array(
                    'key' => 'mm_post_views_count',
                    'value' => $most_view_post_number,
                    'compare' => '>',
                    'type' => 'NUMERIC',
                ),
            ),
        );
    } elseif ($what == 'special-event-post') {
        $tag_id = carbon_get_theme_option('special_event_post_id');
        $mq = array(
            'post_type' => $post_type,
            'posts_per_page' => $post_perpage,
            'tag_id' => $tag_id,
            'ignore_sticky_posts' => $ignore_sticky
        );
    }

    $master_query = new WP_Query($mq);
    return $master_query;
}


function mm_the_rest_post_query()
{
    if (is_category()) {
        $cat_id = get_query_var('cat');
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $the_args = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'offset' => 7,
            'cat' => $cat_id,
            'paged' => $paged,
        ];
    } elseif (is_tag()) {
        $tag_id = get_query_var('tag_id');
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $the_args = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'offset' => 7,
            'tag_id' => $tag_id,
            'paged' => $paged,
        ];
    }



    return $the_args;
}


function mm_get_post_gallery_query($post_perpage = 10)
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_perpage,
        'meta_query' => array(
            array(
                'key' => 'the_post_type',
                'value' => 'gallery',
                'compare' => '='
            )
        )
    );

    return $args;
}
