window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {


        //newsticker start

        function newsTicker() {
            jQuery(".nt-list").webTicker({
                // height: '75px',
                duplicate: false,
                rssfrequency: 0,
                startEmpty: false,
                hoverpause: true,
                transition: "ease"
            });
        }
        newsTicker();


        //newsticker end






        // most view posts slider start
        function mostViewPostsSlider() {
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

        mostViewPostsSlider();

        // most view posts slider end






    });


});