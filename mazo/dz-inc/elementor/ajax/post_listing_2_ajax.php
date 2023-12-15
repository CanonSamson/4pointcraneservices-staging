<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page'];
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
	$side_bar = $GLOBALS['mazo_query_result']['side_bar'];  
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$show_column = $GLOBALS['mazo_query_result']['show_column'];
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	$animation_time = 200;
	if($show_column=='column_2'){
		$class = 'col-lg-6';
	}else{		
		$class = 'col-lg-12 col-sm-12';
	}
	
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
		
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
	?>
	
<div id="post-<?php the_ID(); ?>" <?php echo post_class($class.' ' . $no_image_class); ?>>
	<div class="dz-card blog-half style-1 shadow m-b50 aos-item"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
		
		<?php if(has_post_thumbnail()) { ?>
			<div class="dz-media">
				<?php the_post_thumbnail('mazo_555x400'); ?>
			</div>
		<?php } ?> 
		<div class="dz-info">
			<div class="dz-meta">
				<ul>
					<li class="post-date">
						<i class="flaticon-calendar"></i>
						<?php echo esc_html(get_the_date()); ?>
					</li>
					<li class="post-user">
						<i class="flaticon-user"></i>
						<?php esc_html_e('By', 'mazo'); ?> 
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"> 
							<?php echo esc_html($author_name);?>
						</a>
					</li>
				</ul>
			</div>
			<h3 class="dz-title">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php echo esc_html($post_title); ?>
				</a>
			</h3>
			<div class="dz-post-text text">
				<p>
					<?php echo esc_html( $short_description );?>
				</p>
			</div>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link"><?php echo esc_html__('READ MORE','mazo'); ?> <i class="flaticon-right-arrow"></i>	</a>
		</div>
	</div>
</div>
	<?php 
	++$current_post_number; } 
	wp_reset_postdata();
?>