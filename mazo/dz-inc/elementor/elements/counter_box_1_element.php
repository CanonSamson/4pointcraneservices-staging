<?php 
     $bg_class = ($counter_box_1_element_style=='style_1')?'bg-light':'';
	if(!empty($counter_box_1_element_item)){
	$item_arr = $counter_box_1_element_item;
	$allowed_html_tag = mazo_allowed_html_tag();
?>
	<!-- Counter -->
	<section class="counter-area-2 <?php echo esc_attr($bg_class); ?>">
		<div class="container">
			<?php if(!empty($counter_box_1_element_title)){ ?>
				<div class="section-head style-2 text-center">
					<?php if(!empty($counter_box_1_element_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo wp_kses($counter_box_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($counter_box_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($counter_box_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($counter_box_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<?php if($counter_box_1_element_style=='style_1'){ ?>
				<div class="counter-inner bg-secondary spno row" <?php if(!empty($counter_box_1_element_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($counter_box_1_element_bg_img['url']); ?>); background-size: 100%;" <?php } ?>>
					<?php $animation_time = 200;
						foreach($item_arr as $itemKey => $itemValue) { 
						$icon_name = $itemValue['counter_box_1_element_item_icon']['value'];
						$animation_time += 200;
					?>
						<div class="col-xl-3 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
							<div class="icon-bx-wraper left style-4">
								<?php if(!empty($icon_name)){ ?>
									<div class="icon-lg"> 
										<span class="icon-cell text-primary">
											<i class="<?php echo esc_attr($icon_name); ?>"></i>
										</span> 
									</div>
								<?php } ?>
								<div class="icon-content">
									<?php if(!empty($itemValue['counter_box_1_element_item_number'])){  ?>
										<h2 class="dz-title counter">
											<?php echo esc_html($itemValue['counter_box_1_element_item_number']); ?>
										</h2>
									<?php }  ?>
									
									<?php if(!empty($itemValue['counter_box_1_element_item_title'])){  ?>
										<p>
											<?php echo wp_kses($itemValue['counter_box_1_element_item_title'],'string'); ?>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } else { ?>
			<div class="counter-area1 half-bg">
				<div class="container">
					<div class="counter-inner bg-primary" <?php if(!empty($counter_box_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo MAZO_URL ?>assets/images/pattern/pattern1.png), url(<?php echo esc_url($counter_box_1_element_bg_img['url']); ?>);" <?php } ?>>
						<div class="row">
							<?php $animation_time = 200;
								foreach($item_arr as $itemKey => $itemValue) { 
								$icon_name = $itemValue['counter_box_1_element_item_icon']['value'];
								$animation_time += 200;
							?>
							<div class="col-lg-3 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
								<div class="icon-bx-wraper style-12 m-b30" <?php if(!empty($itemValue['counter_box_1_element_item_number'])){  ?> data-name="<?php echo wp_kses($itemValue['counter_box_1_element_item_number'],'string'); ?>" <?php }  ?>>
									<?php if(!empty($itemValue['counter_box_1_element_item_number'])){  ?>
										<h2 class="counter">
											<?php echo wp_kses($itemValue['counter_box_1_element_item_number'],'string'); ?>
										</h2>
									<?php } ?>
									
									<?php if(!empty($itemValue['counter_box_1_element_item_title'])){  ?>
										<h6 class="title">
											<?php echo wp_kses($itemValue['counter_box_1_element_item_title'],$allowed_html_tag); ?>
										</h6>
									<?php }  ?>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>