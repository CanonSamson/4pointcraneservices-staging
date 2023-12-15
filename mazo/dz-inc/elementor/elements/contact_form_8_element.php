<!-- Contact us -->
	<div class="section-full content-inner-1 bg-white" id="DZContactFormElement8" <?php if(!empty($contact_form_8_element_bg_img['url'])){ ?> style="background-image:url('<?php echo esc_url($contact_form_8_element_bg_img['url']); ?>');" <?php } ?>>
		<div class="container">
			<?php if(!empty($contact_form_8_element_title)){ ?>
				<div class="section-head style-5 text-center">
					<h2 class="title">
						<?php echo wp_kses($contact_form_8_element_title,'string'); ?>
					</h2>
					<?php if(!empty($contact_form_8_element_description)){ ?>
						<p>
							<?php echo wp_kses($contact_form_8_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<?php if(!empty($contact_form_8_element_contact_form)){ ?>
				<div class="dz-form style-4">
					<?php 
						$post = get_page_by_path($contact_form_8_element_contact_form,OBJECT,'wpcf7_contact_form');
						if(!empty($post->ID)){
							echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
						}
					?>					
				</div>
			<?php } ?>
		</div>
	</div>
<!-- Contact Us End -->