<?php

/**
 * Theme Options
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mm_theme_options');
function mm_theme_options()
{
    $container = Container::make('theme_options', 'Theme Options')
        ->add_fields([
            // select style
            Field::make('select', 'style_is', 'Choose Style')
                ->add_options([
                    'style-1' => 'Style 1',
                    'style-2' => 'Style 2',
                ]),
        ]);



    // Topbar
    Container::make('theme_options', 'Topbar')
        ->set_page_parent($container)
        ->add_fields([
            ...mm_topbar_left_field(),
            ...mm_topbar_right_field()
        ]);

    //Header
    Container::make('theme_options', 'Header')
        ->set_page_parent($container)
        ->add_fields([
            // ...mm_get_topbar_left_field(),
            ...mm_header_left_field(),
            // ...mm_get_topbar_right_field()
        ]);
}
