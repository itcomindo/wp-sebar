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
        // Event listener untuk resize window dengan debouncing End




        //mentahan add class active to li.menu-item-has-children start pada saat di hover

        function mmShowHeaderMenuChildren() {
            var iwr = '<span class="iwr"><i class="fa-solid fa-angle-down"></i></span>';
            jQuery('li.menu-item-has-children').append(iwr);
            jQuery('li.menu-item-has-children > a').click(function (e) {
                e.preventDefault();
                var _this = jQuery(this).parent();
                var isActive = _this.hasClass('active');
                jQuery('li.menu-item-has-children').removeClass('active');
                jQuery('ul.sub-menu').removeClass('active');
                if (!isActive) {
                    _this.addClass('active');
                    _this.find('ul.sub-menu').addClass('active');
                }
            });
            jQuery(document).click(function (e) {
                if (!jQuery(e.target).closest('li.menu-item-has-children').length) {
                    jQuery('li.menu-item-has-children').removeClass('active');
                    jQuery('ul.sub-menu').removeClass('active');
                }
            });

            function toggleHeaderMenu() {
                var screenWidth = window.innerWidth;
                var mobMenuHeader = jQuery('#mobm');
                if (screenWidth < 992) {
                    if (!jQuery('.chm').length) {
                        var chm = '<span class="chm">X</span>';
                        jQuery('nav#header-menu-nav').prepend(chm);
                        jQuery('nav#header-menu-nav').prepend(mobMenuHeader);
                    }
                    jQuery('.header-menu-trigger').on('click', function () {
                        jQuery('nav#header-menu-nav').toggleClass('active');
                        jQuery('body').toggleClass('no-scroll');
                    });
                    jQuery('.chm').on('click', function () {
                        jQuery('nav#header-menu-nav').removeClass('active');
                        jQuery('body').removeClass('no-scroll');
                    });
                } else {
                    jQuery('.chm').remove();
                    mobMenuHeader.remove();
                }
            }

            toggleHeaderMenu();

            jQuery(window).resize(function () {
                toggleHeaderMenu();
            });
        }

        mmShowHeaderMenuChildren();
        //menambahkan class active pada li.menu-item-has-children end




        //mentahan close ads fixed bottom start


        function closeAdsFixedBottom() {
            var $afbClose = jQuery('.afb-close');
            jQuery($afbClose).on('click', function () {
                jQuery('#afb').addClass('hide');
            });
        }
        closeAdsFixedBottom();


        //mentahan close ads fixed bottom end






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

                jQuery(window).scroll(function () {
                    var scrolledY = jQuery(window).scrollTop();
                    jQuery('#ads-before-header').css('transform', 'translate3d(0px, ' + scrolledY * 0.5 + 'px, 0px)');
                });

            }
        }
        adsBeforeHeader();


        // mentahan ads before header end






























        //jq end above

    });


});