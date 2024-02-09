<?php

/**
 * Footer Template
 */

defined('ABSPATH') or die('No script kiddies please!');

if (carbon_get_theme_option('enable_floating_ads')) {
    $ads_floating = 'data-ads-floating="true"';
} else {
    $ads_floating = '';
}

?>
<footer id="foo" class="section high" <?php echo $ads_floating; ?>>
    <div class="container">
        <div id="foo-wr">
            <div id="foo-top">
                <h2 class="section-head section-head-medium">
                    WP Sebar
                </h2>
                <span>Jln. Mujahidin 1 No.112, Larangan, Kreo Selatan, Kota Tangerang, Banten Indonesia 15154</span>
                <span>0813-9891-2341</span>
                <div class="sosmed-box">
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
                </div>
            </div>
            <div id="foo-bot">

                <div id="foo-left" class="foo-col">
                    <h3 class="the-card-head bigger">About</h3>
                    <div class="foo-col-inner">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eligendi aliquam deserunt iste voluptatibus totam quis at reprehenderit dolorem provident quod incidunt, aperiam quo facilis, ducimus nostrum sapiente nulla nobis?
                        </p>
                    </div>
                </div>

                <div id="foo-mid" class="foo-col">
                    <h3 class="the-card-head bigger">Footer Menu</h3>
                    <div class="foo-col-inner">
                        <nav id="footer-nav">
                            <ul class="list-no-style footer-menu vertical-menu">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Advertising</a></li>
                                <li><a href="#">Disclamier</a></li>
                                <li><a href="#">Term of use</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div id="foo-right" class="foo-col">
                    <h3 class="the-card-head bigger">Foo Header</h3>
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
    get_template_part('inc/ads/ads-floating-lr-inc');
}
