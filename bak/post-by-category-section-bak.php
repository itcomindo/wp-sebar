<?php

/**
 * Post By Category Section
 */

defined('ABSPATH') or die('No script kiddies please!');

?>


<div id="pbc" class="s1 section medium">
    <div class="container">

        <div id="pbc-wr" class="has-sidebar">

            <div id="pbc-left" class="has-sidebar-left">

                <div id="pbc-left-top">
                    <div class="ads ads-horizontal">
                        <img class="find-this" src="<?php echo get_template_directory_uri() . '/assets/images/dummy-ads-728x90.jpg'; ?>" alt="Ads" title="Ads">
                    </div>
                </div>

                <div id="pbc-left-bot">

                    <?php
                    if (carbon_get_theme_option('pbc')) {
                        mm_get_pbc();
                    } else {
                        mm_get_pbc_fallback();
                    }
                    ?>

                </div>



            </div>


            <!-- post by cat right side (sidebar) -->

            <?php
            get_sidebar();
            ?>

        </div>
    </div>
</div>

<?php




/**
 * get post by category
 */
function mm_get_pbc()
{
    $pbcs = carbon_get_theme_option('pbc');
    if ($pbcs) {
        foreach ($pbcs as $pbc) {
            $pbc_cat_id = $pbc['pbc_id'];
            $pbc_number_of_posts = $pbc['pbc_num'];
            $pbc_cat_name = get_cat_name($pbc_cat_id);
            $pbc_cat_url = get_category_link($pbc_cat_id);
?>
            <div class="pbcc-pr">
                <div class="head text-smaller clip-90 color-accent-1-dark p-smallest"><?php echo esc_html($pbc_cat_name); ?></div>
                <div class="pbcc-wr">
                    <?php
                    $post_not_in = $post_ids = post_to_exclude_query();
                    $pbcq = new WP_Query(array(
                        'cat' => $pbc_cat_id,
                        'posts_per_page' => $pbc_number_of_posts,
                        'post__not_in' => $post_not_in,
                    ));
                    if ($pbcq->have_posts()) {
                        while ($pbcq->have_posts()) {
                            $pbcq->the_post();
                            $post_id = get_the_ID();
                            $title = mm_get_custom_post_title(8);
                            $permalink = get_the_permalink();
                            $featured_image = mm_get_featured_image(get_the_ID());
                            $post_type = mm_get_post_type($post_id);

                            if (carbon_get_post_meta($post_id, 'the_post_type') == 'promo') {
                                $promotion = 'promotion';
                            } else {
                                $promotion = '';
                            }

                    ?>
                            <div class="pbcc <?php echo $promotion; ?>">
                                <?php
                                echo $post_type;
                                ?>
                                <div class="pbcc-top">
                                    <!-- post view -->
                                    <span class="post-views text-smallest">
                                        <?php
                                        echo mm_get_post_meta_inc($post_id)['post-views'];
                                        ?>
                                    </span>
                                    <a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>" rel="bookmark">
                                        <?php echo $featured_image; ?>
                                    </a>
                                </div>
                                <div class="pbcc-bot">

                                    <!-- post date -->
                                    <span class="post-date pbcc-post-date text-smallest"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['published-post'])); ?></span>

                                    <!-- post title -->
                                    <h3 class="pbc-head head text-smaller">
                                        <a class="fw500" href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    //reset query
                    wp_reset_query();
                    ?>
                </div>
                <a class="pbcc-load-more text-small color-accent-1-dark fw600" href="<?php echo esc_html($pbc_cat_url); ?>" title="<?php echo $pbc_cat_name; ?>">Load More</a>
            </div>
    <?php
        }
    }
}





/**
 * get post by category fallback
 */
function mm_get_pbc_fallback()
{
    $cards = 5;
    ?>
    <div class="pbcc-pr">
        <div class="pbcc-name clip-90">Olahraga</div>
        <div class="pbcc-wr">
            <?php
            for ($i = 0; $i < $cards; $i++) {
            ?>
                <div class="pbcc">
                    <div class="pbcc-top">
                        <a href="#" title="Post Title" rel="bookmark">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                        </a>
                    </div>
                    <div class="pbcc-bot">
                        <h3 class="the-post-title"><a href="#" title="Post Title">Judul Post</a></h3>
                        <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati.</span> -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="pbcc-load-more text-small" href="#">Load More</a>
    </div>

    <div class="pbcc-pr">
        <div class="pbcc-name clip-90">Kesehatan</div>
        <div class="pbcc-wr">
            <?php

            for ($i = 0; $i < $cards; $i++) {
            ?>
                <div class="pbcc">
                    <div class="pbcc-top">
                        <a href="#" title="Post Title" rel="bookmark">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                        </a>
                    </div>
                    <div class="pbcc-bot">
                        <h3 class="the-post-title"><a href="#" title="Post Title">Judul Post</a></h3>
                        <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati.</span> -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="pbcc-load-more" href="#">Load More</a>
    </div>

    <div class="pbcc-pr">
        <div class="pbcc-name clip-90">Travel</div>
        <div class="pbcc-wr">
            <?php
            for ($i = 0; $i < $cards; $i++) {
            ?>
                <div class="pbcc">
                    <div class="pbcc-top">
                        <a href="#" title="Post Title" rel="bookmark">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                        </a>
                    </div>
                    <div class="pbcc-bot">
                        <h3 class="the-post-title"><a href="#" title="Post Title">Judul Post</a></h3>
                        <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati.</span> -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="pbcc-load-more" href="#">Load More</a>
    </div>

    <div class="pbcc-pr">
        <div class="pbcc-name clip-90">Mancanegara</div>
        <div class="pbcc-wr">
            <?php
            for ($i = 0; $i < $cards; $i++) {
            ?>
                <div class="pbcc">
                    <div class="pbcc-top">
                        <a href="#" title="Post Title" rel="bookmark">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                        </a>
                    </div>
                    <div class="pbcc-bot">
                        <h3 class="the-post-title"><a href="#" title="Post Title">Judul Post</a></h3>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="pbcc-load-more" href="#">Load More</a>
    </div>
<?php
}
