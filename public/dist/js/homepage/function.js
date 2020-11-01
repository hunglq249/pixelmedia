let scroll = '';

$(document).ready(function () {
    // INIT SWIPER
    let interleaveOffset = 0.5;

    const swiperHomepage = new Swiper('#swiperHomepage', {
        direction: 'vertical',
        slidesPerView: 1,
        speed: 1000,
        autoplay: {
            delay: 10000
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false
        },
        mousewheel: true,
        grabCursor: true,
        watchSlidesProgress: true,
        on: {
            init: function () {
                $('.overlay-item:first-child').addClass('show');
            },
            progress: function (swiper) {
                for (var i = 0; i < swiper.slides.length; i++) {
                    var slideProgress = swiper.slides[i].progress;
                    var innerOffset = swiper.height * interleaveOffset;
                    var innerTranslate = slideProgress * innerOffset;

                    swiper.slides[i].querySelector('.swiper-inner').style.transform = 'translate3d(0,' + innerTranslate + 'px,0)';
                }
            },
            transitionStart: function (swiper) {
                $('.overlay-item').removeClass('show');
            },
            transitionEnd: function (swiper) {
                $('.overlay-nav').find('a').removeClass('active');
                $('.overlay-nav')
                    .find('a')
                    .each(function (index) {
                        if (index == swiper.realIndex) {
                            $(this).addClass('active');
                        }
                    });
                $(`.overlay-item:nth-child(${swiper.realIndex + 1})`).addClass('show');
            },
            setTransition: function (swiper, speed) {
                for (var i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = speed + 'ms';
                    swiper.slides[i].querySelector('.swiper-inner').style.transition = speed + 'ms';
                }
            }
        }
    });

    $('.overlay-nav')
        .find('a')
        .on('click', function () {
            let index = $(this).data('slide-index');
            swiperHomepage.slideTo(index);
        });

    // INIT YOUTUBE BACKGROUND
    $('.swiper-slide').each(function () {
        if ($(this).find('.play-video-wrapper').length > 0) {
            let ytbId = $(this).find('.play-video-wrapper').data('ytb-id');
            $(this)
                .find('.play-video')
                .YTPlayer({
                    fitToBackground: true,
                    videoId: ytbId,
                    mute: false,
                    playerVars: {
                        modestbranding: 0,
                        autoplay: 0,
                        controls: 0,
                        showinfo: 0,
                        branding: 0,
                        rel: 0,
                        autohide: 0,
                        start: 0,
                        origin: window.location.origin
                    }
                });
        }
    });
});

function playVideo(element) {
    const $popup = $('#popupPlayVideo');
    let videoId = $(element).data('video-id');
    let embedCode = `<iframe width="600" height="400" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;

    $popup.find('.popup-body').html(embedCode);

    $popup.popup('show');
}

// function playVideo(element) {
//     let videoPlay = $(element).closest('.swiper-slide').find('.play-video').data('ytPlayer').player;

//     if (!$(element).data('play')) {
//         videoPlay.playVideo();

//         $(element).closest('.swiper-slide').find('.play-video-overlay').fadeOut();
//         $(element).closest('.swiper-slide').find('.overlay').addClass('hide');

//         $(element).html('<i class="elo el-lg el-pause"></i>');
//         $(element).data('play', true);
//     } else {
//         videoPlay.pauseVideo();

//         $(element).closest('.swiper-slide').find('.play-video-overlay').fadeIn();
//         $(element).closest('.swiper-slide').find('.overlay').removeClass('hide');

//         $(element).text('Play video');
//         $(element).data('play', false);
//     }
// }
