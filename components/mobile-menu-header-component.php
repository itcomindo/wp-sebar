<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_mobile_menu_header()
{
?>
    <div id="mobm">
        <h2 class="head small mobm-head">WP Sebar Theme</h2>
        <span>Jln. Mujahidin 1 No.112 Kreo Selatan, Larangan, Kota Tangerang, Banten 15156</span>
        <span>0813-9891-2341</span>
    </div>
<?php
}
add_action('wp_footer', 'mm_get_mobile_menu_header');
