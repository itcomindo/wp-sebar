<?php

/**
 * New Post Query
 */

defined('ABSPATH') or die('No script kiddies please!');


?>


<div id="np-pr" class="section small">
    <div class="container">
        <div id="np-wr" class="s1">
            <?php
            for ($i = 0; $i < 7; $i++) {
            ?>
                <div class="np">
                    <div class="np-top">
                        <a href="#" class="the-link np-cat-link text-smallest">Olahraga</a>
                        <span class="post-date np-post-date text-smallest">20 Oktober 1976</span>
                        <a class="np-fim-wr" href="#">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Judul Post" title="judul post">
                        </a>
                    </div>
                    <div class="np-bot">
                        <h3 class="query-head">
                            <a href="#">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio labore veritatis <?php echo esc_html($i); ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>