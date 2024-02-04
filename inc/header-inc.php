<?php

/**
 * Header Inc
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;
//topbar left field
function mm_header_left_field_inc()
{
    return [

        //fields start below this line
        Field::make('select', 'header_left_content', 'Header Logo Option')
            ->add_options([
                'text' => 'Text',
                'image' => 'Image',
            ])
            ->set_default_value('text'),

        //if left content is text
        Field::make('text', 'header_left_text', 'Header Left Text')
            ->set_required(true)
            ->set_conditional_logic([
                [
                    'field' => 'header_left_content',
                    'value' => 'text',
                ],
            ]),

        //if left content is image
        Field::make('image', 'header_left_image', 'Header Left Image')
            ->set_required(true)
            ->set_value_type('url')
            ->set_help_text('Recommended tinggi 100px lebar 300px')
            ->set_conditional_logic([
                [
                    'field' => 'header_left_content',
                    'value' => 'image',
                ],
            ]),






        //fields end above this line
    ];
}


function mm_get_header_left()
{
    //get site name
    $site_name = get_bloginfo('name');

    $header_left_content = carbon_get_theme_option('header_left_content');
    if ($header_left_content == 'text') {
        $header_left = carbon_get_theme_option('header_left_text');
        if ($header_left) {
            $header_left = $header_left;
        } else {
            $header_left = 'WP Free News Theme';
        }
        return '<h2 class="section-head section-head-medium"><a href="/" title="' . $site_name . '">' . $header_left . '</a></h2>';
    } else {
        $header_left = carbon_get_theme_option('header_left_image');
        return '<a class="header-logo-wr" href="/"><img class="find-this" src="' . $header_left . '" alt="' . $site_name . '" title="' . $site_name . '"></a>';
    }
}
