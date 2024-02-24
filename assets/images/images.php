<?php

/**
 * Images PHP
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_dummy_image()
{
    $image = get_template_directory_uri() . '/assets/images/dummy-1.jpg';
    return $image;
}
