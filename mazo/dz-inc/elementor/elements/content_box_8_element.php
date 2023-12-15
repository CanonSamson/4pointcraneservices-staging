<?php 
	if (!empty($content_box_8_element_image['url'])){
		$class = 'col-lg-6';
	}else{
		$class = 'col-lg-12 ';		
	}

	
	$btn_link = $btn_text = $anchor_attribute = '';
	if (!empty($content_box_8_element_content_link_title))
	{
		$btn_link = !empty($content_box_8_element_content_link)?$content_box_8_element_content_link:'';
		$btn_text = !empty($content_box_8_element_content_link_title)?$content_box_8_element_content_link_title:'';
		
		$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
	}
	?>
<!-- About Us -->
<section class="content-inner-3 pb-lg-5 pb-2" <?php if(!empty($content_box_8_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($content_box_8_element_bg_img['url']); ?>); background-position:right top; background-size:70%; background-repeat:no-repeat;" <?php } ?> id="DZContentBoxElement8">
	<div class="container">
		<div class="row about-bx5">
			<?php if (!empty($content_box_8_element_image['url']) && $content_box_8_element_image_position == 'left')
			{
				$image_url = $content_box_8_element_image['url'];
			?>
				<div class="col-lg-6 mb-4">
					<div class="dz-media">
						<img src="<?php echo esc_url($image_url); ?>" class="img1 aos-item" alt="<?php echo esc_attr__('Image', 'mazo'); ?>" data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
						<img src="<?php echo esc_url(MAZO_URL.'assets/images/pattern/pt13.png'); ?>" class="circle-bg" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
			
			<div class="<?php echo esc_attr($class); ?> aos-item mb-lg-4 pb-lg-4 align-self-center" data-aos="fade-in" data-aos-duration="800" data-aos-delay="400">
				<?php if(!empty($content_box_8_element_title)){ ?>
					<div class="section-head style-3">
						<h2 class="title">
							<?php echo wp_kses($content_box_8_element_title,'string'); ?>
						</h2>
					</div>
				<?php } ?>
				
				<?php if(!empty($content_box_8_element_description)){ ?>
					<p>
						<?php echo wp_kses($content_box_8_element_description,mazo_allowed_html_tag()); ?>
					</p>
				<?php } ?>
				
				<?php
					if(!empty($content_box_8_element_item)) { 
				?>
					<div class="history-row m-b30">
						<?php
							foreach($content_box_8_element_item as $item) { 
						?>
							<div>
								<h2 class="year"><span class="counter"><?php echo wp_kses($item['content_box_8_element_item_number'],'string'); ?></span>+</h2>
								<span class="text">
									<?php echo wp_kses($item['content_box_8_element_item_title'],mazo_allowed_html_tag()); ?>
								</span>
							</div>
						<?php } ?>
						
					</div>
				<?php } ?>
				
				<?php if(!empty($btn_text)) { ?>
					<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?> class="btn shadow-primary btn-primary">
						<?php echo esc_html($btn_text); ?> <i class="m-l10 las la-plus"></i>
					</a>
				<?php } ?>
			</div>
			<?php if (!empty($content_box_8_element_image['url']) && $content_box_8_element_image_position == 'right')
			{
				$image_url = $content_box_8_element_image['url'];
			?>
				<div class="col-lg-6 mb-4">
					<div class="dz-media">
						<img src="<?php echo esc_url($image_url); ?>" class="img1 aos-item" alt="<?php echo esc_attr__('Image', 'mazo'); ?>" data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
						<img src="<?php echo esc_url(MAZO_URL.'assets/images/pattern/pt13.png'); ?>" class="circle-bg" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>