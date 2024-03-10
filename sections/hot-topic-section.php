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
    $ht = mm_get_master_query('hot-topic');
    $htq = new WP_Query($ht);
    if ($htq->have_posts()) {
        while ($htq->have_posts()) {
            $htq->the_post();
            $post_id = get_the_ID();
            $title = get_the_title();
            $permalink = get_the_permalink();
?>
            <div class="ht-item borad-5 overflow-hidden">
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
                    <h3 class="head text-small fw500">
                        <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
                            <?php echo $title; ?>
                        </a>
                    </h3>
                </div>
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
