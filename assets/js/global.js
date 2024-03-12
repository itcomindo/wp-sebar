window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below









        //get screen width start
        function mmGetScreenWidth() {
            var $screenWidth = window.innerWidth;
            return $screenWidth;
        }
        //get screen width end

        //mobile app start

        function mmMobileApp() {
            if (mmGetScreenWidth() < 992) {
                jQuery('#mc-home').on('click', function (e) {
                    e.preventDefault();
                    jQuery(this).toggleClass('active');
                    jQuery('#mc-pr').toggleClass('show');
                });
            }
        }
        mmMobileApp();

        //mobile app end







        //topbar dateTime start
        function mmTopbarDateTime() {
            var mm_elem = jQuery('[data-element="tbtz"]');
            if (mm_elem.length) {
                var mm_wktu = function (sekarang) {
                    var tgl = sekarang.getDate();
                    var bln = sekarang.getMonth() + 1;
                    var jam = sekarang.getHours();
                    var mnt = sekarang.getMinutes();
                    var dtk = sekarang.getSeconds();
                    return tgl + '/' + bln + '/' + sekarang.getFullYear() + ' ' + jam + ':' + (mnt < 10 ? '0' : '') + mnt + ':' + (dtk < 10 ? '0' : '') + dtk;
                };

                var mm_updt = function () {
                    var sekarang = new Date();
                    mm_elem.text(mm_wktu(sekarang));
                };

                mm_updt();
                setInterval(mm_updt, 1000);
            }
        }
        mmTopbarDateTime();


        //topbar dateTime end

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
                var screenWidth = mmGetScreenWidth();
                console.log(screenWidth);
                var mobMenuHeader = jQuery('#mobm');
                if (screenWidth < 992) {

                    jQuery('nav#header-menu-nav').addClass('hide');


                    if (!jQuery('.chm').length) {
                        var chm = '<span class="chm">X</span>';
                        jQuery('nav#header-menu-nav').prepend(chm);
                        jQuery('nav#header-menu-nav').prepend(mobMenuHeader);
                        mobMenuHeader.show();
                    }

                    //open
                    jQuery('.header-menu-trigger').on('click', function () {
                        jQuery('nav#header-menu-nav').addClass('active');
                        jQuery('body').toggleClass('no-scroll');

                    });

                    //close
                    jQuery('.chm').on('click', function () {
                        jQuery('nav#header-menu-nav').removeClass('active');
                        jQuery('body').removeClass('no-scroll');
                    });
                } else {
                    jQuery('.chm').hide();
                    mobMenuHeader.hide();
                    jQuery('nav#header-menu-nav').removeClass('hide');
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


        function mmAdsFixedBottom() {

            var $adsFloBotStatus = jQuery('#foo').attr('data-ads-fixed-bottom');

            function runAdsFloBottom() {
                var $adsFloBottom = jQuery('#afb');
                setTimeout(function () {
                    $adsFloBottom.removeClass('hide').addClass('active');
                }, 2000);
                var $afbClose = jQuery('.afb-close');
                jQuery($afbClose).on('click', function () {
                    jQuery('#afb').removeClass('active').addClass('hide');
                });
            }
            var $sw = mmGetScreenWidth();
            if ($adsFloBotStatus == 'true' && $sw > 541) {
                runAdsFloBottom();
            }




        }
        mmAdsFixedBottom();


        //mentahan close ads fixed bottom end






        // mentahan social box start
        // jQuery('.trigger-social-box').on('click', function () {
        //     jQuery('#topbar-right').toggleClass('active');
        // });
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





        //ads floating start

        function adsFloatingLeftRight() {
            function adsFlo() {
                var adsFlo = jQuery('footer').attr('data-ads-floating');
                if (adsFlo == 'true') {
                    jQuery(window).scroll(function () {
                        if (jQuery(this).scrollTop() > 40) {
                            jQuery('.ads-flo').addClass('fixed');
                        } else {
                            jQuery('.ads-flo').removeClass('fixed');
                        }
                    });
                }
            }
            adsFlo();
        }
        adsFloatingLeftRight();



        //ads floating end




        //uc start

        function mmUC() {
            function uc() {
                if (!jQuery('body').hasClass('logged-in')) {
                    jQuery('#uc').hide();

                    setTimeout(function () {
                        jQuery('#uc').show().addClass('active');
                        // jQuery('body').addClass('no-scroll');

                        setTimeout(function () {
                            jQuery('#uc-wr').addClass('active');
                        }, 800);

                        jQuery('.close-uc, #uc.active').on('click', function () {
                            jQuery('#uc').remove();
                            // jQuery('body').removeClass('no-scroll');
                        });
                    }, 700);

                }
            }
            uc();
            jQuery(window).resize(function () {
                uc();
            });
        }
        mmUC();



        //uc end




        //styicky the-sidebar start



        function mmStickySidebar() {


            function mmTheStickyHome() {
                var bodyClass = document.body.className;
                if (bodyClass.includes('home')) {
                    var $screenWidth = mmGetScreenWidth();
                    if ($screenWidth > 992) {
                        var $theSidebar = jQuery('.the-sidebar aside');
                        jQuery($theSidebar).sticky({
                            topSpacing: 20,
                            bottomSpacing: 3000
                        });
                    }
                }

            }
            // mmTheStickyHome();




            function mmStickySidebarSingle() {
                var bodyClass = document.body.className;
                if (bodyClass.includes('single')) {
                    var $screenWidth = mmGetScreenWidth();
                    if ($screenWidth > 992) {
                        var $theSidebar = jQuery('.the-sidebar aside');
                        jQuery($theSidebar).sticky({
                            topSpacing: 20,
                            bottomSpacing: 750
                        });
                    }
                }

            }
            mmStickySidebarSingle();

            //stick single only
            function mmTheStickySingleOnly() {
                var bodyClass = document.body.className;
                if (bodyClass.includes('single')) {
                    var $screenWidth = mmGetScreenWidth();
                    if ($screenWidth > 767) {
                        var $theSidebar = jQuery('#the-content-sidebar aside');
                        jQuery($theSidebar).sticky({
                            topSpacing: 20,
                            bottomSpacing: 750
                        });
                    }
                }

            }
            mmTheStickySingleOnly();


            //resize event
            jQuery(window).resize(function () {
                mmTheStickyHomeAndSingle();
                mmTheStickySingleOnly();
            });



        }
        mmStickySidebar();






        // sticky the-sidebar end


































        //jq end above

    });


});