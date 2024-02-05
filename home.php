<?php

/**
 * Home
 */

defined('ABSPATH') or die('No script kiddies please!');

get_header();

if (carbon_get_theme_option('enable_most_view_post')) {
    get_template_part('queries/most-post-views-query');
}
get_template_part('inc/sections/new-post-section');
get_template_part('inc/sections/post-by-category-section');

get_footer();
