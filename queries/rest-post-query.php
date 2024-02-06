<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_rest_post_query()
{
    if (is_category()) {
        //get category id
        $cat_id = get_query_var('cat');
        $the_args = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'offset' => 7,
            'cat' => $cat_id,
        ];
    } elseif (is_tag()) {
        //get tag id
        $tag_id = get_query_var('tag_id');
        $the_args = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'offset' => 7,
            'tag_id' => $tag_id,
        ];
    }

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
                    <h3 class="the-post-title"><a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?></a></h3>
                </div>
            </div>
<?php
        }
        echo '</div>';
    }
    wp_reset_query();
}
