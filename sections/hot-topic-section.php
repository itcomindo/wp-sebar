<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');


?>

<div id="ht-pr" class="section medium">
    <div class="container">
        <div id="ht-wr" class="inner-content">
            <!-- hot topic top -->
            <div id="ht-top">
                <h3 class="head smallest">Hot Topik</h3>
            </div>

            <!-- hot topic bottom -->
            <div id="ht-bot">
                <div class="ht-item-wr">

                    <?php
                    mm_get_hot_topic_posts();
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

function mm_get_hot_topic_posts()
{
    // $htq = new WP_Query($ht);
    $htq = mm_get_master_query('hot-topic', 10, 1, 'post');
    if ($htq->have_posts()) {
        while ($htq->have_posts()) {
            $htq->the_post();
            $post_id = get_the_ID();
            $title = mm_get_custom_post_title(9);
            $permalink = get_the_permalink();

            $post_type = mm_get_post_type($post_id);

            if (carbon_get_post_meta($post_id, 'the_post_type') == 'promo') {
                $promotion = 'promotion';
                $promo_date_limit = carbon_get_post_meta($post_id, 'promo_date_limit');
            } else {
                $promotion = '';
            }
?>
            <div class="ht-item borad-5 overflow-hidden <?php echo $promotion; ?>">


                <a class="mp-catlink text-smallest catlink p28" href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category">
                    <?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>
                </a>


                <!-- ht item top -->
                <div class="ht-item-top aspect-ratio-169 overflow-hidden">

                    <a class="fhw hw100" href="<?php echo $permalink; ?>" <?php echo $title; ?>>
                        <?php
                        echo mm_get_featured_image($post_id);
                        ?>
                    </a>
                </div>

                <!-- ht item bot -->
                <div class="ht-item-bot">

                    <!-- post date -->
                    <span class="post-date mp-post-date text-smallest p28"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['published-post'])); ?></span>


                    <h3 class="head text-small fw500">
                        <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
                            <?php echo $title; ?>
                        </a>
                    </h3>
                </div>

                <!-- post views -->
                <span class="post-views text-smallest p28 z2"><?php echo mm_get_post_meta_inc($post_id)['post-views']; ?></span>
            </div>
        <?php
        }
    } else {
        mm_get_hot_topic_posts_dummy();
    }
    wp_reset_postdata();
}


function mm_get_hot_topic_posts_dummy()
{
    for ($i = 1; $i <= 5; $i++) {
        ?>
        <div class="ht-item borad-5 overflow-hidden">
            <!-- ht item top -->
            <div class="ht-item-top aspect-ratio-169">
                <a class="fhw flex-col align-center justify-center" href="#">
                    <img class="find-this hw100" src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post">
                </a>
            </div>

            <!-- ht item bot -->
            <div class="ht-item-bot">
                <h3 class="head text-small fw500">
                    <a href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    </a>
                </h3>
            </div>
        </div>
<?php

    }
}
