$(document).ready(function () {
	// INIT MANSORY GRID
	const grid = $('.showcase-images .list-items').masonry({
		itemSelector: '.item-image',
		columnWidth: '.item-sizer',
		percentPosition: true
	});
	grid.imagesLoaded().progress(function () {
		grid.masonry('layout');
	});
});
