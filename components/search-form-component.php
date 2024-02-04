<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');


/**
 * Search Form
 * @param string $form_class default 'search-form'
 */
function mm_get_search_form_component($form_class = 'search-form')
{

?>
    <div class="search-form-wr">
        <form class="<?php echo esc_html($form_class); ?>" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" class="search-field" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
            <button class="the-button" type="submit" value="Search"><i class="fa fa-search"></i></button>
        </form>
    </div>

<?php
}
