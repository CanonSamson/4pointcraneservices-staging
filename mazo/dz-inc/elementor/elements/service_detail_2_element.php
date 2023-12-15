<section class="content-inner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 aos-item" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
				<div class="service-detail dz-page-text sidebar">
					<div class="dz-content">
						<?php if(!empty($service_detail_2_element_title)){ ?>
							<h2 class="title m-b15">
								<?php echo wp_kses($service_detail_2_element_title,'string'); ?>
							</h2>
						<?php } ?>
						
						<div class="row">
							<?php if(!empty($service_detail_2_element_left_description)){ ?>
								<div class="col-md-6">
									<p>
										<?php echo wp_kses($service_detail_2_element_left_description,'string'); ?>
									</p>
								</div>
							<?php } ?>
							
							<?php if(!empty($service_detail_2_element_right_description)){ ?>
								<div class="col-md-6">
									<p>
										<?php echo wp_kses($service_detail_2_element_right_description,'string'); ?>
									</p>
								</div>
							<?php } ?>
						</div>
					</div>
					
					<?php 
						if(!empty($service_detail_2_element_item)){
						$item_arr = $service_detail_2_element_item;	 
					?>
					
						<div class="dz-media">
							<div class="row">
								<?php 
								$animation_time = 200;
								foreach($item_arr as $itemKey => $itemValue) {
												
									if (!empty($itemValue['service_detail_2_element_image']['url'])){
									$image_url = $itemValue['service_detail_2_element_image']['url'];
									$animation_time += 200;
									
									$section_column = $itemValue['service_detail_2_element_image_column'];
								?>
									<div class="<?php echo esc_attr($section_column); ?> aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
										<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
									</div>
								<?php } } ?>	
							</div>
						</div>
					<?php } ?>
					
					<?php if(!empty($service_detail_2_element_content)){ ?>
						<div class="dz-content">
							<?php echo wp_kses($service_detail_2_element_content,mazo_allowed_html_tag()); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>