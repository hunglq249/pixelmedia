$(document).ready(function () {
	// INIT LOCOMOTIVE SCROLL
	const scroll = new LocomotiveScroll({
		el: document.querySelector('[data-scroll-container]'),
		smooth: true,
		smoothMobile: true
	});

	// INIT SWIPER
	var swiperStaff = new Swiper('#swiperStaff', {
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
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		}
	});
});
