<?php

/**
 * Comments
 */

defined('ABSPATH') or die('No script kiddies please!');


// Get only the approved comments

if (is_single()) {
    $post_id = get_the_ID();
    $args = array(
        'status' => 'approve',
        'post_id' => $post_id,
    );
    $comments_query = new WP_Comment_Query();
    $comments       = $comments_query->query($args);

    // Comment Loop
    if ($comments) {
        foreach ($comments as $comment) {
            //author
            $comment_author = get_comment_author($comment->comment_ID);
            //author url
            $comment_author_url = get_comment_author_url($comment->comment_ID);
            //avatar
            $avatar = get_avatar($comment->comment_author_email, 32);
            //date
            $comment_date = get_comment_date('F j, Y', $comment->comment_ID);
            //content
            $comment_content = $comment->comment_content;
?>
            <div class="combox">
                <div class="combox-left">
                    <div class="avatar-wr">
                        <?php echo $avatar; ?>
                    </div>
                </div>
                <div class="combox-right">
                    <span>Nama: <?php echo $comment_author; ?></span>
                    <blockquote><?php echo esc_html($comment_content); ?></blockquote>
                </div>
            </div>
<?php
        }
    } else {
        echo 'Belum Ada Komentar';
    }
}




// The comment Query
