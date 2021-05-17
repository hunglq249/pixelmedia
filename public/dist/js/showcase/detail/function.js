$(document).ready(function () {
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

        swiperImage.slideTo($(this).data('index'));
    });

    $('.open-image')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();
            const $popup = $('#popupImageDetail');

            $popup.popup('show');
        });

    $('.showcase-images table img').each(function (index) {
        $(this)
            .unbind()
            .on('click', function () {
                const $popup = $('#popupImageDetail');

                $popup.data('index', index);

                $popup.popup('show');
            });
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

        if (scrollTop == 0) {
            $('.showcase-share').removeClass('fade-in');
        } else {
            $('.showcase-share').addClass('fade-in');
        }
    });

    var swiperRelated = new Swiper('#swiperRelated', {
        slidesPerView: 1,
        spaceBetween: 24,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            1024: {
                slidesPerView: 3
            }
        }
    });

    $('#btnPlayVideo')
        .unbind()
        .on('click', function () {
            let id = $(this).data('id');

            const $popup = $('#popupPlayVideo');

            $popup.find('.popup-body').empty();
            $popup.find('.popup-body').append(`
                <iframe src="https://player.vimeo.com/video/${id}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            `);

            $popup.popup('show');
        });

    $('#btnPlayVideo').on('hide.zyk.popup', function () {
        $(this).find('.popup-body').empty();
    });

    $('.change-project')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();

            $('body').fadeOut();

            let url = $(this).data('url');

            setTimeout(function () {
                window.location.href = url;
            }, 300);
        });
});
