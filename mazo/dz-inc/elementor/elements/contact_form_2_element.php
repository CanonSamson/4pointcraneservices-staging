<?php 
	$section_class = '';
	$section_class .= !empty($contact_form_2_element_section_background)?' '.$contact_form_2_element_section_background:'bg-white';
?>
<!-- Skills and Contact -->
<section class="content-inner <?php echo esc_attr($section_class); ?>" id="DZContactFormElement2">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="section-head style-2">
					<?php if(!empty($contact_form_2_element_skill_subtitle)){ ?>
						<h6 class="sub-title">
							<?php echo esc_html($contact_form_2_element_skill_subtitle); ?>
						</h6>
					<?php } ?>
					
					<?php if(!empty($contact_form_2_element_skill_title)){ ?>
						<h2 class="title">
							<?php echo esc_html($contact_form_2_element_skill_title); ?>
						</h2>
					<?php } ?>
				</div>
				<?php  
					if(!empty($contact_form_2_element_item)){
					$item_arr = $contact_form_2_element_item;
					foreach($item_arr as $itemKey => $itemValue) { 
				?>
					<div class="progress-bx style-1 m-b50 m-sm-b30">
						<div class="progress-info">
							<?php if(!empty($itemValue['contact_form_2_element_item_title'])){  ?>
								<h4 class="title">
									<?php echo esc_html($itemValue['contact_form_2_element_item_title']); ?>
								</h4>
							<?php }  ?>
							
							<?php if(!empty($itemValue['contact_form_2_element_item_number']['size'])){  ?>
								<h4 class="progress-value">
									<?php echo esc_html($itemValue['contact_form_2_element_item_number']['size']); ?>%
								</h4>
							<?php } ?>
						</div>
						<div class="progress">
							<div class="progress-bar" style="width: <?php echo esc_attr($itemValue['contact_form_2_element_item_number']['size']); ?>%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				<?php } } ?>
			</div>
			<div class="col-lg-6 m-b30">
				<div class="dz-form style-1 bg-secondary">
					<div class="section-head style-2 text-white">
						<?php if(!empty($contact_form_2_element_subtitle)){ ?>
							<h6 class="text-primary sub-title">
								<?php echo esc_html($contact_form_2_element_subtitle); ?>
							</h6>
						<?php } ?>
						
						<?php if(!empty($contact_form_2_element_title)){ ?>
							<h2 class="title">
								<?php echo esc_html($contact_form_2_element_title); ?>
							</h2>
						<?php } ?>
					</div>
					
					<?php 
						if(!empty($contact_form_2_element_contact_form))
							{ 
								$post = get_page_by_path($contact_form_2_element_contact_form,OBJECT,'wpcf7_contact_form');
								if(!empty($post->ID)){
									echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
								}
							} 
					?>
				</div>
			</div>
		</div>
	</div>
</section>