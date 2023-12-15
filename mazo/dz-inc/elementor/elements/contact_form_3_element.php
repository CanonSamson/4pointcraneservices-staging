<section class="content-inner" id="DZContactFormElement3">
	<div class="container">
		<div class="row">
			<?php if(!empty($contact_form_3_element_item)) { ?>
				<div class="col-lg-5 m-b30">
					<?php if(!empty($contact_form_3_element_title)){ ?>
						<div class="section-head style-1">
							<?php if(!empty($contact_form_3_element_subtitle)){ ?>
								<h6 class="sub-title text-primary">
									<?php echo wp_kses($contact_form_3_element_subtitle,'string'); ?>
								</h6>
							<?php } ?>
							
							<h2 class="title">
								<?php echo wp_kses($contact_form_3_element_title,'string'); ?>
							</h2>
							
							<?php if(!empty($contact_form_3_element_description)){ ?>
								<p>
									<?php echo wp_kses($contact_form_3_element_description,'string'); ?>
								</p>
							<?php } ?>
						</div>
					<?php } ?>
					
					<?php
					if(!empty($contact_form_3_element_item))
					{ 
							foreach($contact_form_3_element_item as $item) { 					
							$icon_name = $item['contact_form_3_element_item_icon']['value']; 
						?>
						<div class="icon-bx-wraper left m-b40 style-7">
							<?php if(!empty($icon_name)){ ?>
								<div class="icon-bx-sm"> 
									<span class="icon-cell text-primary">
										<i class="<?php echo esc_attr($icon_name); ?>"></i>
									</span> 
								</div>
							<?php } ?>
							<div class="icon-content">
								<?php if(!empty($item['contact_form_3_element_item_title'])) { ?>
									<h4 class="dz-title">
										<?php echo wp_kses($item['contact_form_3_element_item_title'],'string'); ?>
									</h4>
								<?php } ?>
								
								<?php if(!empty($item['contact_form_3_element_item_description'])) { ?>
									<p>
										<?php echo wp_kses($item['contact_form_3_element_item_description'],'string'); ?>
									</p>
								<?php } ?>
							</div>
						</div>
					<?php }
					} ?>
				</div>
			<?php } ?>
			
			<?php if(!empty($contact_form_3_element_contact_form)){ ?>
				<div class="col-lg-7 m-b30">
					<div class="contact-area aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
						<?php 
							$post = get_page_by_path($contact_form_3_element_contact_form,OBJECT,'wpcf7_contact_form');
							if(!empty($post->ID)){
								echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
							}
						?>					
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- Contact Form -->
<?php if(!empty($contact_form_3_element_map_iframe)){ ?>
	<div class="map-iframe style-1">
		<?php echo mazo_shortcode($contact_form_3_element_map_iframe);?>
	</div>
<?php } ?>