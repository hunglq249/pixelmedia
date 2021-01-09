$(document).ready(function () {
    // FILTER PRODUCT
    $('.showcase-nav')
        .find('a')
        .unbind()
        .on('click', function () {
            let type = $(this).data('type');
            let index = $(this).data('index');

            swiperShowcaseNav.slideTo(index);

            $('.showcase-nav').find('a').removeClass('active');
            $(this).addClass('active');

            if (type == '*') {
                $('.item-product').fadeIn();
            } else {
                $('.item-product').fadeOut();
                $('.item-product-' + type).fadeIn();
            }
        });

    // INIT LOCOMOTIVE SCROLL
    const scroll = new LocomotiveScroll({
        el: document.querySelector('[data-scroll-container]'),
        smooth: true,
        smoothMobile: true
    });

    scroll.on('call', function (className) {
        delete timeout;
        let timeout = setTimeout(function () {
            $(`.${className}`).find('.mask').removeClass('offset');
            $(`.${className}`).find('.item-content').removeClass('offset');
        }, 500);
    });

    $('.showcase-cover').find('.heading-wrapper').addClass('show');
    $('.showcase-cover').find('h4').addClass('show');

    // INIT SWIPER
    var swiperShowcaseNav = new Swiper('#swiperShowcase', {
        slidesPerView: 1
    });
});
