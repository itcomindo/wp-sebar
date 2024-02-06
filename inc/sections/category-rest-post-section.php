<?php

/**
 * Category Rest Post Section
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<section id="crp" class="section medium">
    <div class="container">
        <div id="crp-wr">
            <!-- <div id="crp-top"></div> -->
            <div id="crp-bot" class="has-sidebar">
                <div id="crp-left" class="crp-col">
                    <?php
                    mm_get_rest_post_query();
                    ?>
                </div>
                <div id="crp-right" class="the-sidebar">
                    <aside>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis odio deleniti sunt, magnam laboriosam maiores culpa ut molestiae sapiente repellat voluptatibus harum nulla! Iste reprehenderit dolor, explicabo quis nostrum hic.
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>