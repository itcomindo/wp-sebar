<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');
// $post_id = get_the_ID();

get_header();
$post_view = mm_show_post_views();

?>
<!-- <span class="estimasi-waktu-baca"></span> -->
<section id="sing" class="section medium">
    <div class="container">
        <div id="sing-wr">
            <div id="sing-left">
                <div id="sing-title-wr" class="sing-left-col">
                    <h1 class="section-head section-head-medium"><?php the_title(); ?></h1>
                </div>
                <div id="sing-fim-wr">
                    <?php echo mm_get_featured_image(get_the_ID()); ?>
                </div>
                <div id="the-content" class="sing-left-col">
                    <?php
                    the_content();
                    ?>
                </div>
            </div>
            <div id="sing-mid">
                iklan
            </div>
            <div id="sing-right" class="the-sidebar">
                <aside>
                    sidebar
                </aside>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();
