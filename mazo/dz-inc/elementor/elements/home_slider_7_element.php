<?php 
if(!empty($home_slider_7_element_item)){
$item_arr = $home_slider_7_element_item;		
?>
<!-- Slider -->
<div class="slider-4">
	<div class="swiper-container main-silder-swiper silder-four swiper-counter">
		<div class="swiper-wrapper">
			<?php  
			foreach($item_arr as $item){
				
				$btn_link = $btn_text = $anchor_attribute = '';
				if (!empty($item['home_slider_7_element_item_link_title']))
				{
					$btn_link = !empty($item['home_slider_7_element_item_link'])?$item['home_slider_7_element_item_link']:'';
					$btn_text = !empty($item['home_slider_7_element_item_link_title'])? $item['home_slider_7_element_item_link_title']:'';	
					$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
				}
				$bg = !empty($item['home_slider_7_element_bg_img']['url'])?' ' : ' bg-dark';
			?>				
			<div class="swiper-slide">
				<div class="dz-slide-item <?php echo esc_attr($bg); ?>" style="background-image:url('<?php echo esc_url($item['home_slider_7_element_bg_img']['url'])?>');">
					<div class="container">
						<div class="silder-content" data-swiper-parallax="-40%">	
							<div class="inner-content">
								<?php if(!empty($item['home_slider_7_element_item_subtitle'])){ ?>
								<h5 class="sub-title text-primary">
									<?php echo esc_html($item['home_slider_7_element_item_subtitle']) ?>
								</h5>
								<?php }
								if(!empty($item['home_slider_7_element_item_title'])){ ?>
								<h2 class="title aos-item">
									<?php echo wp_kses($item['home_slider_7_element_item_title'],mazo_allowed_html_tag()) ?>
								</h2>
								<?php }
								
								if(!empty($item['home_slider_7_element_item_description'])){ ?>
								<p class="description"><?php echo esc_html($item['home_slider_7_element_item_description']) ?></p>
								<?php }
								
								if(!empty($btn_text)) { ?>
								<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_attr($anchor_attribute); ?>  class="btn shadow-primary btn-primary"><?php echo esc_html($btn_text); ?>
								</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="btn-prev swiper-button-prev1"><i class="las la-arrow-left"></i></div>
		<div class="btn-next swiper-button-next1"><i class="las la-arrow-right"></i></div>
		<span class="swiper-notification" ></span><span class="swiper-notification"></span>
	</div>
		
	<!-- counter inside banner  -->
	<?php if(!empty($home_slider_7_element_counter_item) && $home_slider_7_element_show_counter_box == 'yes'){ ?>
	<div class="counter-area1">
		<div class="container">
			<div class="counter-inner bg-primary">
				<div class="row">
					<?php 
						foreach($home_slider_7_element_counter_item as $counter_item){						
					?>
					<?php if(!empty($counter_item['counter_box_element_item_number_value']) || !empty($counter_item['counter_box_element_item_title'])){ ?>	
					<div class="col-lg-3 col-sm-6">
						<div class="icon-bx-wraper style-12 mb-xl-0  m-b30" data-name="<?php echo esc_attr($counter_item['counter_box_element_item_number_value']) ?>">
							<?php if(!empty($counter_item['counter_box_element_item_number_value'])){ ?>
							<h2 class="counter"><?php echo esc_html($counter_item['counter_box_element_item_number_value']) ?></h2>
							<?php }
									
								if(!empty($counter_item['counter_box_element_counter_title'])){ ?>
								<h6 class="title"><?php echo esc_html($counter_item['counter_box_element_counter_title']);?></h6>
							<?php } ?>
						</div>
					</div>
					<?php }
					} ?>
					
				</div>
			</div>
		</div>
	</div>	
	<?php } ?>			
</div>
<!-- Slider END -->
<?php } ?>