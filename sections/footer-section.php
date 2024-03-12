<?php

/**
 * Footer Template
 */

defined('ABSPATH') or die('No script kiddies please!');


//check if floating ads left and right is enable
if (carbon_get_theme_option('enable_floating_ads')) {
    $ads_floating = 'data-ads-floating="true"';
} else {
    $ads_floating = '';
}


//check if ads floating bottom is enable
if (carbon_get_theme_option('enable_fixed_bottom_ads')) {
    $ads_fixed_bottom = 'data-ads-fixed-bottom="true"';
} else {
    $ads_fixed_bottom = 'data-ads-fixed-bottom="false"';
}

?>

<footer id="foo" class="section high" <?php echo $ads_floating . ' ' . $ads_fixed_bottom; ?>>
    <div class="container">
        <div id="foo-wr">
            <div id="foo-top">
                <h2 class="head small">
                    WP Sebar
                </h2>
                <span><?php echo mm_get_data_website_inc()['alamat-lengkap-perusahaan']; ?></span>
                <span><span><?php echo mm_get_data_website_inc()['handphone-perusahaan']; ?></span></span>
                <div class="sosmed-box">
                    <?php echo mm_get_social_media_component(); ?>
                </div>
            </div>
            <div id="foo-bot">

                <div id="foo-left" class="foo-col">
                    <h3 class="head smallest color-light-2">About</h3>
                    <div class="foo-col-inner">
                        <?php
                        echo wpautop(mm_get_data_website_inc()['deskripsi-perusahaan']);
                        ?>
                    </div>
                </div>

                <div id="foo-mid" class="foo-col">
                    <h3 class="head smallest color-light-2">Footer Menu</h3>
                    <div class="foo-col-inner">
                        <?php
                        mm_get_footer_menu();
                        ?>
                    </div>
                </div>

                <div id="foo-right" class="foo-col">
                    <h3 class="head smallest color-light-2">Foo Header</h3>
                    <div class="foo-col-inner">
                        <span>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eligendi aliquam deserunt iste voluptatibus totam quis at reprehenderit dolorem provident quod incidunt, aperiam quo facilis, ducimus nostrum sapiente nulla nobis?
                        </span>
                    </div>
                </div>




            </div>
        </div>
    </div>
</footer>

<div id="cp" class="section">
    <div class="container h100">
        <div class="cp-wr h100">
            WP Sebar Theme Developed by Budiharyono.id
        </div>
    </div>
</div>

<?php

require_once get_template_directory() . '/inc/admin-shortcut-inc.php';
if (carbon_get_theme_option('enable_floating_ads')) {
    get_template_part('ads/ads-floating-lr');
}

get_template_part('ads/ads-fixed-bottom');

//if user not login
if (!is_user_logged_in()) {
    if (!mm_is_devmode()) {
        if (is_home()) {
            get_template_part('components/uc-component');
        }
    }
}
