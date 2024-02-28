<?php

/**
 * Single Fields
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Field;

//single fields
function single_options()
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




        // Comment Text Captcha
        Field::make('separator', 'commenttextcaptchasep', 'Comment Text Captcha')
            ->set_classes('mm-sep'),


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


        // Table of Content
        Field::make('separator', 'tableofcontentsep', 'Table of Content')
            ->set_classes('mm-sep'),

        //checkbox enabling TOC
        Field::make('checkbox', 'show_toc', 'Show Table of Contents')
            ->set_option_value('yes')
            ->set_default_value(true),



        // Related Post Box
        Field::make('separator', 'relatedpostboxsep', 'Related Post Box')
            ->set_classes('mm-sep'),


        //checkbox enabling related post
        Field::make('checkbox', 'show_related_post', 'Show Related Post Box')
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


        // Inline Related Post Options
        Field::make('separator', 'inlinerelatedpostsep', 'Inline Related Post Options')
            ->set_classes('mm-sep'),

        Field::make('checkbox', 'show_inline_related_post', 'Show Inline Related Post'),

        //select related post by tag or category
        Field::make('select', 'inline_related_post_by', 'Inline Related Post By')
            ->add_options([
                'tag' => 'Tag',
                'category' => 'Category'
            ])
            ->set_default_value('tag'),

        //input number of related post
        Field::make('text', 'inline_related_post_number', 'Number of Inline Related Post to Show')
            ->set_default_value(3)
            ->set_attribute('type', 'number')
            ->set_help_text('Number of inline related post to show'),

        //input number after paragraph what to show inline related post
        Field::make('text', 'inline_related_post_after_paragraph', 'Show Inline Related Post After Paragraph')
            ->set_default_value(5)
            ->set_attribute('type', 'number')
            ->set_help_text('Show inline related post after paragraph number'),

        //select to chose style of inline related post (make three option: irp-1, irp-2, irp-3)
        Field::make('select', 'inline_related_post_style', 'Inline Related Post Style')
            ->add_options([
                'irp-1' => 'Style 1',
                'irp-2' => 'Style 2',
                'irp-3' => 'Style 3',
            ])
            ->set_default_value('irp-1'),



    ];
}


function mm_set_inline_related_post()
{
    $show_irp = carbon_get_theme_option('show_inline_related_post');

    $data = array();

    if ($show_irp) {
        $data['enable'] = 'data-inline-post="true"';
        $data['insert-after'] = 'data-insert-after="' . carbon_get_theme_option('inline_related_post_after_paragraph') . '"';
    } else {
        $data['enable'] = '';
        $data['insert-after'] = '';
    }

    return $data;
}
