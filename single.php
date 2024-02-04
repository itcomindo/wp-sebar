<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');


get_header();

?>
<section id="the-sing" class="section medium">
    <div class="container">
        <span class="estimasi-waktu-baca"></span>
        <h1 class="section-head section-head-bigger"><?php the_title(); ?></h1>
        <div id="the-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php

get_footer();
