<?php

/**
 * Template Name: Video Page
 */

defined('ABSPATH') or die('No script kiddies please!');

get_header();


?>

<div id="np-pr" class="section small">
    <div class="container">
        <div id="np-wr" class="s1">
            <?php
            $pvq = mm_get_post_video_query(7);
            $pvq = new WP_Query($pvq);
            if ($pvq->have_posts()) {
                while ($pvq->have_posts()) {
                    $pvq->the_post();
                    $post_id = get_the_ID();
                    $post_views = mm_get_post_views($post_id);
                    $post_type = mm_get_post_type($post_id);
            ?>
                    <div class="np hover overlay-color">
                        <?php echo $post_type; ?>

                        <div class="np-top">

                            <a class="fim-wr np-fim-wr" href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                                <?php
                                echo mm_get_featured_image($post_id);
                                ?>
                            </a>


                            <a href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" class="the-link np-cat-link link-with-bg-color-accent-1 cat-link text-smallest" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category"><?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?></a>

                            <span class="post-date np-post-date text-smallest"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['published-post'])); ?></span>

                        </div>
                        <div class="np-bot">
                            <h3 class="head smallest font-secondary">
                                <a class="fw500" href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>" rel="bookmark">
                                    <?php
                                    echo mm_get_custom_post_title(80);
                                    ?>
                                </a>
                            </h3>

                            <!-- post view -->
                            <span class="post-views text-smallest">
                                <?php
                                echo mm_get_post_meta_inc($post_id)['post-views'];
                                ?>
                            </span>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<section id="crp" class="section medium">
    <div class="container">
        <div id="crp-wr">
            <!-- <div id="crp-top"></div> -->
            <div id="crp-bot" class="has-sidebar">
                <div id="crp-left" class="crp-col">
                    <?php
                    $the_args = mm_the_rest_post_video_query();
                    $the_query = new WP_Query($the_args);
                    if ($the_query->have_posts()) {
                        echo '<div class="rp-wr">';
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $title = mm_get_custom_post_title(80);
                            $permalink = get_the_permalink();
                            $featured_image = mm_get_featured_image(get_the_ID());
                    ?>
                            <div class="rp">
                                <div class="dtop">
                                    <a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>" rel="bookmark">
                                        <?php echo $featured_image; ?>
                                    </a>
                                </div>

                                <div class="dbot">
                                    <h3 class="head text-small">
                                        <a class="fw500" href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                    <?php
                        }
                        echo '</div>';
                    }
                    wp_reset_query();
                    mm_next_page_button();
                    ?>

                </div>
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div>
</section>



<?php


get_footer();
