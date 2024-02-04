<?php

/**
 * Featured Image INC
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_featured_image($post_id)
{
    //if post has featured image
    if (has_post_thumbnail($post_id)) {
        //get featured image
        $featured_image = get_the_post_thumbnail($post_id, 'full', array('class' => 'fim', 'alt' => get_the_title($post_id), 'title' => get_the_title($post_id)));
    } else {
        //if post has no featured image
        $featured_image = mm_get_fallback_featured_image_inc();
    }
    return $featured_image;
}


function mm_get_fallback_featured_image_inc()
{
    $fallback_featured_image = get_template_directory_uri() . '/assets/images/fall-back.webp';
    return '<img class="find-this" src="' . $fallback_featured_image . '" class="fim" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
}
