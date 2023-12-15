<?php $allowed_html_tag = mazo_allowed_html_tag();
if($contact_form_4_element_style == 'style_1'){
 ?>
<section class="content-inner" id="DZContactFormElement4">
	<div class="container">
		<div class="row align-items-center m-b50">
			<div class="col-lg-6">
				<div class="section-head style-2">
					<?php if(!empty($contact_form_4_element_contact_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo esc_html($contact_form_4_element_contact_subtitle); ?>
						</h6>
					<?php } ?>
					
					<?php if(!empty($contact_form_4_element_contact_title)){ ?>
						<h2 class="title">
							<?php echo wp_kses($contact_form_4_element_contact_title,$allowed_html_tag); ?>
						</h2>
					<?php } ?>
				</div>
				
				<?php  
					if(!empty($contact_form_4_element_item)){
					$item_arr = $contact_form_4_element_item;
					$count = 1;
					foreach($item_arr as $itemKey => $itemValue) { 
					$icon_name = $itemValue['contact_form_4_element_item_icon']['value'];
					$active_class = ($count==2)?'active':'';
				?>
					<div class="icon-bx-wraper m-b30 style-10 box-hover <?php echo esc_attr($active_class); ?>">
						<?php if(!empty($icon_name)){ ?>
							<div class="icon-bx-sm icon-bx"> 
								<span class="icon-cell text-primary">
									<i class="<?php echo esc_attr($icon_name); ?>"></i>
								</span> 
							</div>
						<?php } ?>
						<div class="icon-content">
							<?php if(!empty($itemValue['contact_form_4_element_item_title'])){  ?>
								<h4 class="dz-title">
									<?php echo esc_html($itemValue['contact_form_4_element_item_title']); ?>
								</h4>
							<?php }  ?>
							
							<?php if(!empty($itemValue['contact_form_4_element_item_description'])){  ?>
								<p>
									<?php echo esc_html($itemValue['contact_form_4_element_item_description']); ?>
								</p>
							<?php }  ?>
						</div>
					</div>
				<?php ++$count; } } ?>
			</div>
			<div class="col-lg-6 m-b30">
				<div class="dz-form style-1 bg-secondary">
					<div class="section-head style-2 text-white">
						<?php if(!empty($contact_form_4_element_subtitle)){ ?>
							<h6 class="text-primary sub-title">
								<?php echo esc_html($contact_form_4_element_subtitle); ?>
							</h6>
						<?php } ?>
						
						<?php if(!empty($contact_form_4_element_title)){ ?>
							<h2 class="title">
								<?php echo esc_html($contact_form_4_element_title); ?>
							</h2>
						<?php } ?>
					</div>
					<?php 
					if(!empty($contact_form_4_element_contact_form))
						{ 
							$post = get_page_by_path($contact_form_4_element_contact_form,OBJECT,'wpcf7_contact_form');
							if(!empty($post->ID)){
								echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
							}
						} 
					?>
				</div>
			</div>
		</div>
		
		<?php if(!empty($contact_form_4_element_map_iframe)){ ?>
			<div class="map-iframe m-b30 style-1">
				<?php echo mazo_shortcode($contact_form_4_element_map_iframe);?>
			</div>
		<?php } ?>
	</div>
</section>

<?php }elseif($contact_form_4_element_style == 'style_2'){ 
?>
<!-- Contact US -->
<section class="section-full content-area-2 content-inner" >
	<div class="container">
		<div class="row m-b30">
			<div class="col-lg-5 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
				<?php  if(!empty($contact_form_4_element_subtitle) || !empty($contact_form_4_element_title)){ ?>
				<div class="section-head style-6">
					<?php if(!empty($contact_form_4_element_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo esc_html($contact_form_4_element_subtitle); ?>
						</h6>
					<?php } ?>
					
					<?php if(!empty($contact_form_4_element_title)){ ?>
						<h2 class="title">
							<?php echo wp_kses($contact_form_4_element_title,$allowed_html_tag); ?>
						</h2>
					<?php } 
					 if(!empty($contact_form_4_element_description)){ ?>
						<p>
							<?php echo esc_html($contact_form_4_element_description); ?>
						</p>
					<?php } ?>
				</div>
				<?php }
					if(!empty($contact_form_4_element_contact_form))
					 { 
						$post = get_page_by_path($contact_form_4_element_contact_form,OBJECT,'wpcf7_contact_form');
						if(!empty($post->ID)){
							echo do_shortcode('[contact-form-7 id="'.$post->ID.'"]');
						}
					 } 
				?>
			</div>
			<?php if(!empty($contact_form_4_element_map_iframe)){ ?>
			<div class="col-lg-7 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
				<div class="map-iframe">
					<?php echo mazo_shortcode($contact_form_4_element_map_iframe);?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
<?php if(!empty($contact_form_4_element_item)){	?>
	<div class="container">
		<div class="row">
			<?php 
			 foreach($contact_form_4_element_item as $item_list){
				if(!empty($item_list['contact_form_4_element_item_icon']['value'])){
			?>
			<div class="col-xl-4 col-md-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
				<div class="icon-bx-wraper left m-b30 style-19">
				<?php if(!empty($item_list['contact_form_4_element_item_icon']['value'])){ ?>
					<div class="icon-lg bg-primary">
						<span class="icon-cell text-white">
						<i class="<?php echo esc_attr($item_list['contact_form_4_element_item_icon']['value']) ?>"></i>
						</span>
					</div>
					<?php } ?>
					<?php if(empty($item_list['$contact_form_4_element_item_title'])){ ?>
						<div class="icon-content">
							<h4 class="dz-title"><?php echo esc_html($item_list['contact_form_4_element_item_title']); ?></h4>
							<p><?php echo esc_html($item_list['contact_form_4_element_item_description']); ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php }
			} ?>
			
		</div>
	</div>
	<?php } ?>
</section>
<?php } ?>
<!-- Contact Form -->
