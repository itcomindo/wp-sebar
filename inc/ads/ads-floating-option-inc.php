<?php

/**
 * Ads Floating Left Right Option
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function mm_ads_floating_field_inc()
{
    return [
        Field::make('checkbox', 'enable_floating_ads', 'Enable Floating Ads')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('menampilkan iklan floating di sisi kiri dan kanan'),
    ];
}
