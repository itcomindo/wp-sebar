<?php

/**
 * Social Media Box Component
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_social_media_box_component($list_class = 'social-media-box')
{
?>
    <ul class="list-no-style <?php echo esc_html($list_class); ?>">
        <!-- facebook square -->
        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
        <!-- twitter square -->
        <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
        <!-- instagram square-->
        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
        <!-- youtube square -->
        <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
        <!-- linkedin square -->
        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
    </ul>
<?php
}
