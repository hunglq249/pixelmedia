$(document).ready(function () {
	// EXPAND MENU
	$('.btn-toggle-menu-expand')
		.unbind()
		.on('click', function (e) {
			e.preventDefault();

			$(this).find('i').toggleClass('rotated');
			$(this).closest('.menu-group-wrapper').find('.menu-group-expand').slideToggle();
		});

	// ADD/ EDIT NEW ITEM
	$('.btn-update-item').on('click', function () {
		let url = $(this).data('url');
		let needPopupFull = $(this).data('popup-full');

		const $popup = $('#popupUpdateItem');

		if (needPopupFull) {
			$popup.find('.popup-dialog').removeClass('popup-dialog-50');
		}

		zykUtils.callAjax({
			method: 'GET',
			url: url,
			success: (response) => {
				$popup.find('.popup-content').html(response.html);
				$popup.popup('show');

				let $form = $popup.find('form');

				initFormEvents($form);

				$popup
					.find('.btn-update')
					.unbind()
					.on('click', function () {
						$form.submit();
					});
			}
		});
	});

	// REMOVE ITEM ROW
	$('.btn-remove').on('click', function () {
		var id = $(this).data('id');
		var url = $(this).data('url');

		if (confirm('Chắc chắn xóa?')) {
			zykUtils.callAjax({
				method: 'GET',
				url: url,
				success: (response) => {
					if (response.status == 200 && response.isExist === true) {
						$('.item-row-' + id).fadeOut();
					}
					if (response.status == 200 && response.isExist === false && response.message != '') {
						alert(response.message);
					}
				},
				error: (jqXHR, exception) => {
					console.log(errorHandle(jqXHR, exception));
				}
			});
		}
	});

	// SEARCH ITEM
	$('.input-search-items').on('search', function (e) {
		let url = $(this).closest('.input-group').data('url');
		let keyword = $(this).val().trim();

		if (keyword.length > 0) {
			url = zykUtils.buildUrl(url, 'keyword', keyword);
			window.location.href = url;
		} else {
			window.location.href = url;
		}
	});

	$('.btn-search').on('click', function () {
		$('.input-search-items').trigger('search');
	});
});

// CONVERT SLUG
function toSlug(str) {
	str = str.toLowerCase();

	str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
	str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
	str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
	str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
	str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
	str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
	str = str.replace(/(đ)/g, 'd');

	str = str.replace(/([^0-9a-z-\s])/g, '');

	str = str.replace(/(\s+)/g, '-');

	str = str.replace(/^-+/g, '');

	str = str.replace(/-+$/g, '');

	// return
	return str;
}

// INIT POPUP'S FORM EVENTS
function initFormEvents($form) {
	// CONVERT TITLE INTO SLUG
	$form.find('.input-title-vi').on('change', function () {
		let title = $(this).val();

		let slug = toSlug(title);

		$form.find('.input-title-slug').val(slug);
	});

	// GENERATE TINYMCE
	if ($form.find('.tinymce').length > 0) {
		var editor_config = {
			path_absolute: '/',
			selector: '.tinymce',
			plugins: ['advlist autolink lists link image charmap print preview anchor textcolor', 'searchreplace visualblocks code fullscreen', 'insertdatetime media table contextmenu paste code help'],
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
			relative_urls: false,
			file_browser_callback: function (field_name, url, type, win) {
				var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
				var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

				var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
				if (type == 'image') {
					cmsURL = cmsURL + '&type=Images';
				} else {
					cmsURL = cmsURL + '&type=Files';
				}

				tinyMCE.activeEditor.windowManager.open({
					file: cmsURL,
					title: 'Filemanager',
					width: x * 0.8,
					height: y * 0.8,
					resizable: 'yes',
					close_previous: 'no'
				});
			}
		};

		tinymce.init(editor_config);
	}

	// INIT DATEPICKER
	let datepickerConfig = {
		language: 'vi',
		autoclose: true,
		todayHighlight: true,
		format: 'dd-mm-yyyy',
		weeksStart: 1
	};

	if ($form.find('.datepicker').length > 0) {
		$form.find('.datepicker').datepicker(datepickerConfig);
	}

	// INIT SELECT2
	if ($form.find('.select2').length > 0) {
		$form.find('.select2').select2();
	}
}

// REMOVE ITEM ROW
$('.btn-update-status').on('click', function () {
    var url = $(this).data('url');

    if (confirm('Chắc chắn cập nhật trạng thái?')) {
        zykUtils.callAjax({
            method: 'GET',
            url: url,
            success: (response) => {
                location.reload();
            },
            error: (jqXHR, exception) => {
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});
