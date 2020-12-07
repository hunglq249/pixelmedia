$(document).ready(function () {
    // INIT MANSORY GRID
    const grid = $('.showcase-images .list-items').masonry({
        itemSelector: '.item-image',
        columnWidth: '.item-sizer',
        percentPosition: true
    });

    grid.imagesLoaded().progress(function () {
        grid.masonry('layout');

        new WOW().init();
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

    // OPEN IMAGE DETAIL
    // let imageArr = [];
    // $('.showcase-images')
    //     .find('img')
    //     .each(function () {
    //         imageArr.push($(this).attr('src'));
    //     });

    $('.open-image')
        .unbind()
        .on('click', function (e) {
            e.preventDefault();
            const $popup = $('#popupImageDetail');

            imageArr.forEach(function (imageSrc) {
                $popup.find('.swiper-wrapper').append(`
					<div class="swiper-slide">
						<img src="${imageSrc}">
					</div>
				`);
            });

            var swiperImage = new Swiper('#popupImageDetail .swiper-container', {
                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            });

            $popup.popup('show');
        });
});
