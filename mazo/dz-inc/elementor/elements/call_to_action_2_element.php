<div class="section-full p-tb40 bg-primary construct-action" <?php if (!empty($call_to_action_2_element_bg_img['id'])){ ?> style="background-image:url(<?php echo esc_url($call_to_action_2_element_bg_img['url']); ?>);<?php } ?>" id="DZSupport">
    <div class="container">
        <div class="row spno">
            <div class="col-sm-6 col-6">
                <?php if (!empty($call_to_action_2_element_item_1_title) || !empty($call_to_action_2_element_item_1_description)){?>
					<a href="mailto:<?php echo esc_attr($call_to_action_2_element_item_1_description); ?>">    
				<?php
                    if(!empty($call_to_action_2_element_item_1_icon['value']))  {
                        
                        $icon_name1 = $call_to_action_2_element_item_1_icon['value'];
                    ?>
                    <i class="<?php echo esc_attr($icon_name1); ?>"></i>
                <?php } ?>
				
                <?php if (!empty($call_to_action_2_element_item_1_title)) { 
                    echo wp_kses($call_to_action_2_element_item_1_title,'string'); 
                }
                ?> :<?php
                if (!empty($call_to_action_2_element_item_1_description)) { 
                    echo wp_kses($call_to_action_2_element_item_1_description,'string'); 
                    
                }?>
                </a>
                <?php } ?>
            </div>
            <div class="col-sm-6 col-6 text-right text-end">
                <?php if (!empty($call_to_action_2_element_item_2_title) || !empty($call_to_action_2_element_item_2_description)){ ?>
					<a href="tel:<?php echo esc_attr($call_to_action_2_element_item_2_description); ?>">
				
                    <?php
					 
					if (!empty($call_to_action_2_element_item_2_title)) { 
                        echo wp_kses($call_to_action_2_element_item_2_title,'string'); 
                    }
                    ?> :
                    <?php
                    if (!empty($call_to_action_2_element_item_2_description)) { 
                        echo wp_kses($call_to_action_2_element_item_2_description,'string'); 
                    }
                    if(!empty($call_to_action_2_element_item_2_icon['value']))  {
                        $icon_name2 = $call_to_action_2_element_item_2_icon['value'];
                    ?>
                    <i class="<?php echo esc_attr($icon_name2); ?>"></i>
                    <?php }?>
				</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>