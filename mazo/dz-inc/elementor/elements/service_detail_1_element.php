<?php 
	if (
			$service_detail_1_element_selected_sidebar=='No_Sidebar' ||
			$service_detail_1_element_sidebar_layout == '' ||
			!is_active_sidebar( $service_detail_1_element_selected_sidebar ) ||
			!mazo_is_theme_sidebar_active() 
		) 
	{
		$section_class = 'col-lg-12 col-md-12';
	}else{
		$section_class = 'col-lg-8 col-md-12';
	}
	$allowed_html_tag = mazo_allowed_html_tag();
?>
<!-- Service Details -->
<section class="content-inner">
	<div class="container">
		<div class="row">
			<?php if ($service_detail_1_element_sidebar_layout == 'left' && 
				is_active_sidebar( $service_detail_1_element_selected_sidebar ) && 
				mazo_is_theme_sidebar_active() ) 
				{ ?>
				<div class="col-lg-4 col-md-12 m-b30 aos-item aos-init aos-animate" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="300">
					<div class="sticky-top">
						<?php dynamic_sidebar( $service_detail_1_element_selected_sidebar ); ?>
					</div>
				</div>
			<?php } ?>
	
			<div class="<?php echo esc_attr($section_class); ?> m-b30">
				<div class="service-detail">
					<?php if(!empty($service_detail_1_element_title) || !empty($service_detail_1_element_description)){ ?>
						<div class="dz-content m-b40">
							<?php if(!empty($service_detail_1_element_title)){ ?>
								<h2 class="title m-b15">
									<?php echo wp_kses($service_detail_1_element_title,'string'); ?>
								</h2>
							<?php } ?>
							
							<?php if(!empty($service_detail_1_element_description)){ ?>
								<p>
									<?php echo wp_kses($service_detail_1_element_description,$allowed_html_tag); ?>
								</p>
							<?php } ?>
						</div>
					<?php } ?>
					<div class="row">
						<?php 
							if(!empty($service_detail_1_element_image_item)){ 
							$image_item = $service_detail_1_element_image_item;
							foreach($image_item as $image){ 
							$image_column = $image['service_detail_1_element_item_image_column'];
							$image_url = $image['service_detail_1_element_item_image']['url'];
						?>
							<div class="<?php echo esc_attr($image_column); ?>">
								<div class="dz-media rounded">
									<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
								</div>
							</div>
						<?php } } ?>
					</div>
					<div class="dz-content m-b30">
						<?php if(!empty($service_detail_1_element_title2)){ ?>
							<h2 class="title m-b15">
								<?php echo wp_kses($service_detail_1_element_title2,'string'); ?>
							</h2>
						<?php } ?>
						
						<?php if(!empty($service_detail_1_element_description2)){ ?>
							<p class="m-b30">
								<?php echo wp_kses($service_detail_1_element_description2,$allowed_html_tag); ?>
							</p>
						<?php } ?>
						
						<?php 
							if(!empty($service_detail_1_element_item)){ 
							$item_arr = $service_detail_1_element_item;
						?>
							<div class="row">
								<?php 
									foreach($item_arr as $itemKey => $itemValue) { 
									$icon_name = $itemValue['service_detail_1_element_item_icon']['value'];
								?>
									<div class="col-md-6 m-b20">
										<div class="icon-bx-wraper left style-3">
											<div class="icon-lg text-primary"> 
												<span class="icon-cell">
													<i class="<?php echo esc_attr($icon_name); ?>"></i>
												</span>
											</div>
											<div class="icon-content">
												<?php if(!empty($itemValue['service_detail_1_element_item_title'])){  ?>
													<h4 class="text-capitalize">
														<?php echo esc_html($itemValue['service_detail_1_element_item_title'],'string'); ?>
													</h4>
												<?php }  ?>
												
												<?php if(!empty($itemValue['service_detail_1_element_item_description'])){  ?>
													<p>
														<?php echo wp_kses($itemValue['service_detail_1_element_item_description'],'string'); ?>
													</p>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					
					<?php if (!empty($service_detail_1_element_main_image['url'])){
						$image_url = $service_detail_1_element_main_image['url'];
					?>
						<div class="dz-media rounded">
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
						</div>
					<?php } ?>
					
					<div class="dz-content">
						<?php if(!empty($service_detail_1_element_title3)){ ?>
							<h2 class="title m-b15">
								<?php echo wp_kses($service_detail_1_element_title3,'string'); ?>
							</h2>
						<?php } ?>
						
						<?php if(!empty($service_detail_1_element_description3)){ ?>
							<p>
								<?php echo wp_kses($service_detail_1_element_description3,$allowed_html_tag); ?>
							</p>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<?php if ($service_detail_1_element_sidebar_layout == 'right' && 
				is_active_sidebar( $service_detail_1_element_selected_sidebar ) && 
				mazo_is_theme_sidebar_active() ) 
				{ 
			?>
				<div class="col-lg-4 col-md-12 m-b30 aos-item aos-init aos-animate" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="300">
					<div class="sticky-top">
						<?php dynamic_sidebar( $service_detail_1_element_selected_sidebar ); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>