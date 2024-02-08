<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_rest_post_query()
{
    if (is_category()) {
        $cat_id = get_query_var('cat');
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $the_args = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'offset' => 7,
            'cat' => $cat_id,
            'paged' => $paged,
        ];
    } elseif (is_tag()) {
        $tag_id = get_query_var('tag_id');
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $the_args = [
            'post_type' => 'post',
            'posts_per_page' => 10,
            'offset' => 7,
            'tag_id' => $tag_id,
            'paged' => $paged,
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
                    <h3 class="the-post-title small"><a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?></a></h3>
                </div>
            </div>
<?php
        }
        echo '</div>';
    }
    wp_reset_query();
}



function mm_next_page_button()
{
    global $wp_query; // Global query object

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    if ($paged < $max_num_pages) {
        $next_page = intval($paged) + 1;
        $link = get_pagenum_link($next_page);
        echo '<a href="' . esc_url($link) . '" class="next-page-button">Next Page</a>';
    }
}
