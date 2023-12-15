<?php if (!empty($content_box_7_element_image['url'])){
	$class = 'col-lg-6';
}else{
	$class = 'col-lg-12';
}
			?>

<!-- Core Features -->
<section class="content-inner bg-primary-light" <?php if(!empty($content_box_7_element_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($content_box_7_element_bg_img['url']); ?>);" <?php } ?> id="DZContentBoxElement7">
	<div class="container">
		<div class="row align-items-center">
			<?php if (!empty($content_box_7_element_image['url']) && $content_box_7_element_image_position=='left')
				{
					$image_url = $content_box_7_element_image['url'];
			?>
				<div class="col-lg-6 m-b30 aos-item aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="600">
					<div class="dz-media rounded">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
			<div class="<?php echo esc_attr($class); ?>">
				<div class="section-head style-1">
					<?php if(!empty($content_box_7_element_subtitle)){ ?>
						<h6 class="text-primary sub-title">
							<?php echo wp_kses($content_box_7_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<?php if(!empty($content_box_7_element_title)){ ?>
						<h2 class="title">
							<?php echo wp_kses($content_box_7_element_title,'string'); ?>
						</h2>
					<?php } ?>
				</div>
				
				<?php if(!empty($content_box_7_element_description)){ ?>
					<div class="m-b30">
						<?php echo wp_kses($content_box_7_element_description,mazo_allowed_html_tag()); ?>
					</div>
				<?php } ?>
				
				<?php 
					if(!empty($content_box_7_element_item)){
					$item_arr = $content_box_7_element_item;
					
				?>
					<div class="row justify-content-center">
						<?php 
							$animation_time = 400;
							foreach($item_arr as $itemKey => $itemValue) { 
							$animation_time += 200;
							$icon = $itemValue['content_box_7_element_item_icon']['value'];
						?>
							<div class="col-sm-4 col-6 aos-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
								<div class="icon-bx-wraper style-11 m-b30 text-center">
									<div class="icon-bx-sm text-primary radius shadow m-b10 icon-bx">
										<i class="<?php echo esc_attr($icon); ?>"></i> 
									</div>
									<div class="icon-content">
										<h6 class="title m-b0">
											<?php echo wp_kses($itemValue['content_box_7_element_item_title'],'string'); ?>
										</h6>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<?php if (!empty($content_box_7_element_image['url']) && $content_box_7_element_image_position=='right')
				{
					$image_url = $content_box_7_element_image['url'];
			?>
				<div class="col-lg-6 m-b30 aos-item aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="600">
					<div class="dz-media rounded">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
		</div>	
	</div>	
</section>