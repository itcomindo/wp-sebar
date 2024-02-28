<?php

/**
 * Post Video Section
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<div id="postvid" class="section small z-index-10">
    <div class="container">
        <div class="content-inner">
            <div id="postvid-top">
                <h3 class="head text-smaller">Video</h3>
            </div>
            <div id="postvid-bot">
                <ul class="list-no-style postvid-item-list">
                    <?php
                    $video = new WP_Query(mm_get_post_video_query(10));
                    if ($video->have_posts()) {
                        while ($video->have_posts()) {
                            $video->the_post();
                            $title = get_the_title();
                            $permalink = get_the_permalink();
                    ?>
                            <li class="postvid-item">
                                <div class="postvid-item-top">

                                    <?php
                                    the_post_thumbnail('full', array('class' => 'fim'));
                                    ?>
                                </div>

                                <div class="postvid-item-bot">
                                    <h4 class="head text-small fw500">
                                        <a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>">
                                            <?php
                                            echo esc_html($title);
                                            ?>
                                        </a>
                                    </h4>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <div class="post-vid-footer">
                    <a href="/video/" title="Load More Video Posts">Load More</a>
                </div>
            </div>
        </div>
    </div>
</div>