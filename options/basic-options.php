<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function basic_options()
{
    return [

        // basicsep
        Field::make('separator', 'basicsep', 'Basic Options')
            ->set_classes('mm-sep'),

        //image fallback feature image if post has no feature image
        Field::make('image', 'image_fallback_feature_image', 'Image Fallback Feature Image')
            ->set_help_text('This image will be used as the fallback feature image if the post has no feature image.'),

        //checkbox to disable xmlrpc
        Field::make('checkbox', 'disable_xmlrpc', 'Disable XMLRPC')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('Enable this option if you want block any xmlrpc request. It can prevent brute force attack, comment spam, pingback spam etc.'),

        //checkbox to disable forgot password
        Field::make('checkbox', 'disable_forgot_password', 'Disable Forgot Password')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('Enable this option if you want to disable forgot password feature. any request to reset password will be blocked and redirected to homepage.'),

        // seoplugin
        Field::make('separator', 'seopluginsep', 'SEO Plugin')
            ->set_classes('mm-sep'),


        // checkbox to enable builtin seo plugin
        Field::make('checkbox', 'enable_builtin_seo_plugin', 'Enable Builtin SEO Plugin')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('Enable this option if you want to use the builtin SEO plugin. <span style="color:red; font-weight:bold;">Please make sure to DISABLE ANY ACTIVATED SEO PLUGIN</span>.'),

        //input google site verification if builtin seo plugin is enabled
        Field::make('text', 'google_site_verification', 'Google Site Verification')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('e.g <code>google-site-verification: xxxxxxxx</code>'),

        //input bing site verification if builtin seo plugin is enabled
        Field::make('text', 'bing_site_verification', 'Bing Site Verification')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('e.g <code>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</code>'),

        //input yandex site verification if builtin seo plugin is enabled
        Field::make('text', 'yandex_site_verification', 'Yandex Site Verification')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('e.g <code>xxxxxxxxxxxxxxxx</code>'),

        //header_scripts for gtm or google analytics if builtin seo plugin is enabled
        Field::make('header_scripts', 'tracking_code', 'Header Scripts')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('copy and paste tracking code from google analytics, gtm, or any other tracking code'),

        //checkbox to enable open graph if builtin seo plugin is enabled
        Field::make('checkbox', 'enable_open_graph', 'Enable Open Graph')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('Enable this option if you want to use open graph. It will be used to show your post on social media.'),

        //facebook app id if builtin seo plugin is enabled
        Field::make('text', 'facebook_app_id', 'Facebook App ID')
            ->set_required(true)
            ->set_conditional_logic([
                [
                    'field' => 'enable_open_graph',
                    'value' => true
                ]
            ])
            ->set_help_text('You can get your Facebook App ID from <a href="https://developers.facebook.com/apps/" target="_blank">here</a>'),

        //checkbox to enable twitter card if builtin seo plugin is enabled
        Field::make('checkbox', 'enable_twitter_card', 'Enable Twitter Card')
            ->set_option_value('yes')
            ->set_default_value(true)
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('Enable this option if you want to use twitter card. It will be used to show your post on twitter.'),

        //checkbox to enable open image directly to image file if builtin seo plugin is enabled
        Field::make('checkbox', 'open_image_directly_to_image_file', 'Open Image Directly to Image File')
            ->set_option_value('yes')
            ->set_default_value(true)
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('Enable this option if you want to open image directly to image file when clicked from search engine.'),

        //checkbox to enable breadcrumb if builtin seo plugin is enabled
        Field::make('checkbox', 'enable_breadcrumb', 'Enable Breadcrumb')
            ->set_option_value('yes')
            ->set_default_value(true)
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('Enable this option if you want to use breadcrumb. It will be used to show your post on search engine.'),

        //enable title and description to category and tag if builtin seo plugin is enabled
        Field::make('checkbox', 'enable_title_and_description_to_category_and_tag', 'Enable Title and Description to Category and Tag')
            ->set_option_value('yes')
            ->set_default_value(true)
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('Enable this option if you want to use title and description to category and tag. It will be used to show your category and tag on search engine.'),

        //enable title and description to author if builtin seo plugin is enabled
        Field::make('checkbox', 'enable_title_and_description_to_author', 'Enable Title and Description to Author')
            ->set_option_value('yes')
            ->set_default_value(true)
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ])
            ->set_help_text('Enable this option if you want to use title and description to author. It will be used to show your author on search engine.'),

        // seoplugin
        Field::make('separator', 'seohomepagesep', 'Homepage')
            ->set_classes('mm-sep child')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ]),

        //homepage title
        Field::make('text', 'homepage_title', 'Homepage Title')
            ->set_help_text('This will be used as the title of your homepage. If left empty, the default title will be used.')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ]),

        //homepage description
        Field::make('textarea', 'homepage_description', 'Homepage Description')
            ->set_help_text('This will be used as the description of your homepage. If left empty, the default description will be used.')
            ->set_conditional_logic([
                [
                    'field' => 'enable_builtin_seo_plugin',
                    'value' => true
                ]
            ]),



    ];
}
