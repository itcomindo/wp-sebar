<?php

/**
 * Admin Front End Plugin
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_get_admin_front_end_plugin()
{
    if (is_user_logged_in() && current_user_can('administrator')) {
        global $post;
        $post_id = $post->ID;
        $edit_post_link = get_edit_post_link($post_id);
        $permalink = get_permalink($post_id);
        $permalink = urlencode($permalink);
        $check_index = 'https://www.google.com/search?q=' . $permalink;

?>
        <div class="admin-front-end-trigger"><i class="far fa-hand-pointer"></i></div>
        <div class="admin-front-end">
            <div class="admin-front-end-close">X</div>
            <ul class="list-no-style admin-front-end-list">
                <li><a href="<?php echo $edit_post_link; ?>">Edit Post</a></li>
                <li><a href="<?php echo $check_index; ?>">Cek Google Index</a></li>
            </ul>
        </div>
<?php
    }
}
