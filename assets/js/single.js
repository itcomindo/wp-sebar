window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below


        //estimasi waktu baca start
        function mm_wrt() {
            function theErt() {
                var dataErt = jQuery('#sing').attr('data-ert');
                if (dataErt == 'true') {
                    var kataPerMenit = 150;
                    var postContent = jQuery('#the-content').text();
                    var jumlahKata = postContent.split(' ').length;
                    console.log(jumlahKata);
                    var waktuBaca = Math.ceil(jumlahKata / kataPerMenit);
                    jQuery('.ert').text('Reading Time: ' + waktuBaca + ' minutes');
                }
            }
            theErt();
        }
        mm_wrt();
        //estimasi waktu baca end


        // add alt and title kalau kosong start

        function addAltTitle() {
            var judulPost = jQuery('div#sing-title-wr h1').text();
            jQuery('div#the-content img').each(function () {
                var img = jQuery(this);
                if (!img.attr('alt') || img.attr('alt').trim() === '' || !img.attr('title') || img.attr('title').trim() === '') {
                    img.attr('alt', judulPost);
                    img.attr('title', judulPost);
                }
            });
        }
        addAltTitle();

        //add alt and title to img start


        //toc start

        function mm_toc() {


            function theToc() {
                var is_toc_enabled = jQuery('#the-content').attr('data-toc');
                console.log(is_toc_enabled);
                if (is_toc_enabled == 'true') {
                    var toc = "<div id='the-toc'><ul class='list-no-style toc-list'>";
                    jQuery("#the-content").find("h2, h3, h4, h5, h6").not("#respond h2, #respond h3, #respond h4, #respond h5, #respond h6").each(function (i) {
                        var current = jQuery(this);
                        current.attr("id", "mm_toc" + i);
                        toc += "<li class='" + current.prop("tagName").toLowerCase() + "'><a href='#mm_toc" + i + "'>" + current.text() + "</a></li>";
                    });
                    toc += "</ul></div>";
                    jQuery("#the-content").prepend(toc);
                }
            }
            theToc();


        }
        mm_toc();
        //toc end



        //move #respond to #the-sidebar start

        function mm_move_respond() {
            function moveRespond() {
                $screenWidth = jQuery(window).width();
                if ($screenWidth < 992) {
                    jQuery('#respond').appendTo('#the-content-sidebar');
                } else {
                    jQuery('#respond').appendTo('#the-content');
                }
            }
            moveRespond();
            jQuery(window).resize(function () {
                moveRespond();
            });
        }
        mm_move_respond();


        //move #respond to #the-sidebar end





        //video start


        function mm_video() {
            var videoID = jQuery('.vid-item').first().attr('data-video');
            jQuery('.vid-player iframe').attr('src', 'https://www.youtube.com/embed/' + videoID + '?autoplay=1');

            // Event handler untuk klik pada setiap vid-item
            jQuery('.vid-item').on('click', function () {
                var videoID = jQuery(this).attr('data-video');
                jQuery('.vid-player iframe').attr('src', 'https://www.youtube.com/embed/' + videoID + '?autoplay=1');
            });
        }

        mm_video();



        //video end



        //sticky start

        if (jQuery(window).width() >= 768) {
            var $theContentSidebar = jQuery('#the-content-sidebar aside');
            jQuery($theContentSidebar).sticky({
                topSpacing: 20,
                bottomSpacing: 750
            });
        }




        //sticky end















        //jq end above




    });


});