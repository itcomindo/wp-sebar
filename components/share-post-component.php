<?php

/**
 * Share Post Component
 */

defined('ABSPATH') or die('No script kiddies please!');



/**
 * Share Post Component
 * Description: This component is used to display the share post component only show in single post. share to: facebook, instagram, twitter, linkedin, pinterest, whatsapp, email, print, copy link
 */
function mm_get_share_post_component()
{
    if (is_single()) {
        global $post;

        //get the post data like title, permalink, excerpt, thumbnail. For title and permalink, we can use the default WP function get_the_title() and get_the_permalink(). For excerpt, we can use the default WP function get_the_excerpt(). For thumbnail, we can use the default WP function get_the_post_thumbnail().

        $title = get_the_title();
        $permalink = get_the_permalink();
        $excerpt = get_the_excerpt();
        $thumbnail = get_the_post_thumbnail();

        echo '<div class="sharepost-wr p-medium">';
        echo '<ul class="sharepost-list list-no-style flex-row flex-wrap justify-space-around gap-small gap-small">';

        //facebook
        echo '<li class="sharepost-item">';
        echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $permalink . '" target="_blank" class="sharepost-link" title="Share to Facebook">';
        echo '<i class="fab fa-facebook-f"></i>';
        echo '</a>';
        echo '</li>';

        //instagram
        echo '<li class="sharepost-item">';
        echo '<a href="https://www.instagram.com/" target="_blank" class="sharepost-link" title="Share to Instagram">';
        echo '<i class="fab fa-instagram"></i>';
        echo '</a>';
        echo '</li>';

        //twitter
        echo '<li class="sharepost-item">';
        echo '<a href="https://twitter.com/intent/tweet?url=' . $permalink . '&text=' . $title . '" target="_blank" class="sharepost-link" title="Share to Twitter">';
        echo '<i class="fab fa-twitter"></i>';
        echo '</a>';
        echo '</li>';

        //linkedin
        echo '<li class="sharepost-item">';
        echo '<a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&title=' . $title . '&summary=' . $excerpt . '&source=' . get_bloginfo('name') . '" target="_blank" class="sharepost-link" title="Share to LinkedIn">';
        echo '<i class="fab fa-linkedin-in"></i>';
        echo '</a>';
        echo '</li>';

        //whatsapp
        echo '<li class="sharepost-item">';
        echo '<a href="https://api.whatsapp.com/send?text=' . $title . ' ' . $permalink . '" target="_blank" class="sharepost-link" title="Share to WhatsApp">';
        echo '<i class="fab fa-whatsapp"></i>';
        echo '</a>';
        echo '</li>';

        //email
        echo '<li class="sharepost-item">';
        echo '<a href="mailto:?subject=' . $title . '&body=' . $title . ' ' . $permalink . '" target="_blank" class="sharepost-link" title="Share to Email">';
        echo '<i class="fas fa-envelope"></i>';
        echo '</a>';
        echo '</li>';

        //print
        echo '<li class="sharepost-item">';
        echo '<a href="javascript:window.print()" class="sharepost-link" title="Print">';
        echo '<i class="fas fa-print"></i>';
        echo '</a>';
        echo '</li>';

        //copy link
        echo '<li class="sharepost-item">';
        echo '<a href="javascript:void(0)" class="sharepost-link" title="Copy Link">';
        echo '<i class="fas fa-link"></i>';
        echo '</a>';
        echo '</li>';





        echo '</ul>';
        echo '</div>';
    }
}
