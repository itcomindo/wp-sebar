<?php

/**
 * Sidebars
 */

defined('ABSPATH') or die('No script kiddies please!');
function mm_init_sidebars()
{
    register_sidebar(array(
        'name'          => 'Home Sidebar',
        'id'            => 'home-sidebar',
        'description'   => 'The Home Sidebar.',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => 'Single Post Sidebar',
        'id'            => 'single-2',
        'description'   => 'Deskripsi untuk Single Post Sidebar.',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'mm_init_sidebars');
