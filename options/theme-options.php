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


            Field::make('html', 'crb_information_text')
                ->set_html('<a class="button button-primary button-large" href="//facebook.com/joomblaster" target="_blank">Cek Update</a>'),



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
            ...mm_topbar_left_field_inc(),
            ...mm_topbar_right_field_inc()
        ]);

    //Header
    Container::make('theme_options', 'Header')
        ->set_page_parent($container)
        ->add_fields([
            // ...mm_get_topbar_left_field(),
            ...mm_header_left_field_inc(),
            // ...mm_get_topbar_right_field()
        ]);

    //Home
    Container::make('theme_options', 'Home')
        ->set_page_parent($container)
        ->add_fields([
            ...mm_home_field_inc(),



            Field::make('separator', 'pbc_sep', 'Home Section Post By Category')
                ->set_classes('mm-sep'),

            ...mm_pbc_field_inc(),


        ]);

    //Ads
    Container::make('theme_options', 'Ads')
        ->set_page_parent($container)
        ->add_fields([
            ...mm_ads_header_field_inc()
        ]);
}
