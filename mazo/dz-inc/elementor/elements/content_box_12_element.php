<?php 
if (!empty($content_box_12_element_link_title)) {
        $btn_link = !empty($content_box_12_element_link)?$content_box_12_element_link:'';
        $btn_text = !empty($content_box_12_element_link_title)?$content_box_12_element_link_title:'';	
        
        $anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
    }
?>
<div class="section-full bg-primary"  id="DZContentBoxElement12">
    <div class="container-fluid">
        <div class="row align-item-center">
            <div class="col-lg-6 p-lr0">
                 <?php if (!empty($content_box_12_element_video_image['url']) && !empty($content_box_12_element_video_url)){ ?>
                    <div class="video-bx-2 agro-video">
                        <?php if (!empty($content_box_12_element_video_image['url'])){ ?>
                            <img src="<?php echo esc_url($content_box_12_element_video_image['url']); ?>" class="img-cover" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
                        <?php }?>
						
                        <?php if (!empty($content_box_12_element_video_url)){ ?>
                            <div class="video-play-icon">
                                <a href="<?php echo esc_url($content_box_12_element_video_url); ?>"  class="popup-youtube video"><i class="fa fa-play"></i></a>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-6 content-inner-1 agro-about">
                <div class="max-w600 p-lr15">                
                    <?php if(!empty($content_box_12_element_title) || !empty($content_box_12_element_subtitle)){ ?>    			        
						<div class="section-head text-white m-b20  style-1">
							<?php if(!empty($content_box_12_element_subtitle)){ ?>
								<h5 class="title-small">
									<?php echo wp_kses($content_box_12_element_subtitle,'string'); ?>
								</h5>
								<div class="dz-separator-outer">
									<div class="dz-separator bg-white style-skew"></div>
								</div>
							<?php }?>
							<?php if(!empty($content_box_12_element_title)){ ?>
								<h3 class="title"><?php echo wp_kses($content_box_12_element_title,'string'); ?></h3>
							<?php }?>
						
							<?php if(!empty($content_box_12_element_description)){ ?>
								<p class="text-white">
									<?php echo wp_kses($content_box_12_element_description,'string'); ?>
								</p>
							<?php } ?>
						</div>
                    <?php } ?> 
                     
                    <?php if(!empty($content_box_12_element_feature)) {
                        $features = explode(',',$content_box_12_element_feature);                           
                    ?>
                        <ul class="list-check white agro-list">
                            <?php foreach($features as $key => $featureValue) {?>
								<li>
									<?php echo wp_kses($featureValue,'string'); ?>
								</li>
							<?php }?>
                        </ul>
                     <?php } ?>
					 
                    <?php if(!empty($btn_text)) { ?>
                        <a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute);?>  class="btn btn-secondary"><?php echo esc_html($btn_text); ?></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>