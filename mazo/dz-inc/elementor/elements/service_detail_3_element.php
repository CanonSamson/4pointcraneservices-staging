<?php 
	if (
			$service_detail_3_element_sidebar_layout == 'No_Sidebar' ||
			!is_active_sidebar( $service_detail_3_element_selected_sidebar ) ||
			!mazo_is_theme_sidebar_active() 
		) 
		{
			$section_class = 'col-xl-12 col-lg-12';
		}else{
			$section_class = 'col-lg-8 col-md-7';
		}
	
?>

<section class="section-full content-inner-1">
	<div class="container">
		<div class="row">
			<?php if ($service_detail_3_element_sidebar_layout == 'left' && 
				  is_active_sidebar( $service_detail_3_element_selected_sidebar ) && 
				  mazo_is_theme_sidebar_active() ) 
			  { ?>
				<div class="col-lg-4 col-md-5 m-b30 aos-item left" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="300">
					<div class="sticky-top">
						<?php dynamic_sidebar( $service_detail_3_element_selected_sidebar ); ?>
					</div>
				</div>
			 <?php } ?>
			<div class="<?php echo esc_attr($section_class); ?> aos-item" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="500">
				<div class="service-detail">
					<div class="dz-page-text">
						<?php if(!empty($service_detail_3_element_title)){ ?>
							<h2 class="title mb-2">
								<?php echo wp_kses($service_detail_3_element_title,'string'); ?>
							</h2>
						<?php } ?>
						
						<?php if(!empty($service_detail_3_element_description)){ ?>
							<p>
								<?php echo wp_kses($service_detail_3_element_description,'string'); ?>
							</p>
						<?php } ?>
						
						<div class="row">
							<div class="col-lg-6">
								<?php 
									if (!empty($service_detail_3_element_image1)){
									$image_url = $service_detail_3_element_image1['url'];
								?>
									<img src="<?php echo esc_url($image_url); ?>" class="m-b30 w-100" alt="<?php echo esc_attr__('Image','mazo'); ?>">
								<?php } ?>
								<p class="m-b0"><?php echo wp_kses($service_detail_3_element_description2,mazo_allowed_html_tag()); ?></p>
								
							</div>
							<div class="col-lg-6">
								<?php 
									if (!empty($service_detail_3_element_image2)){
									$image_url = $service_detail_3_element_image2['url'];
								?>
									<img src="<?php echo esc_url($image_url); ?>" class="m-b30 w-100" alt="<?php echo esc_attr__('Image','mazo'); ?>">
								<?php } ?>
								
								<p class="m-b0">
									<?php echo wp_kses($service_detail_3_element_description3,mazo_allowed_html_tag()); ?>
								</p>
							</div>
						</div>								
					</div>
				</div>
			</div>
			
			<?php if ($service_detail_3_element_sidebar_layout == 'right' && 
				  is_active_sidebar( $service_detail_3_element_selected_sidebar ) && 
				  mazo_is_theme_sidebar_active() ) 
			  { ?>
				<div class="col-lg-4 col-md-5 m-b30 aos-item right" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="300">
					<div class="sticky-top">
						<?php dynamic_sidebar( $service_detail_3_element_selected_sidebar ); ?>
					</div>
				</div>
			 <?php } ?>
		</div>
	</div>
</section>