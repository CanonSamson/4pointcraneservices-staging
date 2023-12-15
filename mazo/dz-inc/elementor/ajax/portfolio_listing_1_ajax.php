<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page']; 
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit']; 
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$element_style = $GLOBALS['mazo_query_result']['element_style'];
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	
	global $post;
	$animation_time = 200;
	foreach ( $posts as $post ){ 
		
		$post_id  = $post->ID; 
		$post_title = ($title_text_limit != 0) ? mazo_trim($post->post_title, 7) : $post->post_title;
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		$is_featured_post = isset($post_setting['is_featured_post']) ? $post_setting['is_featured_post'] : 0 ;
		$cat_arr = get_the_terms( get_the_id(), 'portfolio_category');
						
		$cat_slug_arr = array_column($cat_arr,'slug');
		
		$cat_slugs = implode(' ',$cat_slug_arr);
		
		$class = '';
		
		if($current_post_number % 2 == 0){
			$post_thumbnail = get_the_post_thumbnail_url($post_id,'mazo_555x800');
			$class = 'mheight-lg';
		}else{
			$post_thumbnail = get_the_post_thumbnail_url($post_id,'mazo_555x400');
			$class = 'mheight-sm';
		}
		
		 if($current_post_number == 6 || $current_post_number == 12){
			$post_thumbnail = get_the_post_thumbnail_url($post_id,'mazo_555x400');
			$class = 'mheight-sm';
		}else if($current_post_number == 5 || $current_post_number == 7 || $current_post_number == 13){
			$post_thumbnail = get_the_post_thumbnail_url($post_id,'mazo_555x800');
			$class = 'mheight-lg';
		}
		$author_name = get_the_author_meta('display_name', $post->post_author);
		$post_thumbnail2 = get_the_post_thumbnail_url($post_id,'mazo_555x800');
		$views_arr = get_post_meta($post_id,'_views_count');
		$views = (isset($views_arr[0]))?$views_arr[0]:0;
		$animation_time += 200;
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';

	?>

<!-- Portfolio -->
<?php if($element_style=='style_1'){	?>
	<div id="post-<?php the_ID(); ?>" <?php echo post_class('card-container col-lg-4 col-md-6 m-b30 all ' . $no_image_class.' '.$cat_slugs); ?>>
		<div class="dz-box overlay style-1 overlay-shine">
			<div class="dz-media <?php echo esc_attr($class); ?>" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>></div>
			<div class="dz-info">
				<a href="<?php the_permalink($post_id); ?>" class="view-btn" title="<?php the_title_attribute(); ?>"></a>
				<h4 class="title m-b15">
					<a href="<?php the_permalink($post_id); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
			</div>
		</div>
	</div>
<?php } else if($element_style=='style_2'){	?>
	<div id="post-<?php the_ID(); ?>" <?php echo post_class('card-container col-lg-4 col-md-6 all ' . $no_image_class.' '.$cat_slugs); ?>>
		<div class="dz-box overlay style-2 overlay-shine m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
			<div class="dz-media mheight-lg" <?php if(!empty($post_thumbnail2)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail2); ?>)"<?php } ?>></div>
			<div class="dz-info">
				<a href="<?php the_permalink($post_id); ?>" class="view-btn" title="<?php the_title_attribute(); ?>"></a>
				<h4 class="title m-b15">
					<a href="<?php the_permalink($post_id); ?>">
						<?php echo esc_html($post_title); ?>
					</a>
				</h4>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-3 col-md-4 col-sm-5 col-6' . $no_image_class); ?>>
    
		<div class="dz-box dz-portfolio-bx">
			<div class="dz-media mheight-md" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>>
				
				<div class="overlay-bx">
					<div class="port-box align-b">
						<h5 class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($post_title); ?></a></h5>
						<p><?php echo mazo_get_cpt_category($cat_arr); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }	?>
	<?php 
	++$current_post_number; } 
	wp_reset_postdata();
?>