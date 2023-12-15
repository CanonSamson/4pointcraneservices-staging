<?php 
	if(!empty($partners_1_element_item)){
		$item_arr = $partners_1_element_item;

	if($partners_1_element_style == 'style_1'){;
?>
	<!-- Clients Logo -->
	<div class="clients-section-1 bg-light">
		<div class="container">
			<?php if(!empty($partners_1_element_title)){ ?>
				<div class="section-head style-1 text-center">
					<?php if(!empty($partners_1_element_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo wp_kses($partners_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($partners_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($partners_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($partners_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			<div class="swiper-container clients-swiper">
				<div class="swiper-wrapper">
					<?php foreach($item_arr as $itemKey => $itemValue) { 
						if (!empty($itemValue['partners_1_element_regular_image'])){
						$image_url = $itemValue['partners_1_element_regular_image']['url'];		
					?>
						<div class="swiper-slide">
							<div class="clients-logo aos-item" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
								<img class="logo-main" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
	<?php }} if($partners_1_element_style == 'style_2'){
	if(!empty($partners_1_element_gallery_images)){
		?>
	<!-- client swiper -->
	<div class="section-full content-inner-3 pb-0">
		<div class="container">
			<?php if(!empty($partners_1_element_title)){ ?>
			<div class="section-head style-6 text-center">
				<?php if(!empty($partners_1_element_subtitle)){ ?>
					<h6 class="sub-title text-primary">
						<?php echo wp_kses($partners_1_element_subtitle,'string'); ?>
					</h6>
				<?php } ?>
					
				<h2 class="title">
					<?php echo wp_kses($partners_1_element_title,'string'); ?>
				</h2>
				
				<?php if(!empty($partners_1_element_description)){ ?>
					<p>
						<?php echo wp_kses($partners_1_element_description,'string'); ?>
					</p>
				<?php } ?>
			</div>
			<?php } ?>
			
			<div class="client-swiper-2  swiper-container">
				<div class="swiper-wrapper text-center">
					<?php 
						foreach($partners_1_element_gallery_images as $gallery_images){	?>
						<div class="swiper-slide">
							<img src="<?php echo esc_url($gallery_images['url'])?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
						</div>
					<?php } ?>
				</div>
			</div>
			
		</div>
	</div>
	<?php } 
	}?>