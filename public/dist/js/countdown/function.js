$(document).ready(function () {
	// INIT COUNTDOWN
	let date = new Date('2020-10-25').getTime();

	let countdown = setInterval(function () {
		let now = new Date().getTime();

		let distance = date - now;

		let days = Math.floor(distance / (1000 * 60 * 60 * 24));
		let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		let seconds = Math.floor((distance % (1000 * 60)) / 1000);

		$('#timerDay').text(formatNum(days));
		$('#timerHour').text(formatNum(hours));
		$('#timerMin').text(formatNum(minutes));
		$('#timerSec').text(formatNum(seconds));

		if (distance == 0) {
			clearInterval(countdown);
		}
	}, 1000);

	// INIT VIDEO
	$('.play-video').YTPlayer({
		fitToBackground: true,
		videoId: 'LBBx52Jw74g',
		mute: true,
		playerVars: {
			modestbranding: 0,
			autoplay: 1,
			controls: 0,
			showinfo: 0,
			branding: 0,
			rel: 0,
			autohide: 0,
			origin: window.location.origin
		}
	});
});

function formatNum(num) {
	if (num < 10) {
		return '0' + num;
	} else {
		return num;
	}
}
