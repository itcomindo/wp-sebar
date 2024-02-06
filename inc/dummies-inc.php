<?php

/**
 * Dummies Inc
 */

defined('ABSPATH') or die('No script kiddies please!');


/**
 *  Get Dummies Post Query
 * @param string $dummy_container_class 
 * @param string $dummy_item_class 
 */
function mm_get_dummies_post_query($dummy_container_class = 'dummies', $dummy_item_class = 'dummy')
{
    $pp = 10;
    echo '<div class="' . esc_html($dummy_container_class) . '">';
    for ($i = 0; $i < $pp; $i++) {
?>
        <div class="<?php echo esc_html($dummy_item_class); ?>">

            <div class="dtop">
                <a href="#">
                    <img class="find-this" src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Dummies">
                </a>
            </div>

            <div class="dbot">
                <h3 class="the-post-title">
                    <a href="#">
                        Dummy Post Title
                    </a>
                </h3>
            </div>
        </div>
<?php
    };
    echo '</div>';
}
