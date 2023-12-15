<!-- Portfolio Details -->
<section class="content-inner port-detail lightgallery line-img">
	<div class="container">
		<div class="row">
			<?php if(!empty($portfolio_detail_3_element_title)){ ?>
				<div class="col-lg-8 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
					<h2 class="title m-b0">
						<?php echo wp_kses($portfolio_detail_3_element_title,'string'); ?>
					</h2>
				</div>
			<?php } ?>
			
			<?php 
				if(!empty($portfolio_detail_3_element_item)){
				$item_arr = $portfolio_detail_3_element_item;
				
			?>
				<div class="col-lg-4 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
					<ul class="info-list">
						<?php foreach($item_arr as $itemKey => $itemValue) { ?>
							<li>
								<?php if(!empty($itemValue['portfolio_detail_3_element_item_title'])){ ?>
									<h2 class="text-primary">
										<?php echo wp_kses($itemValue['portfolio_detail_3_element_item_title'],'string'); ?>
									</h2>
								<?php } ?>
								
								<?php if(!empty($itemValue['portfolio_detail_3_element_item_description'])){ ?>
									<span>
										<?php echo wp_kses($itemValue['portfolio_detail_3_element_item_description'],'string'); ?>
									</span>
								<?php } ?>
							</li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>
		
		<?php 
			if(!empty($portfolio_detail_3_element_gallery_item)){
			$item_arr = $portfolio_detail_3_element_gallery_item;	 
		?>
			<div class="row m-b15">
				<?php 
					$animation_time = 200;
					foreach($item_arr as $itemKey => $itemValue) {
									
						if (!empty($itemValue['portfolio_detail_3_element_gallery_image']['url'])){
						$image_url = $itemValue['portfolio_detail_3_element_gallery_image']['url'];
						$animation_time += 200;
						$thumb_url = wp_get_attachment_image_url($itemValue['portfolio_detail_3_element_gallery_image']['id'],'thumbnail');
					
						$section_column = $itemValue['portfolio_detail_3_element_gallery_image_column'];
				?>
			
					<div class="<?php echo esc_attr($animation_time.' '. $section_column); ?>  m-b30 aos-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
						<span data-exthumbimage="<?php echo esc_url($thumb_url); ?>" data-src="<?php echo esc_url($image_url); ?>" class="lightimg" title="<?php the_title_attribute(); ?>">
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
						</span>
					</div>
				<?php } } ?>
			</div>
		<?php } ?>
		
		<div class="row m-b15">				
			<div class="col-lg-6">
				<?php if(!empty($portfolio_detail_3_element_description)){ ?>
					<?php echo wp_kses($portfolio_detail_3_element_description,mazo_allowed_html_tag()); ?>
				<?php } ?>
			</div>
			<div class="col-lg-6 m-b30">
				<?php 
					if(!empty($portfolio_detail_3_element_contact)){
					$item_arr = $portfolio_detail_3_element_contact;
					foreach($item_arr as $itemKey => $itemValue) {
					
					$icon_name = $itemValue['portfolio_detail_3_element_contact_icon_list']['value'];
					
				?>
					<div class="icon-bx-wraper style-7 left m-b30">
						<?php if(!empty($icon_name)){ ?>
							<div class="icon-bx-sm rounded-0 bg-primary">
								<span class="icon-cell"><i class="<?php echo esc_attr($icon_name); ?>"></i></span> 
							</div>
						<?php } ?>
						
						<div class="icon-content">
							<?php if(!empty($itemValue['portfolio_detail_3_element_contact_title'])){ ?>
								<h4 class="title m-b10">
									<?php echo wp_kses($itemValue['portfolio_detail_3_element_contact_title'],'string'); ?>
								</h4>
							<?php } ?>
							
							<?php if(!empty($itemValue['portfolio_detail_3_element_contact_description'])){ ?>
								<p>
									<?php echo wp_kses($itemValue['portfolio_detail_3_element_contact_description'],'string'); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
		
		<div class="row m-b15">
			<?php 
			$count=1;
			foreach ($portfolio_detail_3_element_images2 as $image ) { 
				$animate_arr = array(
					1=>'300',
					2=>'600',
				);
			?>
				<div class="col-sm-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animate_arr[$count]); ?>">
					<span data-exthumbimage="<?php echo esc_url($image['url']); ?>" data-src="<?php echo esc_url($image['url']); ?>" class="lightimg" >
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
					</span>
				</div>
			<?php $count++; } ?>
		</div>
		
		<?php if(!empty($portfolio_detail_3_element_bottom_description)){ ?>
			<div class="row">
				<div class="col-lg-12">
					<?php echo wp_kses($portfolio_detail_3_element_bottom_description,mazo_allowed_html_tag()); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</section>