<?php

/**
 * Sidebar Template
 */

defined('ABSPATH') or die('No script kiddies please!');


?>

<div class="the-sidebar">
    <aside class="aside w100">

        <!-- widget 1 start -->
        <div class="widget">
            <h3 class="head smaller">Recent Post</h3>
            <ul class="list-no-style recpost-list">
                <?php
                for ($i = 0; $i < 5; $i++) {
                ?>
                    <li class="recpost">
                        <div class="recpost-left">
                            <a class="widget-link" href="#">
                                <img class="find-this" src="<?php echo mm_get_dummy_image(); ?>" alt="Judul Post">
                            </a>
                        </div>
                        <div class="recpost-right">
                            <h3 class="recpost-head head text-smaller fw500"><a class="widget-link" href="#">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates dolore.</a></h3>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- widget 1 end -->



        <!-- widget 2 start -->

        <div class="widget">
            <h3 class="head smaller">Ads</h3>
            <a class="widget-link-image" href="#">
                <img class="find-this" src="<?php echo mm_get_dummy_image(); ?>" alt="Widget">
            </a>
        </div>

        <!-- widget 2 end -->




    </aside>
</div>