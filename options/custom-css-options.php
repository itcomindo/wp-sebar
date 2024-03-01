<?php

/**
 * Custom CSS Options
 */

defined('ABSPATH') or die('No script kiddies please!');



use Carbon_Fields\Field;

function custom_css_options()
{
    return [
        //textarea
        Field::make('textarea', 'custom_css', 'Custom CSS')
            ->set_classes('custcss')
            ->set_help_text('Add your custom CSS here')
    ];
}
