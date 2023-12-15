<!-- Contact Form -->
<section class="content-inner-2" id="DZContactFormElement6">
	<div class="container">
		<div class="row align-items-center">
			<?php if(!empty($contact_form_6_element_title)){ ?>
				<div class="section-head style-1 text-center">
					<h2 class="title">
						<?php echo wp_kses($contact_form_6_element_title,'string'); ?>
					</h2>
					
					<div class="dz-separator style-1 text-primary"></div>
					
					<?php if(!empty($contact_form_6_element_description)){ ?>
						<p>
							<?php echo wp_kses($contact_form_6_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<?php if(!empty($contact_form_6_element_contact_form)){ ?>
				<div class="col-xl-6 col-lg-6 m-md-b50">
					<?php 
						$post = get_page_by_path($contact_form_6_element_contact_form,OBJECT,'wpcf7_contact_form');
						if(!empty($post->ID)){
							echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
						}
					?>
				</div>
			<?php } ?>
			
			<div class="col-xl-6 col-lg-6">
				<div class="row">
					
					<?php $icon_name = '';
						if(!empty($contact_form_6_element_item)) { 
							foreach($contact_form_6_element_item as $item) { 
							
							$icon_name = $item['contact_form_6_element_item_icon_list']['value'];
					?>
						<div class="col-lg-12 m-b30">
							<div class="icon-bx-wraper style-16 bg-white">
								<?php if(!empty($icon_name)) { ?>
									<div class="icon-md m-r20">
										<span class="icon-cell text-primary">
											<i class="<?php echo esc_attr($icon_name); ?>"></i>
										</span> 
									</div>
								<?php } ?>
								
								<div class="icon-content">
									<?php if(!empty($item['contact_form_6_element_item_title'])) { ?>
										<h4 class="tilte m-b10">
											<?php echo wp_kses($item['contact_form_6_element_item_title'],'string'); ?>
										</h4>
									<?php } ?>
										
									<?php if(!empty($item['contact_form_6_element_item_description'])) { ?>
										<p class="m-b0">
											<?php echo wp_kses($item['contact_form_6_element_item_description'],mazo_allowed_html_tag()); ?>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php 
						
						} 
					} 
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if(!empty($contact_form_6_element_map_iframe)){ ?>
	<div class="map-iframe style-1 content-inner-1">
		<?php echo mazo_shortcode($contact_form_6_element_map_iframe);?>
	</div>
<?php } ?>

	