<?php
	
	$allowed_html_tag = mazo_allowed_html_tag();
	$page_no = 1;
	$post_type = 'post';
	
	$query_args = array(	
	'post_type' 		=> $post_type,
	'post_status' 		=> 'publish',
	'posts_per_page'   	=> $post_slider_3_element_no_of_posts ,		
	'order' 			=> $post_slider_3_element_order,
	'ignore_sticky_posts' => true,
	);
	
	if($post_slider_3_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
    }
	else{
		$query_args['orderby']	= $post_slider_3_element_orderby;
    }
	
	
	$post_slider_3_element_image_preference = !empty($post_slider_3_element_image_preference)?$post_slider_3_element_image_preference:'all_posts';
	
	if($post_slider_3_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'EXISTS'
		),
		);
    }
	elseif($post_slider_3_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'Not EXISTS'
		),
		);
    }	
	
	if($post_slider_3_element_post_in_categories && !empty($post_slider_3_element_post_in_categories[0])) {
		
		$post_slider_3_element_post_in_categories1 = mazo_get_cat_id_by_slug($post_slider_3_element_post_in_categories,'category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'category',
		'field' => 'id',
		'terms' => $post_slider_3_element_post_in_categories1,
		'operator' => 'IN'
		); 
		$post_slider_3_element_post_in_categories = implode(',',$post_slider_3_element_post_in_categories);
    }
	
	if($post_slider_3_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
    }
	
	$query = new WP_Query($query_args);	
	
    
	$max_num_pages = $query->max_num_pages;	
	
	if($query->have_posts()) {
	$bg = '';
	if(empty($post_slider_3_element_bg_image['url'])){
	$bg = 'bg-dark';	
	}
   ?>
	<!-- Blog -->
	<div class="section-full <?php echo esc_attr($bg); ?> blog-section overflow-hidden content-inner-1 overlay-black-middle"  style="background-image: url('<?php if(!empty($post_slider_3_element_bg_image['url'])){ echo esc_url($post_slider_3_element_bg_image['url']); } ?>'); background-size: cover;">
		<div class="left-container">
			<div class="row align-items-center">
					<div class="col-lg-4 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
						<div class="section-head style-6">
							<?php if(!empty($post_slider_3_element_subtitle)){ ?>
							
							<h5 class="sub-title"><?php echo esc_html($post_slider_3_element_subtitle); ?></h5>
							<?php } if(!empty($post_slider_3_element_title)){ ?>
							
							<h2 class="title text-white"><?php echo esc_html($post_slider_3_element_title); ?></h2>
							
							<?php } if(!empty($post_slider_3_element_description)){ ?>
							<p class="text-white"><?php echo esc_html($post_slider_3_element_description); ?></p>
							<?php } ?>
						</div>
						<?php if($post_slider_3_element_btn_title){ ?>
							<a href="<?php the_permalink() ?>" class="btn btn-primary"><?php echo esc_html($post_slider_3_element_btn_title) ?></a>
						<?php } ?>
					</div>
						
				<div class="col-lg-8">
					<div class="blog-swiper-2 swiper-container">
						<div class="swiper-wrapper">
							<?php 
								while($query->have_posts()){
								$query->the_post();
								global $post;
								$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $post_slider_3_element_text_limit);
								$post_title =  ($post_slider_3_element_title_text_limit != 0) ? mazo_trim( $post->post_title , $post_slider_3_element_title_text_limit) : $post->post_title;
								
								?>
							<div class="swiper-slide aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
								<div class="dz-card blog-grid style-1 bg-white">
									<div class="dz-media dz-img-effect">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
									<div class="dz-info">
									<?php if(!empty(get_the_date())){ ?>
										<div class="dz-meta">
											<ul>
												<li class="post-date"><a href="javascript:void()"><i class="far fa-clock"></i><?php echo get_the_date() ?></a></li>
												<li class="post-comment"> <a href="javscript:void()"><i class="far fa-comment"></i><?php comments_number( '0', '1', '% ' ); ?></a> </li>
											</ul>
										</div>
									<?php } 
										if(!empty($post_title)){ ?>
										<h4 class="dz-title"> <a href="<?php the_permalink() ?>"><?php echo esc_html($post_title) ?></a></h4>
										<?php } 
										if(!empty($short_description)){ 	?>
											<p><?php echo esc_html($short_description) ?></p>
										<?php }
										if(!empty($post_slider_3_element_btn_title)){ ?>
										<a href="<?php the_permalink(); ?>" class="btn-link"><?php echo esc_html($post_slider_3_element_btn_title) ?> <i class="flaticon-right-arrow"></i></a>
									<?php } ?>
									</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
    
<?php } wp_reset_postdata(); ?>