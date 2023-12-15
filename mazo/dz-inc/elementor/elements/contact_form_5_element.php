<section class="content-inner" id="DZContactFormElement5">
	<div class="container">
		<div class="row">
			<?php 
				if(!empty($contact_form_5_element_item)) { 
					$count = 1;
					foreach($contact_form_5_element_item as $item) { 					
					$icon_name = $item['contact_form_5_element_item_icon']['value'];
			?>
				<div class="col-lg-4 col-md-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<div class="icon-bx-wraper style-16 bg-white" data-name="<?php echo sprintf("%02d", $count);?>">
						<?php if(!empty($icon_name)) { ?>
							<div class="icon-md m-r20">
								<span class="icon-cell text-primary">
									<i class="<?php echo esc_attr($icon_name); ?>"></i>
								</span> 
							</div>
						<?php } ?>
						
						<div class="icon-content">
						
							<?php if(!empty($item['contact_form_5_element_item_title'])) { ?>
								<h4 class="tilte m-b10">
									<?php echo wp_kses($item['contact_form_5_element_item_title'],'string'); ?>
								</h4>
							<?php } ?>
							
							<?php if(!empty($item['contact_form_5_element_item_description'])) { ?>
								<p class="m-b0">
									<?php echo wp_kses($item['contact_form_5_element_item_description'],mazo_allowed_html_tag()); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php  $count++; } } ?>
		</div>
	</div>
</section>


<!-- Contact Form -->
<section class="content-inner-1 pt-0">
	<?php if(!empty($contact_form_5_element_map_iframe)){ ?>
		<div class="map-iframe">
			<?php echo mazo_shortcode($contact_form_5_element_map_iframe);?>
		</div>
	<?php } ?>
	
	<div class="container">
		<div class="contact-area1 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
			<?php if(!empty($contact_form_5_element_title)){ ?>
				<div class="section-head style-1 text-center">
				
					<?php if(!empty($contact_form_5_element_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo wp_kses($contact_form_5_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($contact_form_5_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($contact_form_5_element_description)){ ?>
						<p>
							<?php echo wp_kses($contact_form_5_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<?php if(!empty($contact_form_5_element_contact_form)){ ?>
				<div class="dz-form dzForm">
					<?php 
						$post = get_page_by_path($contact_form_5_element_contact_form,OBJECT,'wpcf7_contact_form');
						if(!empty($post->ID)){
							echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
						}
					?>					
				</div>
			<?php } ?>
		</div>
	</div>
</section>