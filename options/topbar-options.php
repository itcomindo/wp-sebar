<?php

/**
 * Topbar INC
 */

defined('ABSPATH') or die('No script kiddies please!');


use Carbon_Fields\Field;


//topbar left field
function topbar_left_options()
{
    return [

        Field::make('separator', 'topbarsep', 'Topbar Options')
            ->set_classes('mm-sep'),

        Field::make('checkbox', 'enable_topbar', 'Enable Topbar')
            ->set_option_value('yes')
            ->set_default_value(true),
        Field::make('select', 'topbar_left_content', 'Topbar Left Content')
            ->add_options([
                'text' => 'Text',
                'current-date' => 'Tanggal Hari Ini',
            ])
            ->set_default_value('current-date'),

        //if left content is text
        Field::make('text', 'topbar_left_text', 'Topbar Left Text')
            ->set_conditional_logic([
                [
                    'field' => 'topbar_left_content',
                    'value' => 'text',
                ],
            ]),
    ];
}


function mm_get_topbar_left_inc()
{
    $topbar_left_content = carbon_get_theme_option('topbar_left_content');
    if ($topbar_left_content == 'text') {
        $topbar_left = carbon_get_theme_option('topbar_left_text');
        return $topbar_left;
    } else {
        $timezone = mm_get_timezone()['full'];
        return $timezone;
    }
}


//topbar right field
function topbar_right_options()
{
    return [
        Field::make('select', 'topbar_right_content', 'Topbar Right Content')
            ->add_options([
                'search-form' => 'Search Form',
                // 'social-media' => 'Social Media',
            ])
            ->set_default_value('social-media'),
    ];
}



function mm_get_topbar_right_inc()
{
    $topbar_right_content = carbon_get_theme_option('topbar_right_content');
    if ($topbar_right_content == 'search-form') {
        $trigger_search_box = '<div class="trigger-search-box"><i class="fas fa-search"></i></div>';
        $search_form = mm_get_search_form_component();
        return $search_form . ' ' . $trigger_search_box;
    } else {
        $trigger_social_box = '<div class="trigger-social-box"><i class="fas fa-share-alt"></i></div>';
        $social_media = mm_get_social_media_box_component('horizontal-list');
        return $social_media . ' ' . $trigger_social_box;
    }
}
