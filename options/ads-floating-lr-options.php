<?php

/**
 * Ads Floating Left Right Option
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function ads_floating_lr_options()
{
    return [

        // ads floating left right
        Field::make('separator', 'adsflolrsep', 'Ads Floating Left Right')
            ->set_classes('mm-sep'),


        Field::make('checkbox', 'enable_floating_ads', 'Enable Floating Ads Left and Right Side')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('menampilkan iklan floating di sisi kiri dan kanan'),
    ];
}
