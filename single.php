<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');
get_header();
if (carbon_get_theme_option('show_estimated_reading_time')) {
    $estimate_reading_time = 'data-ert="true"';
} else {
    $estimate_reading_time = '';
}












?>
<section id="sing" class="section medium" <?php echo $estimate_reading_time . ' ' . mm_set_inline_related_post()['enable'] . ' ' . mm_set_inline_related_post()['insert-after']; ?>>
    <div class="container">
        <div id="sing-wr">

            <!-- content left -->
            <?php
            get_template_part('inc/single-left-inc');
            ?>
            <!-- content left end -->

            <!-- content right/sidebar -->
            <?php
            get_sidebar();
            ?>
            <!-- content right/sidebar end -->




        </div>
    </div>
</section>
<?php

get_footer();
