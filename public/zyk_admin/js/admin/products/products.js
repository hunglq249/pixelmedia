class Product {
    constructor(options) {
        let defaultObtions = {};
        this.options = { ...defaultObtions, options };

        this.$inputChangeType = $('#selectCoverType');
        this.$renderByType = $('.render-by-type');
        this.$btnRemoveImage = $('.btn-remove-image');
        this.$inputChangeType.on('change', this.onChangeType.bind(this));
        this.$btnRemoveImage.on('click', this.onRemoveImage.bind(this));
    }

    onChangeType(e) {
        let value = e.target.value;

        if (value == 0) {
            this.$renderByType.html(this.renderImage());
        }
        if (value == 1) {
            let content = this.renderImage() + this.renderIdVideo();
            this.$renderByType.html(content);
        }
        if (value == '') {
            this.$renderByType.html('');
        }
        return;
    }
    renderImage() {
        return `
			<label>
				Thumb
			</label>

			<input type="file" name="cover_mask" value="" class="custom-file-input" id="cover_mask">
        `;
    }
    renderIdVideo() {
        return `
			<label>
				Youtube Video Id
			</label>
            <input type="text" class="form-control" id="cover_url" name="cover_url" placeholder="Youtube Video Id" value="">
        `;
    }

    onRemoveImage(e){
        let $this = $(e.currentTarget);
        let url = $this.attr('data-url');
        let image = $this.attr('data-image');
        if(confirm('Chắc chắn xóa ảnh này?')){
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    image: image
                },
                success: function (res) {
                    if(res.status == 200){
                        $this.parent('.item-image').remove();
                    }else{
                        alert(res.message);
                    }
                }
            });
        }
    }
}

$(document).ready(function () {
    $('#popupUpdateItem').on('shown.zyk.popup', function () {
        new Product();

        $(this)
            .find('#imageUpload')
            .on('change', function (e) {
                console.log(e.target.files);
            });
    });
});
