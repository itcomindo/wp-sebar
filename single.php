<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');
// $post_id = get_the_ID();

get_header();
$post_view = mm_show_post_views();

if ($post_view == '') {
    $post_view = '';
} else {
    $post_view = '<li class="singpbviews"><span>' . $post_view . '</span> <span>views</span></li>';
}


$post_id = get_the_ID();
?>
<!-- <span class="estimasi-waktu-baca"></span> -->
<section id="sing" class="section medium">
    <div class="container">
        <div id="sing-wr">

            <!-- content left -->
            <div id="sing-left">
                <div id="sing-title-wr" class="sing-left-col">
                    <!-- date -->
                    <div class="post-published text-small"><span class="singpbdate"><?php echo mm_get_post_meta_inc($post_id)['published-post-date']; ?></span> <span class="singpbmonth"> <?php echo mm_get_post_meta_inc($post_id)['published-post-month']; ?></span><span class="singpbyear"><?php echo mm_get_post_meta_inc($post_id)['published-post-year']; ?></span></div>

                    <!-- author -->
                    <span class="text-small singpbauthor">Author: <?php echo mm_get_post_meta_inc($post_id)['author']; ?></span>

                    <h1 id="single-post-title" class="section-head section-head-medium"><?php the_title(); ?></h1>
                </div>
                <ul class="sing-post-meta-list list-no-style text-smaller">
                    <!-- category -->
                    <li class="singpbcat">Category: <a href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo mm_get_post_meta_inc($post_id)['category-name']; ?>"><?php echo mm_get_post_meta_inc($post_id)['category-name']; ?></a></li>

                    <!-- views -->
                    <?php echo $post_view; ?>

                    <!-- estimate reading time -->
                    <li><span class="ert"></span></li>

                </ul>
                <div id="sing-fim-wr">
                    <?php echo mm_get_featured_image(get_the_ID()); ?>
                </div>
                <div id="the-content-wr">
                    <div id="the-content" class="sing-left-col">
                        <?php
                        the_content();
                        if (comments_open()) {
                            comment_form();
                        }
                        comments_template();
                        ?>
                    </div>
                    <div id="the-content-sidebar">
                        <aside>
                            <h3 class="the-sidebar-head medium">Konten Sidebar</h3>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- content left end -->

            <!-- content right/sidebar -->
            <?php
            get_sidebar();
            ?>
            <!-- content right/sidebar end -->




        </div>
    </div>
</section>
<?php

get_footer();
