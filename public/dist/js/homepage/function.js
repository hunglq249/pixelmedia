let scroll = '';

$(document).ready(function () {
	// INIT SWIPER
	var swiperHomepage = new Swiper('#swiperHomepage', {
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
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},
		grabCursor: true
	});

	swiperHomepage.on('slideChangeTransitionStart', function () {
		$.each(this.slides, function (index, slide) {
			$(slide).find('.overlay-text span').removeClass('show');
			$(slide).find('.overlay-actions').removeClass('show');
		});
	});

	swiperHomepage.on('slideChangeTransitionEnd', function () {
		$.each(this.slides, function (index, slide) {
			if ($(slide).hasClass('swiper-slide-active')) {
				$(slide)
					.find('.overlay-text')
					.find('span')
					.each(function (index) {
						let _this = this;
						setTimeout(function () {
							$(_this).addClass('show');
						}, index * 50);
					});

				$(slide).find('.overlay-actions').addClass('show');
			}
		});
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
	let videoPlay = $(element).closest('.swiper-slide').find('.play-video').data('ytPlayer').player;

	if (!$(element).data('play')) {
		videoPlay.playVideo();

		$(element).closest('.swiper-slide').find('.play-video-overlay').fadeOut();
		$(element).closest('.swiper-slide').find('.overlay').addClass('hide');

		$(element).html('<i class="elo el-lg el-pause"></i>');
		$(element).data('play', true);
	} else {
		videoPlay.pauseVideo();

		$(element).closest('.swiper-slide').find('.play-video-overlay').fadeIn();
		$(element).closest('.swiper-slide').find('.overlay').removeClass('hide');

		$(element).text('Play video');
		$(element).data('play', false);
	}
}
