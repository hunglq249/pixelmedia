$(document).ready(function () {});

// INIT GOOGLE MAP
function initMap() {
	var position = {
		lat: 21.038856,
		lng: 105.7998275
	};

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: position
	});

	var marker = new google.maps.Marker({
		position: position,
		map: map
	});
}
