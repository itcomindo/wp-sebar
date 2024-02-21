<?php

/**
 * Single Fields
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

//single fields
function mm_single_fields_inc()
{
    return [


        Field::make('separator', 'singsep', 'Single Options')
            ->set_classes('mm-sep'),


        //checkbox to disable guttenberg
        Field::make('checkbox', 'disable_guttenberg', 'Disable Guttenberg')
            ->set_option_value('yes')
            ->set_default_value(true),


        Field::make('checkbox', 'show_estimated_reading_time', 'Show Estimated Reading Time')
            ->set_option_value('yes')
            ->set_default_value(true),


        Field::make('checkbox', 'show_text_captcha', 'Show Text Captcha')
            ->set_option_value('yes')
            ->set_default_value(true),

        Field::make('complex', 'captcha_qa', 'Captcha Question Answer')
            ->add_fields([
                Field::make('text', 'cq', 'Question')
                    ->set_help_text('ketik contoh: apa rasa gula'),
                Field::make('text', 'ca', 'Answer')
                    ->set_help_text('ketik contoh: manis')
            ])
            ->set_layout('tabbed-horizontal')
            ->set_header_template('
                <% if (cq) { %>
                    <%- cq %>
                <% } else { %>
                    Question
                <% } %>
            '),


        //checkbox enabling TOC
        Field::make('checkbox', 'show_toc', 'Show Table of Contents')
            ->set_option_value('yes')
            ->set_default_value(true),


        //checkbox enabling related post
        Field::make('checkbox', 'show_related_post', 'Show Related Post')
            ->set_option_value('yes')
            ->set_default_value(true),

        //select related post by tag or category
        Field::make('select', 'related_post_by', 'Related Post By')
            ->add_options([
                'tag' => 'Tag',
                'category' => 'Category'
            ])
            ->set_default_value('tag'),

        //input number of related post
        Field::make('text', 'related_post_number', 'Number of Related Post')
            ->set_default_value(3)
            ->set_attribute('type', 'number')
            ->set_help_text('Number of related post to show'),






    ];
}
