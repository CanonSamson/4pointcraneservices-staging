<?php 
	if(!empty($home_slider_2_element_item)){
		$item_arr = $home_slider_2_element_item;		
?>
	<!-- Slider -->
	<div class="swiper-container main-silder-swiper silder-two" id="DZHomeSliderElement2">
		<div class="swiper-wrapper">
			<?php foreach($item_arr as $itemKey => $itemValue) { 
				
				$btn_link = $btn_text = $anchor_attribute = '';
				if (!empty($itemValue['home_slider_2_element_item_link_title']))
				{
					$btn_link = !empty($itemValue['home_slider_2_element_item_link'])?$itemValue['home_slider_2_element_item_link']:'';
					$btn_text = !empty($itemValue['home_slider_2_element_item_link_title'])?$itemValue['home_slider_2_element_item_link_title']:'';	
					
					$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
				}
				$allowed_html_tag = mazo_allowed_html_tag();
				
			?>
				<div class="swiper-slide">
					<div class="dz-slide-item overlay-black-light" <?php if (!empty($itemValue['home_slider_2_element_bg_img']['url']))
							{ ?> style="background-image:url(<?php echo esc_url($itemValue['home_slider_2_element_bg_img']['url']); ?>);" <?php } ?>>
						<div class="container">
							<div class="silder-content" data-swiper-parallax="-40%">
								<div class="inner-content">
									<?php if(!empty($itemValue['home_slider_2_element_item_title'])){ ?>
										<h2 class="title">
											<?php echo wp_kses($itemValue['home_slider_2_element_item_title'],$allowed_html_tag); ?>
										</h2>
									<?php } ?>
									
									<?php if(!empty($itemValue['home_slider_2_element_item_description'])){ ?>
										<p class="m-b30">
											<?php echo wp_kses($itemValue['home_slider_2_element_item_description'],$allowed_html_tag); ?>
										</p>
									<?php } ?>
									
									<?php if(!empty($btn_text)) { ?>
										<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?>  class="btn shadow-primary btn-primary"><?php echo esc_html($btn_text); ?>
										</a>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="bg-shape-left"></div>
						<div class="bg-shape-right"></div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="btn-prev swiper-button-prev1"><i class="las la-arrow-left"></i></div>
		<div class="btn-next swiper-button-next1"><i class="las la-arrow-right"></i></div>
	</div>
<?php } ?>