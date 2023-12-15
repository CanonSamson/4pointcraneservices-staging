<section class="section-full content-inner port-detail">
	<div class="container">
		<div class="row mb-lg-4">
			<?php if (!empty($portfolio_detail_4_element_image['url']))
				{
					$image_url = $portfolio_detail_4_element_image['url'];
			?>
				<div class="col-lg-12 col-md-12 m-b50 aos-item m-sm-b30" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
					<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
				</div>
			<?php } ?>
			<div class="col-lg-7 col-md-12 align-self-center aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
				<?php if(!empty($portfolio_detail_4_element_title)){ ?>
					<h2 class="dz-title">
						<?php echo wp_kses($portfolio_detail_4_element_title,'string'); ?>
					</h2>
				<?php } ?>
				
				<?php if(!empty($portfolio_detail_4_element_description)){ ?>
					<p class="m-b30">
						<?php echo wp_kses($portfolio_detail_4_element_description,mazo_allowed_html_tag()); ?>
					</p>
					<?php }	?>
				
				<?php 
					$count = 1;
					$icon_name = '';
					if(!empty($portfolio_detail_4_element_contact))
					{
					
					$item_arr = $portfolio_detail_4_element_contact;
					
					$item_count = count($item_arr);
					
					foreach($item_arr as $itemKey => $itemValue) 
					{				
										
					$icon_name = $itemValue['portfolio_detail_4_element_contact_icon']['value'];
					
				?>
				
					<div class="icon-bx-wraper style-7 left m-b30">
						<?php if(!empty($icon_name)){ ?>
							<div class="icon-bx-sm rounded-0 bg-primary">
								<span class="icon-cell"><i class="<?php echo esc_attr($icon_name); ?>"></i></span> 
							</div>
						<?php } ?>
						<div class="icon-content">
							<?php if(!empty($itemValue['portfolio_detail_4_element_contact_title'])){ ?>
								<h4 class="title m-b5">
									<?php echo wp_kses($itemValue['portfolio_detail_4_element_contact_title'],'string'); ?>
								</h4>
							<?php } ?>
							
							<?php if(!empty($itemValue['portfolio_detail_4_element_contact_description'])){ ?>
								<p>
									<?php echo wp_kses($itemValue['portfolio_detail_4_element_contact_description'],'string'); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				<?php ++$count; } } ?>
			</div>
			<?php if (!empty($portfolio_detail_4_element_image2['url']))
				{
					$image_url = $portfolio_detail_4_element_image2['url'];
			?>
				<div class="col-lg-5 col-md-12 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
					<img src="<?php echo esc_url($image_url); ?>" class="d-lg-block d-none" alt="<?php echo esc_attr__('Image','mazo'); ?>">
				</div>
			<?php } ?>
		</div>
	</div>
	
	<?php 
		if(!empty($portfolio_detail_4_element_gallery_item)){
		$item_arr = $portfolio_detail_4_element_gallery_item;	 
	?>
	<div class="container">
		<div class="clearfix">
			<div class="row lightgallery">				
				 <?php 
					$animation_time = 200;
					foreach($item_arr as $itemKey => $itemValue) {
									
						if (!empty($itemValue['portfolio_detail_4_element_gallery_image']['url'])){
						$image_url = $itemValue['portfolio_detail_4_element_gallery_image']['url'];
						$animation_time += 200;
						$thumb_url = wp_get_attachment_image_url($itemValue['portfolio_detail_4_element_gallery_image']['id'],'thumbnail');
						$section_column = $itemValue['portfolio_detail_4_element_gallery_image_column'];
				?>
					<div class="card-container wow fadeInUp <?php echo esc_attr($section_column); ?>">
						<div class="dz-box dz-overlay-box style-2 m-b30">
							<div class="dz-media dz-img-overlay1 mheight-md" <?php if(!empty($image_url)){ ?> style="background-image:url(<?php echo esc_url($image_url); ?>);" <?php } ?>>
								<span data-exthumbimage="<?php echo esc_url($thumb_url); ?>" data-src="<?php echo esc_url($image_url); ?>" class="lightimg" title="<?php echo esc_attr__('Design','mazo'); ?>">		
									<i class="la la-plus"></i> 
								</span>
							</div>
						</div>
					</div>
				<?php } } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</section>