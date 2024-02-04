<?php

/**
 * Timezone
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_timezone()
{
    $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $ct = array();
    // echo $date->format('Y-m-d H:i:s');
    $ct['tanggal'] = $date->format('d');
    $ct['bulan'] = $date->format('m');
    $ct['tahun'] = $date->format('Y');
    $ct['jam'] = $date->format('H');
    $ct['menit'] = $date->format('i');
    $ct['detik'] = $date->format('s');
    // $ct['full'] = $date->format('Y-m-d H:i:s');
    $ct['full'] = $date->format('d F, Y H:i:s');
    return $ct;
}
