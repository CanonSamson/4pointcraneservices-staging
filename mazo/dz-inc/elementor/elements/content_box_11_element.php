<div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s"  id="DZContentBoxElement11">
    <div class="container">
        <div class="row about-bx7">
            <div class="col-lg-6 col-md-12 m-b30">
                <div class="about-img-box">
					<?php if(!empty($content_box_11_element_date)) {?>
						<div class="about-text">
							<p><?php echo esc_html__('Since','mazo'); ?><?php echo wp_kses($content_box_11_element_date,'string'); ?></p>
						</div>
					<?php }	?>
					
                    <div class="about-img-one wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.2s">
                        <?php if (!empty($content_box_11_element_image1['url'])){ ?>
                            <img src="<?php echo esc_url($content_box_11_element_image1['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
                        <?php }?>
                    </div>
					
                    <div class="about-img-two wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                        <?php if (!empty($content_box_11_element_image2['url'])){ ?>
                            <img src="<?php echo esc_url($content_box_11_element_image2['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
                        <?php }?>
                    </div>
                    <?php if (!empty($content_box_11_element_video_image['url']) && !empty($content_box_11_element_video_url)){ ?>
                        <div class="about-img-three wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.8s">
                            <div class="video-bx-2">
                                <?php if (!empty($content_box_11_element_video_image['url'])){ ?>
                                    <img src="<?php echo esc_url($content_box_11_element_video_image['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
                                <?php }?>
                                <?php if (!empty($content_box_11_element_video_url)){ ?>
                                    <div class="video-play-icon">
                                        <a href="<?php echo esc_url($content_box_11_element_video_url); ?>" class="popup-youtube video"><i class="fa fa-play"></i></a>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }?>    
                </div>
            </div>
            <?php if(!empty($content_box_11_element_item)){
                    $item_arr = $content_box_11_element_item;
                    $incr = 1;
                ?>
                    <div class="col-lg-6 col-md-12 m-b30">
                        <div class="about-contact-box">
                            <div class="dz-tabs tabs-site-button">
                                <div class="tab-content" id="DzTabContent">
                                    
                                <?php 
                                    $pagingOutput="";
                                    foreach($item_arr as $itemKey => $itemValue) {
                                        $activeClass = ($incr == 1 ) ? 'active' : "";
                                        
                                        $pagingOutput .= '<li class="nav-item" role="presentation"><a id="'.sanitize_title($itemValue['content_box_11_element_item_title'].'_'.$incr).'" data-bs-toggle="tab" data-bs-target="#'.sanitize_title($itemValue['content_box_11_element_item_title'].'_'.$incr).'" role="tab" aria-controls="'.sanitize_title($itemValue['content_box_11_element_item_title'].'_'.$incr).'" aria-selected="true" data-toggle="tab" href="#'.sanitize_title($itemValue['content_box_11_element_item_title'].'_'.$incr).'" class="nav-link '.esc_attr($activeClass).' show">'.esc_html($incr)	.'</a></li>';
                                ?>
                                
                                <div id="<?php echo sanitize_title($itemValue['content_box_11_element_item_title'].'_'.$incr);?>" class="tab-pane <?php echo esc_attr($activeClass);?>"  role="tabpanel" aria-labelledby="<?php echo sanitize_title($itemValue['content_box_11_element_item_title'].'_'.$incr);?>">
                                        <div class="about-inner-content">
                                        <?php if(!empty($itemValue['content_box_11_element_item_title'])) { ?>
                                            <h2 class="rotate-text">
												<?php echo wp_kses($itemValue['content_box_11_element_item_title'],'string'); ?>
											</h2>
                                        <?php }	?>
										
                                        <?php if (!empty($itemValue['content_box_11_element_item_logo']['id'])){ ?>
                                            <div class="m-b30">
                                                <img src="<?php echo esc_url($itemValue['content_box_11_element_item_logo']['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>">
                                            </div>
                                        <?php }	?>  
										
                                        <?php if(!empty($itemValue['content_box_11_element_item_subtitle'])) { ?>
                                            <h2 class="title"><?php echo wp_kses($itemValue['content_box_11_element_item_subtitle'],'string'); ?></h2>
                                        <?php }	?>
										
                                        <?php if(!empty($itemValue['content_box_11_element_item_description'])) { ?>
                                            <?php echo wp_kses($itemValue['content_box_11_element_item_description'],mazo_allowed_html_tag()); ?>
                                        <?php }	?>
                                        </div>
                                    </div>
                                <?php $incr++; } ?>
                                </div>
                               <ul class="nav nav-tabs" id="DzTab" role="tablist">
                                    <?php echo wp_kses($pagingOutput, mazo_allowed_html_tag());?>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php }?>
        </div>
    </div>
</div>