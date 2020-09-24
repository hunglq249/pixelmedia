$(document).ready(function () {
	// INIT MANSORY GRID
	const grid = $('.article-posts').masonry({
		itemSelector: '.post',

		columnWidth: '.post-sizer',
		percentPosition: true
	});

	grid.imagesLoaded().progress(function () {
		grid.masonry('layout');
	});

	// INIT LOCOMOTIVE SCROLL
	const scroll = new LocomotiveScroll({
		el: document.querySelector('[data-scroll-container]'),
		smooth: true,
		smoothMobile: true
	});

	// INIT SWIPER
	var swiperArticleNav = new Swiper('#swiperArticleNav', {
		slidesPerView: 'auto',
		breakpoints: {
			0: {
				slidesPerView: 1,
				spaceBetween: 0
			},
			768: {
				slidesPerView: 'auto',
				spaceBetween: 24
			},
			1024: {
				slidesPerView: 'auto',
				spaceBetween: 24
			}
		}
	});
});
