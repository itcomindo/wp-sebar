<?php

/**
 * Post By Category Section
 */

defined('ABSPATH') or die('No script kiddies please!');

?>


<div id="pbc" class="s1 section small">
    <div class="container">
        <div id="pbc-wr">

            <div id="pbc-left">

                <div class="pbcc-pr">
                    <div class="pbcc-name">Olahraga</div>
                    <div class="pbcc-wr">
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                        ?>
                            <div class="pbcc">
                                <div class="pbcc-top">
                                    <a href="#" title="Post Title" rel="bookmark">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                                    </a>
                                </div>
                                <div class="pbcc-bot">
                                    <h3 class="pbcc-title"><a href="#" title="Post Title">Judul Post</a></h3>
                                    <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati.</span> -->
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="pbcc-load-more" href="#">Load More</a>
                </div>

                <div class="pbcc-pr">
                    <div class="pbcc-name">Kesehatan</div>
                    <div class="pbcc-wr">
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                        ?>
                            <div class="pbcc">
                                <div class="pbcc-top">
                                    <a href="#" title="Post Title" rel="bookmark">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                                    </a>
                                </div>
                                <div class="pbcc-bot">
                                    <h3 class="pbcc-title"><a href="#" title="Post Title">Judul Post</a></h3>
                                    <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati.</span> -->
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="pbcc-load-more" href="#">Load More</a>
                </div>

                <div class="pbcc-pr">
                    <div class="pbcc-name">Travel</div>
                    <div class="pbcc-wr">
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                        ?>
                            <div class="pbcc">
                                <div class="pbcc-top">
                                    <a href="#" title="Post Title" rel="bookmark">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/dummy-1.jpg'; ?>" alt="Post Title" title="Post Title">
                                    </a>
                                </div>
                                <div class="pbcc-bot">
                                    <h3 class="pbcc-title"><a href="#" title="Post Title">Judul Post</a></h3>
                                    <!-- <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati.</span> -->
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="pbcc-load-more" href="#">Load More</a>
                </div>



            </div>


            <!-- post by cat right side (sidebar) -->
            <div id="pbc-right">
                <aside class="aside">
                    <h3>Heading 3</h3>
                    <span>Span Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere repellendus.</span>
                    <ul>
                        <li><a href="#">Link</a>Lorem ipsum dolor sit, amet consectetur</li>
                        <li>dignissimos commodi repudiandae pariatur! Excepturi, aperiam esse.</li>
                        <li>Lorem ipsum dolor sit, amet consectetur</li>
                        <li>dignissimos commodi repudiandae pariatur! Excepturi, aperiam esse.</li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>