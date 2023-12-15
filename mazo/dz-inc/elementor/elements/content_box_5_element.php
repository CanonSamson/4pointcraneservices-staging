<?php 
    $background_class = '';
    $background_class .= !empty($content_box_5_element_section_background)?' '.$content_box_5_element_section_background:'bg-light';   
 ?>
<!-- How It Work -->
<section class="content-inner hiw-area-2 <?php echo esc_attr($background_class); ?>" id="DZContentBoxElement5">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 align-self-center aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
				<div class="inner-content">
					<div class="section-head style-2">
						<?php if(!empty($content_box_5_element_subtitle)){ ?>
							<h6 class="sub-title">
								<?php echo wp_kses($content_box_5_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<?php if(!empty($content_box_5_element_title)){ ?>
							<h2 class="title">
								<?php echo wp_kses($content_box_5_element_title,'string'); ?>
							</h2>
						<?php } ?>
						
						<?php if(!empty($content_box_5_element_description)){ ?> 
							<p>	<?php echo wp_kses($content_box_5_element_description,'string'); ?> </p>
						<?php }	?>
					</div>
					
					<?php  
						if(!empty($content_box_5_element_item)){
						$item_arr = $content_box_5_element_item;
						$count = 1;
						foreach($item_arr as $itemKey => $itemValue) { 
						$icon_name = $itemValue['content_box_5_element_item_icon']['value'];
						
						$class = ($count==1)?'active':'';
					?>
						<div class="icon-bx-wraper left m-b30 style-9 box-hover <?php echo esc_attr($class); ?>">
							<?php if(!empty($icon_name)){ ?>
								<div class="icon-bx-sm icon-bx text-primary radius"> 
									<span class="icon-cell">
										<i class="<?php echo esc_attr($icon_name); ?>"></i>
									</span> 
									<div class="list-num">
										<?php echo sprintf("%02d", $count);?>
									</div>
								</div>
							<?php } ?>
							<div class="icon-content">
								<?php if(!empty($itemValue['content_box_5_element_item_title'])){  ?>
									<h4 class="dz-title">
										<?php echo esc_html($itemValue['content_box_5_element_item_title'],'string'); ?>
									</h4>
								<?php }  ?>
								
								<?php if(!empty($itemValue['content_box_5_element_item_description'])){  ?>
									<p>
										<?php echo wp_kses($itemValue['content_box_5_element_item_description'],'string'); ?>
									</p>
								<?php } ?>
							</div>
						</div>
					<?php ++$count; } } ?>
				</div>
			</div>
			<?php if (!empty($content_box_5_element_image['url']) || !empty($content_box_5_element_video_image['url']))
				{
					$image_url = $content_box_5_element_image['url'];
					$video_image_url = $content_box_5_element_video_image['url'];
			?>
				<div class="col-lg-6 m-b30 aos-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800">
					<div class="about-media style-3">
						<?php if(!empty($content_box_5_element_video_link)){ ?>
							<div class="video-bx style-1">
								<img src="<?php echo esc_url($video_image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
								<div class="video-btn">
									<a href="<?php echo esc_url($content_box_5_element_video_link); ?>" class="popup-youtube"><i class="flaticon-play"></i></a>
								</div>
							</div>
						<?php } ?>
						<img src="<?php echo esc_url($image_url); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>	
</section>