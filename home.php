<?php

/**
 * Home
 */

defined('ABSPATH') or die('No script kiddies please!');

get_header();

if (carbon_get_theme_option('enable_most_view_post')) {
    get_template_part('queries/most-post-views-query');
}


get_template_part('sections/new-post-section');
get_template_part('sections/post-by-category-section');

mm_get_custom_post_type_section($post_perpage = 5, $post_type = 'video');
mm_get_custom_post_type_section($post_perpage = 5, $post_type = 'gallery');

get_template_part('inc/ads/ads-full-section-inc');

get_footer();
