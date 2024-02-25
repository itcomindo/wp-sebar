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
                        $gallery = mm_get_post_custom_type($post_perpage, $post_type);
                        $video = new WP_Query($gallery);
                        if ($video->have_posts()) {
                            while ($video->have_posts()) {
                                $video->the_post();
                                $title = get_the_title();
                                $permalink = get_the_permalink();
                        ?>
                                <li class="cpt-item">
                                    <div class="cpt-item-top">

                                        <?php
                                        the_post_thumbnail('full', array('class' => 'fim'));
                                        ?>
                                    </div>

                                    <div class="cpt-item-bot">
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
                    <div class="cpt-footer">
                        <a href="/gallery/" title="Load More Video Posts">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
