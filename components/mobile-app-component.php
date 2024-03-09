<?php

/**
 * Mobile App Component
 */

defined('ABSPATH') or die('No script kiddies please!');


$enable_mobile_app_component = true;

if ($enable_mobile_app_component == true) {
?>
    <div id="mc-pr">


        <div id="mc-home">
            <a href="/">
                <i class="fas fa-house-chimney"></i>
            </a>
        </div>



        <div id="mc-wr">


            <?php
            for ($i = 0; $i < 5; $i++) {
            ?>
                <div class="mc">
                    <i class="fab fa-whatsapp"></i>
                    <span class="text-smallest">Home</span>
                </div>
            <?php
            }
            ?>




        </div>
    </div>
<?php
}
