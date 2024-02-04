<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');
// $post_id = get_the_ID();

get_header();

?>
<section id="the-sing" class="section medium">
    <div class="container">
        <span class="estimasi-waktu-baca"></span>
        <span>
            <?php
            echo mm_show_post_views();
            ?>
        </span>
        <h1 class="section-head section-head-bigger"><?php the_title(); ?></h1>
        <div id="the-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php

get_footer();
