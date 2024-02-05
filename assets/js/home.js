window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {



        function mostViewPostsSlider() {


            var $isAutoSlide = jQuery('#mp').attr('data-autoplay');
            if ($isAutoSlide == 'true') {
                var $speed = jQuery('#mp').attr('data-autoplay-speed');
                jQuery('.mp-list').flickity({
                    cellAlign: 'center',
                    contain: true,
                    wrapAround: true,
                    autoPlay: $speed,
                    prevNextButtons: false,
                    pageDots: false,
                });
            } else {
                jQuery('.mp-list').flickity({
                    cellAlign: 'center',
                    contain: true,
                    wrapAround: true,
                    // autoPlay: 5000,
                    prevNextButtons: false,
                    pageDots: false,
                });
            }
        }

        mostViewPostsSlider();


    });


});