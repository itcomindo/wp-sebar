<?php

/**
 * Single
 */

defined('ABSPATH') or die('No script kiddies please!');
// $post_id = get_the_ID();

get_header();
$post_view = mm_show_post_views();
$post_id = get_the_ID();
?>
<!-- <span class="estimasi-waktu-baca"></span> -->
<section id="sing" class="section medium">
    <div class="container">
        <div id="sing-wr">

            <!-- content left -->
            <div id="sing-left">
                <div id="sing-title-wr" class="sing-left-col">
                    <h1 class="section-head section-head-medium"><?php the_title(); ?></h1>
                </div>
                <ul class="sing-post-meta-list list-no-style">
                    <!-- date -->
                    <li><?php echo mm_get_post_meta_inc($post_id)['post-date']; ?></li>

                    <!-- author -->
                    <li><?php echo mm_get_post_meta_inc($post_id)['author']; ?></li>

                    <!-- category -->
                    <li><a href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo mm_get_post_meta_inc($post_id)['category-name']; ?>"><?php echo mm_get_post_meta_inc($post_id)['category-name']; ?></a></li>

                    <!-- views -->
                    <li><?php echo $post_view; ?></li>

                    <!-- estimate reading time -->
                    <li><span class="ert"></span></li>

                    <!-- comments count -->
                    <li><?php echo mm_get_post_meta_inc($post_id)['comment-count']; ?></li>




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
