window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below


        function mm_wrt() {
            var kataPerMenit = 150;
            var postContent = jQuery('#the-content').text();
            var jumlahKata = postContent.split(' ').length;
            console.log(jumlahKata);
            var waktuBaca = Math.ceil(jumlahKata / kataPerMenit);
            jQuery('.estimasi-waktu-baca').text(waktuBaca + ' menit estimasi waktu baca');
        }

        mm_wrt();




        //jq end above




    });


});