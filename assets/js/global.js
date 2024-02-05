window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below

        function mm_find_image_width_height() {
            var imgs = jQuery('img.find-this');
            imgs.each(function () {
                var ini = jQuery(this);
                var w = ini.width();
                var h = ini.height();
                ini.attr('width', w);
                ini.attr('height', h);
            });
        }

        // Fungsi debounce untuk membatasi frekuensi pemanggilan fungsi
        function mm_debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };

        // Event listener untuk resize window dengan debouncing
        jQuery(window).resize(mm_debounce(function () {
            mm_find_image_width_height();
            adsBeforeHeader();
        }, 250));

        mm_find_image_width_height(); // Panggil sekali saat load




        // mentahan social box start
        jQuery('.trigger-social-box').on('click', function () {
            jQuery('#topbar-right').toggleClass('active');
        });
        //mentahan social box end


        //mentahan search box start
        jQuery('.trigger-search-box').on('click', function () {
            jQuery('#topbar').toggleClass('over-flow-visible');
            jQuery('#topbar-right .search-form-wr').toggleClass('active');
        });
        // mentahan search box end



        //mentahan ads before header start

        //if screen width > 541px
        function adsBeforeHeader() {
            if (window.innerWidth < 601) {
                var closeAdsBeforeHeader = '<span class="close-ads">close ads</span>';
                setTimeout(function () {
                    jQuery('#ads-before-header').append(closeAdsBeforeHeader);

                    jQuery('.close-ads').on('click', function () {
                        jQuery('#ads-before-header').slideUp();
                    });
                }, 1000);

            }
        }
        adsBeforeHeader();


        // mentahan ads before header end






























        //jq end above

    });


});