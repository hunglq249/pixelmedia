class Product{
    constructor(options) {
        let defaultObtions = {}
        this.options = {...defaultObtions, options};

        this.$inputChangeType = $('#cover-type');
        this.$renderByType = $('.render-by-type');
        this.$inputChangeType.on('change', this.onChangeType.bind(this));
        this.$inputChangeType.trigger('change');
    }

    onChangeType(e){
        let value = e.target.value;
        if(value == 0){
            this.$renderByType.html(this.renderImage());
        }
        if(value == 1){
            let content = this.renderImage() + this.renderIdVideo();
            this.$renderByType.html(content);
        }
        if(value == ''){
            this.$renderByType.html('');
        }
        return;
    }
    renderImage(){
        return (`
            <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right" for="cover_mask">Thumb</label>
                <div class="col-md-9">
                    <input type="file" name="cover_mask" value=""
                               class="custom-file-input" id="cover_mask">
                </div>
            </div>
        `);
    }
    renderIdVideo(){
        return (`
            <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right" for="cover_url">Id Video</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="cover_url" name="cover_url" placeholder="Id Video" value="${$('#id-video-hiden').val()}">
                </div>
            </div>
        `);
    }
}
$(document).ready(function (){
    new Product();
});
