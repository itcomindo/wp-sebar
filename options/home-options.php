<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function home_options()
{
    return [

        // Home Options
        Field::make('separator', 'homesep', 'Homepage')
            ->set_classes('mm-sep'),


        /**
         * special event start
         * Description: untuk menampilkan section special event post seperti: pemilu, ramadhan, natal, dll
         */
        Field::make('separator', 'sepsep', 'Special Event')
            ->set_classes('mm-sep child'),

        //checkbox to enable special_eve_post
        //jika di centang maka akan menampilkan section special event post di homepage
        Field::make('checkbox', 'enable_special_event_post', 'Enable Special Event Post')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('Enable special event post section akan menampilkan post yang memiliki tag khusus max 5 post per section tapi sudah disertai link view more'),

        //tag id for special event post
        // tag ID untuk special event post
        Field::make('text', 'special_event_post_id', 'Special Event Post ID')
            ->set_attribute('type', 'number')
            ->set_help_text('Tag ID for special event post ketik hanya angka saja'),
        //---------END special event post


        /**
         * most view poststart
         * Description: untuk menampilkan section most view post yaitu post yang memiliki jumlah view terbanyak
         * view dihitung dari jumlah view yang ada di post meta
         */
        Field::make('separator', 'mvsep', 'Most View Post Section')
            ->set_classes('mm-sep child'),

        //checkbox to enable most view post
        //jika di centang maka akan menampilkan section most view post di homepage
        Field::make('checkbox', 'enable_most_view_post', 'Enable Most View Post')
            ->set_option_value('yes')
            ->set_default_value(false),

        //text number of most view post
        //jumlah minimal view yang harus dimiliki oleh post agar bisa ditampilkan
        Field::make('text', 'most_view_post_number', 'Number of Most View Post')
            ->set_default_value(1)
            ->set_help_text('Minimum Number of most view post to show'),

        //checkbox auto slide
        //jika di centang maka section most view post akan otomatis slide
        Field::make('checkbox', 'most_view_post_auto_slide', 'Enable Auto Slide')
            ->set_option_value('yes')
            ->set_default_value(false),

        //duration auto slide
        //durasi auto slide dalam milisecond
        Field::make('text', 'most_view_post_auto_slide_duration', 'Auto Slide Duration')
            ->set_default_value(3000)
            ->set_help_text('Duration in milisecond'),

        //---------END most view post





    ];
}


function most_view_post_auto_slide()
{
    $i = carbon_get_theme_option('most_view_post_auto_slide');
    $duration = carbon_get_theme_option('most_view_post_auto_slide_duration');
    if ($i) {
        $auto_slide = 'data-autoplay="true" data-autoplay-speed="' . $duration . '"';
    } else {
        $auto_slide = '';
    }
    return $auto_slide;
}
