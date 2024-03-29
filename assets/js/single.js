window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below

        //get screen width start

        function mmGetScreenWidth() {
            var $screenWidth = jQuery(window).width();
            return $screenWidth;
        }



        //get screen width end



        //get all body classes start

        function mm_single_body_classes() {
            var bodyClasses = jQuery('body').attr('class');
            if (bodyClasses.includes('single')) {
                return true;
            }
        }


        //get all body classes end

        //inline related post start

        function mm_irp() {
            if (mm_single_body_classes()) {
                var dataRelatedPost = jQuery('#sing').attr('data-inline-post');
                if (dataRelatedPost === 'true') {
                    var irpPositionAfter = parseInt(jQuery('#sing').attr('data-insert-after'), 10);
                    var inlineRelatedPostContainer = jQuery('.inline-related-post');

                    setTimeout(function () {
                        inlineRelatedPostContainer.removeClass('hide');



                        var targetP = jQuery('#the-content p').eq(irpPositionAfter - 1);
                        var totalParagraphs = jQuery('#the-content p').length;

                        if (totalParagraphs >= irpPositionAfter && targetP.length) {
                            inlineRelatedPostContainer.insertAfter(targetP);
                        } else {
                            jQuery('#the-content').append(inlineRelatedPostContainer);
                        }

                    }, 200);



                }
            }
            jQuery(window).scroll(function () {
                jQuery('span.irp-icon').each(function () {
                    var span = jQuery(this);
                    if (span.visible(true)) {
                        span.addClass('animate__swing');
                        setTimeout(function () {
                            span.removeClass('animate__swing');
                        }, 1000);
                    }
                });
            });
        }
        jQuery.fn.visible = function (partial) {
            var $t = jQuery(this),
                $w = jQuery(window),
                viewTop = $w.scrollTop(),
                viewBottom = viewTop + $w.height(),
                _top = $t.offset().top,
                _bottom = _top + $t.height(),
                compareTop = partial === true ? _bottom : _top,
                compareBottom = partial === true ? _top : _bottom;
            return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
        };

        mm_irp();




        //inline related post end


        //estimasi waktu baca start
        function mm_wrt() {
            function theErt() {
                var dataErt = jQuery('#sing').attr('data-ert');
                if (dataErt == 'true') {
                    var kataPerMenit = 150;
                    var postContent = jQuery('#the-content').text();
                    var jumlahKata = postContent.split(' ').length;
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

        //add alt and title to img end


        //toc start

        function mm_toc() {
            function theToc() {
                var is_toc_enabled = jQuery('#the-content').attr('data-toc');
                if (is_toc_enabled == 'true') {
                    if (jQuery("#the-content").find("h2, h3, h4, h5, h6").length == 0) {
                        jQuery('#the-toc').remove();
                    } else {
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
        // mm_move_respond();


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


        //jq end above




    });


});