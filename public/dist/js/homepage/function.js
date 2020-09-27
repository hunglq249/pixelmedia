let scroll = '';

$(document).ready(function () {
	// INIT LOCOMOTIVE SCROLL
	scroll = new LocomotiveScroll({
		el: document.querySelector('[data-scroll-container]'),
		smooth: true,
		smoothMobile: true
	});

	let height = $(window).height();

	scroll.on('scroll', function (obj) {
		let delta = obj.delta.y;
		let index = Math.ceil(delta / height) + 1;
		let numSlide = $('.scroll-nav').find('li').length;

		if (index > numSlide) {
			index = numSlide;
		}

		$('.scroll-nav').find('a').removeClass('active');
		$('.scroll-nav')
			.find('li:nth-child(' + index + ') a')
			.addClass('active');
	});

	scroll.on('call', (obj) => {});

	// INIT YOUTUBE BACKGROUND
	$('.section.section-product').each(function () {
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
	let videoPlay = $(element).closest('.section').find('.play-video').data('ytPlayer').player;

	if (!$(element).data('play')) {
		videoPlay.playVideo();

		$(element).closest('.section').find('.play-video-overlay').fadeOut();
		$(element).closest('.section').find('.section-overlay').addClass('hide');

		$(element).html('<i class="elo el-lg el-pause"></i>');
		$(element).data('play', true);
	} else {
		videoPlay.pauseVideo();

		$(element).closest('.section').find('.play-video-overlay').fadeIn();
		$(element).closest('.section').find('.section-overlay').removeClass('hide');

		$(element).text('Play video');
		$(element).data('play', false);
	}
}

function scrollToSection(element) {
	let target = $(element).data('target');

	if (!target) {
		scroll.scrollTo(0, 0, 1000, [0.25, 0.0, 0.35, 1.0], false);
	} else {
		scroll.scrollTo(target, 0, 1000, [0.25, 0.0, 0.35, 1.0], false);
	}
}
