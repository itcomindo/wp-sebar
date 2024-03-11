<?php

/**
 * Mobile App Component
 */

defined('ABSPATH') or die('No script kiddies please!');


$enable_mobile_app_component = true;

if ($enable_mobile_app_component == true) {
?>
    <div id="mc-pr" class="hide">


        <div id="mc-home">
            <a href="/">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>

        <?php

        if (has_nav_menu('mobile-app-menu')) {
            mm_get_mobile_app_menu();
        } else {
            mm_mobile_app_dummy();
        }

        ?>





    </div>
    <?php
}


function mm_mobile_app_dummy()
{
    for ($i = 0; $i < 5; $i++) {
    ?>
        <div id="mc-wr">
            <div class="mc">
                <i class="fab fa-whatsapp"></i>
                <span class="text-smallest">Home</span>
            </div>
        </div>
<?php
    }
}
