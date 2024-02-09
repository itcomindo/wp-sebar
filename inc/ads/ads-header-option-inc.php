<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');


use Carbon_Fields\Field;

function mm_ads_header_field_inc()
{
    return [
        //checkbox enable_header_ads
        Field::make('checkbox', 'enable_header_ads', 'Enable Header Ads For Desktop')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('menampilkan iklan di header untuk desktop yang akan disable pada screen width dibawah 767px'),


        //select header_ads_is (image, text, adsense)
        Field::make('select', 'header_ads_is', 'Header Ads Type')
            ->add_options([
                'image' => 'Image',
                'text' => 'Text',
                'adsense' => 'Adsense',
            ])
            ->set_default_value('image'),


        //if header_ads_is is image create field image, text for image url
        Field::make('image', 'header_ads_image', 'Header Ads Image')
            ->set_required(true)
            ->set_value_type('url')
            ->set_conditional_logic([
                [
                    'field' => 'header_ads_is',
                    'value' => 'image',
                ],
            ]),

        Field::make('text', 'header_ads_image_url', 'Header Ads Image URL')
            ->set_required(true)
            ->set_conditional_logic([
                [
                    'field' => 'header_ads_is',
                    'value' => 'image',
                ],
            ]),



        //checkbox to enable header ads for mobile if checked show ads for mobile show if screen width is below 540px
        Field::make('checkbox', 'enable_header_ads_for_mobile', 'Enable Header Ads For Mobile')
            ->set_option_value('yes')
            ->set_default_value(false)
            ->set_help_text('menampilkan iklan di header untuk mobile yang akan disable pada screen width dibawah 540px'),

        //select header_ads_is_mobile (image, text, adsense)
        Field::make('select', 'header_ads_is_mobile', 'Header Ads Type For Mobile')
            ->add_options([
                'image' => 'Image',
                'text' => 'Text',
                'adsense' => 'Adsense',
            ])
            ->set_default_value('image'),

        //if header_ads_is_mobile is image create field image, text for image url
        Field::make('image', 'header_ads_image_mobile', 'Header Ads Image For Mobile')
            ->set_required(true)
            ->set_value_type('url')
            ->set_conditional_logic([
                [
                    'field' => 'header_ads_is_mobile',
                    'value' => 'image',
                ],
            ]),

        Field::make('text', 'header_ads_image_url_mobile', 'Header Ads Image URL For Mobile'),

        //enabling fixed bottom ads
        Field::make('checkbox', 'enable_fixed_bottom_ads', 'Enable Fixed Bottom Ads')
            ->set_option_value('yes')
            ->set_default_value(false),

        //complex field for fixed bottom ads content
        Field::make('complex', 'fix_ads_content', 'Fixed Bottom Ads Content')
            ->add_fields([
                Field::make('select', 'fixed_ads_type', 'Type')
                    ->add_options([
                        'image' => 'Image',
                        'text' => 'Text',
                        'adsense' => 'Adsense',
                    ]),


                //if image
                Field::make('image', 'fixed_ads_image', 'Fixed Bottom Ads Image')
                    ->set_required(true)
                    ->set_value_type('url')
                    ->set_conditional_logic([
                        [
                            'field' => 'fixed_ads_type',
                            'value' => 'image',
                        ],
                    ]),

                //if text
                Field::make('text', 'fixed_ads_text_head', 'Fixed Bottom Ads Head')
                    ->set_conditional_logic([
                        [
                            'field' => 'fixed_ads_type',
                            'value' => 'text',
                        ],
                    ]),
                Field::make('textarea', 'fixed_ads_text', 'Fixed Bottom Ads Text')
                    ->set_conditional_logic([
                        [
                            'field' => 'fixed_ads_type',
                            'value' => 'text',
                        ],
                    ]),
                Field::make('text', 'fixed_ads_text_url', 'Fixed Bottom Ads URL')
                    ->set_conditional_logic([
                        [
                            'field' => 'fixed_ads_type',
                            'value' => 'text',
                        ],
                    ]),


                //if adsense
                Field::make('textarea', 'fixed_ads_adsense', 'Fixed Bottom Ads Adsense Code')
                    ->set_conditional_logic([
                        [
                            'field' => 'fixed_ads_type',
                            'value' => 'adsense',
                        ],
                    ]),



            ])





    ];
}








function mm_get_ads_header()
{
    $header_ads_is = carbon_get_theme_option('header_ads_is');
    if ($header_ads_is == 'image') {
        $header_ads_content = mm_get_ads_header_image();
    } elseif ($header_ads_is == 'text') {
        $header_ads_content = 'text';
    } else {
        $header_ads_content = 'adsense code here';
    }
    return $header_ads_content;
}



function mm_get_ads_header_image()
{
    $header_ads_image = carbon_get_theme_option('header_ads_image');
    $header_ads_image_url = carbon_get_theme_option('header_ads_image_url');
    return '<a href="' . $header_ads_image_url . '"><img class="find-this" src="' . $header_ads_image . '" alt="header ads"></a>';
}




function mm_show_ads_header()
{
    if (carbon_get_theme_option('enable_header_ads')) {
?>
        <div class="ads ads-header-ads min-height-60 min-width-468">
            <?php echo mm_get_ads_header(); ?>
        </div>
    <?php
    }
}





function mm_show_ads_before_header_mobile()
{
    if (carbon_get_theme_option('enable_header_ads_for_mobile')) {
        $header_ads_is_mobile = carbon_get_theme_option('header_ads_is_mobile');
        if ($header_ads_is_mobile == 'image') {
            $header_ads_content_mobile = mm_show_ads_header_mobile_image();
        } elseif ($header_ads_is_mobile == 'text') {
            $header_ads_content_mobile = 'text';
        } else {
            $header_ads_content_mobile = 'adsense code here';
        }
    }
}

function mm_show_ads_header_mobile_image()
{
    $ads_header_image_mobile = carbon_get_theme_option('header_ads_image_mobile');
    $ads_header_image_url_mobile = carbon_get_theme_option('header_ads_image_url_mobile');
    ?>
    <div id="ads-before-header" class="section">
        <div class="container">
            <div class="ads ads-header-ads-mobile max-width-600">
                <a href="#" class="the-btn">
                    <img class="find-this" src="<?php echo get_template_directory_uri() . '/assets/images/ads-540.webp'; ?>" alt="Ads">
                </a>
            </div>
        </div>
    </div>
<?php
}








// require_once get_template_directory() . '/inc/ads/ads-header-inc.php';
