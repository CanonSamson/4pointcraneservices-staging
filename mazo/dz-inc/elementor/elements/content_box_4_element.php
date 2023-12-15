<?php if (!empty($content_box_4_element_image['url']) && $content_box_4_element_img_position=='left' || $content_box_4_element_img_position=='right'){
	$class = 'col-lg-6 col-md-7';
}else{
	$class = 'col-lg-12 col-md-12';
}
$btn_link = $btn_text = $anchor_attribute = '';
if (!empty($content_box_4_element_link_title))
{
	$btn_link = !empty($content_box_4_element_link)?$content_box_4_element_link:'';
	$btn_text = !empty($content_box_4_element_link_title)?$content_box_4_element_link_title:'';	
	
	$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
}	
$allowed_html_tag = mazo_allowed_html_tag();				
?>
<!-- About US -->
<section class="content-inner">
	<div class="container">
		<div class="row align-items-center">
			<?php if (!empty($content_box_4_element_image['url']) && $content_box_4_element_img_position=='left')
				{
					$image_url = $content_box_4_element_image['url'];
			?>
				<div class="col-lg-6 col-md-5 m-md-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<div class="about-media style-2">
						<img src="<?php echo esc_url($image_url); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
			<div class="<?php echo esc_attr($class); ?> m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
				<div class="section-head style-2">
					<?php if(!empty($content_box_4_element_subtitle)){ ?>
						<h5 class="sub-title">
							<?php echo wp_kses($content_box_4_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					
					<?php if(!empty($content_box_4_element_title)){ ?>
						<h2 class="title">
							<?php echo wp_kses($content_box_4_element_title,'string'); ?>
						</h2>
					<?php } ?>
				</div>
				
				<?php if(!empty($content_box_4_element_description)){ ?>
					<p>
						<?php echo wp_kses($content_box_4_element_description,$allowed_html_tag); ?>
					</p>
				<?php }	?>
				
				<?php if(!empty($content_box_4_element_description2)){ 
					$desc = explode(',',$content_box_4_element_description2);
				?>
					<ul class="list-settings font-weight-500 text-secondary primary m-b30">
						<?php foreach($desc as $list){ ?>
							<li>
								<?php echo esc_html($list); ?>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
				
				<?php if(!empty($btn_text)) { ?>
					<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?>  class="btn btn-secondary"><?php echo esc_html($btn_text); ?>
					</a>
				<?php } ?>
			</div>
			<?php if (!empty($content_box_4_element_image['url']) && $content_box_4_element_img_position=='right')
				{
					$image_url = $content_box_4_element_image['url'];
			?>
				<div class="col-lg-6 col-md-5 m-md-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<div class="about-media style-2 right">
						<img src="<?php echo esc_url($image_url); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>