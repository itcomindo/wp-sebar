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
        get_template_part('template-parts/topbar-template');
    }
    get_template_part('template-parts/header-template');
    get_template_part('template-parts/header-menu-template');
    wp_body_open();
    ?>

    <main>