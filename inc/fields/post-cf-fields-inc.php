<?php

/**
 * Post Custom Fields
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mm_post_custom_fields');
function mm_post_custom_fields()
{
    Container::make('post_meta', 'Custom Fields')
        ->where('post_type', '=', 'post')
        ->add_fields([

            //separator
            Field::make('separator', 'postcustomsep', 'Post Options')
                ->set_classes('mm-sep'),


            //html
            Field::make('html', 'crb_information_text')
                ->set_html('<span>Custom field ini untuk mengelompokan artikel berdasarkan tipe-tipe nya termasuk juga menampilkan schema microdata.</span>'),

            //select to chose what post type
            Field::make('select', 'the_post_type', 'Post Type')
                ->add_options([
                    'article' => 'Article',
                    'video' => 'Video',
                    'gallery' => 'Photo Gallery',
                    'recipe' => 'Recipe',
                    'code' => 'Code Snippet',
                ])
                ->set_default_value('article'),

            //checkbox to show schema for video, gallery, recipe only
            Field::make('checkbox', 'show_schema', 'Show Schema')
                ->set_option_value('yes')
                ->set_default_value(false)
                ->set_conditional_logic([
                    [
                        'field' => 'the_post_type',
                        'value' => ['video', 'gallery', 'recipe'],
                        'compare' => 'IN',

                    ],
                ]),

            //complex fields contain: text fields for video title, video url, image field for custom thumbnail, and text for duration
            Field::make('complex', 'post_videos', 'Video')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'video_title', 'Video Title')
                        ->set_required(true),
                    Field::make('text', 'video_url', 'Video URL')
                        ->set_required(true),
                    Field::make('image', 'video_thumbnail', 'Custom Thumbnail')
                        ->set_value_type('url'),
                    Field::make('text', 'video_duration', 'Duration'),
                ])
                ->set_header_template('
                <% if (video_title) { %>
                    <%- video_title %>
                <% } else { %>
                    Title
                <% } %>
            ')
                ->set_conditional_logic([
                    [
                        'field' => 'the_post_type',
                        'value' => 'video',
                    ],
                ]),


            //complex fields contain: text fields for gallery title, image field for custom thumbnail, and text for total images
            Field::make('complex', 'post_gallery', 'Photo Gallery')
                ->add_fields([
                    Field::make('text', 'gallery_title', 'Gallery Title')
                        ->set_required(true),
                    Field::make('image', 'gallery_thumbnail', 'Custom Thumbnail')
                        ->set_value_type('url'),
                    Field::make('text', 'gallery_total_images', 'Total Images')
                        ->set_required(true),
                ])
                ->set_conditional_logic([
                    [
                        'field' => 'the_post_type',
                        'value' => 'gallery',
                    ],
                ]),






        ]);
}


function mm_get_post_type($post_id)
{
    $post_type = carbon_get_post_meta($post_id, 'the_post_type');
    if ($post_type == 'video') {
        $post_type = '<span class="the-post-type"><i class="fas fa-video"></i></span>';
    } elseif ($post_type == 'gallery') {
        $post_type = '<span class="the-post-type"><i class="far fa-newspaper"></i></span>';
    } elseif ($post_type == 'recipe') {
        $post_type = '<span class="the-post-type"><i class="fas fa-utensils"></i></span>';
    } elseif ($post_type == 'code') {
        $post_type = '<span class="the-post-type"><i class="fas fa-code"></i></span>';
    } else {
        $post_type = '';
    }
    return $post_type;
}
