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
        'footer-menu' => 'Footer Menu',
        'mobile-app-menu' => 'Mobile App Menu',
    ]);
}

add_action('init', 'mm_register_menus');


class MM_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Override start_el untuk menghasilkan markup untuk setiap item menu
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $args = (object) $args;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        $icon = carbon_get_nav_menu_item_meta($item->ID, 'menu_icon');
        $icon_html = $icon ? '<i class="' . esc_attr($icon) . '"></i> ' : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = $args->link_before . $icon_html . '<span>' . $title . '</span>' . $args->link_after;

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>' . $title;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

function mm_get_mobile_app_menu()
{
    wp_nav_menu([
        'theme_location' => 'mobile-app-menu',
        'container_class' => 'mobile-app-menu-wr',
        'menu_class' => 'list-no-style mobile-app-menu horizontal-menu',
        'walker' => new MM_Walker_Nav_Menu(),
    ]);
}

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
