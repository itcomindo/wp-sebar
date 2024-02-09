<?php

/**
 * Post Tag Component
 */

defined('ABSPATH') or die('No script kiddies please!');


if (is_single() && has_tag()) {

?>
    <div class="the-tags">
        <span>Tags: </span>
        <?php
        $post_tags = get_the_tags();
        if ($post_tags) {
            echo '<ul class="post-tags list-no-style">';
            foreach ($post_tags as $tag) {
                echo '<li><a href="' . get_tag_link($tag->term_id) . '" title="' . $tag->name . '">' . $tag->name . '</a></li>';
            }
            echo '</ul>';
        }

        ?>
    </div>
<?php
}
