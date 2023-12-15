<?php
	$query_args = array(	
		'post_type' 		=> 'post',
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $post_slider_1_element_no_of_posts ,		
		'order' 			=> $post_slider_1_element_order,
		'ignore_sticky_posts' => true,
	);
	$title_text_limit = $post_slider_1_element_text_limit;
	if($post_slider_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $post_slider_1_element_orderby;
	}
	if($post_slider_1_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($post_slider_1_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	if($post_slider_1_element_only_featured_posts == 'true') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	if($post_slider_1_element_posts_in_categories) {
		$post_slider_1_element_posts_in_categories = implode(',',$post_slider_1_element_posts_in_categories);
		$query_args['category_name'] = $post_slider_1_element_posts_in_categories;
	}
	$fontsize = 'style-3';
	if(!empty($post_slider_1_element_heading_fontsize)){
		$fontsize = $post_slider_1_element_heading_fontsize;
	}
	$query = new WP_Query($query_args);	
	
	if($query->have_posts()) {

	
	if($post_slider_1_element_style=='style_1'){
?>
<!-- Blog -->
	<section class="content-inner" id="DZPostSliderElement1">
		<div class="container">
			<?php if(!empty($post_slider_1_element_title)){ ?>
				<div class="section-head style-2 text-center">
					<?php if(!empty($post_slider_1_element_subtitle)){ ?>
						<h6 class="sub-title">
							<?php echo wp_kses($post_slider_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($post_slider_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($post_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($post_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="swiper-container blog-swiper">
				<div class="swiper-wrapper">
					<?php 
						while($query->have_posts())
						{	
						  $query->the_post();
						  global $post;						
						  $post_title =  mazo_trim(get_the_title(),8);		
						  $author_name = get_the_author_meta('display_name', $post->post_author);	
						  $short_description =  !empty($title_text_limit) ? mazo_trim(get_the_content() , $title_text_limit) : get_the_content();
					
					?>
						<div class="swiper-slide">
							<div class="dz-card blog-grid style-2 text-center m-b10">
								<div class="dz-media">
									<a href="<?php echo esc_url(get_permalink()); ?>">
										<?php the_post_thumbnail('medium'); ?>
									</a> 
								</div>
								<div class="dz-info">
									<div class="dz-meta">
										<ul>
											<li class="post-date">
												<i class="flaticon-calendar"></i> 
												<?php echo esc_html(get_the_date('M j, Y')); ?>
											</li>
										</ul>
									</div>
									<h4 class="dz-title">
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php echo esc_html($post_title); ?>
										</a>
									</h4>
									<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link">
										<i class="flaticon-chevron"></i> 
										<?php echo esc_html('READ MORE','mazo'); ?>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	
<?php } else if($post_slider_1_element_style=='style_2'){  ?>
	<!-- Blog -->
	<section class="content-inner-1 line-img" <?php if(!empty($post_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($post_slider_1_element_bg_img['url']); ?>); background-position:right top; background-size:70%; background-repeat:no-repeat;" <?php } ?> id="DZPostSliderElement2">
		<div class="container">
			<?php if(!empty($post_slider_1_element_title)){ ?>
				<div class="section-head text-center <?php echo esc_attr($fontsize); ?>">
					<?php if(!empty($post_slider_1_element_subtitle)){ ?>
						<h6 class="sub-title">
							<?php echo wp_kses($post_slider_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($post_slider_1_element_title,mazo_allowed_html_tag()); ?>
					</h2>
					<?php if(!empty($post_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($post_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="blog-area">
				<div class="swiper-container blog-swiper">
					<div class="swiper-wrapper">
						<?php 							
							$animate_time = 0;
							while($query->have_posts())
							{	
							  $query->the_post();
							  global $post;						
							  $post_title =  mazo_trim(get_the_title(),8);		
							  $author_name = get_the_author_meta('display_name', $post->post_author);	
							  $short_description =  !empty($title_text_limit) ? mazo_trim(get_the_content() , $title_text_limit) : get_the_content();						  
							  $animate_time += 200;						
						?>
							<div class="swiper-slide">
								<div class="dz-card blog-grid style-4 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
									<div class="dz-media">
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php the_post_thumbnail('medium'); ?>
										</a> 
									</div>
									<div class="dz-info">
										<div class="dz-meta">
											<ul>
												<li class="post-date">
													<?php echo esc_html(get_the_date('M j, Y')); ?>
												</li>
												<li class="post-user"><?php esc_html_e('By', 'mazo'); ?> <a href="<?php echo esc_url(get_author_posts_url( $post->post_author )); ?>">
												<?php echo esc_html($author_name);?></a>
												</li>
											</ul>
										</div>
										<h5 class="dz-title">
											<a href="<?php echo esc_url(get_permalink()); ?>">
												<?php echo esc_html($post_title); ?>
											</a>
										</h5>
										<div class="dz-post-text text">
											<p>
												<?php echo esc_html( $short_description );?>
											</p>
										</div>
										<a href="<?php echo esc_url(get_permalink()); ?>" class="btn shadow-primary icon-btn btn-primary"><i class="fas fa-caret-right"></i></a>
									</div>
								</div>
							</div>
						 <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>	
<?php } else if($post_slider_1_element_style=='style_3'){  ?>
	<!-- Blog -->
	<div class="section-full content-inner-1 bg-white" id="DZPostSliderElement3">
		<div class="container">
			<?php if(!empty($post_slider_1_element_title)){ ?>
				<div class="row">
					<div class="col-lg-12 section-head text-center style-1">
						<?php if(!empty($post_slider_1_element_subtitle)){ ?>
							<h6 class="title-small">
								<?php echo wp_kses($post_slider_1_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<div class="dz-separator-outer">
							<div class="dz-separator bg-primary style-skew"></div>
						</div>
						<h3 class="m-b0">
							<?php echo wp_kses($post_slider_1_element_title,'string'); ?>
						</h3>
					</div>
				</div>
			<?php } ?>
			
			<div class="blog-swiper swiper-container">
				<div class="swiper-wrapper">
					<?php 						
						while($query->have_posts()){	
							$query->the_post();
							global $post;						
							$post_title =  mazo_trim(get_the_title(),8);	
							
							$author_name = get_the_author_meta('display_name', $post->post_author);
							$email = get_the_author_meta('user_email', $post->post_author);
							$avatar = get_avatar( $email, 200 );
							
							$post_id = get_the_id();
							$cat_arr = get_the_terms($post_id , 'category');
							$post_thumbnail = get_the_post_thumbnail_url();
							$short_description =  !empty($title_text_limit) ? mazo_trim(get_the_content() , $title_text_limit) : get_the_content();	
					?>
						<div class="swiper-slide">
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
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Blog End -->
<?php } else {  ?>
	<!-- Blog -->
	<div class="section-full content-inner-1 bg-white" id="DZPostSliderElement4" <?php if(!empty($post_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($post_slider_1_element_bg_img['url']); ?>); background-position:right top; background-size:70%; background-repeat:no-repeat;" <?php } ?>>
		<div class="container">
			<?php if(!empty($post_slider_1_element_title)){ ?>
				<div class="row">
					<div class="col-lg-12 section-head text-center style-1">
						<?php if(!empty($post_slider_1_element_subtitle)){ ?>
							<h6 class="title-small">
								<?php echo wp_kses($post_slider_1_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<div class="dz-separator-outer">
							<div class="dz-separator bg-primary style-skew"></div>
						</div>
						<h3 class="m-b0">
							<?php echo wp_kses($post_slider_1_element_title,'string'); ?>
						</h3>
					</div>
				</div>
			<?php } ?>
			
			<div class="blog-swiper3 swiper-container">
				<div class="swiper-wrapper">
					<?php 						
						while($query->have_posts()){	
							$query->the_post();
							global $post;						
							$post_title =  mazo_trim(get_the_title(),8);	
							
							$author_name = get_the_author_meta('display_name', $post->post_author);
							$email = get_the_author_meta('user_email', $post->post_author);
							$avatar = get_avatar( $email, 200 );
							
							$post_id = get_the_id();
							$cat_arr = get_the_terms($post_id , 'category');
							$post_thumbnail = get_the_post_thumbnail_url();
							$short_description =  !empty($title_text_limit) ? mazo_trim(get_the_content() , $title_text_limit) : get_the_content();	
					?>
						<div class="swiper-slide">
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
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Blog End -->
<?php } } wp_reset_postdata(); ?>