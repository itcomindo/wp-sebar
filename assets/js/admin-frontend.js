window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below

        function mmAdSc() {
            jQuery('.admin-shortcut-trigger').on('click', function () {
                jQuery('.admin-shortcut-trigger').addClass('hide');
                jQuery('.admin-shortcut').addClass('active');
                localStorage.setItem('adminShortcutActive', 'true');
            });

            jQuery('.admin-shortcut-close').on('click', function () {
                jQuery('.admin-shortcut').removeClass('active');
                jQuery('.admin-shortcut-trigger').removeClass('hide');
                localStorage.removeItem('adminShortcutActive');
            });

            if (localStorage.getItem('adminShortcutActive') === 'true') {
                jQuery('.admin-shortcut-trigger').addClass('hide');
                jQuery('.admin-shortcut').addClass('active');
            }
        }
        mmAdSc();







        //jq end above






    });


});