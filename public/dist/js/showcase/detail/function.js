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
});
