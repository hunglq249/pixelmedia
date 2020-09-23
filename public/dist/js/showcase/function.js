$(document).ready(function () {
	// INIT MANSORY GRID
	const grid = $('.list-products').masonry({
		itemSelector: '.item-product',

		columnWidth: '.item-sizer',
		percentPosition: true
	});

	grid.imagesLoaded().progress(function () {
		grid.masonry('layout');
	});

	// INIT LOCOMOTIVE SCROLL
	const scroll = new LocomotiveScroll({
		el: document.querySelector('[data-scroll-container]'),
		smooth: true
	});
});
