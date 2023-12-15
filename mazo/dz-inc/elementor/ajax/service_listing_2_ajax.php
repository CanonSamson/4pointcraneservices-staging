<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page']; 
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
	$show_column = $GLOBALS['mazo_query_result']['show_column'];
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	 if($show_column=='column_2'){
		$class = 'col-lg-6 col-md-6 col-sm-6';
	}else if($show_column=='column_3'){
		$class = 'col-lg-4 col-md-6 col-sm-6';
	}else{
		$class = 'col-lg-3 col-md-6 col-sm-6';
	}
     
     global $post;

	foreach ( $posts as $post ){ 
		
		$post_id  = $post->ID; 
	    $post_title =  ($title_text_limit != 0) ? mazo_trim( $post->post_title , $title_text_limit) : mazo_trim( $post->post_title,8);
	    
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		$short_description = mazo_short_description($excerpt, $content, $title_text_limit);
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		
		$cat_arr = get_the_terms($post_id , 'service_category');
	
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
		$service_icon_image = mazo_get_post_meta($post_id,'service_icon_image');
	?>

<!-- service --> 
	<div id="post-<?php echo esc_attr($post_id); ?>" <?php echo post_class('m-b30 wow fadeInUp' .' '. $class.' ' . $no_image_class); ?> data-wow-duration="2s" data-wow-delay="0.3s">
        <div class="dz-box service-box-6">            
            <?php if(has_post_thumbnail($post_id)) { ?>
                <div class="dz-media"> 
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mazo_500x600'); ?></a> 
                </div>
            <?php }?>
            <div class="dz-info">
                 <?php if(!empty($service_icon_image)) {?>
                        <div class="icon-bx-sm radius bg-primary m-b20">
                            <a href="<?php echo esc_url(get_the_permalink($post_id))?>" class="icon-cell">
                                <img src="<?php echo esc_url($service_icon_image['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
                            </a>
                        </div>
                <?php }?>
                <h4 class="title"><a href="<?php echo esc_url(get_the_permalink($post_id))?>"><?php echo esc_html($post_title); ?></a></h4>
                <div class="dz-separator bg-primary m-b0"></div>
                <div class="readmore">
                    <a href="<?php echo esc_url(get_the_permalink($post_id))?>" class="btn btn-primary btn-sm"><?php echo esc_html__('Learn More','mazo'); ?></a>
                </div>
            </div>
        </div>
    </div>
    


<?php 
	} 
	wp_reset_postdata();
?>