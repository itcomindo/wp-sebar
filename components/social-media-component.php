<?php

/**
 * Social Media Component
 */

defined('ABSPATH') or die('No script kiddies please!');






function mm_get_social_media_component()
{
    $sosmeds = mm_get_data_website_inc()['sosial-media'];
    if ($sosmeds) {
        echo '<ul class="list-no-style sosmed-box-list">';
        foreach ($sosmeds as $sosmed) {
            $name = $sosmed['sosmed_name'];
            $icon = $sosmed['sosmed_icon'];
            $link = $sosmed['sosmed_link'];
?>
            <li>
                <a href="<?php echo esc_html($link); ?>" title="<?php echo esc_html($name); ?>" target="_blank" rel="noopener">
                    <?php echo $icon; ?>
                </a>
            </li>
    <?php
        }
        echo '</ul>';
    } else {
        mm_dummy_sosmed();
    }
}







function mm_dummy_sosmed()
{
    ?>
    <ul class="list-no-style sosmed-box-list">
        <!-- facebook -->
        <li><a href="#" title="sosmed"><i class="fab fa-facebook-square"></i></a></li>

        <!-- instagram -->
        <li><a href="#" title="sosmed"><i class="fab fa-instagram-square"></i></a></li>

        <!-- twitter -->
        <li><a href="#" title="sosmed"><i class="fab fa-twitter-square"></i></a></li>

        <!-- tiktok -->
        <li><a href="#" title="sosmed"><i class="fa-brands fa-tiktok"></i></a></li>

        <!-- youtube -->
        <li><a href="#" title="sosmed"><i class="fab fa-youtube-square"></i></a></li>

        <!-- linkedin -->
        <li><a href="#" title="sosmed"><i class="fab fa-linkedin"></i></a></li>

        <!-- pinterest -->
        <li><a href="#" title="sosmed"><i class="fab fa-pinterest-square"></i></a></li>

        <!-- whatsapp -->
        <li><a href="#" title="sosmed"><i class="fab fa-whatsapp-square"></i></a></li>

        <!-- telegram -->
        <li><a href="#" title="sosmed"><i class="fab fa-telegram"></i></a></li>
    </ul>
<?php
}
