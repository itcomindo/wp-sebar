<?php

/**
 * Header Menu Template
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<div id="header-menu-pr" class="section">
    <div class="container h100">
        <div id="header-menu-wr" class="h100">
            <div class="header-menu-trigger"><i class="fa-solid fa-bars"></i></div>
            <?php
            mm_get_header_menu();
            ?>
        </div>
    </div>
</div>