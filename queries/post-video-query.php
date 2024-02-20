<?php

/**
 * Post video query
 */

defined('ABSPATH') or die('No script kiddies please!');





function mm_get_post_video_query()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 15,
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
