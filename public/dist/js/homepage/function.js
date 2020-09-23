$(document).ready(function () {
	// INIT LOCOMOTIVE SCROLL
	const scroll = new LocomotiveScroll({
		el: document.querySelector('[data-scroll-container]'),
		smooth: true,
	});

	// INIT YOUTUBE BACKGROUND
	$('.section.section-product').each(function () {
		if ($(this).find('.play-video-wrapper').length > 0) {
			let ytbId = $(this).find('.play-video-wrapper').data('ytb-id');

			$(this)
				.find('.play-video')
				.YTPlayer({
					fitToBackground: true,
					videoId: ytbId,
					mute: true,
					playerVars: {
						modestbranding: 0,
						autoplay: 1,
						controls: 0,
						showinfo: 0,
						branding: 0,
						rel: 0,
						autohide: 0,
						start: 0,
						end: 60,
						origin: window.location.origin,
					},
				});
		}
	});
});
