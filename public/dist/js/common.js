$(document).ready(function () {
    $(document)
        .on('click.nav.header', function (e) {
            $('.btn-toggle-nav').removeClass('active');
            $('header').find('.header-nav').removeClass('show');
        })
        .on('click.nav.header', '.btn-toggle-nav', function (e) {
            e.preventDefault();
            e.stopPropagation();

            $(this).toggleClass('active');
            $('header').find('.header-nav').toggleClass('show');
        });

    // CHANGE LOGO ON ENTER MOUSE
    $('.web-logo').on({
        mouseenter: function () {
            $(this).attr('src', '/dist/img/logo_lg.svg');
        },
        mouseleave: function () {
            $(this).attr('src', '/dist/img/logo_lg_w.svg');
        }
    });

    // CHECK SCROLL TOP
    $(window).on('scroll', function () {
        let scrollTop = $(window).scrollTop();

        delete delayScroll;
        let delayScroll = setTimeout(function () {
            let newScrollTop = $(window).scrollTop();
            if (scrollTop < newScrollTop) {
                $('header').addClass('collapsed');
            } else if (scrollTop > newScrollTop) {
                console.log('scroll up');
            }
        }, 100);
    });
});
