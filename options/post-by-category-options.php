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
            ->set_classes('mm-sep child')
            ->set_help_text('Post by Category Section akan menampilkan post berdasarkan category yang dipilih'),

        Field::make('complex', 'pbc', 'Post by Category Section Selection')
            ->set_min(2)
            ->set_max(4)
            ->add_fields([

                //nama kategori
                Field::make('text', 'pbc_name', 'Nama Kategori')
                    ->set_help_text('masukan nama kategori contoh: "Berita Terbaru" atau "Pilihan Editor" jika tidak diisi maka akan menampilkan category ID'),

                //category id
                Field::make('text', 'pbc_id', 'Category ID')
                    ->set_attribute('type', 'number')
                    ->set_help_text('masukan category ID'),

                //jumlah post yang akan ditampilkan
                Field::make('text', 'pbc_num', 'Judul Post yang Ditampilkan')
                    ->set_default_value(5)
                    ->set_help_text('masukan jumlah post yang akan ditampilkan default 5'),
            ])
            ->set_layout('tabbed-horizontal')
            ->set_header_template('
                <% if (pbc_name) { %>
                    <%- pbc_name %>
                <% } else { %>
                    ID
                <% } %>
            '),
    ];
}


function get_cat_name_by_id($cat_id)
{
    $cat_id = (int) $cat_id;
    $cat_name = get_cat_name($cat_id);
    return $cat_name;
}
