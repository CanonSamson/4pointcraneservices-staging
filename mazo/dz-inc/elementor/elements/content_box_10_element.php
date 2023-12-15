<?php
	
	$btn_link = $btn_text = $anchor_attribute = '';
	if (!empty($content_box_10_element_content_link_title))
	{
		$btn_link = !empty($content_box_10_element_content_link)?$content_box_10_element_content_link:'';
		$btn_text = !empty($content_box_10_element_content_link_title)?$content_box_10_element_content_link_title:'';
		
		$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
	}
	$bg_placeholder = '';
	$bg_placeholder = !empty($content_box_10_element_bg_placeholder)?$content_box_10_element_bg_placeholder:'';
?>
<!-- About Us -->
<section class="content-inner line-img section-title style-2" data-name="<?php echo esc_attr($bg_placeholder); ?>" id="DZContentBoxElement10">
	<div class="container">
		<?php if(!empty($content_box_10_element_title)){ ?>
			<div class="section-head style-1 text-center">
				<h2 class="title">
					<?php echo wp_kses($content_box_10_element_title,mazo_allowed_html_tag()); ?>
				</h2>
				<div class="dz-separator style-1 text-primary"></div>
				
				<?php if(!empty($content_box_10_element_description)){ ?>
					<p>
						<?php echo wp_kses($content_box_10_element_description,'string'); ?>
					</p>
				<?php } ?>
			</div>
		<?php } ?>
		
		<div class="row align-items-center about-bx6">
			<?php if (!empty($content_box_10_element_content_image1['url']) || !empty($content_box_10_element_content_image2['url']) && $content_box_10_element_image_position == 'left')
			{
				$image_url = $content_box_10_element_content_image1['url'];
				$image_url2 = $content_box_10_element_content_image2['url'];
			?>
				<div class="col-lg-6 m-b30">
					<div class="dz-media">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>" class="img1 aos-item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
						<div class="img2  aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
							<img src="<?php echo esc_url($image_url2); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
						</div>
					</div>
				</div>
			<?php } ?>
			
			<div class="col-lg-6 m-b30">
				<?php if(!empty($content_box_10_element_content_title)){ ?>
					<h4 class="title">
						<?php echo wp_kses($content_box_10_element_content_title,'string'); ?>
					</h4>
				<?php } ?>
				
				<div class="year-exp2 shadow m-b30">
					<?php if(!empty($content_box_10_element_content_subtitle)){ ?>
						<h2 class="year text-primary">
							<?php echo wp_kses($content_box_10_element_content_subtitle,'string'); ?>
						</h2>
					<?php } ?>
					
					<?php if(!empty($content_box_10_element_content_subtitle2)){ ?>
						<h4 class="text">
							<?php echo wp_kses($content_box_10_element_content_subtitle2,'string'); ?>
						</h4>
					<?php } ?>
				</div>
				
				<?php if(!empty($content_box_10_element_content_description)){ ?>
					<?php echo wp_kses($content_box_10_element_content_description,mazo_allowed_html_tag()); ?>
				<?php } ?>
				
				<?php if(!empty($btn_text)) { ?>
					<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?> class="btn shadow-primary btn-primary">
						<?php echo esc_html($btn_text); ?> <i class="m-l10 fas fa-caret-right"></i>
					</a>
				<?php } ?>
			</div>
			
			<?php if (!empty($content_box_10_element_content_image1['url']) || !empty($content_box_10_element_content_image2['url']) && $content_box_10_element_image_position == 'right')
					{
					$image_url = $content_box_10_element_content_image1['url'];
					$image_url2 = $content_box_10_element_content_image2['url'];
			?>
				<div class="col-lg-6 m-b30">
					<div class="dz-media">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>" class="img1 aos-item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
						<div class="img2  aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
							<img src="<?php echo esc_url($image_url2); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
	<div class="bg-wind">
		<div class="bg-wind-bx">
			<img width="65" height="672" src="<?php echo esc_url(MAZO_URL.'assets/images/background/wind-pic1.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
			<div class="wind-rotate"><img width="820" height="820" src="<?php echo esc_url(MAZO_URL.'assets/images/background/wind-pic2.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>"></div>
		</div>	
		<div class="bg-wind-bx wind-bx-2">
			<img width="65" height="672" src="<?php echo esc_url(MAZO_URL.'assets/images/background/wind-pic1.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
			<div class="wind-rotate"><img width="820" height="820" src="<?php echo esc_url(MAZO_URL.'assets/images/background/wind-pic2.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>"></div>
		</div>	
		<div class="bg-wind-bx wind-bx-3">
			<img width="65" height="672" src="<?php echo esc_url(MAZO_URL.'assets/images/background/wind-pic1.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
			<div class="wind-rotate"><img width="820" height="820" src="<?php echo esc_url(MAZO_URL.'assets/images/background/wind-pic2.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>"></div>
		</div>	
	</div>
</section>