<?php

/**
 * Post Meta INC
 */

defined('ABSPATH') or die('No script kiddies please!');



function mm_get_post_meta_inc($post_id)
{
    $pm = array();

    // Mendapatkan user ID dari penulis postingan
    $author_id = get_post_field('post_author', $post_id);

    // Menggunakan user ID untuk mendapatkan nickname penulis
    $author = get_the_author_meta('nickname', $author_id);
    if (empty($author)) {
        $pm['author'] = 'Admin';
    } else {
        $pm['author'] = $author;
    }

    $pm['post-date'] = get_the_date('F j, Y', $post_id);
    $pm['time'] = get_the_time('g:i a', $post_id);

    // Mendapatkan nama dan link kategori
    $categories = get_the_category($post_id);
    if (!empty($categories)) {
        $pm['category-name'] = $categories[0]->name;
        $pm['category-link'] = get_category_link($categories[0]->term_id);
    } else {
        $pm['category-name'] = 'No Category';
        $pm['category-link'] = '#';
    }

    //comment count
    $comment_count = get_comments_number($post_id);
    if ($comment_count == 0) {
        $pm['comment-count'] = 'No Comments';
    } elseif ($comment_count == 1) {
        $pm['comment-count'] = $comment_count . ' Comment';
    } else {
        $pm['comment-count'] = $comment_count . ' Comments';
    }

    return $pm;
}
