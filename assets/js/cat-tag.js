window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {
        //jq start below


        function infiniteScroll() {
            jQuery('.rp-wr').infiniteScroll({
                // options
                path: '.next-page-button',
                append: '.rp',
                history: false,
            });
        }
        infiniteScroll();




        //jq end above
    });


});