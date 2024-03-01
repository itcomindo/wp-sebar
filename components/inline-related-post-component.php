<?php

/**
 * Inline Related Post Component
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_inline_related_post()
{
    if (is_single() && !is_attachment()) {

        $what = carbon_get_theme_option('inline_related_post_by');
        $number_posts_show = carbon_get_theme_option('inline_related_post_number');
        global $post;

        if ($what === 'category') {
            $categories = get_the_category($post->ID);
            if (!empty($categories)) {
                $category = $categories[0];
                $cat_id = $category->cat_ID;
                $args = array(
                    'category__in' => array($cat_id),
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => $number_posts_show,
                    'orderby' => 'date',
                );
            }
        } else { // Artinya tag
            $tags = get_the_tags($post->ID);
            if (!empty($tags)) {
                $tag = $tags[0];
                $tag_id = $tag->term_id;
                $args = array(
                    'tag__in' => array($tag_id),
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => $number_posts_show,
                    'orderby' => 'date',
                );
            }
        }
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            echo '<div class="inline-related-post">';
            echo '<span class="irp-icon animate__animated"><i class="fa-solid fa-bell"></i></span>';
            echo '<span class="irp-title head smallest">Yuk Baca Juga: </span>';
            echo '<ul class="list-no-style irp-list">';
            while ($query->have_posts()) {
                $query->the_post();
                $title = get_the_title();
                $permalink = get_the_permalink();
                $post_id = get_the_ID();
?>
                <li class="irp">
                    <div class="irp-left">
                        <a href="<?php echo $permalink; ?>" title="<?php echo esc_html($title); ?>">
                            <?php
                            echo mm_get_featured_image($post_id);
                            ?>
                        </a>

                    </div>
                    <div class="irp-right">
                        <a href="<?php echo $permalink; ?>" title="<?php echo esc_html($title); ?>">
                            <?php echo esc_html($title); ?>
                        </a>
                    </div>
                </li>
<?php
            }
            echo '</ul>';
            echo '</div>';
        } else {
            echo 'No related posts found';
        }
        wp_reset_postdata();
    }
}

function mm_show_inline_related_post()
{

    if (carbon_get_theme_option('show_inline_related_post')) {
        add_action('wp_body_open', 'mm_inline_related_post', 100);
    }
}
add_action('wp', 'mm_show_inline_related_post');
