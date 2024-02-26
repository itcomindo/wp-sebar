<?php

/**
 * Custom Post Type Section
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_custom_post_type_section($post_perpage = 10, $post_type = '')
{
?>
    <div class="custom-post-type-section section small z-index-10">
        <div class="container">
            <div class="content-inner">
                <div class="cpt-top">
                    <h3 class="head smaller text-capitalize color-accent-1"><?php echo esc_html($post_type); ?></h3>
                </div>
                <div class="cpt-bot">
                    <ul class="list-no-style cpt-item-list">
                        <?php
                        $cpts = mm_get_post_custom_type_query($post_perpage, $post_type);
                        $cpt = new WP_Query($cpts);
                        if ($cpt->have_posts()) {
                            while ($cpt->have_posts()) {
                                $cpt->the_post();
                                $title = get_the_title();
                                $permalink = get_the_permalink();

                                if ($post_type === 'video') {
                                    $readmore = '<a class="readmore text-small color-accent-1 p-smaller" href="' . $permalink . '">Tonton Video</a>';
                                    $vids = carbon_get_post_meta(get_the_ID(), 'post_videos');
                                    if ($vids) {
                                        $vid = $vids[0]['video_duration'];
                                        $duration = '<span class="cpt-duration text-smallest absolute z-index-10 p-smallest">' . esc_html($vid) . '</span>';
                                    }
                                } elseif ($post_type === 'gallery') {
                                    $readmore = '<a class="readmore text-small color-accent-1 p-smaller" href="' . $permalink . '">Lihat Photo</a>';
                                    $duration = '';
                                } else {
                                    $readmore = '<a class="readmore text-small color-accent-1 p-smaller" href="' . $permalink . '">Selengkapnya</a>';
                                    $duration = '';
                                }






                        ?>
                                <li class="cpt-item hover-to-top">
                                    <div class="cpt-item-top">
                                        <?php echo $duration; ?>
                                        <a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>">
                                            <?php
                                            the_post_thumbnail('full', array('class' => 'fim'));
                                            ?>
                                        </a>
                                    </div>

                                    <div class="cpt-item-bot">
                                        <h4 class="head text-small fw500">
                                            <a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>">
                                                <?php
                                                echo esc_html($title);
                                                ?>
                                            </a>
                                        </h4>
                                        <?php echo $readmore; ?>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                    <div class="cpt-footer">
                        <a class="btn text-small bg-color-accent-1-dark color-light-1 borad-5 w-max-content p-small" href="/<?php echo esc_html($post_type); ?>/" title="Load More gallery Posts">Load More <?php echo esc_html($post_type); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
