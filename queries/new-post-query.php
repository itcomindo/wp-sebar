<?php

/**
 * New Post Query
 */

defined('ABSPATH') or die('No script kiddies please!');


?>


<div id="np-pr" class="section small">
    <div class="container">
        <div id="np-wr" class="s1">
            <?php
            echo mm_get_new_posts_query();
            ?>
        </div>
    </div>
</div>



<?php

function mm_get_new_posts_query()
{
    if (is_home()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 7,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true
        );
    } elseif (is_tag()) {
        //curent tag id
        $tag_id = get_queried_object_id();
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 7,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
            'tag__in' => array($tag_id)
        );
    } elseif (is_category()) {
        //curent category id
        $cat_id = get_queried_object_id();
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 7,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
            'category__in' => array($cat_id)
        );
    } elseif (is_search()) {
        //search query
        $search_query = get_search_query();
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 7,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
            's' => $search_query
        );
    }
    $np_query = new WP_Query($args);
    if ($np_query->have_posts()) {
        while ($np_query->have_posts()) {
            $np_query->the_post();
            $post_id = get_the_ID();
            $post_views = mm_get_post_views($post_id);
?>
            <div class="np hover-scale hover-overlay">
                <div class="np-top">

                    <a class="fim-wr np-fim-wr" href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                        <?php
                        echo mm_get_featured_image($post_id);
                        ?>
                    </a>


                    <a href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" class="the-link np-cat-link link-with-bg-color-accent-1 cat-link text-smallest" title="<?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?>" rel="category"><?php echo esc_html(mm_get_post_meta_inc($post_id)['category-name']); ?></a>

                    <span class="post-date np-post-date text-smallest"><?php echo esc_html(esc_html(mm_get_post_meta_inc($post_id)['post-date'])); ?></span>




                    <?php echo mm_show_post_views(); ?>
                </div>
                <div class="np-bot">
                    <h3 class="query-head">
                        <a href="<?php echo esc_html(get_the_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>" rel="bookmark">
                            <?php echo esc_html(get_the_title()); ?>
                        </a>
                    </h3>
                </div>
            </div>
        <?php
        }
    } else {
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
}
