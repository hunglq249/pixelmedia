$(document).ready(function () {
    var swiperRelated = new Swiper('#swiperRelated', {
        slidesPerView: 3,
        spaceBetween: 24,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
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
