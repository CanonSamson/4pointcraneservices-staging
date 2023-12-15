<?php 
	$btn_link = $btn_text = $anchor_attribute = '';
	$btn_link2 = $btn_text2 = $anchor_attribute2 = '';
	if (!empty($home_slider_6_element_link_title))
	{
		$btn_link = !empty($home_slider_6_element_link)?$home_slider_6_element_link:'';
		$btn_text = !empty($home_slider_6_element_link_title)?$home_slider_6_element_link_title:'';	
		
		$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
	}
	
	if (!empty($home_slider_6_element_link_title2))
	{
		$btn_link2 = !empty($home_slider_6_element_link2)?$home_slider_6_element_link2:'';
		$btn_text2 = !empty($home_slider_6_element_link_title2)?$home_slider_6_element_link_title2:'';	
		
		$anchor_attribute2 = mazo_elementor_get_anchor_attribute($btn_link2);
	}

$allowed_html_tags = mazo_allowed_html_tag(); ?>
<!-- Banner -->
<div class="silder-six electrician-effect overlay-black-light" <?php if(!empty($home_slider_6_element_placeholder_text)){ ?> data-text="<?php echo esc_attr($home_slider_6_element_placeholder_text); ?>" <?php } ?> id="DZHomeSliderElement6">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-6 col-md-7">
				<div class="banner-content">
					<?php if(!empty($home_slider_6_element_title)){ ?>
						<h1 class="bnr-title">
							<?php echo wp_kses($home_slider_6_element_title,$allowed_html_tags); ?>
						</h1>
					<?php } ?>
					
					<?php if(!empty($home_slider_6_element_description)){ ?>
						<p>
							<?php echo wp_kses($home_slider_6_element_description,$allowed_html_tags); ?>
						</p>
					<?php } ?>

					<?php if(!empty($btn_text) || !empty($btn_text2)) { ?>
						<div>
							<?php if(!empty($btn_text)) { ?>
								<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?>  class="btn btn-primary m-r15 btn-sm"><?php echo esc_html($btn_text); ?>
								</a>
							<?php } ?>
							
							<?php if(!empty($btn_text2)) { ?>
								<a href="<?php echo esc_url($btn_link2['url']); ?>" <?php echo esc_html($anchor_attribute2); ?>  class="btn btn-outline-light m-r15 btn-sm"><?php echo esc_html($btn_text2); ?>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
			
			<?php if (!empty($home_slider_6_element_image['url'])){
				$image_url = $home_slider_6_element_image['url'];
			?>
				<div class="col-xl-6 col-md-5">
					<div class="electrician-worker">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Electrician Worker', 'mazo'); ?>">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


<?php
	/* wp_enqueue_script( 'vendors', get_template_directory_uri().'/assets/js/vendors-min.js', array( 'jquery' ), '2.0.2', false );
	wp_enqueue_script( 'demo', get_template_directory_uri().'/assets/js/demo-min.js', array( 'jquery' ), '1.0', false ); */
 ?>