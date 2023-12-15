<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page'];
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
	$side_bar = $GLOBALS['mazo_query_result']['side_bar'];  
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	$animation_time = 200;
	
	
	$count = 1;
	foreach ( $posts as $post ){ 
		
		$post_id  = $post->ID; 
		$post_title = (has_post_thumbnail()) ? mazo_trim(get_the_title(), 6) : get_the_title();
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		$short_description = ($title_text_limit != 0) ? mazo_short_description($excerpt, $content, $title_text_limit): $excerpt;
		
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		$author_name = get_the_author_meta('display_name', $post->post_author);
		$is_featured_post = isset($post_setting['is_featured_post']) ? $post_setting['is_featured_post'] : 0 ;
		
		$animation_time += 200;
		$views_arr = get_post_meta($post_id,'_views_count');
		$views = (isset($views_arr[0]))?$views_arr[0]:0;
		
		
		$card_class = $card_image_position = '';
		
		if($current_post_number == 1 || ($current_post_number - 1) % 3 == 0){
			$count = 1;
		}
		
		if($count % 2 == 0){
			$card_image_position = 'bottom';
		}else{
			$card_class = 'blog-top';
			$card_image_position = 'top';
			
		}
		
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
		
		$item_count = count($posts);
		$is_item_count_even = ($item_count % 2 == 0)?'yes':'no';
		$class = ($is_item_count_even == 'no' && ($item_count == $current_post_number))?'mx-auto':'';
	?>
	
<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-4 col-md-6 m-b30' . $no_image_class.' '.$class); ?>>
	
	<div class="dz-card blog-grid style-3 <?php echo esc_attr($card_class); ?> aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
		<?php if(has_post_thumbnail() && $card_image_position=='top') { ?>
			<div class="dz-media">
				<?php the_post_thumbnail('mazo_555x400'); ?>
			</div>
		<?php } ?> 
		<div class="dz-info text-center">
			<div class="dz-meta">
				<ul>
					<li class="post-date">
						<?php echo esc_html(get_the_date()); ?>
					</li>
				</ul>
			</div>
			
			<h4 class="dz-title">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php echo esc_html($post_title); ?>
				</a>
			</h5>
			<div class="dz-post-text text">
				<p>
					<?php echo esc_html( $short_description );?>
				</p>
			</div>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link"><?php echo esc_html__('Read More','mazo'); ?> <i class="fas fa-arrow-right m-l5"></i></a>
			
		</div>
		<?php if(has_post_thumbnail() && $card_image_position=='bottom') { ?>
			<div class="dz-media">
				<?php the_post_thumbnail('mazo_555x400'); ?>
			</div>
		<?php } ?> 
	</div>
</div>
	<?php 
	++$count;
	++$current_post_number; } 
	wp_reset_postdata();
?>