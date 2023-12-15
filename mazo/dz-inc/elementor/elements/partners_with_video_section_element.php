<section class="content-inner bg-dark overlay-black-middle" id="DZPartnerWIthVideoSection" <?php if(!empty($partners_with_video_section_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($partners_with_video_section_element_bg_img['url']); ?>); background-position:center; background-size:auto; background-repeat:no-repeat;" <?php } ?>>
	<div class="container">
		<div class="row">
			<?php if(!empty($partners_with_video_section_element_video_link)){ ?>
				<div class="col-lg-12 text-center">
					<div class="video-bx content-media style-3 m-b20">
						<div class="video-btn aos-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
							<a href="<?php echo esc_url($partners_with_video_section_element_video_link); ?>" class="popup-youtube"><i class="fas fa-play"></i></a>
						</div>
					</div>
					<?php if(!empty($partners_with_video_section_element_title)){ ?>
						<div class="section-head style-3 text-center text-white">
							<h2 class="title">
								<?php echo wp_kses($partners_with_video_section_element_title,mazo_allowed_html_tag()); ?>
							</h2>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			
			<?php 
				if(!empty($partners_with_video_element_item)){
					$item_arr = $partners_with_video_element_item;
			?>
				<div class="col-lg-12">
					<div class="client-logo-wrapper">
						<?php foreach($item_arr as $itemKey => $itemValue) { 
							if (!empty($itemValue['partners_with_video_element_item_image1']))
							{
							$image_url = $itemValue['partners_with_video_element_item_image1']['url'];	
						?>
							<div class="clients-grid aos-item aos-init aos-animate" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="100">
								<img class="logo-main" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
							</div>
						<?php } } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>