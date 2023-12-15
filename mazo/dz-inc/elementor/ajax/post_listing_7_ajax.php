<?php
  $current_page = $GLOBALS['mazo_query_result']['current_page'];
  $posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page'];
  $title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit'];
  $current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
  $blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
  $posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
 
	global $post;
	foreach ( $posts as $post ){
		
		$post_id  = $post->ID; 
		$post_title =  ($title_text_limit != 0) ? mazo_trim( $post->post_title , $title_text_limit) : $post->post_title;
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		$short_description = mazo_short_description($excerpt, $content, 40);		
	
		$post_layout = mazo_dzbase()->get_meta('post_layout');	 
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		$is_featured_post = isset($post_setting['is_featured_post']) ? $post_setting['is_featured_post'] : 0 ;    
		$author_name = get_the_author_meta('display_name', $post->post_author);
		$views_arr = get_post_meta($post_id,'_views_count');
		$views = (isset($views_arr[0]))?$views_arr[0]:0;
		$media_class = ($post_layout == 'video_post')?'post-video':'';
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
		$cat_arr = get_the_terms($post_id , 'category');
		$post_thumbnail = get_the_post_thumbnail_url();
  ?> 
<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-4 col-md-6 col-sm-6' . $no_image_class); ?>> 
    <div class="blog-post trending-post text-center text-white">
        <?php if(has_post_thumbnail($post_id)) { ?>
            <div class="dz-media dz-img-effect mheight-lg" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>></div>
        <?php }?>
        <div class="dz-info">
            <div class="dz-meta">
                <ul>
                    <li class="post-date"> 
						<i class="fa fa-calendar"></i>
						<strong>
							<?php echo esc_html(get_the_date('d M')); ?>
						</strong> 
						<span> 
							<?php echo esc_html(get_the_date('Y')); ?>
						</span> 
					</li>
					
                    <li class="post-comment">
						<i class="fa fa-comments"></i> 
						<a href="<?php echo esc_url(get_the_permalink(get_the_id()).'#comment');?>">
							<?php comments_number( '0 comment', '1 comment', '% comment' ); ?>
						</a> 
					</li>
                </ul>
            </div>
            <?php echo get_the_category_list(); ?>
            <h4 class="dz-title">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php echo esc_html($post_title); ?>
				</a>
			</h4>
        </div>
    </div>
</div>
 <?php
  }
  wp_reset_postdata();
?>