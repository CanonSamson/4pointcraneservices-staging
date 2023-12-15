<?php if (!empty($content_box_1_element_image['url']) || !empty($content_box_1_element_image2['url']) && $content_box_1_element_img_position=='left' || $content_box_1_element_img_position=='right'){
	$class = 'col-lg-6 col-md-6';
}else{
	$class = 'col-lg-12 col-md-12';
}
$allowed_html_tag = mazo_allowed_html_tag();					
?>
<!-- About Us -->
<section class="content-inner-1" id="DZContentBoxElement1">
	<div class="container">
		<div class="row">
			<?php if(!empty($content_box_1_element_image['id']) && !empty($content_box_1_element_image2['id']) && $content_box_1_element_img_position=='left')
				{
					
					$image_url = $content_box_1_element_image['url'];
					$image_url2 = $content_box_1_element_image2['url'];
			?>
				<div class="col-lg-6 col-md-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<div class="row about-media style-1">
						<div class="col-6 mb-4">
							<img src="<?php echo esc_url($image_url); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
						</div>
						<div class="col-6 mt-4">
							<img src="<?php echo esc_url($image_url2); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
						</div>
						<div class="icon-bx">
							<img src="<?php echo esc_url(MAZO_URL.'assets/images/logo-icon-white.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="<?php echo esc_attr($class); ?> m-sm-t30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
				<div class="section-head style-1">
					<?php if(!empty($content_box_1_element_subtitle)){ ?>
						<h5 class="text-primary sub-title">
							<?php echo wp_kses($content_box_1_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					
					<?php if(!empty($content_box_1_element_title)){ ?>
						<h2 class="title mb-4">
							<?php echo wp_kses($content_box_1_element_title,'string'); ?>
						</h2>
					<?php } ?>
					
					<?php if(!empty($content_box_1_element_description))
					{ 
						echo wp_kses($content_box_1_element_description,$allowed_html_tag);
					}
					?>
				</div>
				
				<?php 
					if(!empty($content_box_1_element_item)){
					$item_arr = $content_box_1_element_item;
					$count = 1;
					$class = count($item_arr)-1;
				
					foreach($item_arr as $itemKey => $itemValue) {
					$mr_class = ($class == $count)?'m-b30':''; 
				?>
					<div class="icon-bx-wraper left style-5 <?php echo esc_attr($mr_class); ?>">
						<div class="icon-lg me-3"> 
							<span class="icon-cell">
								<svg class="radial-progress" data-percentage="<?php echo esc_attr($itemValue['content_box_1_element_item_number']['size'],'string'); ?>" viewBox="0 0 80 80">
									<circle class="incomplete" cx="40" cy="40" r="35"></circle>
									<circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
									<text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)"><?php echo esc_html($itemValue['content_box_1_element_item_number']['size'],'string'); ?>%</text>
								</svg>
							</span> 
						</div>
						<div class="icon-content">
							<?php if(!empty($itemValue['content_box_1_element_item_title'])){  ?>
								<h4 class="dz-title">
									<?php echo wp_kses($itemValue['content_box_1_element_item_title'],'string'); ?>
								</h4>
							<?php } ?>
							<?php if(!empty($itemValue['content_box_1_element_item_description'])){  ?>
								<p>
									<?php echo wp_kses($itemValue['content_box_1_element_item_description'],'string'); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				<?php ++$count; } } ?>
			</div>
			<?php if(!empty($content_box_1_element_image['id']) && !empty($content_box_1_element_image2['id']) && $content_box_1_element_img_position=='right')
					{
					$image_url = $content_box_1_element_image['url'];
					$image_url2 = $content_box_1_element_image2['url'];
			?>
				<div class="col-lg-6 col-md-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<div class="row about-media style-1 right">
						<div class="col-6 mb-4">
							<img src="<?php echo esc_url($image_url); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
						</div>
						<div class="col-6 mt-4">
							<img src="<?php echo esc_url($image_url2); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
						</div>
						<div class="icon-bx">
							<img src="<?php echo esc_url(MAZO_URL.'assets/images/logo-icon-white.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
						</div>
					</div>
				</div>
		<?php } ?>
		</div>
	</div>
</section>