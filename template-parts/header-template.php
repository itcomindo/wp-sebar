<?php

/**
 * Header Template
 */

defined('ABSPATH') or die('No script kiddies please!');



?>

<header id="header" class="section <?php echo esc_html(carbon_get_theme_option('header_left_content')); ?>">
    <div class="container h100">
        <div id="header-wr" class="h100">
            <div id="header-left" class="h100">
                <?php echo mm_get_header_left(); ?>
            </div>


            <div id="header-right" class="h100">
                <div class="ads ads-horizontal">
                    <span>ADS</span>
                    <span>Ads Horizontal</span>
                </div>
            </div>
        </div>
    </div>
</header>