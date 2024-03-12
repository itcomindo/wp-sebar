<?php

/**
 * Most Views Query
 */

defined('ABSPATH') or die('No script kiddies please!');

// $special_event_post_id = carbon_get_theme_option('special_event_post_id');
$special_event_post_link = get_tag_link(carbon_get_theme_option('special_event_post_id'));

?>

<!-- posts that have most views -->
<div id="sep" class="section high" <?php echo most_view_post_auto_slide(); ?>>
    <div class="container">
        <div id="close-sep" class="sep-toggle"><i class="fas fa-chevron-up"></i></div>
        <div id="open-sep" class="sep-toggle hide"><i class="fas fa-chevron-down"></i></div>
        <div id="sep-wr">
            <div id="sep-top">
                <h3 class="head smaller">Pemilu 2024</h3>
                <span class="text-small lw75-mw100">Section untuk menampilkan post special event seperti: Pemilu, Ramadhan, Bencana, Olahraga dst. NOTE: disable melalui theme option jika tidak ada event.</span>
            </div>
            <div id="sep-bot">
                <?php
                mm_get_special_event_post();
                ?>
            </div>

            <div id="sep-foo" class="flex-col align-center text-center">
                <a class="sep-load-more btn" href="<?php echo $special_event_post_link; ?>" title="Load More News">View More</a>
            </div>



        </div>
    </div>
</div>




<?php




function mm_get_special_event_post()
{

    $mp = mm_get_master_query('special-event-post', 5, 1, 'post');
    if ($mp->have_posts()) {
        echo '<div class="sep-item-wr">';
        while ($mp->have_posts()) {
            $mp->the_post();
            $post_id = get_the_ID();
?>
            <div class="sep-item">
                <div class="sep-item-top">

                    <a class="sep-catlink text-smallest catlink p28" href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category">
                        <?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>
                    </a>

                    <a class="sep-fim-link fim-wr" href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                        <?php
                        echo mm_get_featured_image($post_id);
                        ?>
                    </a>


                    <!-- post views -->
                    <span class="post-views text-smallest p28"><?php echo mm_get_post_meta_inc($post_id)['post-views']; ?></span>


                </div>
                <div class="sep-item-bot">

                    <!-- post date -->
                    <span class="post-date mp-post-date text-smallest p28"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['published-post'])); ?></span>


                    <h3 class="head text-small text-center fw500">
                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo mm_get_custom_post_title(9); ?></a>
                    </h3>
                </div>
            </div>
<?php
        }
        echo '</div>';
        wp_reset_postdata();
    }
}
