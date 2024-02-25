<?php

/**
 * Data Website
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_data_website_inc()
{
    $dw = array();


    //nama perusahaan
    $dw['nama-perusahaan'] = carbon_get_theme_option('nama_perusahaan');

    //deskripsi perusahaan
    $dw['deskripsi-perusahaan'] = carbon_get_theme_option('deskripsi_perusahaan');

    //tagline perusahaan
    $dw['tagline-perusahaan'] = carbon_get_theme_option('tagline_perusahaan');

    //alamat perusahaan
    $dw['alamat-perusahaan'] = carbon_get_theme_option('alamat_perusahaan');

    //kota perusahaan
    $dw['kota-perusahaan'] = carbon_get_theme_option('kota_perusahaan');

    //provinsi perusahaan
    $dw['provinsi-perusahaan'] = carbon_get_theme_option('provinsi_perusahaan');

    //kode pos perusahaan
    $dw['kode-pos-perusahaan'] = carbon_get_theme_option('kode_pos_perusahaan');

    //negara perusahaan
    $dw['negara-perusahaan'] = carbon_get_theme_option('negara_perusahaan');

    //alamat lengkap perusahaan
    $dw['alamat-lengkap-perusahaan'] = $dw['alamat-perusahaan'] . ', ' . $dw['kota-perusahaan'] . ', ' . $dw['provinsi-perusahaan'] . ', ' . $dw['kode-pos-perusahaan'] . ', ' . $dw['negara-perusahaan'];

    //telepon kanor perusahaan
    $dw['telepon-kantor-perusahaan'] = carbon_get_theme_option('telepon_kantor_perusahaan');

    //handphone perusahaan
    $dw['handphone-perusahaan'] = carbon_get_theme_option('handphone_perusahaan_untuk_display');

    //email perusahaan
    $dw['email-perusahaan'] = carbon_get_theme_option('email_perusahaan');

    //handphone perusahaan url
    $dw['handphone-perusahaan-url'] = carbon_get_theme_option('handphone_perusahaan_untuk_tombol');

    //faks perusahaan
    $dw['faks-perusahaan'] = carbon_get_theme_option('faks_perusahaan');

    //sosial media
    $dw['sosial-media'] = carbon_get_theme_option('sosmed_perusahaan');

    return $dw;
}
