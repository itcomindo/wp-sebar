window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {



        function mostViewPostsSlider() {
            jQuery('.mp-list').flickity({
                cellAlign: 'center',
                contain: true,
                wrapAround: true,
                // autoPlay: 5000,
                prevNextButtons: false,
                pageDots: false,
            });
        }

        mostViewPostsSlider();


    });


});