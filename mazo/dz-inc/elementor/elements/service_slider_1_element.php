<?php	
	$query_args = array(
		'post_type' => 'dz_service',
		'post_status' => 'publish',
		'posts_per_page'   	=> $service_slider_1_element_no_of_posts ,	
		'orderby' =>$service_slider_1_element_orderby,
		'order'	=>$service_slider_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($service_slider_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $service_slider_1_element_orderby;
	}
	
	
	/* Thumbnail Required */
	$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'EXISTS'
		),
	);
	
	if($service_slider_1_element_posts_in_categories) {
		
		$service_slider_1_element_posts_in_categories1 = mazo_get_cat_id_by_slug($service_slider_1_element_posts_in_categories,'service_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'service_category',
		'field' => 'id',
		'terms' => $service_slider_1_element_posts_in_categories1,
		'operator' => 'IN'
		); 
		$service_slider_1_element_posts_in_categories = implode(',',$service_slider_1_element_posts_in_categories);
	}
	
	
	
	if($service_slider_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	$category_arr = array();
	if(!empty($service_slider_1_element_posts_in_categories)) 
	{		
		$category_arr = get_terms( array(
		'taxonomy' => 'service_category',
		'include' => $service_slider_1_element_posts_in_categories,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $service_slider_1_element_order, 
        ) ); 
	}
	
	$query = new WP_Query($query_args);	
	/* Button Section Start */
		$btn_link = $btn_text = $anchor_attribute = '';
		if (!empty($service_slider_1_element_link_title)){
			$btn_link = !empty($service_slider_1_element_link)?$service_slider_1_element_link:'';
			$btn_text = !empty($service_slider_1_element_link_title)?$service_slider_1_element_link_title:'';				
			$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
		}	
	/* Button Section End */
	
	if(!empty($query->have_posts())){
?>
	<div class="section-full bg-gray content-inner-1" id="DZServiceSliderElement" <?php if(!empty($service_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($service_slider_1_element_bg_img['url']); ?>);" <?php } ?>>
		<div class="container">
			<?php if(!empty($service_slider_1_element_title)){ ?>
				<div class="section-head style-5 text-center">
					<h2 class="title">
						<?php echo wp_kses($service_slider_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($service_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($service_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="services-swiper swiper-container">
				<div class="swiper-wrapper">
					<?php 
						while($query->have_posts()){ 				
							$query->the_post();
							global $post ;	
							$content_text_limit = $service_slider_1_element_text_limit;
							$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);	
							$service_icon_image = mazo_get_post_meta(get_the_id(),'service_icon_image');							
					?>
						<div class="swiper-slide">
							<div class="service-box-3 text-center">
								<div class="dz-media">
									<?php the_post_thumbnail('thumbnail'); ?>
									 <?php if(!empty($service_icon_image)) {?>
										<span class="icon">
											<img src="<?php echo esc_url($service_icon_image['url']); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
										</span>
									<?php } ?>
								</div>
								<div class="dz-info">
									<h5 class="title">
										<a href="<?php echo esc_url(get_the_permalink())?>">
											<?php the_title(); ?>
										</a>
									</h5>
									<p>
										<?php echo esc_html($short_description); ?>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>	
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<?php if(!empty($btn_text)) { ?>
				<div class="text-center">
					<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?>  class="btn btn-primary btn-sm">		<?php echo esc_html($btn_text); ?>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } wp_reset_postdata(); ?>