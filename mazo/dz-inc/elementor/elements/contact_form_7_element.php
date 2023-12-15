<?php if(!empty($contact_form_7_element_item)) { ?>
	<div class="content-inner-2" id="DZContactFormElement7">
		<div class="container">
			<div class="row m-t30">
				<?php 
					$count = 1;
					$icon_name = '';
					$item_count = count($contact_form_7_element_item);
					foreach($contact_form_7_element_item as $item) { 					
					$icon_name = $item['contact_form_7_element_item_icon_list']['value'];
					
					 if($count == $item_count){
						$class = '';
					}else{
						$class = 'm-md-b60';
					} 
				?>
					<div class="col-lg-4 col-md-6 <?php echo esc_attr($class); ?>">
						<div class="icon-bx-wraper style-18">
							<?php if(!empty($icon_name)) { ?>
								<div class="icon-bx-sm radius bg-primary"> 
									<span class="icon-cell">
										<i class="<?php echo esc_attr($icon_name); ?>"></i>
									</span> 
								</div>
							<?php } ?>
							
							<div class="icon-content">
								<?php if(!empty($item['contact_form_7_element_item_title'])) { ?>
									<h4 class="dlab-title">
										<?php echo wp_kses($item['contact_form_7_element_item_title'],'string'); ?>
									</h4>
								<?php } ?>
									
								<?php if(!empty($item['contact_form_7_element_item_description'])) { ?>
									<p>
										<?php echo wp_kses($item['contact_form_7_element_item_description'],mazo_allowed_html_tag()); ?>
									</p>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php ++$count; } ?>
			</div>
		</div>
	</div>
<?php } ?>
<!-- Get A Quote -->
<div class="content-inner">
	<div class="container">
		<div class="row align-items-center">
			<?php if (!empty($contact_form_7_element_image['url']) && $contact_form_7_element_img_position=='left')
				{
					$image_url = $contact_form_7_element_image['url'];
			?>
				<div class="col-xl-6 col-lg-5 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
					<div class="dlab-media cf-r-img">	
						<img src="<?php echo esc_url($image_url); ?>" class="img-fluid" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
			
			<div class="col-xl-6 col-lg-7 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
					<?php if(!empty($contact_form_7_element_title)){ ?>
						<div class="section-head style-1">
						<?php if(!empty($contact_form_7_element_subtitle)){ ?>
							<h6 class="sub-title">
								<?php echo wp_kses($contact_form_7_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
							<h2 class="title">
								<?php echo wp_kses($contact_form_7_element_title,'string'); ?>
							</h2>
						</div>
					<?php } ?>
					
					<?php if(!empty($contact_form_7_element_contact_form)){ ?>
						<?php 
							$post = get_page_by_path($contact_form_7_element_contact_form,OBJECT,'wpcf7_contact_form');
							if(!empty($post->ID)){
								echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
							}
						?>
					<?php } ?>
			</div>
			
			<?php if (!empty($contact_form_7_element_image['url']) && $contact_form_7_element_img_position=='right')
				{
					$image_url = $contact_form_7_element_image['url'];
			?>
				<div class="col-xl-6 col-lg-5 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
					<div class="dlab-media cf-r-img">	
						<img src="<?php echo esc_url($image_url); ?>" class="img-fluid" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>