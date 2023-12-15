<!-- Contact US -->
<section class="bg-light content-area" id="DZContactFormElement1">
	<div class="container">
		<div class="row">
			<?php if(!empty($contact_form_1_element_map_iframe)){ ?>
				<div class="col-lg-5">
					<div class="map-iframe">
						<?php echo mazo_shortcode($contact_form_1_element_map_iframe);?>
					</div>
				</div>
			<?php } ?>
		
			<div class="col-lg-7 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
				<div class="content-inner-1 contact-inner">
					<?php if(!empty($contact_form_1_element_title)){ ?>
						<div class="section-head style-1">
						
							<?php if(!empty($contact_form_1_element_subtitle)){ ?>
								<h6 class="sub-title text-primary">
									<?php echo wp_kses($contact_form_1_element_subtitle,'string'); ?>
								</h6>
							<?php } ?>
							
							<h2 class="title">
								<?php echo wp_kses($contact_form_1_element_title,'string'); ?>
							</h2>
							
							<?php if(!empty($contact_form_1_element_description)){ ?>
								<p>
									<?php echo wp_kses($contact_form_1_element_description,'string'); ?>
								</p>
							<?php } ?>
						</div>
					<?php } ?>
					
					<?php if(!empty($contact_form_1_element_contact_form)){ ?>
						<div class="dz-form bg-primary style-1">
							<?php 
								$post = get_page_by_path($contact_form_1_element_contact_form,OBJECT,'wpcf7_contact_form');
								if(!empty($post->ID)){
									echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
								}
							?>					
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>