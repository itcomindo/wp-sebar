<?php

/**
 * Category Rest Post Section
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<section id="crp" class="section medium">
    <div class="container">
        <div id="crp-wr">
            <!-- <div id="crp-top"></div> -->
            <div id="crp-bot" class="has-sidebar">
                <div id="crp-left" class="crp-col">
                    <?php
                    mm_get_rest_post_query();
                    mm_next_page_button();
                    ?>

                </div>
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div>
</section>