<?php

/**
 * Topbar Template
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<div class="section" id="topbar">
    <div class="container h100">
        <div id="topbar-wr" class="h100">
            <div id="topbar-left" class="h100 text-small"><span><?php echo esc_html(mm_get_topbar_left_inc()); ?></span></div>
            <div id="topbar-right" class="h100 text-small"><?php echo mm_get_topbar_right_inc(); ?></div>
        </div>
    </div>
</div>