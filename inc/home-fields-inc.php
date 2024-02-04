<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function mm_home_field_inc()
{
    return [

        Field::make('checkbox', 'enable_most_view_post', 'Enable Most View Post')
            ->set_option_value('yes')
            ->set_default_value(false),

        //text number of most view post
        Field::make('text', 'most_view_post_number', 'Number of Most View Post')
            ->set_default_value(1)
            ->set_help_text('Minimum Number of most view post to show'),

    ];
}
