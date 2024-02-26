<?php

/**
 * Menus
 */

defined('ABSPATH') or die('No script kiddies please!');




/**
 * register menus (header-menu, footer-menu)
 */

function mm_register_menus()
{
    register_nav_menus([
        'header-menu' => 'Header Menu',
        'footer-menu' => 'Footer Menu'
    ]);
}

add_action('init', 'mm_register_menus');



/**
 * Get header menu
 */
function mm_get_header_menu()
{
    wp_nav_menu([
        'theme_location' => 'header-menu',
        'container' => 'nav',
        'container_id' => 'header-menu-nav',
        'container_class' => 'h100',
        'menu_class' => 'list-no-style header-menu horizontal-menu',
    ]);
}

/**
 * Get footer menu
 */
function mm_get_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'container' => 'nav',
        'container_id' => 'footer-menu-nav',
        'container_class' => 'h100',
        'menu_class' => 'list-no-style footer-menu vertical-menu hover color-light-2',
    ]);
}
