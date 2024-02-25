<?php

/**
 * Website Data Fields
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function mm_website_data_field_inc()
{
    return [

        //nama_perusahaan
        Field::make('text', 'nama_perusahaan', 'Nama Perusahaan')
            ->set_default_value('PT. Joom Blaster')
            ->set_help_text('Nama perusahaan yang akan ditampilkan di website'),


        //deskripsi_perusahaan
        Field::make('rich_text', 'deskripsi_perusahaan', 'Deskripsi Perusahaan')
            ->set_default_value('WP Sebar News Theme adalah tema WordPress gratis untuk menghadirkan berita-berita terkait dengan baerbagai macam hal.')
            ->set_help_text('Deskripsi perusahaan yang akan ditampilkan di website'),

        //tagline_perusahaan
        Field::make('text', 'tagline_perusahaan', 'Tagline Perusahaan')
            ->set_default_value('Membangun masa depan dengan teknologi')
            ->set_help_text('Tagline perusahaan yang akan ditampilkan di website'),

        //alamat_perusahaan
        Field::make('text', 'alamat_perusahaan', 'Alamat Perusahaan')
            ->set_default_value('Jl. Joom Blaster No. 1')
            ->set_help_text('Alamat perusahaan yang akan ditampilkan di website'),

        //kota_perusahaan
        Field::make('text', 'kota_perusahaan', 'Kota Perusahaan')
            ->set_default_value('Jakarta')
            ->set_help_text('Kota perusahaan yang akan ditampilkan di website'),

        //negara_perusahaan
        Field::make('text', 'negara_perusahaan', 'Negara Perusahaan')
            ->set_default_value('Indonesia')
            ->set_help_text('Negara perusahaan yang akan ditampilkan di website'),

        //provinsi_perusahaan
        Field::make('text', 'provinsi_perusahaan', 'Provinsi Perusahaan')
            ->set_default_value('DKI Jakarta')
            ->set_help_text('Provinsi perusahaan yang akan ditampilkan di website'),

        //kode_pos_perusahaan
        Field::make('text', 'kode_pos_perusahaan', 'Kode Pos Perusahaan')
            ->set_default_value('12345')
            ->set_help_text('Kode pos perusahaan yang akan ditampilkan di website'),

        //telepon_perusahaan
        Field::make('text', 'telepon_kantor_perusahaan', 'Telepon Kantor Perusahaan Untuk Display')
            ->set_default_value('021-1234567')
            ->set_help_text('Nomor telepon perusahaan yang akan ditampilkan di website'),

        //handphone_perusahaan
        Field::make('text', 'handphone_perusahaan_untuk_display', 'Handphone Perusahaan Untuk Display')
            ->set_default_value('08123456789')
            ->set_help_text('Nomor handphone perusahaan yang akan ditampilkan di website'),

        //handphone_perusahaan_untuk_tombol
        Field::make('text', 'handphone_perusahaan_untuk_tombol', 'Handphone Perusahaan Untuk Tombol')
            ->set_default_value('628123456789')
            ->set_help_text('Nomor handphone perusahaan yang akan ditampilkan sebagai tombol telepon atau chat whatsapp di website'),

        //email_perusahaan
        Field::make('text', 'email_perusahaan', 'Email Perusahaan')
            ->set_default_value('mail.perusahaan@gmail.com')
            ->set_help_text('Alamat email perusahaan yang akan ditampilkan di website'),

        //faks_perusahaan
        Field::make('text', 'faks_perusahaan', 'Faks Perusahaan')
            ->set_default_value('021-1234567')
            ->set_help_text('Nomor faks perusahaan yang akan ditampilkan di website'),


        Field::make('separator', 'sep', 'Social Media')
            ->set_classes('mm-sep'),

        Field::make('complex', 'sosmed_perusahaan', 'Sosial Media')
            ->set_layout('tabbed-horizontal')
            ->add_fields([
                //nama sosial media
                Field::make('text', 'sosmed_name', 'Nama Sosial Media')
                    ->set_help_text('Nama sosial media yang akan ditampilkan di website'),

                //link sosial media
                Field::make('text', 'sosmed_link', 'Link Sosial Media')
                    ->set_help_text('Link sosial media yang akan ditampilkan di website'),

                //icon sosial media
                Field::make('text', 'sosmed_icon', 'Icon Sosial Media')
                    ->set_help_text('Icon contoh: &#60;i class="fab fa-facebook-square"&#62;&#60;/i&#62; silahkan lihat di <a href="https://fontawesome.com/search" target="_blank">Font Awesome</a>')
            ])
            ->set_header_template('
                <% if (sosmed_name) { %>
                    <%- sosmed_name %>
                <% } else { %>
                    Platform
                <% } %>
            '),




    ];
}
