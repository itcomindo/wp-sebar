<?php

/**
 * news ticker section
 */

defined('ABSPATH') or die('No script kiddies please!');


$newstickers = mm_get_master_query('news-ticker');
$nt = new WP_Query($newstickers);

?>
<section id="nt-pr" class="section">
    <div class="container h100">
        <div id="nt-wr" class="h100">
            <div id="nt-left" class="text-small">New News:</div>
            <div id="nt-right">
                <ul class="list-no-style nt-list">

                    <?php


                    if ($nt->have_posts()) {
                        while ($nt->have_posts()) {
                            $nt->the_post();
                            $title = get_the_title();
                            $permalink = get_the_permalink();
                    ?>
                            <li><a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?></a></li>
                    <?php
                        }
                    }


                    ?>


                </ul>
            </div>
        </div>
    </div>
</section>