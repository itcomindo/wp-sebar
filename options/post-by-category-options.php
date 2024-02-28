<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function post_by_category_options()
{
    return [

        Field::make('separator', 'pbc_sep', 'Post By Category')
            ->set_classes('mm-sep'),

        Field::make('complex', 'pbc', 'Post by Category Section Selection')
            ->set_min(2)
            ->set_max(4)
            ->add_fields([
                Field::make('text', 'pbc_id', 'Category ID')
                    ->set_attribute('type', 'number')
                    ->set_help_text('masukan category ID'),

                Field::make('text', 'pbc_num', 'Number of Cards')
                    ->set_default_value(5)
                    ->set_help_text('masukan jumlah post yang akan ditampilkan default 5'),
            ])
            ->set_layout('tabbed-horizontal')
            ->set_header_template('
                <% if (pbc_id) { %>
                    <%- pbc_id %>
                <% } else { %>
                    ID
                <% } %>
            '),
    ];
}
