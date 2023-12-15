<?php 
$btn_link = $btn_text = $anchor_attribute = '';
if (!empty($home_slider_4_element_link_title))
{
	$btn_link = !empty($home_slider_4_element_link)?$home_slider_4_element_link:'';
	$btn_text = !empty($home_slider_4_element_link_title)?$home_slider_4_element_link_title:'';	
	
	$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
}
	$bg_placeholder = '';
	$bg_placeholder = !empty($home_slider_4_element_bg_placeholder)?$home_slider_4_element_bg_placeholder:'';
?>

<div class="banner-one" <?php if (!empty($home_slider_4_element_bg_img['url']))
{ ?> style="background-image:url(<?php echo esc_url($home_slider_4_element_bg_img['url']); ?>);" <?php } ?>  data-text="<?php echo esc_attr($bg_placeholder); ?>" id="DZHomeSliderElement4">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="banner-content">
					<?php if(!empty($home_slider_4_element_title)){ ?>
						<h1 class="bnr-title">
							<?php echo wp_kses($home_slider_4_element_title,'string'); ?>
						</h1>
					<?php } ?>
					
					<div class="mt-3 d-lg-flex">
						<?php if(!empty($btn_text)) { ?>
							<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?>  class="btn btn-primary me-4"><?php echo esc_html($btn_text); ?>
							</a>
						<?php } ?>
						
						<?php if(!empty($home_slider_4_element_video_title)) { ?>
							<a href="<?php echo esc_url($home_slider_4_element_video_link); ?>" class="video-btn popup-youtube"><i class="fa fa-play"></i> <?php echo esc_html($home_slider_4_element_video_title); ?>
							</a>
						<?php } ?>
						
					</div>		
				</div>
			</div>
			<?php if (!empty($home_slider_4_element_image['url'])){
					$image_url = $home_slider_4_element_image['url'];
			?>
				<div class="col-lg-4">
					<div class="mining-worker">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>