<?php

/**
 * Post Meta INC
 */

defined('ABSPATH') or die('No script kiddies please!');



function mm_get_post_meta_inc($post_id)
{
    $pm = array();
    $pm['author'] = get_the_author_meta('display_name', $post_id);
    $pm['post-date'] = get_the_date('F j, Y', $post_id);
    $pm['time'] = get_the_time('g:i a', $post_id);

    //get category name only
    $categories = get_the_category($post_id);
    $pm['category-name'] = $categories[0]->name;

    //get category link only
    $pm['category-link'] = get_category_link($categories[0]->term_id);



    return $pm;
}
