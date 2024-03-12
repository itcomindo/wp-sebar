window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //get all body classes start
        // function mmGetBodyClasses() {
        //     var bodyClasses = jQuery('body').attr('class');
        //     if (bodyClasses.includes('single')) {
        //         return true;
        //     }
        // }
        //get all body classes end


        //specialEventPost start
        function specialEventPost() {
            jQuery('#close-sep').on('click', function () {
                jQuery('#sep').removeClass('high');
                jQuery('#sep-wr').slideToggle();
                jQuery(this).addClass('hide');
                jQuery('#open-sep').removeClass('hide').addClass('active');
            });

            jQuery('#open-sep').on('click', function () {
                jQuery('#sep').addClass('high');
                jQuery('#sep-wr').slideToggle();
                jQuery(this).addClass('hide');
                jQuery('#close-sep').removeClass('hide');
            });


        }
        specialEventPost();
        //specialEventPost end




        //newsticker start
        function newsTicker() {

            setTimeout(function () {
                jQuery('#nt-right').removeClass('hide');
                jQuery(".nt-list").webTicker({
                    // height: '75px',
                    duplicate: false,
                    rssfrequency: 0,
                    startEmpty: false,
                    hoverpause: true,
                    transition: "ease"
                });
            }, 700);




        }
        newsTicker();
        //newsticker end






        // most view posts slider start
        function mostViewPostsSlider() {

            function mvps() {
                var $isAutoSlide = jQuery('#mp').attr('data-autoplay');
                if ($isAutoSlide == 'true') {
                    var $speed = jQuery('#mp').attr('data-autoplay-speed');
                    jQuery('ul.mp-list').slick({
                        centerMode: true,
                        centerPadding: '60px',
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: $speed,
                        arrows: false,
                        pauseOnHover: true,
                        responsive: [
                            {
                                breakpoint: 769,
                                settings: {
                                    arrows: false,
                                    centerMode: true,
                                    centerPadding: '40px',
                                    slidesToShow: 3
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    arrows: false,
                                    centerMode: true,
                                    centerPadding: '40px',
                                    slidesToShow: 1
                                }
                            }
                        ]
                    });
                } else {
                    jQuery('ul.mp-list').slick({
                        centerMode: true,
                        centerPadding: '60px',
                        slidesToShow: 4,
                        autoplay: false,
                        arrows: false,
                        responsive: [
                            {
                                breakpoint: 769,
                                settings: {
                                    arrows: false,
                                    centerMode: true,
                                    centerPadding: '40px',
                                    slidesToShow: 3
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    arrows: false,
                                    centerMode: true,
                                    centerPadding: '40px',
                                    slidesToShow: 1
                                }
                            }
                        ]
                    });
                }
            }
            mvps();

            jQuery(window).resize(function () {
                mvps();
            });
        }

        mostViewPostsSlider();

        // most view posts slider end






    });


});