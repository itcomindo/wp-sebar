<?php

/**
 * Custom Columns
 */

defined('ABSPATH') or die('No script kiddies please!');




//create custom columns to show category ID in category list
add_filter('manage_edit-category_columns', 'mm_category_columns');
function mm_category_columns($columns)
{
    $columns['cat_id'] = 'ID';
    return $columns;
}

add_filter('manage_category_custom_column', 'mm_category_columns_content', 10, 3);
function mm_category_columns_content($content, $column_name, $term_id)
{
    if ('cat_id' === $column_name) {
        return $term_id;
    }
    return $content;
}
