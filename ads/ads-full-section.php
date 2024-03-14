<?php

/**
 * Ads Full Section
 */

defined('ABSPATH') or die('No script kiddies please!');



function mm_get_ads_full_section_1($element_class = 'afs-1')
{
?>
    <div class="section small afs <?php echo esc_html($element_class); ?> minh120">
        <div class="container h100">
            <div class="ads-wr h100 flex-col align-center justify-center overflow-hidden">

                <a class="ads-link" href="#">
                    <img class="find-this ads-image ads-large" src="<?php echo get_template_directory_uri() . '/assets/images/ads-1100x100.webp'; ?>" alt="ads">
                    <img class="find-this ads-image ads-mobile" src="<?php echo get_template_directory_uri() . '/assets/images/ads-600x338.webp'; ?>" alt="ads">
                </a>

            </div>
        </div>
    </div>
<?php
}
function mm_get_ads_full_section_2($element_class = 'afs-2')
{
?>
    <div class="section high afs <?php echo esc_html($element_class); ?> minh120">
        <div class="container h100">
            <div id="afs-content" class="ads-wr h100 flex-col align-center justify-center overflow-hidden">
                <a href="#"><img class="find-this" src="<?php echo get_template_directory_uri() . '/assets/images/ads-728x90-1.webp'; ?>" alt="ads"></a>
            </div>
        </div>
    </div>
<?php
}
