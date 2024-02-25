<?php

/**
 * Single Gallery Component
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_single_gallery_player()
{
    $post_id = get_the_ID();
    $the_post_type = carbon_get_post_meta(get_the_ID(), 'the_post_type');
    if ('gallery' === $the_post_type) {
        $photos = carbon_get_post_meta(get_the_ID(), 'post_gallery');
        if ($photos) {
?>
            <div id="gallery-player">
                <?php echo mm_get_featured_image($post_id); ?>
            </div>
            <?php
            echo '<div id="sing-fim-photo-wr">';
            foreach ($photos as $photo) {
                $photo_url = $photo['gallery_thumbnail'];
                $photo_title = $photo['photo_title'];
                $photo_description = wpautop($photo['photo_description']);
            ?>
                <div class="photo-item">
                    <a href="<?php echo $photo_url; ?>" data-lightbox="roadtrip" data-title="<?php echo $photo_description; ?>">
                        <img class="find-this" src="<?php echo $photo_url; ?>" alt="<?php echo $photo_title; ?>" title="<?php echo $photo_title; ?>">
                    </a>
                </div>
<?php
            }
            echo '</div>';
        }
    }
}
