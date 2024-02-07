<?php

/**
 * Post By Category Section
 */

defined('ABSPATH') or die('No script kiddies please!');

?>


<div id="pbc" class="s1 section small">
    <div class="container">






        <div id="pbc-wr" class="has-sidebar">

            <div id="pbc-left">

                <div id="pbc-left-top">
                    <div class="ads ads-horizontal">
                        <img class="find-this" src="<?php echo get_template_directory_uri() . '/assets/images/dummy-ads-728x90.jpg'; ?>" alt="Ads" title="Ads">
                    </div>
                </div>

                <div id="pbc-left-bot">

                    <?php
                    if (carbon_get_theme_option('pbc')) {
                        // echo 'ada';
                        mm_get_pbc();
                    } else {
                        mm_get_pbc_fallback();
                    }
                    ?>

                </div>



            </div>


            <!-- post by cat right side (sidebar) -->
            <div class="the-sidebar">
                <aside class="aside">
                    <h3>Heading 3</h3>
                    <span>Span Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere repellendus.</span>
                    <ul>
                        <li><a href="#">Link</a>Lorem ipsum dolor sit, amet consectetur</li>
                        <li>dignissimos commodi repudiandae pariatur! Excepturi, aperiam esse.</li>
                        <li>Lorem ipsum dolor sit, amet consectetur</li>
                        <li>dignissimos commodi repudiandae pariatur! Excepturi, aperiam esse.</li>
                    </ul>
                </aside>
            </div>
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
                <div class="pbcc-name clip-90"><?php echo esc_html($pbc_cat_name); ?></div>
                <div class="pbcc-wr">
                    <?php
                    // $post_not_in = post_to_exclude_query();
                    $post_not_in = $post_ids = post_to_exclude_query();
                    $pbcq = new WP_Query(array(
                        'cat' => $pbc_cat_id,
                        'posts_per_page' => $pbc_number_of_posts,
                        'post__not_in' => $post_not_in,
                    ));
                    if ($pbcq->have_posts()) {
                        while ($pbcq->have_posts()) {
                            $pbcq->the_post();
                            $title = mm_get_custom_post_title(80);
                            $permalink = get_the_permalink();
                            $featured_image = mm_get_featured_image(get_the_ID());
                    ?>
                            <div class="pbcc">
                                <div class="pbcc-top">
                                    <a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>" rel="bookmark">
                                        <?php echo $featured_image; ?>
                                    </a>
                                </div>
                                <div class="pbcc-bot">
                                    <h3 class="the-post-title"><a href="<?php echo esc_html($permalink); ?>" title="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?></a></h3>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    //reset query
                    wp_reset_query();
                    ?>
                </div>
                <a class="pbcc-load-more" href="<?php echo esc_html($pbc_cat_url); ?>" title="<?php echo $pbc_cat_name; ?>">Load More</a>
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
        <a class="pbcc-load-more" href="#">Load More</a>
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
