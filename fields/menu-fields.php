<?php

/**
 * Menu Fields
 */

defined('ABSPATH') or die('No script kiddies please!');


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mm_mobile_app_fields');
function mm_mobile_app_fields()
{
    Container::make('nav_menu_item', 'Mobile App Menu')
        ->add_fields(array(
            Field::make('text', 'menu_icon', 'Icon')
                ->set_help_text('masukan HANYA nama class icon fontawesome contoh: fa-brands fa-whatsapp'),
        ));
}
