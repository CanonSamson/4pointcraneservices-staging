<?php 
$class = ($content_box_13_element_frame == 'yes') ? 'frame-out' : '';
$containerClass = ($content_box_13_element_frame == 'yes') ? 'container-fluid' : 'container';
if (!empty($content_box_13_element_link_title))
    {
        $btn_link = !empty($content_box_13_element_link)?$content_box_13_element_link:'';
        $btn_text = !empty($content_box_13_element_link_title)?$content_box_13_element_link_title:'';	
        
        $anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
    }
?>

<div class="section-full content-inner-1 bg-white about-bx8 <?php echo esc_attr($class);?>"  id="DZContentBoxElement13" <?php if (!empty($content_box_13_element_bg_img['id'])){ ?> style="background-image:url(<?php echo esc_url($content_box_13_element_bg_img['url']); ?>);" <?php } ?>>
    <div class="<?php echo esc_attr($containerClass);?>" >
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 m-b30">
                <div class="about-img-box">
                    <?php if($content_box_13_element_frame != 'yes'){	?>
						<div class="about-shape-box">
							<?php if (!empty($content_box_13_element_shape1_img['id'])){ ?>
								<div class="about-shape2" style="background-image:url(<?php echo esc_url($content_box_13_element_shape1_img['url']); ?>);"></div>
							<?php }	?>
							<?php if (!empty($content_box_13_element_shape2_img['id'])){ ?>
								<div class="about-shape1" style="background-image:url(<?php echo esc_url($content_box_13_element_shape2_img['url']); ?>);"></div>
							<?php }	?>
							<?php if (!empty($content_box_13_element_shape3_img['id'])){ ?>
								<div class="about-shape4" style="background-image:url(<?php echo esc_url($content_box_13_element_shape3_img['url']); ?>);"></div>
							<?php }	?>
						</div>
                    <?php }	?>
					
                    <?php if (!empty($content_box_13_element_video_image['id']) && !empty($content_box_13_element_video_url)){ ?>
                        <div class="about-img-one">
                            <div class="video-bx-2">
                                <?php if (!empty($content_box_13_element_video_image['id'])){ ?>
                                    <img src="<?php echo esc_url($content_box_13_element_video_image['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
                                <?php }	?>
								
                                <?php if (!empty($content_box_13_element_video_url)){ ?>
                                    <div class="video-play-icon">
                                        <a href="<?php echo esc_url($content_box_13_element_video_url); ?>" class="popup-youtube video">
											<i class="fa fa-play"></i>
										</a>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }	?>
                    <?php if (!empty($content_box_13_element_image['id'])){ ?>
						<div class="about-img-two">
							<img src="<?php echo esc_url($content_box_13_element_image['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
						</div>
                    <?php }?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-contact-box">
                    <div class="dz-tabs tabs-site-button">
                        <div class="about-inner-content">
                            <div class="section-head  style-1">
								<?php if(!empty($content_box_13_element_subtitle)) { ?>
									<h5 class="title-small"><?php echo wp_kses($content_box_13_element_subtitle,'string'); ?></h5>
								<?php }?>    
								<div class="dz-separator-outer">
									<div class="dz-separator bg-primary style-skew"></div>
								</div>
                                <?php if(!empty($content_box_13_element_title)) { ?>
									<h3 class="title">
										<?php echo wp_kses($content_box_13_element_title,'string'); ?>
									</h3>
                                <?php }?>    
                            </div>
							
							<?php if(!empty($content_box_13_element_description)) { ?>
								<p>
									<?php echo wp_kses($content_box_13_element_description,mazo_allowed_html_tag()); ?>
								</p>
							<?php }?>
                            
                            <?php if(!empty($btn_text)) { ?>
                                <a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute);?> class="btn btn-primary"><?php echo esc_html($btn_text); ?></a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>