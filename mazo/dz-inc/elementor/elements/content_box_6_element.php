<?php 
$class = (!empty($content_box_6_element_image['url']) && $content_box_6_element_image_position!='Select Option')?'col-xl-6 col-lg-6 offset-xl-1':'col-xl-12 col-lg-12'; 
	$allowed_html_tag = mazo_allowed_html_tag();
?>

<!-- About Us -->
<section class="content-inner" <?php if(!empty($content_box_6_element_bg_img['url'])){ ?> style="background-image: url(<?php echo MAZO_URL ?>assets/images/pattern/pt-bg1.png), url(<?php echo esc_url($content_box_6_element_bg_img['url']); ?>);background-size: 50%;background-repeat: no-repeat;background-position: right top, left bottom;" <?php } ?> id="DZContentBoxElement6">
	<div class="container">
		<div class="row align-items-center about-bx2">
			<?php if (!empty($content_box_6_element_image['url']) && $content_box_6_element_image_position=='left')
				{
					$image_url = $content_box_6_element_image['url'];
			?>
				<div class="col-xl-5 col-lg-6 m-lg-b30 aos-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
					<div class="dz-media about-media rounded">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>" class="aos-item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
						<div class="year-exp aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
							<?php if(!empty($content_box_6_element_year)){ ?>
								<h2 class="year text-primary">
									<?php echo wp_kses($content_box_6_element_year,'string'); ?>
								</h2>
							<?php } ?>
							
							<?php if(!empty($content_box_6_element_year_title)){ ?>
								<h4 class="text">
									<?php echo wp_kses($content_box_6_element_year_title,$allowed_html_tag); ?>
								</h4>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="<?php echo esc_attr($class); ?> m-b15 aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="600">
				<div class="section-head style-1">
					<?php if(!empty($content_box_6_element_subtitle)){ ?>
						<h6 class="text-primary sub-title">
							<?php echo wp_kses($content_box_6_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<?php if(!empty($content_box_6_element_title)){ ?>
						<h2 class="title">
							<?php echo wp_kses($content_box_6_element_title,'string'); ?>
						</h2>
					<?php } ?>
				</div>
				
				
				<?php 
					if(!empty($content_box_6_element_item)){
					$item_arr = $content_box_6_element_item;
				?>
					<ul class="nav nav-tabs nav-tabs1 m-b30" id="myTab" role="tablist">
						<?php $count=1;
							foreach($item_arr as $itemKey => $itemValue) {
							  $item_class = ($count == 1)?'active':'';
						?>
							<li class="nav-item" role="presentation">
								<button class="nav-link <?php echo esc_attr($item_class); ?>" id="home-tab<?php echo esc_attr($count); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo sanitize_title($itemValue['content_box_6_element_item_title']); ?>" type="button" role="tab" aria-selected="true"><?php echo wp_kses($itemValue['content_box_6_element_item_title'],'string'); ?></button>
							</li>
						<?php ++$count; } ?>
					</ul>
					
					<div class="tab-content" id="myTabContent">
						<?php $count=1;
							foreach($item_arr as $itemKey => $itemValue) {          
							  $item_class = ($count == 1)?'active show':'';
							  $section_class = (!empty($itemValue['content_box_6_element_item_image']['url']))?'col-sm-8':'col-sm-12';
						?>
							<div class="tab-pane fade <?php echo esc_attr($item_class); ?>" id="<?php echo sanitize_title($itemValue['content_box_6_element_item_title']); ?>" role="tabpanel" aria-labelledby="home-tab<?php echo esc_attr($count); ?>">
								<div class="row align-items-center">
									<?php if (!empty($itemValue['content_box_6_element_item_image']['url']))
										{
											$image_url = $itemValue['content_box_6_element_item_image']['url'];
									?>
										<div class="col-sm-4 m-b30 m-sm-b15">
											<div class="dz-media">
												<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
											</div>
										</div>
									<?php } ?>
									
									
									<div class="<?php echo esc_attr($section_class); ?> m-b30">
										<?php if(!empty($itemValue['content_box_6_element_item_description'])){ ?> 
											<div class="m-b0">
												<?php echo wp_kses($itemValue['content_box_6_element_item_description'],$allowed_html_tag); ?>
											</div>
										<?php }	?>
									</div>
								</div>
								
								<?php 
									if(!empty($itemValue['content_box_6_element_item_description_list'])){ 
										$item_list = explode(',', $itemValue['content_box_6_element_item_description_list']);
								?>
									<ul class="list-square-check grid-2">
										<?php foreach($item_list as $list){ ?>
											<li>
												<?php echo esc_html($list); ?>
											</li>
										<?php } ?>
									</ul>
								<?php } ?>
							</div>
						<?php ++$count; } ?>
					</div>
				<?php } ?>
			</div>
			<?php if (!empty($content_box_6_element_image['url']) && $content_box_6_element_image_position=='right')
				{
					$image_url = $content_box_6_element_image['url'];
			?>
				<div class="col-xl-5 col-lg-6 m-lg-b30 aos-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
					<div class="dz-media about-media rounded">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>" class="aos-item" data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
						<div class="year-exp aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
							<?php if(!empty($content_box_6_element_year)){ ?>
								<h2 class="year text-primary">
									<?php echo wp_kses($content_box_6_element_year,'string'); ?>
								</h2>
							<?php } ?>
							
							<?php if(!empty($content_box_6_element_year_title)){ ?>
								<h4 class="text">
									<?php echo wp_kses($content_box_6_element_year_title,$allowed_html_tag); ?>
								</h4>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- About Us -->