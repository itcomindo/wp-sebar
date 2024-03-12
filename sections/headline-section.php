<?php

/**
 * Headline Section
 */

defined('ABSPATH') or die('No script kiddies please!');

if (is_category()) {
    $page_title = single_cat_title('', false);
} elseif (is_tag()) {
    $page_title = single_tag_title('', false);
} else {
    $page_title = 'Headline News';
}

?>
<div id="np-pr" class="section medium">
    <div class="container">
        <div id="np-head-wr">
            <h2 class="head smallest">
                <?php echo esc_html($page_title); ?>
            </h2>
        </div>
        <div id="np-wr" class="s1">
            <?php
            $np_query = mm_get_master_query('headline', 7);

            if ($np_query->have_posts()) {
                while ($np_query->have_posts()) {
                    $np_query->the_post();
                    $post_id = get_the_ID();
                    $post_views = mm_get_post_views($post_id);
                    $post_type = mm_get_post_type($post_id);

            ?>
                    <div class="np">


                        <?php
                        if (is_user_logged_in() && current_user_can('administrator')) {
                            mm_get_admin_front_end_plugin();
                        }
                        ?>

                        <?php echo $post_type; ?>

                        <div class="np-top">

                            <a class="fim-wr np-fim-wr" href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                                <?php
                                echo mm_get_featured_image($post_id);
                                ?>
                            </a>

                            <!-- category link -->
                            <a class="np-cat p28 catlink text-smallest" href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category"><?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?></a>



                        </div>

                        <!-- new post bottom -->
                        <div class="np-bot">

                            <!-- post date -->
                            <span class="post-date np-post-date text-smallest p28"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['published-post'])); ?></span>


                            <!-- post title -->
                            <h3 class="head text-small text-center">
                                <a class="fw500" href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>" rel="bookmark">
                                    <?php
                                    echo mm_get_custom_post_title(9);
                                    ?>
                                </a>
                            </h3>

                            <!-- post view -->
                            <span class="post-views text-smallest p28">
                                <?php
                                echo mm_get_post_meta_inc($post_id)['post-views'];
                                ?>
                            </span>
                        </div>
                    </div>
            <?php
                }
            } else {
                mm_get_headline_dummy();
            }
            ?>
        </div>
    </div>
</div>

<?php
function mm_get_headline_dummy()
{
    for ($i = 0; $i < 7; $i++) {
?>
        <div class="np">
            <div class="np-top">
                <a href="#" class="the-link np-cat-link text-smallest">Olahraga</a>
                <span class="post-date np-post-date text-smallest">20 Oktober 1976</span>
                <a class="np-fim-wr" href="#">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Judul Post" title="judul post">
                </a>
            </div>
            <div class="np-bot">
                <h3 class="query-head">
                    <a href="#">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio labore veritatis <?php echo esc_html($i); ?>
                    </a>
                </h3>
            </div>
        </div>
<?php
    }
}
