<!-- How It Work -->
<?php  if($content_box_3_element_style == 'style 1'){
 ?>
<section class="content-inner bg-light hiw-area-1" id="DZContentBoxElement3">
	<div class="container">
		<div class="row">
			<?php if (!empty($content_box_3_element_image['url']))
				{
					$image_url = $content_box_3_element_image['url'];
			?>
				<div class="col-lg-6 m-b30 aos-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800">
					<div class="dz-media move-1">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
			<div class="col-lg-6 m-b30 align-self-center aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
				<div class="inner-content">
					<div class="section-head style-1">
						<?php if(!empty($content_box_3_element_subtitle)){ ?>
							<h6 class="text-primary sub-title">
								<?php echo wp_kses($content_box_3_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<?php if(!empty($content_box_3_element_title)){ ?>
							<h2 class="title">
								<?php echo wp_kses($content_box_3_element_title,'string'); ?>
							</h2>
						<?php } ?>
					</div>
					
					<?php 
						if(!empty($content_box_3_element_item)){
						$item_arr = $content_box_3_element_item;
						foreach($item_arr as $itemKey => $itemValue) {
						$icon_name = $itemValue['content_box_3_element_item_icon']['value'];
					?>
						<div class="icon-bx-wraper left m-b20 style-3">
							<div class="icon-lg"> 
								<span class="icon-cell text-primary">
									<i class="<?php echo esc_attr($icon_name); ?>"></i>
								</span> 
							</div>
							<div class="icon-content">
								<?php if(!empty($itemValue['content_box_3_element_item_title'])){  ?>
									<h4 class="dz-title">
										<?php echo wp_kses($itemValue['content_box_3_element_item_title'],'string'); ?>
									</h4>
								<?php } ?>
								<?php if(!empty($itemValue['content_box_3_element_item_description'])){  ?>
									<p>
										<?php echo wp_kses($itemValue['content_box_3_element_item_description'],'string'); ?>
									</p>
								<?php } ?>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>	
</section>


<?php } if($content_box_3_element_style == 'style 2'){
	$btn_link = $btn_text = $anchor_attribute = '';
		if (!empty($content_box_3_element_btn_title))
		{
			$btn_text = !empty($content_box_3_element_btn_title)?$content_box_3_element_btn_title:'';
			$btn_link = !empty($content_box_3_element_btn_link)? $content_box_3_element_btn_link:'';	
			$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);

		}
 ?>
<!-- Working Progress -->
<div class="section-full content-inner overlay-black-dark" id="dzProjects" style="background-image: url('<?php echo esc_url($content_box_3_element_bg_image['url'])?>'); background-size: cover; background-position: center;">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 m-b50 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
				<div class="section-head style-6">	
					<?php if(!empty($content_box_3_element_subtitle)){?>
							<h6 class="sub-title">
								<?php echo esc_html($content_box_3_element_subtitle); ?>
							</h6>
						<?php } ?>
						
						<?php if(!empty($content_box_3_element_title)){ ?>
							<h2 class="title text-white">
								<?php echo esc_html($content_box_3_element_title) ?>
							</h2>
						<?php } if(!empty($content_box_3_element_description)){?>
						<p class="text-white"> <?php echo esc_html($content_box_3_element_description); ?></p>
						<?php } ?>
				</div>
				<a href="<?php echo esc_url($btn_link['url']) ?>" class="btn btn-primary" <?php echo esc_attr($anchor_attribute) ?>><?php echo esc_html($btn_text) ?></a>
			</div>
				<?php if(!empty($content_box_3_element_item)){ ?>
			<div class="col-lg-6">
					<?php 
						$item_arr = $content_box_3_element_item;
						$count = 1;	
						foreach($item_arr as $itemValue) {
						$icon_name = $itemValue['content_box_3_element_item_icon']['value']; ?>
					<div class="icon-bx-wraper left style-21 m-b40 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
						<div class="icon-lg">
							<span class="icon-cell text-primary">
								<i class="<?php echo esc_attr($icon_name); ?>"></i>
							</span>
						</div>						
						<h2 class="data-text"><?php echo esc_html($count) ?></h2>
						
						<div class="icon-content">
							<?php if(!empty($itemValue['content_box_3_element_item_title'])){  ?>
									<h4 class="dz-title">
										<?php echo wp_kses($itemValue['content_box_3_element_item_title'],'string'); ?>
									</h4>
							<?php } ?>
							<?php if(!empty($itemValue['content_box_3_element_item_description'])){  ?>
								<p>
								  <?php echo wp_kses($itemValue['content_box_3_element_item_description'],'string'); ?>
								</p>
							<?php } ?>
						</div>
					</div>
					<?php $count++;
					} ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>
