<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page']; 
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
	$show_column = $GLOBALS['mazo_query_result']['show_column'];
	$element_style = $GLOBALS['mazo_query_result']['element_style'];
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	$animate_time=200;	
	$last_post_number = (($current_page - 1) * $posts_per_page) + count($posts);

	foreach ( $posts as $post_data ){ 		
		if($show_column=='column_2'){
			$class = 'col-lg-6';
		}else if($show_column=='column_3'){
			$class = 'col-lg-4';
		}else{
			$class = 'col-lg-3';
		}		
		if($element_style=='style_6'){
		/* Class For Last Post */
			$class .= '';
		}else{
			if($current_post_number == $last_post_number && $last_post_number % 2 != 0){
				$class .= ' col-md-12';
			}else{
				$class .= ' col-md-6'; 
			}
		}
		
		/* Class For Last Post END */	
		
		$post_id  = $post_data->ID; 
	    $post_title =  ($title_text_limit != 0) ? mazo_trim( $post_data->post_title , $title_text_limit) : mazo_trim( $post_data->post_title,8);
	    
		$excerpt = $post_data->post_excerpt;
		$content = $post_data->post_content;
		$short_description = mazo_short_description($excerpt, $content, $title_text_limit);
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		$subtitle = mazo_get_post_meta($post_id,'service_subtitle');
		$cat_arr = get_the_terms($post_id , 'service_category');
		$cat_slug_arr = array_column($cat_arr, 'slug');
		$cat_slugs = implode(' ', $cat_slug_arr);
	
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
		
		$icon_type = mazo_get_post_meta($post_id,'service_icon_type');
		$icon_type = (!empty($icon_type))?$icon_type:'fontawesome';
		$icon = mazo_get_post_meta($post_id,'service_icon_'.$icon_type);	
		$post_thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
		$animate_time += 200;
		
		$padding_class = ($element_style=='style_1')?'m-b30':'';
		$active_class = ($current_post_number == 2)?'active':'bg-secondary';
	?>

<!-- service -->

<div id="post-<?php echo esc_attr($post_id); ?>" <?php echo post_class('aos-item' .' ' . $padding_class .' '. $class.' ' . $no_image_class); ?> data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
	<?php if($element_style=='style_1'){ ?>
		<div class="icon-bx-wraper style-6 box-hover <?php echo esc_attr($active_class); ?>" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>>
			<div class="icon-lg"> 
				<span class="icon-cell">
					<i class="<?php echo esc_attr($icon); ?>"></i>
				</span> 
			</div>
			<div class="icon-content">
				<h4 class="dz-title">
					<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
				<p>
					<?php echo esc_html($short_description); ?>
				</p>
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>" class="btn btn-primary"><i class="las la-arrow-right"></i></a>
			</div>
		</div>
	<?php }else if($element_style=='style_2'){	?>
		<div class="icon-bx-wraper bg-secondary style-8 m-b30 box-hover <?php echo esc_attr($active_class); ?>">
			<div class="icon-lg m-b30"> 
				<span class="icon-cell">
					<i class="<?php echo esc_attr($icon); ?>"></i>
				</span> 
			</div>
			<div class="icon-content">
				<h6 class="sub-title">
					<?php echo esc_html($subtitle); ?>
				</h6>
				<h4 class="dz-title m-b10">
					<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
				<p>
					<?php echo esc_html($short_description); ?>
				</p>
			</div>
		</div>
	<?php }else if($element_style=='style_3'){	?>
		<div class="icon-bx-wraper style-11 left m-b40">
			<div class="icon-bx-sm text-primary shadow icon-bx">
				<i class="<?php echo esc_attr($icon); ?>"></i>
			</div>
			<div class="icon-content">
				<h4 class="title m-b10">
					<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
				<p>
					<?php echo esc_html($short_description); ?>
				</p>
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>" class="btn-link">
					<?php echo esc_html__('Read More','mazo'); ?> <i class="fa fa-arrow-right"></i>
				</a>
			</div>
		</div>
	<?php }else if($element_style=='style_4'){	?>
		<div class="icon-bx-wraper bx-style-1 style-15 m-b30 p-a30" data-name="1.">
			<div class="icon-bx-sm radius m-b20"> 
				<a href="<?php echo the_permalink($post_id); ?>" class="icon-cell">
					<i class="<?php echo esc_attr($icon); ?>"></i>
				</a> 
			</div>
			<h4 class="title m-b15">
				<a href="<?php echo the_permalink($post_id); ?>">
					<?php echo esc_html($post_title); ?>
				</a>
			</h4>
			<p>
				<?php echo esc_html($short_description); ?>
			</p>
		</div>
	<?php } else if($element_style=='style_5'){	?>
		<div class="icon-bx-wraper style-17 m-b30">
			<div class="icon-xl m-b30"> 
				<a href="<?php echo the_permalink($post_id); ?>" class="icon-cell">
					<i class="<?php echo esc_attr($icon); ?>"></i>
				</a> 
			</div>
			<div class="icon-content">
				<h4 class="title m-b10">
					<a href="<?php echo the_permalink($post_id); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
				
				<p class="m-b30">
					<?php echo esc_html($short_description); ?>
				</p>
				
				<a href="<?php echo the_permalink($post_id); ?>" class="btn btn-primary btn-sm">
					<span><?php echo esc_html__('Read More','mazo'); ?></span> 
					<i class="fas fa-arrow-right ms-2"></i>
				</a>
			</div>
		</div>
	<?php } else if($element_style=='style_6'){	?>
		<div class="icon-bx-wraper services-box">
			<div class="icon-content">
				<?php if(!empty($post_thumbnail)){ ?>
					<div class="icon-lg m-b30"> 
						<a href="<?php echo the_permalink($post_id); ?>" class="icon-cell icon-up">
							<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr__('Service Icon','mazo'); ?>"/>
						</a> 
					</div>
				<?php } ?>
				
				<h4 class="dz-tilte">
					<a href="<?php echo the_permalink($post_id); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
				<p>
					<?php echo esc_html($short_description); ?>
				</p>
			</div>
			<a href="<?php echo the_permalink($post_id); ?>" class="btn btn-primary btn-sm">
				<span>
					<?php echo esc_html__('Read More','mazo'); ?>
				</span>
			</a>
		</div>
	<?php }	?>
</div>
		
	<?php 
++$current_post_number;	} 
	wp_reset_postdata();
?>