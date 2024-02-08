<?php

/**
 * Most Views Query
 */

defined('ABSPATH') or die('No script kiddies please!');



?>


<div id="mp" class="section small" <?php echo most_view_post_auto_slide(); ?>>
    <div class="container">
        <div id="mp-wr">
            <?php
            mm_get_most_post_view_posts();
            ?>
        </div>
    </div>
</div>




<?php




function mm_get_most_post_view_posts()
{
    $most_view_post_number = carbon_get_theme_option('most_view_post_number');
    $args = array(
        'post_type' => 'post', // Atau custom post type Anda
        'posts_per_page' => 7, // Jumlah post yang ingin ditampilkan, -1 untuk semua post
        'meta_key' => 'mm_post_views_count', // Kunci meta untuk jumlah view
        'orderby' => 'meta_value_num', // Mengurutkan berdasarkan nilai numerik meta
        'order' => 'DESC', // Urutan dari yang terbesar ke terkecil
        'meta_query' => array(
            array(
                'key' => 'mm_post_views_count',
                'value' => $most_view_post_number,
                'compare' => '>',
                'type' => 'NUMERIC', // Pastikan tipe adalah numerik
            ),
        ),
    );
    $mp = new WP_Query($args);
    if ($mp->have_posts()) {
        echo '<ul class="list-no-style mp-list">';
        while ($mp->have_posts()) {
            $mp->the_post();
            $post_id = get_the_ID();
?>
            <li class="mp-item hover-overlay hover-scale">
                <div class="mp-item-top">

                    <a href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" class="the-link mp-cat-link link-with-bg-color-accent-1 text-smallest" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category"><?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?></a>

                    <a class="fim-wr" href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                        <?php
                        echo mm_get_featured_image($post_id);
                        ?>
                    </a>
                </div>
                <div class="mp-item-bot">
                    <a class="fw600" href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo mm_get_custom_post_title(50); ?></a>
                </div>
            </li>
<?php
        }
        echo '</ul>';
        // Restore original Post Data
        wp_reset_postdata();
    }
}
