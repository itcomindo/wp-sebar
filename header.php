<?php

/**
 * Header
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */

defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html lang="id-ID" class="no-js" itemscope itemtype="https://schema.org/WebPage">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="googlebot" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    if (carbon_get_theme_option('enable_topbar')) {
        get_template_part('sections/topbar-section');
    }
    get_template_part('sections/header-section');
    get_template_part('sections/header-menu-section');



    if (is_home()) {
        $news_ticker = true;
        if ($news_ticker == true) {
            get_template_part('sections/news-ticker-section');
        }

        $show_special_event = carbon_get_theme_option('enable_special_event_post');
        if ($show_special_event) {
            get_template_part('sections/special-event-post-section');
        }
    }



    get_template_part('ads/ads-after-header-menu');
    wp_body_open();
    ?>

    <main>