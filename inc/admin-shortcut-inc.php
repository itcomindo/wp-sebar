<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

if (current_user_can('administrator') && is_user_logged_in()) {
    echo '<div class="admin-shortcut-trigger"><span>S</span></div>';
}


//if user role is administrator, and user is logged in, show admin shortcut
if (current_user_can('administrator') && is_user_logged_in()) {
    echo '<div class="admin-shortcut">';
    echo '<div class="admin-shortcut-close">X</div>';
    echo '<ul class="list-no-style text-smallest">';


    //go to theme option /wp-admin/admin.php?page=crb_carbon_fields_container_theme_options.php
    echo '<li><a href="' . esc_url(admin_url('admin.php?page=crb_carbon_fields_container_theme_options.php')) . '">Theme Options</a></li>';




    // to dashboard
    echo '<li><a href="' . esc_url(admin_url()) . '">Dashboard</a></li>';

    // all posts
    echo '<li><a href="' . esc_url(admin_url('edit.php')) . '">All Posts</a></li>';

    // add new post
    echo '<li><a href="' . esc_url(admin_url('post-new.php')) . '">Add New Post</a></li>';

    //if is single post, show edit post
    if (is_single()) {
        echo '<li><a href="' . esc_url(admin_url('post.php?post=' . get_the_ID() . '&action=edit')) . '">Edit Post</a></li>';
    }

    // all pages
    echo '<li><a href="' . esc_url(admin_url('edit.php?post_type=page')) . '">All Pages</a></li>';

    // add new page
    echo '<li><a href="' . esc_url(admin_url('post-new.php?post_type=page')) . '">Add New Page</a></li>';

    //if is single page, show edit page
    if (is_page()) {
        echo '<li><a href="' . esc_url(admin_url('post.php?post=' . get_the_ID() . '&action=edit')) . '">Edit Page</a></li>';
    }

    //all plugins
    echo '<li><a href="' . esc_url(admin_url('plugins.php')) . '">All Plugins</a></li>';

    //add new plugin
    echo '<li><a href="' . esc_url(admin_url('plugin-install.php')) . '">Add New Plugin</a></li>';

    echo '</ul>';
    echo '</div>';
}
