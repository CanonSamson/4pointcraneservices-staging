<?php
  $current_page = $GLOBALS['mazo_query_result']['current_page'];
  $posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page'];
  $title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
  $side_bar = $GLOBALS['mazo_query_result']['side_bar'];
  $current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
  $blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
  $posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
 
	if($side_bar == 'No_Sidebar')
	{
		$col_classes = 'col-xl-6 col-lg-6 col-md-6';
	}else{
		$col_classes = 'col-xl-12 col-lg-12 col-md-12';
	}
 
 
  foreach ( $posts as $post ){ 
		
		$post_id  = $post->ID; 
		$post_title =  ($title_text_limit != 0) ? mazo_trim( $post->post_title , 10) : $post->post_title;
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		$short_description = mazo_short_description($excerpt, $content, $title_text_limit);
		
	
    $post_layout = mazo_dzbase()->get_meta('post_layout');
 
    /* implement post layout icons on listing post */
    $post_setting = get_post_meta($post_id, '_post_settings', true);
    $is_featured_post = isset($post_setting['is_featured_post']) ? $post_setting['is_featured_post'] : 0 ;    
    $author_name = get_the_author_meta('display_name', $post->post_author);
    $views_arr = get_post_meta($post_id,'_views_count');
    $views = (isset($views_arr[0]))?$views_arr[0]:0;
    $media_class = ($post_layout == 'video_post')?'post-video':'';
	$post_type_video	= mazo_dzbase()->get_meta('post_type_video');
    $no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
  ?>
  
<div id="post-<?php the_ID(); ?>" <?php echo post_class($col_classes.' '.$no_image_class); ?>>
	<div class="dz-card blog-grid style-1 shadow  m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
		<?php
			if($post_layout == 'slider_post_1')
			{
				$post_type_gallery1	= mazo_dzbase()->get_meta('post_type_gallery1');
				
			?>	
			<?php if(has_post_thumbnail()) { ?>
				<div class="dz-media">
					<?php 
						if(!empty($post_type_gallery1)) { 
							$post_type_gallery1 = explode(',',$post_type_gallery1);
						?>
							<div class="swiper-container post-swiper">
								<div class="swiper-wrapper">
								<?php foreach($post_type_gallery1 as $image_id) { ?>
									<div class="swiper-slide">
										<img src="<?php echo esc_url(wp_get_attachment_image_url($image_id,'large')); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
									</div>
								<?php } ?>
							</div>
							<div class="prev-post-swiper-btn"><i class="flaticon-left-arrow"></i></div>
							<div class="next-post-swiper-btn"><i class="flaticon-right-arrow"></i></div>
						</div>
					<?php } ?>
				</div>
			<?php } }else{ ?>
			
			<?php if(has_post_thumbnail()) { ?>
				<div class="dz-media <?php echo esc_attr($media_class); ?>">
						<?php 
							the_post_thumbnail('large'); 
							if($post_layout == 'video_post'){ 
							if(!empty($post_type_video)) { 
							$video_id = mazo_get_youtube_video_id($post_type_video);
							$video_link = 'https://www.youtube.com/watch?v='.$video_id ;
							
						?>
							<a href="<?php echo esc_url($video_link); ?>" class="post-video-icon popup-youtube"><span><i class="fa fa-play" aria-hidden="true"></i></span>	
							</a>
					
						<?php } } ?>
				</div>
				<?php }
			}
		?>
		
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
  }
  wp_reset_postdata();
?>

<script>
jQuery(document).ready(function(){
	handlePostSlider();
});
</script>
			