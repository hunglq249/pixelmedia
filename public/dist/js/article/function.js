$(document).ready(function () {
    new WOW().init();

    $('.article-nav')
        .find('a')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();
            let type = $(this).data('type');
            let index = $(this).data('index');

            swiperArticleNav.slideTo(index);

            $('.article-nav').find('a').removeClass('active');
            $(this).addClass('active');

            $('.post').hide();

            if (type == '*') {
                $('.post').fadeIn();
            } else {
                $(`.post-${type}`).fadeIn();
            }
        });

    // INIT SWIPER
    var swiperArticleNav = new Swiper('#swiperArticle', {
        slidesPerView: 1
    });
});
