<?php 
$icon = '';
$icon = $content_box_2_element_icon['value'];

$allowed_html_tag = mazo_allowed_html_tag(); ?>
<!-- Our Features -->
<section class="bg-secondary counter-area-1" id="DZContentBoxElement2">
	<div class="container">
		<div class="row">			
			<div class="col-lg-6 col-md-6 aos-item content-inner" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
				<div class="section-head style-1 text-white">
					<?php if(!empty($content_box_2_element_subtitle)){ ?>
						<h5 class="text-primary sub-title">
							<?php echo wp_kses($content_box_2_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					
					<?php if(!empty($content_box_2_element_title)){ ?>
						<h2 class="title mb-4">
							<?php echo wp_kses($content_box_2_element_title,'string'); ?>
						</h2>
					<?php } ?>
					
					<?php if(!empty($content_box_2_element_description)){ ?>
						<p>
							<?php echo wp_kses($content_box_2_element_description,$allowed_html_tag); ?>
						</p>
					<?php }	?>
				</div>
				<?php if(!empty($content_box_2_element_number)){ ?>
					<div class="about-contact m-b30">
						<?php if(!empty($icon)){ ?>
							<i class="<?php echo esc_attr($icon); ?>"></i>
						<?php } ?>
						<h2 class="number text-white">
							<?php echo wp_kses($content_box_2_element_number,'string'); ?>
						</h2>
					</div>
				<?php } ?>
			</div>
			
			<?php if(!empty($content_box_2_element_counter_show=='yes')){  
				if(!empty($content_box_2_element_item)){
				$item_arr = $content_box_2_element_item;
			?>
				<div class="col-lg-1 col-md-1 content-inner counter-col align-self-center">
					<div class="counter-inner row">
					<?php 
						foreach($item_arr as $itemKey => $itemValue) { 
						$icon_name = $itemValue['content_box_2_element_item_icon']['value'];
					?>
						<div class="col-md-12 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
							<div class="icon-bx-wraper left style-4 m-b30">
								<div class="icon-lg"> 
									<span class="icon-cell text-primary">
										<i class="<?php echo esc_attr($icon_name); ?>"></i>
									</span> 
								</div>
								<div class="icon-content">
									<?php if(!empty($itemValue['content_box_2_element_item_number'])){  ?>
										<h2 class="dz-title counter">
											<?php echo wp_kses($itemValue['content_box_2_element_item_number'],$allowed_html_tag); ?>
										</h2>
									<?php }  ?>
									
									<?php if(!empty($itemValue['content_box_2_element_item_title'])){  ?>
										<p>
											<?php echo wp_kses($itemValue['content_box_2_element_item_title'],'string'); ?>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			<?php } } ?>
			
			<?php if (!empty($content_box_2_element_image['url']) && $content_box_2_element_item_style=='image')
				{
					$image_url = $content_box_2_element_image['url'];
			?>
				<div class="col-lg-5 col-md-5">
					<div class="media-full">
						<img src="<?php echo esc_url($image_url); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } else { 
				$image_url = $content_box_2_element_image['url'];
			?>
				<div class="col-lg-5 col-md-5  mb-lg-0 mb-5">
					<div class="media-full video-wrapper">
						<video autoplay loop class="video-background" muted>
							 <source src="<?php echo esc_url($image_url); ?>" type="video/mp4">
						</video>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>