<?php
	$current_page = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page = $GLOBALS['mazo_query_result']['posts_per_page']; 
	$current_post_number =  (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$title_text_limit = $GLOBALS['mazo_query_result']['title_text_limit']; 
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];	
	$posts = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
    $incr = 1;
	 
	$incr = ($current_post_number >= 5) ? 1 : $current_post_number;
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
      
        if($incr == 1)    {
            $class = 'bg-secondary text-white';
            $buttonClass = 'btn-primary ';
            $headingClass = 'btn-primary ';
        } else if($incr == 2 || $incr == 3)    {
            $class = 'bg-primary text-white';
            $buttonClass = 'btn-outline-light';
        } else if($incr == 4)    {
            $class = 'bg-gray';
            $buttonClass = 'btn-secondary';
        }
		
		if($incr == 3 || $incr == 4){
			$row = 'second';
		}else{
			$row = 'first';	
		}
	?>

<!-- service -->


<?php if($row  == 'first') { ?>
	<div class="col-lg-3 col-md-6 col-sm-6 wow fadeIn " data-wow-duration="2s" data-wow-delay="0.6s">
		<?php if(has_post_thumbnail($post_id)) { ?>
			<div class="dz-post-media dz-img-effect zoom"> 
				<?php the_post_thumbnail('medium'); ?>
			</div>
		<?php }	?>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 <?php echo esc_attr($class);?>   wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
		<div class="service-box style2">
			<div>
				<h3 class="title">
					<?php echo esc_html($post_title); ?>
				</h3>
				<p>
					<?php echo esc_html($short_description); ?>
				</p>
				<a href="<?php echo esc_url(get_the_permalink($post_id))?>" class="btn btn-sm <?php echo esc_attr($buttonClass);?>"><?php echo esc_html__('ABOUT US','mazo'); ?></a>
			</div>
		</div>
	</div>

<?php } else {	?>
	<div class="col-lg-3 col-md-6 col-sm-6 <?php echo esc_attr($class);?>   wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
		<div class="service-box style2">
			<div>
				<h3 class="title">
					<?php echo esc_html($post_title); ?>
				</h3>
				<p>
					<?php echo esc_html($short_description); ?>
				</p>
				<a href="<?php echo esc_url(get_the_permalink($post_id))?>" class="btn btn-sm <?php echo esc_attr($buttonClass);?>"><?php echo esc_html__('ABOUT US','mazo'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
		<?php if(has_post_thumbnail($post_id)) { ?>
			<div class="dz-post-media dz-img-effect zoom"> 
				<?php the_post_thumbnail('medium'); ?>
			</div>
		<?php }?>
	</div>
<?php } ?>


<?php 
    ++$incr;
	$current_post_number++;
    
    }
	wp_reset_postdata();
?>