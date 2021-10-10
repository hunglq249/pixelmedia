$(document).ready(function () {
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

    $(window).on('scroll', () => {
        let scrollTop = $(window).scrollTop();

        if (scrollTop == 0) {
            $('.article-share').removeClass('fade-in');
        } else {
            $('.article-share').addClass('fade-in');
        }
    });
});
