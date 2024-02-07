<?php

/**
 * Post to exclude query
 */

defined('ABSPATH') or die('No script kiddies please!');





/**
 *  Post to exclude query
 * digunakan untuk melakukan exclude post pada query-query yang lain
 */
function post_to_exclude_query()
{
    $args = array(
        'posts_per_page' => 7,
        'fields' => 'ids',
    );

    $the_query = new WP_Query($args);
    return $the_query->posts;
}
