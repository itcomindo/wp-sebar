<?php

/**
 * Related Post by Tag query
 */

defined('ABSPATH') or die('No script kiddies please!');



function mm_get_related_post_by_tag_query()
{
    if (is_single()) {
        $post_id = get_the_ID();
        $tags = wp_get_post_tags($post_id);
        if ($tags) {
            $tag_ids = array();
            foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $related_post_number = carbon_get_theme_option('related_post_number');
            $args = array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post_id),
                'posts_per_page' => $related_post_number,
                'ignore_sticky_posts' => 1
            );
            $related_posts = new WP_Query($args);
            if ($related_posts->have_posts()) {
                echo '<div class="related-post-wr">';
                echo '<h3 class="related-post-wr-head">Related Posts</h3>';
                echo '<ul class="list-no-style related-post-list">';
                while ($related_posts->have_posts()) {
                    $related_posts->the_post();
?>
                    <li>
                        <div class="relpos-left">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php
                                the_post_thumbnail('full', array('alt' => get_the_title(), 'title' => get_the_title(), 'class' => 'relpost-thumb'));
                                ?>
                            </a>
                        </div>
                        <div class="relpos-right">
                            <h4 class="head relpos-head">
                                <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                    <?php echo get_the_title(); ?>
                                </a>
                            </h4>
                        </div>
                    </li>
<?php
                }
                echo '</ul>';
                echo '</div>';
            }
            wp_reset_postdata();
        }
    }
}
