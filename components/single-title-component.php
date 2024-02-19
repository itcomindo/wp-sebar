<?php

/**
 * Single Title Component
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_single_title_component()
{
?>
    <h1 id="single-post-title" class="section-head section-head-medium"><?php the_title(); ?></h1>
<?php
}
