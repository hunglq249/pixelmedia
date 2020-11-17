$(document).ready(function () {
    // INIT ISOTOPE
    $('.article-posts').isotope({
        itemSelector: '.post',

        columnWidth: '.post-sizer',
        percentPosition: true
    });

    $('.article-nav')
        .find('a')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();
            let type = $(this).data('type');

            $('.article-nav').find('a').removeClass('active');
            $(this).addClass('active');

            if (type == '*') {
                $('.article-posts').isotope({
                    filter: '*'
                });
            } else {
                $('.article-posts').isotope({
                    filter: '.post-' + type
                });
            }
        });

    // INIT LOCOMOTIVE SCROLL
    const scroll = new LocomotiveScroll({
        el: document.querySelector('[data-scroll-container]'),
        smooth: true,
        smoothMobile: true
    });

    // INIT SWIPER
    var swiperArticleNav = new Swiper('#swiperArticle', {
        slidesPerView: 1
    });

    // var swiperArticleNav = new Swiper('#swiperArticleNav', {
    //     slidesPerView: 'auto',
    //     breakpoints: {
    //         0: {
    //             slidesPerView: 1,
    //             spaceBetween: 0
    //         },
    //         768: {
    //             slidesPerView: 'auto',
    //             spaceBetween: 24
    //         },
    //         1024: {
    //             slidesPerView: 'auto',
    //             spaceBetween: 24
    //         }
    //     }
    // });
});
