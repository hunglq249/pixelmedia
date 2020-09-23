$(document).ready(function () {
	$('#selectJob').on('change', function () {
		let jobId = $(this).val();

		$(window).scrollTop($('#job' + jobId).offset().top);
	});
});

function callPopup(e, jobId, apply = true) {
	e.preventDefault();

	const $popup = $('#popupJobDetail');

	let url = '/beta/tuyen-dung/chi-tiet-cong-viec';

	url = zykUtils.buildUrl(url, 'id', jobId);

	zykUtils.callAjax({
		url: url,
		method: 'GET',
		success: function (res) {
			$popup.find('.popup-body').html(res.html);

			console.log(apply);

			$popup.popup('show');

			if (apply) {
				$popup.find('.job-wrapper').scrollTop($popup.find('.job-apply').position().top);
			}
		},
		error: function () {}
	});
}

function submitFormApply(element) {
	const $form = $(element).closest('form');

	let validate = validateForm($form);

	console.log(validate);

	if (validate) {
		// $form.submit();
	}
}

function validateForm(form) {
	let name = form.find('[name="Name"]').val().trim();
	let email = form.find('[name="Email"]').val().trim();
	let phone = form.find('[name="PhoneNumber"]').val().trim();
	let errors = [];

	form.find('.form-text').text('');

	if (name.length == 0) {
		errors.push({
			key: 'Name',
			message: 'Name field is required!'
		});
	}

	if (email.length == 0) {
		errors.push({
			key: 'Email',
			message: 'Email field is required!'
		});
	} else {
		if (!zykUtils.validateEmail(email)) {
			errors.push({
				key: 'Email',
				message: 'Email format is wrong!'
			});
		}
	}

	if (!zykUtils.validatePhone(phone)) {
		errors.push({
			key: 'PhoneNumber',
			message: 'Phone number format is wrong!'
		});
	}

	if (errors.length > 0) {
		form.find('.form-text').text('');

		errors.forEach((error) => {
			$(`input[name="${error.key}"]`).closest('.form-group').find('.form-text').text(error.message);
		});

		return false;
	}

	return true;
}
