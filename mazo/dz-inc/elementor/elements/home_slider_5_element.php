<?php 
	if(!empty($home_slider_5_element_item)){
		$item_arr = $home_slider_5_element_item;
	
		global $mazo_option;
		$allowed_html_tags = mazo_set($mazo_option,'allowed_html_tags');
		
?>
<div class="silder-for" id="HomeSlider4">
	<div class="swiper-container main-silder-swiper-04" id="DZHomeSliderElement5">
		<div class="swiper-wrapper">
			<?php 
				foreach($item_arr as $itemKey => $itemValue) { 
				if($itemValue['home_slider_5_element_item_style']=='video'){
			?>
			
				<div class="swiper-slide">
					<?php if (!empty($itemValue['home_slider_5_element_item_image'])){
						$image_url = $itemValue['home_slider_5_element_item_image']['url'];
						
					?>
						<div class="silder-img overlay-black-middle">
							 <video autoplay loop id="video-background" muted>
								 <source src="<?php echo esc_url($image_url); ?>" type="video/mp4">
							</video>
						</div>
					<?php } ?>
					<div class="silder-content">
						<div class="inner-content">
							<?php if(!empty($itemValue['home_slider_5_element_item_title'])){ ?>
								<h1 class="title">
									<?php echo wp_kses($itemValue['home_slider_5_element_item_title'],$allowed_html_tags); ?>
								</h1>
							<?php } ?>
							
							<?php if(!empty($itemValue['home_slider_5_element_item_description'])){ ?>
								<p class="m-b30">
									<?php echo wp_kses($itemValue['home_slider_5_element_item_description'],'string'); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php }else { ?>
				<div class="swiper-slide">
					<?php if (!empty($itemValue['home_slider_5_element_item_image']['url'])){
							$image_url = $itemValue['home_slider_5_element_item_image']['url'];
						?>
						<div class="silder-img overlay-black-middle">
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
						</div>
					<?php } ?>
					
					<div class="silder-content">
						<div class="inner-content">
							<?php if(!empty($itemValue['home_slider_5_element_item_title'])){ ?>
								<h1 class="title">
									<?php echo wp_kses($itemValue['home_slider_5_element_item_title'],$allowed_html_tags); ?>
								</h1>
							<?php } ?>
							
							<?php if(!empty($itemValue['home_slider_5_element_item_description'])){ ?>
								<p class="m-b30">
									<?php echo wp_kses($itemValue['home_slider_5_element_item_description'],$allowed_html_tags); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
		<div class="swiper-pagination-hs4"></div>
	</div>
</div>
<?php } ?>