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
    Container::make('post_meta', 'Post Options')
        ->where('post_type', '=', 'post')
        ->add_fields([


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
                ->set_help_text('Add your photo gallery here *required')
                ->set_layout('tabbed-horizontal')
                ->set_classes('danger')
                ->set_required(true)
                ->add_fields([
                    // title
                    Field::make('text', 'photo_title', 'Photo Title')
                        ->set_required(true),

                    // image
                    Field::make('image', 'gallery_thumbnail', 'Custom Thumbnail')
                        ->set_value_type('url')
                        ->set_required(true),

                    //textare photo_description
                    Field::make('rich_text', 'photo_description', 'Photo Description'),



                ])
                ->set_conditional_logic([
                    [
                        'field' => 'the_post_type',
                        'value' => 'gallery',
                    ],
                ])
                ->set_header_template('
                <% if (photo_title) { %>
                    <%- photo_title %>
                <% } else { %>
                    Title
                <% } %>
            '),






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
