<section class="content-inner overflow-hidden bg-light overlay-black-dark" <?php if(!empty($content_box_9_element_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($content_box_9_element_bg_img['url']); ?>);background-position: center bottom;background-repeat: repeat-x; background-attachment:fixed" <?php } ?> id="DZContentBoxElement9">
	<div class="container">
		<div class="row align-items-center about-bx5">
			<?php if (!empty($content_box_9_element_image['url']) && $content_box_9_element_image_position == 'left')
			{
				$image_url = $content_box_9_element_image['url'];
			?>
				<div class="col-lg-6">
					<div class="dz-media left">
						<img src="<?php echo esc_url($image_url); ?>" class="circle-bg" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
						<img src="<?php echo esc_url(MAZO_URL.'assets/images/pattern/pt13.png'); ?>" class="circle-bg" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
			
			<div class="col-lg-6">
				<?php if(!empty($content_box_9_element_title)){ ?>
					<div class="section-head style-3 text-white">
						<h2 class="title">
							<?php echo wp_kses($content_box_9_element_title,mazo_allowed_html_tag()); ?>
						</h2>
						<?php if(!empty($content_box_9_element_description)){ ?>
							<p class="m-b30">
								<?php echo wp_kses($content_box_9_element_description,'string'); ?>
							</p>
						<?php } ?>
					</div>
				<?php } ?>
				
				
				
				<?php $animation_time=1;
					if(!empty($content_box_9_element_item)) { 
						foreach($content_box_9_element_item as $item) { 
						$animation_time += 200;
				?>
					<div class="progress-bx style-3 m-b40">
						<?php if(!empty($item['content_box_9_element_item_title'])){ ?>
							<div class="progress-info">
								<h4 class="title text-white">
									<?php echo wp_kses($item['content_box_9_element_item_title'],'string'); ?>
								</h4>
							</div>
						<?php } ?>
						<div class="progress">
							<div class="progress-bar" style="width: <?php echo esc_attr($item['content_box_9_element_item_number'],'string'); ?>%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
								<h5 class="progress-value"><?php echo wp_kses($item['content_box_9_element_item_number'],'string'); ?></h5>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
			
			<?php if (!empty($content_box_9_element_image) && $content_box_9_element_image_position == 'right')
			{
				$image_url = $content_box_9_element_image['url'];
			?>
				<div class="col-lg-6">
					<div class="dz-media right">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
						<img src="<?php echo esc_url(MAZO_URL.'assets/images/pattern/pt13.png'); ?>" class="circle-bg" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>