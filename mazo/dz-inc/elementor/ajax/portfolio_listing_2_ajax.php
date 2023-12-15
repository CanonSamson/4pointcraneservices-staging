<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page']; 
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
	$show_link = $GLOBALS['mazo_query_result']['show_link'];
	$read_more_setting = $GLOBALS['mazo_query_result']['read_more_setting'];
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	
	
	foreach ( $posts as $post ){ 
	
		if($current_post_number <= 2){
			$classes = 'col-lg-6 col-sm-6 m-b30';
		}else{
			$classes = 'col-lg-4 col-sm-6 m-b30';
		}
		
		$post_id  = $post->ID;
		$post_title = ($title_text_limit != 0) ? mazo_trim($post->post_title, 7) : $post->post_title;
	
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		$author_name = get_the_author_meta('display_name', $post->post_author);
		$is_featured_post = isset($post_setting['is_featured_post']) ? $post_setting['is_featured_post'] : 0 ;
		
		$cat_arr = get_the_terms($post_id , 'portfolio_category');
		$cat_slug_arr = array_column($cat_arr, 'slug');
		$cat_slugs = implode(' ', $cat_slug_arr);
		$views_arr = get_post_meta($post_id,'_views_count');
		$views = (isset($views_arr[0]))?$views_arr[0]:0;
		$post_thumbnail = get_the_post_thumbnail_url($post_id,'medium');
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
		
		
	?>

<!-- Portfolio -->

<div id="post-<?php echo esc_attr($post_id); ?>" <?php echo post_class('aos-item' . $no_image_class.' '. $classes); ?>  data-aos-duration="1000" data-aos-delay="200">
	<div class="dz-box overlay style-3">
		<div class="dz-media" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>>
			<?php if($read_more_setting=='lightbox'){ ?>
				<span data-exthumbimage="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(),'thumbnail')) ?>" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(),'full')) ?>" class="view-btn lightimg" title="<?php echo esc_attr($post_title); ?>"></span>
			<?php } elseif($read_more_setting=='link_to_detail'){ ?>
					<a href="<?php the_permalink(); ?>"><span class="view-btn" title="<?php echo esc_attr(get_the_title()); ?>"></span></a>
			<?php } ?>
		</div>
		<div class="dz-info">
			<span class="line"></span>
			<div>
				<h4 class="title">
					<?php if($show_link=='yes'){ ?>
						<a href="<?php the_permalink($post_id); ?>">
							<?php the_title(); ?>
						</a>
					<?php } else { ?>
						<a href="javascript:void(0);">
							<?php the_title(); ?>
						</a>
					<?php } ?>
				</h4>
				<?php if(!empty($cat_arr)) { ?>
					<h6 class="sub-title text-primary">
						<?php echo mazo_get_cpt_category($cat_arr); ?>
					</h6>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
	<?php 
	++$current_post_number; } 
	wp_reset_postdata();
?>