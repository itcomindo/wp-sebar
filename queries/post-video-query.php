<?php

/**
 * Post video query
 */

defined('ABSPATH') or die('No script kiddies please!');





function mm_get_post_video_query($post_perpage = 7)
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_perpage,
        'meta_query' => array(
            array(
                'key' => 'the_post_type',
                'value' => 'video',
                'compare' => '='
            )
        )
    );

    return $args;
}



function mm_the_rest_post_video_query()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'offset' => 7,
        'meta_query' => array(
            array(
                'key' => 'the_post_type',
                'value' => 'video',
                'compare' => '='
            )
        )
    );

    return $args;
}
