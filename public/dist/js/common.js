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
			$(this).attr('src', '/dist/img/logo.svg');
		},
		mouseleave: function () {
			$(this).attr('src', '/dist/img/logo_w.svg');
		}
	});
});
