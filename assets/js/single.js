window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        //jq start below


        //estimasi waktu baca start
        function mm_wrt() {
            var kataPerMenit = 150;
            var postContent = jQuery('#the-content').text();
            var jumlahKata = postContent.split(' ').length;
            console.log(jumlahKata);
            var waktuBaca = Math.ceil(jumlahKata / kataPerMenit);
            jQuery('.ert').text('Time reading ' + waktuBaca);
        }
        mm_wrt();
        //estimasi waktu baca end


        // add alt and title kalau kosong start

        function addAltTitle() {
            var judulPost = jQuery('div#sing-title-wr h1').text();
            jQuery('div#the-content img').each(function () {
                var img = jQuery(this);
                if (!img.attr('alt') || img.attr('alt').trim() === '' || !img.attr('title') || img.attr('title').trim() === '') {
                    img.attr('alt', judulPost);
                    img.attr('title', judulPost);
                }
            });
        }
        addAltTitle();

        //add alt and title to img start


        //toc start

        function mm_toc() {
            var toc = "<div id='the-toc'><ul class='list-no-style toc-list'>";
            jQuery("#the-content").find("h2, h3, h4, h5, h6").not("#respond h2, #respond h3, #respond h4, #respond h5, #respond h6").each(function (i) {
                var current = jQuery(this);
                current.attr("id", "mm_toc" + i);
                toc += "<li class='" + current.prop("tagName").toLowerCase() + "'><a href='#mm_toc" + i + "'>" + current.text() + "</a></li>";
            });
            toc += "</ul></div>";
            jQuery("#the-content").prepend(toc);
        }
        mm_toc();
        //toc end




        //jq end above




    });


});