let scroll;

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

            $('.item-product').removeClass((index, className) => {
                return (className.match(/(^|\s)col-md-\S+/g) || []).join(' ');
            })

            $('.item-product').hide();

            if (type == '*') {
                $('.item-product').each(function(index) {
                    if (index % 5 == 0 || index % 5 == 1 || index % 5 == 2) {
                        $(this).addClass('col-md-4');
                    } else if (index % 5 == 3 || index % 5 == 4) {
                        $(this).addClass('col-md-6');
                    }
                });
            
                $('.item-product').fadeIn();
            
                scroll.update();
            } else {
                $(`.item-product-${type}`).each(function(index) {
                    if (index % 5 == 0 || index % 5 == 1 || index % 5 == 2) {
                        $(this).addClass('col-md-4');
                    } else if (index % 5 == 3 || index % 5 == 4) {
                        $(this).addClass('col-md-6');
                    }
                });
            
                $(`.item-product-${type}`).fadeIn();
            
                scroll.update();
            }
        });
    
    if(request && request != ''){
        request = Number(request);

        setTimeout(function(){
            $('.showcase-nav').find(`a[data-type="${request}"]`).trigger('click')
        },100)
    }

    // INIT LOCOMOTIVE SCROLL
    scroll = new LocomotiveScroll({
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

function updateItemProduct(type){
    
}
