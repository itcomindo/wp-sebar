<?php

/**
 * Most Views Query
 */

defined('ABSPATH') or die('No script kiddies please!');



?>

<!-- posts that have most views -->
<div id="mp" class="section small" <?php echo most_view_post_auto_slide(); ?>>
    <div class="container">
        <div id="mp-wr">
            <h3 class="head smallest">Most Views News</h3>
            <?php
            mm_get_most_post_view_posts();
            ?>
        </div>
    </div>
</div>




<?php




function mm_get_most_post_view_posts()
{

    $mp = mm_get_master_query('most-post-views', 7, 1, 'post');
    if ($mp->have_posts()) {
        echo '<ul class="list-no-style mp-list">';
        while ($mp->have_posts()) {
            $mp->the_post();
            $post_id = get_the_ID();
?>
            <li class="mp-item">
                <div class="mp-item-top">

                    <a class="mp-catlink text-smallest catlink p28" href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category">
                        <?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>
                    </a>

                    <a class="fim-wr" href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                        <?php
                        echo mm_get_featured_image($post_id);
                        ?>
                    </a>


                    <!-- post views -->
                    <span class="post-views text-smallest p28"><?php echo mm_get_post_meta_inc($post_id)['post-views']; ?></span>


                </div>
                <div class="mp-item-bot">

                    <!-- post date -->
                    <span class="post-date mp-post-date text-smallest p28"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['published-post'])); ?></span>


                    <h3 class="head text-small text-center fw500">
                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo mm_get_custom_post_title(9); ?></a>
                    </h3>
                </div>
            </li>
<?php
        }
        echo '</ul>';
        wp_reset_postdata();
    }
}
