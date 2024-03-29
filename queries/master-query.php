<?php

/**
 * Master query
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_master_query($what = 'news-ticker', $post_perpage = 10)
{


    if ($what == 'news-ticker') {
        $mq = [
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'ignore_sticky_posts' => 1,
        ];
    } elseif ($what == 'hot-topic') {
        $sticky = get_option('sticky_posts');
        $mq = [
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'post__in' => $sticky,
        ];
    } elseif ($what == 'headline') {

        $mq = array(
            'post_type' => 'post',
            'posts_per_page' => $post_perpage,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => 1
        );

        if (is_tag()) {
            $mq['tag__in'] = array(get_queried_object_id());
        } elseif (is_category()) {
            $mq['category__in'] = array(get_queried_object_id());
        } elseif (is_search()) {
            $mq['s'] = get_search_query();
        }
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
