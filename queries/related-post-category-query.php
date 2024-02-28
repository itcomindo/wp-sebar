<?php

/**
 * Related Post by Tag query
 */
defined('ABSPATH') or die('No script kiddies please!');
function mm_get_related_post_by_category_query()
{
    if (is_single()) {
        $post_id = get_the_ID();
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            foreach ($categories as $category) $category_ids[] = $category->term_id;
            $related_post_number = carbon_get_theme_option('related_post_number');
            $args = array(
                'category__in' => $category_ids,
                'post__not_in' => array($post_id),
                'posts_per_page' => $related_post_number,
                'ignore_sticky_posts' => 1
            );
            $related_posts = new WP_Query($args);
            if ($related_posts->have_posts()) {
                echo '<div class="related-post-wr">';
                echo '<h3 class="head smallest">Related Posts</h3>';
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
