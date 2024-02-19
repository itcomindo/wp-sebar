<?php

/**
 * Single Left INC
 */

defined('ABSPATH') or die('No script kiddies please!');

global $post;
$post_id = get_the_ID();

$post_view = mm_get_post_views($post_id);

if ($post_view == '') {
    $post_view = '';
} else {
    $post_view = '<li class="singpbviews"><span>' . $post_view . '</span> <span>views</span></li>';
}

if (carbon_get_theme_option('show_toc')) {
    $show_toc = 'data-toc="true"';
} else {
    $show_toc = '';
}







?>
<div id="sing-left">


    <div id="sing-title-wr" class="sing-left-col">
        <!-- Post Meta -->
        <div class="post-published text-small">

            <!-- date -->
            <span class="singpbdate"><?php echo mm_get_post_meta_inc($post_id)['published-post-date']; ?></span>

            <!-- month -->
            <span class="singpbmonth"> <?php echo mm_get_post_meta_inc($post_id)['published-post-month']; ?></span>

            <!-- year -->
            <span class="singpbyear"><?php echo mm_get_post_meta_inc($post_id)['published-post-year']; ?></span>

        </div>

        <!-- author -->
        <span class="text-small singpbauthor">Author: <?php echo mm_get_post_meta_inc($post_id)['author']; ?></span>

        <!-- post title -->
        <h1 id="single-post-title" class="head medium"><?php the_title(); ?></h1>


    </div>


    <!-- post meta -->
    <ul class="sing-post-meta-list list-no-style text-smaller">

        <!-- category -->
        <li class="singpbcat">Category: <a href="<?php echo mm_get_post_meta_inc($post_id)['category-link']; ?>" title="<?php echo mm_get_post_meta_inc($post_id)['category-name']; ?>"><?php echo mm_get_post_meta_inc($post_id)['category-name']; ?></a></li>

        <!-- views -->
        <?php echo $post_view; ?>

        <!-- estimate reading time -->
        <li><span class="ert"></span></li>

    </ul>


    <!-- featured image -->
    <div id="sing-fim-wr">
        <?php echo mm_get_featured_image(get_the_ID()); ?>
    </div>


    <div id="the-content-wr">

        <div id="the-content" class="sing-left-col" <?php echo $show_toc; ?>>
            <?php
            the_content();
            get_template_part('components/post-tags-component');
            if (comments_open()) {
                comment_form();
            }
            comments_template();
            ?>
        </div>

        <div id="the-content-sidebar">
            <aside>
                <h3 class="head smaller">Konten Sidebar</h3>
            </aside>
        </div>
    </div>



</div>