<!-- About Us -->
<?php 
	if(!empty($content_box_14_element_btn_title)){
	    $btn_link = !empty($content_box_14_element_btn_link)?$content_box_14_element_btn_link:'';
		$btn_text = !empty($content_box_14_element_btn_title)?$content_box_14_element_btn_title:'';	

		$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
	}
?>
<div class="section-full content-inner-2 bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
	<div class="container">
		<div class="row about-bx10 align-items-center">
			<div class="col-lg-6 col-md-12 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
				<div class="section-head style-6">
					<?php if(!empty($content_box_14_element_subtitle)){ ?>
						 <h5 class="sub-title"><?php echo esc_html($content_box_14_element_subtitle) ?> </h5>
					<?php } 
						if(!empty($content_box_14_element_title)){?>
						 <h2 class="title"><?php echo esc_html($content_box_14_element_title) ?></h2>
					<?php } 
						if(!empty($content_box_14_element_description)){ ?>	
						 <p><?php echo esc_html($content_box_14_element_description) ?></p>
					<?php } ?>
				</div>

				<div class="about-contact-box">
					<div class="about-inner-content">
						<?php if(!empty($content_box_14_element_feature_list)){
							$list = explode(',',$content_box_14_element_feature_list);
							?>
						<ul class="m-b40">
							<?php foreach($list as $featureList){ ?>
								<li><?php echo esc_html($featureList) ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
						
						<?php if(!empty($btn_text)){ ?>
							<a href="<?php echo esc_url($btn_link['url']) ?>" <?php echo esc_attr($anchor_attribute) ?> class="btn btn-primary"><?php echo esc_html($btn_text) ?></a>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<?php if(!empty($content_box_14_element_image['url'])){ ?>
			<div class="col-lg-6 col-md-12 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
				<div class="about-img-box">
					
					<img src="<?php echo esc_url(MAZO_URL.'/assets/images/about/pattern.png'); ?>" alt="<?php echo esc_attr__('Image','mazo') ?>" class="back-img  move-2 ">
					
					<div class="about-img-one wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.2s">
						<img src="<?php echo esc_url($content_box_14_element_image['url']) ?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
					</div>
					<?php if(!empty($content_box_14_element_year) || !empty($content_box_14_element_year_text)){ 
					
					$bottom = $content_box_14_element_position_bottom; 
					$left = $content_box_14_element_position_left; 
					?>
					 <div class="about-text move-2" style=" bottom:<?php echo esc_attr($bottom.'%') ?>; left:<?php echo esc_attr($left.'px') ?>;">
						<h3><?php echo esc_html($content_box_14_element_year) ?></h3>
						<p><?php echo esc_html($content_box_14_element_year_text) ?></p>
					</div>
				
					<?php } ?>
				</div>
				
			</div>
			<?php } ?>
		</div>
	</div>
</div>