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
    Container::make('theme_options', 'Website')
        ->set_page_parent($container)
        ->add_fields([
            ...website_data_options(),
        ]);



    // Topbar
    Container::make('theme_options', 'Topbar')
        ->set_page_parent($container)
        ->add_fields([
            ...topbar_left_options(),
            ...topbar_right_options()
        ]);

    //Header
    Container::make('theme_options', 'Header')
        ->set_page_parent($container)
        ->add_fields([
            ...header_left_options(),
        ]);

    //Home
    Container::make('theme_options', 'Home')
        ->set_page_parent($container)
        ->add_fields([


            ...home_options(),





            ...post_by_category_options(),


        ]);


    //Single
    Container::make('theme_options', 'Single')
        ->set_page_parent($container)
        ->add_fields([
            ...single_options(),
        ]);

    //Ads
    Container::make('theme_options', 'Ads')
        ->set_page_parent($container)
        ->add_fields([


            ...ads_header_options(),



            ...ads_fixed_bottom_options(),



            ...ads_floating_lr_options(),
        ]);
}
