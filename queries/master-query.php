<?php

/**
 * Master query
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_master_query($what = 'news-ticker')
{
    $post_type = 'post';
    $posts_per_page = 5;
    if ($what == 'news-ticker') {
        $mq = [
            'post_type' => 'post',
            'posts_per_page' => 5,
        ];
    } elseif ($what == 'hot-topic') {
        $sticky = get_option('sticky_posts');
        $mq = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'post__in' => $sticky,
            'ignore_sticky_posts' => 1,
        ];
    }

    return $mq;
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
