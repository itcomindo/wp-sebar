<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_single_video_player()
{


    if (is_single()) {
        //get the post type from carbon fields
        $the_post_type = carbon_get_post_meta(get_the_ID(), 'the_post_type');

        if ('video' === $the_post_type) {
            $post_videos = carbon_get_post_meta(get_the_ID(), 'post_videos');
            if ($post_videos) {
                $video_count = count($post_videos);
                $video_count = mm_video_classes($video_count);

?>
                <div id="sing-fim-video-wr">

                    <!-- video player -->
                    <div class="vid-player">
                        <iframe src="" frameborder="0"></iframe>
                    </div>



                    <div class="vid-items-wr <?php echo $video_count; ?>">
                        <?php




                        foreach ($post_videos as $video) {

                            $video_title = $video['video_title'];
                            $video_duration = $video['video_duration'];
                            $video_url = $video['video_url'];

                            $video_thumbnail = $video['video_thumbnail'];
                            if ($video_thumbnail) {
                                $video_thumbnail = $video['video_thumbnail'];
                            } else {
                                $video_thumbnail = mm_get_video_thumbnail($video_url);
                            }

                            $video_src = convertYouTubeUrl($video_url);


                        ?>
                            <div class="vid-item" data-video="<?php echo $video_src; ?>">
                                <img class="find-this" src="<?php echo $video_thumbnail; ?>" alt="<?php echo $video_title; ?>" title="<?php echo $video_title; ?>">
                            </div>

        <?php
                        }
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo 'No videos found';
                    }
                }
            }
        }


        function mm_get_video_thumbnail($video_url)
        {
            $videoId = '';
            $thumbnailUrl = '';

            // Extract the video ID from the URL
            parse_str(parse_url($video_url, PHP_URL_QUERY), $query);
            if (isset($query['v'])) {
                $videoId = $query['v'];
            }

            // Generate the thumbnail URL
            if (!empty($videoId)) {
                $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
            }

            return $thumbnailUrl;
        }



        function mm_video_classes($video_count)
        {
            $classes = '';
            if ($video_count === 1) {
                $classes = 'one';
            } else if ($video_count === 2) {
                $classes = 'two';
            } else if ($video_count === 3) {
                $classes = 'three';
            } else if ($video_count >= 4) {
                $classes = 'four';
            }
            return $classes;
        }


        function convertYouTubeUrl($video_url)
        {
            $videoId = '';
            $srcUrl = '';

            // Extract the video ID from the URL
            parse_str(parse_url($video_url, PHP_URL_QUERY), $query);
            if (isset($query['v'])) {
                $videoId = $query['v'];
            }

            // Generate the src URL for the iframe
            if (!empty($videoId)) {
                $srcUrl = $videoId;
            }

            return $srcUrl;
        }
