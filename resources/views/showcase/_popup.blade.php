<div class="popup fade popup-full" id="popupImageDetail">
	<div class="popup-dialog">
		<div class="popup-content">
			<div class="popup-header">
				<div></div>

				<button class="btn" data-dismiss="popup" type="button">
					<i class="elo el-2x el-close"></i>
				</button>
			</div>
			<div class="popup-body">
				<div class="swiper-container" id="swiperImage">
					<div class="swiper-wrapper">
						@foreach ($product->images as $key => $item)
							<div class="swiper-slide">
								<img src="{{ asset('storage/app'. $item) }}">
							</div>
						@endforeach
					</div>
	
					<div class="swiper-button-prev">
						<i class="elo el-3x el-caret-left"></i>
					</div>
	
					<div class="swiper-button-next">
						<i class="elo el-3x el-caret-right"></i>
					</div>
	
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>