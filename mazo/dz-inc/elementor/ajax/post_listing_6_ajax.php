<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page'];
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
	$side_bar = $GLOBALS['mazo_query_result']['side_bar'];  
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$show_column = $GLOBALS['mazo_query_result']['show_column'];
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	$animation_time = 400;
	if($side_bar=='No_Sidebar'){
		$class = 'col-lg-4 col-md-6';
	}else{
		if($show_column=='column_2'){
			$class = 'col-lg-6 col-md-12';
		}else{		
			$class = 'col-lg-4 col-md-6';
		}
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
	
<div id="post-<?php the_ID(); ?>" <?php echo post_class('' . $no_image_class.' '.$class); ?>>
	<div class="dz-card blog-grid style-4 aos-item m-b30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
		<?php if(has_post_thumbnail()) { ?>
			<div class="dz-media">
				<?php the_post_thumbnail('mazo_555x400'); ?>
			</div>
		<?php } ?> 
		<div class="dz-info">
			<div class="dz-meta">
				<ul>
					<li class="post-date">
						<?php echo esc_html(get_the_date()); ?>
					</li>
					<li class="post-user">
						<?php esc_html_e('By', 'mazo'); ?> 
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"> 
							<?php echo esc_html($author_name);?>
						</a>
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
					<?php echo esc_html($short_description); ?>
				</p>
			</div>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="btn shadow-primary icon-btn btn-primary"><i class="fas fa-caret-right"></i></a>
		</div>
	</div>
</div>
	<?php  } 
	wp_reset_postdata();
?>