<?php

/**
 * Ads Fixed Bottom Options
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

function ads_fixed_bottom_options()
{
    return [

        // ads fixed bottom
        Field::make('separator', 'adsfixedbotsep', 'Ads Fixed Bottom')
            ->set_classes('mm-sep'),


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
