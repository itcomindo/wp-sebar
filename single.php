<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');
get_header();
if (carbon_get_theme_option('show_estimated_reading_time')) {
    $ert = 'data-ert="true"';
} else {
    $ert = '';
}
?>
<section id="sing" class="section medium" <?php echo $ert; ?>>
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
