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

    $('#popupImageDetail').on('show.zyk.popup', function () {
        $('#popupImageDetail').find('.swiper-wrapper').empty();

        $('.showcase-images table')
            .find('img')
            .each(function () {
                const _this = this;

                $('#popupImageDetail').find('.swiper-wrapper').append(`
                    <div class="swiper-slide">
                        <img src="${$(_this).attr('src')}">
                    </div>
                `);
            });
    });

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

    $('.open-image')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();
            const $popup = $('#popupImageDetail');

            $popup.popup('show');
        });

    $('.showcase-images table img')
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

    $('.showcase-images')
        .find('table img')
        .each(function () {
            $(this).addClass('wow slideInUp');
        });

    $('#btnFbShare')
        .unbind()
        .on('click', function () {
            let url = $(this).data('href');

            window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, 'facebook-share-dialog', 'width=800,height=600');
            return false;
        });

    $('#btnTwShare')
        .unbind()
        .on('click', function () {
            let url = $(this).data('href');

            window.open('https://twitter.com/intent/tweet?original_referer=' + url + '&related=twitterapi%2Ctwitter?text=check&20it&20out&tw_p=tweetbutton&url=' + url + '&via=PixelMedia', 'width=800,height=600');
            return false;
        });

    $(window).on('scroll', () => {
        let scrollTop = $(window).scrollTop();

        if (scrollTop <= $('body').height() - 1300) {
            $('.showcase-share').addClass('fixed');
        } else {
            $('.showcase-share').removeClass('fixed');
        }
    });
});
