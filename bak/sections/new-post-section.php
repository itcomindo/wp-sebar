<?php

/**
 * New Post Section
 */

defined('ABSPATH') or die('No script kiddies please!');

if (is_category()) {
    $page_title = single_cat_title('', false);
} elseif (is_tag()) {
    $page_title = single_tag_title('', false);
} else {
    $page_title = 'Berita Terbaru';
}



?>


<div id="np-pr" class="section small">
    <div class="container">
        <div id="np-head-wr">
            <h2 class="head smaller">
                <?php echo esc_html($page_title); ?>
            </h2>
        </div>
        <div id="np-wr" class="s1">
            <?php
            echo mm_get_new_posts_query();
            ?>
        </div>
    </div>
</div>