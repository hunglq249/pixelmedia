$(document).ready(function () {
    // INIT MANSORY GRID
    // const grid = $('.showcase-images .list-items').masonry({
    //     itemSelector: '.item-image',
    //     columnWidth: '.item-sizer',
    //     percentPosition: true
    // });

    // grid.imagesLoaded().progress(function () {
    //     grid.masonry('layout');

    //
    // });

    new WOW().init();

    $('#popupImageDetail').on('shown.zyk.popup', function () {
        var swiperImage = new Swiper('#swiperImage', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    });

    // INIT PREVIEW NEXT/ PREVIOUS PROJECT
    $('.overlay-hover').on({
        mouseenter: function () {
            let direction = $(this).data('direction');

            setTimeout(function () {
                $(`.cover-${direction}`).addClass('show');
                $(this).addClass('active');
                $('.cover-overlay').addClass('show');
            }, 300);
        },
        mouseleave: function () {
            let direction = $(this).data('direction');

            $(`.cover-${direction}`).removeClass('show');
            $(this).removeClass('active');
            $('.cover-overlay').removeClass('show');
        }
    });

    $('.open-image')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();
            const $popup = $('#popupImageDetail');

            $popup.popup('show');
        });

    $('#btnTop').on('click', function (e) {
        e.preventDefault();

        $('html, body').stop().animate(
            {
                scrollTop: 0
            },
            500
        );
    });
});
