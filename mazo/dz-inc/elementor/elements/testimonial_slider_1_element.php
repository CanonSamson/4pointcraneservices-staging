<?php
	$query_args = array(
	'post_type' => 'dz_testimonial',
	'post_status' => 'publish',
	'posts_per_page'   	=> $testimonial_slider_1_element_no_of_posts ,	
	'orderby'=>$testimonial_slider_1_element_orderby,
	'order'=>$testimonial_slider_1_element_order,
	'ignore_sticky_posts' => true,
	);
	
	
	$testimonial_slider_1_element_image_preference = !empty($testimonial_slider_1_element_image_preference)?$testimonial_slider_1_element_image_preference:'all_posts';
	
	if($testimonial_slider_1_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($testimonial_slider_1_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	
	if($testimonial_slider_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	if(!empty($testimonial_slider_1_element_posts_in_categories))
	{			
		
		$testimonial_slider_1_element_posts_in_categories = mazo_get_cat_id_by_slug($testimonial_slider_1_element_posts_in_categories,'testimonial_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'testimonial_category',
		'field' => 'id',
		'terms' => $testimonial_slider_1_element_posts_in_categories,
		'operator' => 'IN'
		); 
	}
	$query = new WP_Query($query_args);
	$section_class = '';
	$section_class .= !empty($testimonial_slider_1_element_section_background)?' '.$testimonial_slider_1_element_section_background:'bg-white';
	$class = ($testimonial_slider_1_element_img_position=='left')?'left':'';
	
if(!empty($query->have_posts())){
	if($testimonial_slider_1_element_style=='style_1'){
?>	
<!-- Testimonials -->
<section class="test-area1 <?php echo esc_attr($class.' '.$section_class); ?>" >
	<div class="container">
		<div class="row">
			<?php if (!empty($testimonial_slider_1_element_image['url']) && $testimonial_slider_1_element_img_position=='left')
				{
					$image_url = $testimonial_slider_1_element_image['url'];
			?>
				<div class="col-md-6">
					<div class="media-full">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
			<div class="col-md-6 aos-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="600">
				<div class="content-inner-1">
					<?php if(!empty($testimonial_slider_1_element_title)){ ?>
						<div class="section-head style-1">
							<?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
								<h6 class="sub-title text-primary">
									<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
								</h6>
							<?php } ?>
							
							<h2 class="title">
								<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
							</h2>
							
							<?php if(!empty($testimonial_slider_1_element_description)){ ?>
								<p>
									<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
								</p>
							<?php } ?>
						</div>
					<?php } ?>
					
					<div class="testi-inner">
						<div class="swiper-container testimonial-swiper1">
							<div class="swiper-wrapper">
								<?php
									while($query->have_posts())
									{ 
										$query->the_post();
										global $post ;							
										$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
										$content_text_limit = $testimonial_slider_1_element_text_limit;
										$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
										
								?>
									<div class="swiper-slide">
										<div class="testimonial-1">
											<div class="testimonial-text">
												<p>
													<?php echo esc_html($short_description); ?>
												</p>
											</div>
											<div class="testimonial-detail">
												<?php if(has_post_thumbnail()) { ?>  
													<div class="testimonial-pic">
														<?php the_post_thumbnail('thumbnail'); ?> 
													</div>
												<?php }	?>
												<div class="clearfix">
													<h4 class="testimonial-name">
														<?php echo the_title();?>
													</h4> 
													
													<span class="testimonial-position">
														<?php echo esc_html($designation); ?>
													</span>
													 
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if (!empty($testimonial_slider_1_element_image['url']) && $testimonial_slider_1_element_img_position=='right')
				{
					$image_url = $testimonial_slider_1_element_image['url'];
			?>
				<div class="col-md-6">
					<div class="media-full">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr__('Image', 'mazo'); ?>"/>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>	
</section>

<?php } else if($testimonial_slider_1_element_style=='style_2'){ ?>

<!-- Testimonials -->
<section class="content-inner-1 <?php echo esc_attr($section_class); ?> <?php if(!empty($testimonial_slider_1_element_bg_img['url'])){ echo 'overlay-black-dark bg-img-fixed'; } ?>" id="DZTestimonialSliderElement2" <?php if(!empty($testimonial_slider_1_element_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($testimonial_slider_1_element_bg_img['url']); ?>);" <?php } ?>>
	<div class="container">
		<?php if(!empty($testimonial_slider_1_element_title)){ ?>
			<?php if(!empty($testimonial_slider_1_element_bg_img['url'])){ ?>
				<div class="section-head style-5 text-center text-white">
			<?php } else {  ?>
				<div class="section-head style-2 text-center">
			<?php }  ?>
				<?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
					<h6 class="sub-title text-primary">
						<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
					</h6>
				<?php } ?>
				
				<?php if(!empty($testimonial_slider_1_element_bg_img['url'])){ ?>
					<h2 class="title text-white">
				<?php } else {  ?>
					<h2 class="title">
				<?php }  ?>
					<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
				</h2>
				
				<?php if(!empty($testimonial_slider_1_element_description)){ ?>
					<p>
						<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
					</p>
				<?php } ?>
			</div>
		<?php } ?>
	
		<div class="swiper-container testimonial-swiper2">
			<div class="swiper-wrapper">
				<?php $animation_time=200;
					while($query->have_posts())
					{ 
						$query->the_post();
						global $post ;							
						$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
						$content_text_limit = $testimonial_slider_1_element_text_limit;
						$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
						$animation_time += 200;
						
				?>
					<div class="swiper-slide">
						<div class="testimonial-2">
							<div class="testimonial-text">
								<p>
									<?php echo esc_html($short_description); ?>
								</p>
							</div>
							<div class="testimonial-detail">
								<div class="clearfix m-b15">
									<h4 class="testimonial-name">
										<?php echo the_title();?>
									</h4> 
									
									<span class="testimonial-position text-primary">
										<?php echo esc_html($designation); ?>
									</span> 
								</div>
								<?php if(has_post_thumbnail()) {  ?>
									<div class="testimonial-pic">
										<?php the_post_thumbnail('thumbnail'); ?> 
									</div>
								<?php }	?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="swiper-pagination swiper-pagination-bullets"></div>
		</div>
	</div>	
</section>

<?php } else if($testimonial_slider_1_element_style=='style_3'){ ?>
	<!-- Testimonials -->
	<section class="content-inner section-title style-1 <?php echo esc_attr($section_class); ?>" <?php if(!empty($testimonial_slider_1_element_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($testimonial_slider_1_element_bg_img['url']); ?>);" <?php } ?> id="DZTestimonialSliderElement3">
		<div class="container">
			<?php if(!empty($testimonial_slider_1_element_title)){ ?>
				<div class="row ">
					<div class="section-head style-1 text-center">
						<?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
							<h6 class="sub-title text-primary">
								<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<h2 class="title">
							<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
						</h2>
						
						<?php if(!empty($testimonial_slider_1_element_description)){ ?>
							<p>
								<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
							</p>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
				
			<div class="row">
				<div class="col-lg-12 m-b20">
					<div class="swiper-container testimonial-swiper3">
						<div class="swiper-wrapper">
							<?php $count=1;
								while($query->have_posts())
								{ 
									$query->the_post();
									global $post ;							
									$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
									$rating = mazo_get_post_meta(get_the_id(),'testimonial_rating');
									$rating_title = mazo_get_post_meta(get_the_id(),'testimonial_rating_title');
									$content_text_limit = $testimonial_slider_1_element_text_limit;
									$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
									
							?>
								<div class="swiper-slide aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
									<div class="testimonial-3">
										<div class="testimonial-pic">
											<?php if(has_post_thumbnail()) 
												{  
													the_post_thumbnail('thumbnail'); 
												} 
											?>
											<div class="info">
												<h5 class="testimonial-name">
													<?php echo the_title();?>
												</h5> 
												
												<span class="testimonial-position text-primary">
													<?php echo esc_html($designation); ?>
												</span> 
												 
											</div>
										</div>
										<div class="testimonial-info">
											<div class="testimonial-text">
												<p>
													<?php echo esc_html($short_description); ?>
												</p>
											</div>
											
											<?php if(!empty($rating)){ ?>
												<div class="testimonial-review">
													<ul class="star-rating text-primary">
														<?php 
														$star_count = $rating;
														for($star=1;$star<=5;$star++){ 
															 if($star<=$star_count){
															echo "<li><i class='fa fa-star'></i></li>";
														  }
														  else{
															  echo "<li><i class='fa fa-star-o'></i></li>";
														  }
														}		
														?>
														
															
													</ul>
													<h4 class="review">
														<?php echo esc_html($rating_title); ?>
													</h4>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Add Navigation -->
						<div class="swiper-pagination1 text-center"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } else if($testimonial_slider_1_element_style=='style_4') { ?>
	<section class="content-inner <?php echo esc_attr($section_class); ?>" id="DZTestimonialSliderElement4">
		<div class="container">
			<div class="row section-head-bx align-items-center">
					<div class="col-md-8">
						<?php if(!empty($testimonial_slider_1_element_title)){ ?>
							<div class="section-head style-1">
								<h2 class="title">
									<?php echo wp_kses($testimonial_slider_1_element_title,mazo_allowed_html_tag()); ?>
								</h2>
								
								<?php if(!empty($testimonial_slider_1_element_description)){ ?>
									<p>
										<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
									</p>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<div class="col-md-4 text-end">
					<div class="testimonial-swiper-2 m-b30">
						<!-- Add Navigation -->
						<div class="btn-prev swiper-button-prev3"><i class="las la-long-arrow-alt-left"></i></div>
						<div class="btn-next swiper-button-next3"><i class="las la-long-arrow-alt-right"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 m-b20">
					<div class="swiper-container testimonial-swiper4">
						<div class="swiper-wrapper">
							<?php 
								$count=1;
								$animate_time = 0;
								while($query->have_posts())
								{ 
									$query->the_post();
									global $post ;							
									$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
									$rating = mazo_get_post_meta(get_the_id(),'testimonial_rating');
									$content_text_limit = $testimonial_slider_1_element_text_limit;
									$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
									
							?>
								<div class="swiper-slide">
									<div class="testimonial-4 aos-item">
										<div class="testimonial-info m-b20">
											<div class="testimonial-text">
												<?php if(!empty($rating)){ ?>
													<ul class="star-rating text-primary m-b15">
														<?php 
															$star_count = $rating;
															for($star=1;$star<=5;$star++){ 
																 if($star<=$star_count){
																echo "<li><i class='fas fa-star'></i></li>";
															  }
															  else{
																  echo "<li><i class='far fa-star'></i></li>";
															  }
															}		
														?>
													</ul>
												<?php } ?>
												
												<p>
													<?php echo esc_html($short_description); ?>
												</p>
											</div>
										</div>
										<div class="testimonial-detail">
											<?php if(has_post_thumbnail()) { ?>
												<div class="testimonial-pic m-r20">
													<?php the_post_thumbnail('thumbnail') ?>
												</div>	
											<?php } ?>
											
											<div>
												<h5 class="testimonial-name">
													<?php echo the_title();?>
												</h5> 
												<span class="testimonial-position text-primary">
													<?php echo esc_html($designation); ?>
												</span> 
											</div>
										</div>
									</div>
								</div>
							<?php $count++; } ?>	
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else if($testimonial_slider_1_element_style=='style_5') { ?>
	<!-- Testimonials -->
		<section class="content-inner-2 <?php echo esc_attr($section_class); ?>" id="DZTestimonialSliderElement5">
			<div class="container">
				<?php if(!empty($testimonial_slider_1_element_title)){ ?>
					<div class="row ">
						<div class="section-head style-2 text-center">
							<?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
								<h6 class="sub-title text-primary">
									<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
								</h6>
							<?php } ?>
							
							<h2 class="title">
								<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
							</h2>
							
							<?php if(!empty($testimonial_slider_1_element_description)){ ?>
								<p>
									<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
								</p>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				
				<div class="row">
					<div class="col-lg-12 m-b20">
						<div class="swiper-container pagination-style1 testimonial-swiper5">
							<div class="swiper-wrapper">
								<?php $animation_time=200;
									while($query->have_posts())
									{ 
										$query->the_post();
										global $post ;							
										$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
										$rating = mazo_get_post_meta(get_the_id(),'testimonial_rating');
										$rating_title = mazo_get_post_meta(get_the_id(),'testimonial_rating_title');
										$content_text_limit = $testimonial_slider_1_element_text_limit;
										$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
										$animation_time += 200;
										
								?>
									<div class="swiper-slide aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
										<div class="testimonial-5">
											<?php if(has_post_thumbnail()) {  ?>
												<div class="testimonial-pic">
													<?php the_post_thumbnail('thumbnail'); ?> 
												</div>
											<?php }	?>
											<div class="testimonial-info">
												<div class="testimonial-review">
													<ul class="star-rating text-primary">
														<?php 
															$star_count = $rating;
															for($star=1;$star<=5;$star++){ 
																 if($star<=$star_count){
																echo "<li><i class='fa fa-star'></i></li>";
															  }
															  else{
																  echo "<li><i class='fa fa-star-o'></i></li>";
															  }
															}		
														?>
													</ul>
												</div>
												<div class="testimonial-text">
													<p>
														<?php echo esc_html($short_description); ?>
													</p>
												</div>
												<div class="info">
													<h5 class="testimonial-name">
														<?php echo the_title();?>
													</h5> 
													
													<span class="testimonial-position text-primary">
														<?php echo esc_html($designation); ?>
													</span> 
													 
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
							<!-- Add Navigation -->
							<div class="swiper-pagination5  swiper-pagination text-center"></div>
						</div>
					</div>
				</div>
			</div>
		</section>	
<?php } else if($testimonial_slider_1_element_style=='style_6') { ?>
	<!-- Testimonial -->
	<div class="section-full content-inner-1 bg-primary" id="DZTestimonialSliderElement6" <?php if(!empty($testimonial_slider_1_element_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($testimonial_slider_1_element_bg_img['url']); ?>);" <?php } ?>>
		<div class="container">
			<?php if(!empty($testimonial_slider_1_element_title)){ ?>
				<div class="row">
					<div class="col-lg-12 section-head text-center style-1 text-white">
						<?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
							<h6 class="title-small">
								<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<div class="dz-separator-outer">
							<div class="dz-separator bg-white style-skew"></div>
						</div>
						<h3 class="title">
							<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
						</h3>
						
						<?php if(!empty($testimonial_slider_1_element_description)){ ?>
							<p>
								<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
							</p>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial-swiper6 swiper-container">
						<div class="swiper-wrapper">
							<?php
								while($query->have_posts())
								{ 
									$query->the_post();
									global $post ;							
									$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
									$rating = mazo_get_post_meta(get_the_id(),'testimonial_rating');
									$rating_title = mazo_get_post_meta(get_the_id(),'testimonial_rating_title');
									$content_text_limit = $testimonial_slider_1_element_text_limit;
									$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
									
							?>
									<div class="swiper-slide">
										<div class="testimonial-box1">
											<div class="testimonial-top">
												<?php if(has_post_thumbnail()) {  ?>
													<div class="testimonial-pic radius">
														<?php the_post_thumbnail('thumbnail'); ?> 
													</div>
												<?php }	?>
												
												<div class="testimonial-detail"> 
													<strong class="testimonial-name">
														<?php echo the_title();?>
													</strong> 
													
													<span class="testimonial-position">
														<?php echo esc_html($designation); ?>
													</span> 
													
													<ul class="star-review">
														<?php 
															$star_count = $rating;
															for($star=1;$star<=5;$star++){ 
																 if($star<=$star_count){
																echo "<li><i class='fa fa-star'></i></li>";
															  }
															  else{
																  echo "<li><i class='fa fa-star-o'></i></li>";
															  }
															}		
														?>
													</ul>
												</div>
											</div>
											<div class="testimonial-text">
												<p>
													<?php echo esc_html($short_description); ?>
												</p>
											</div>
											<div class="testimonial-quote">
												<i class="fa fa-quote-right"></i>
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
	<!-- Testimonial End -->
<?php } else if($testimonial_slider_1_element_style=='style_7') { ?>
	<div class="section-full content-inner-1" id="DZTestimonialSliderElement7" <?php if (!empty($testimonial_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($testimonial_slider_1_element_bg_img['url']); ?>);background-repeat:no-repeat;background-position:center" <?php } ?>>
    <div class="container">        
        <?php if(!empty($testimonial_slider_1_element_title) || !empty($testimonial_slider_1_element_subtitle)){ ?>
            <div class="section-head text-center  style-1">
                <?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
                    <h5 class="title-small">
						<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
					</h5>
					<div class="dz-separator-outer">
						<div class="dz-separator bg-primary style-skew"></div>
					</div>
                <?php }?>
				<h3 class="title">
					<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
				</h3>
				<?php if(!empty($testimonial_slider_1_element_description)){ ?>
					<p>
						<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
					</p>
				<?php } ?>
            </div>
        <?php }?>
    
     
        <div class="testimonial-area8 position-relative">
			<div class="testimonial-swiper8 swiper-container">            
				<div class="swiper-wrapper">
					<?php 
						$count=1;
						while($query->have_posts())
						{
							$query->the_post();
							$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
							$content_text_limit = $testimonial_slider_1_element_text_limit;
							$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
					?>
							<div class="swiper-slide">
								<div class="testimonial-6">
									<div class="testimonial-text">
										<p>
											<?php echo esc_html($short_description); ?>
										</p>
									</div>
									<div class="testimonial-detail clearfix">
										<?php if(has_post_thumbnail()) {?>
											<div class="testimonial-pic radius">
												<?php the_post_thumbnail('thumbnail');  ?>
											</div>
										<?php }	?>    
										<div class="info">
											<strong class="testimonial-name">
												<?php echo the_title();?>
											</strong> 
											<span class="testimonial-position">
												<?php echo esc_html($designation); ?>
											</span>
										</div> 
									</div>
								</div>
							</div>
					<?php }	?>
				</div>
			</div>
        </div>
    </div>
</div>
<?php } else if($testimonial_slider_1_element_style=='style_8') { ?>
	<div class="section-full bg-gray content-inner-1 overlay-primary-dark" id="DZTestimonialSliderElement8" <?php if (!empty($testimonial_slider_1_element_bg_img['id'])){ ?> style="background-image:url(<?php echo esc_url($testimonial_slider_1_element_bg_img['url']); ?>);" <?php } ?>>
        <div class="container">
            <div class="row">
                <?php if(!empty($testimonial_slider_1_element_title) || !empty($testimonial_slider_1_element_subtitle)){ ?>
                    <div class="col-lg-12 section-head text-center text-white style-1">
                        <?php if(!empty($testimonial_slider_1_element_subtitle)){ ?>
                            <h5 class="title-small">
								<?php echo wp_kses($testimonial_slider_1_element_subtitle,'string'); ?>
							</h5>
							<div class="dz-separator-outer">
								<div class="dz-separator bg-white style-skew"></div>
							</div>
                        <?php } ?>
						
						<h3 class="title">
							<?php echo wp_kses($testimonial_slider_1_element_title,'string'); ?>
						</h3>
						
						<?php if(!empty($testimonial_slider_1_element_description)){ ?>
							<p>
								<?php echo wp_kses($testimonial_slider_1_element_description,'string'); ?>
							</p>
						<?php } ?>                        
                    </div>
				<?php }	?>
				
                <div class="col-lg-12">
                    <div class="section-content">
                        <div class="testimonial-swiper7 swiper-container">
							<div class="swiper-wrapper">                     
								<?php 
									$count=1;
									while($query->have_posts())
									{
										$query->the_post();
										$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
										$content_text_limit = $testimonial_slider_1_element_text_limit;
										$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
								?>							
									<div class="swiper-slide">
										<div class="testimonial-15">
											<div class="testimonial-text">
												<p><?php echo esc_html($short_description); ?></p>
											</div>
											<div class="testimonial-detail clearfix">
											<?php if(has_post_thumbnail()) {?>
												<div class="testimonial-pic radius"><?php the_post_thumbnail('thumbnail');  ?></div>
											<?php }?>
												<div class="testimonial-info">
													<strong class="testimonial-name"><?php echo the_title();?></strong>
													<span class="testimonial-position"><?php echo esc_html($designation); ?></span> 
												</div>
											</div>
										</div>
									</div>
								<?php }	?> 
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }  else if($testimonial_slider_1_element_style== 'style_9'){ ?>
	<!-- Testimonial -->
	<div class="section-full overflow-hidden content-inner-1" id="dzClient">
		<div class="container overflow-hidden">
				<?php if(!empty($testimonial_slider_1_element_subtitle) || !empty($testimonial_slider_1_element_title)){ ?>
				<div class=" section-head style-6 text-center">
				<?php if(!empty($testimonial_slider_1_element_subtitle)){ ?> 
					<h6 class="sub-title"><?php echo esc_html($testimonial_slider_1_element_subtitle) ?></h6>	
				<?php }  if(!empty($testimonial_slider_1_element_title)){ ?>		
					<h2 class="title"><?php echo esc_html($testimonial_slider_1_element_title) ?></h2>
				<?php } ?>
				
				<?php if(!empty($testimonial_slider_1_element_description)){ ?>		
					<p class="description"><?php echo esc_html($testimonial_slider_1_element_description) ?></p>
				<?php } ?>
				</div>
				<?php } ?>
			<div class="testimonial-area9 position-relative">
				<div class="swiper testimonial-swiper9 position-relative">
					<div class="swiper-wrapper">
						<?php 
							while($query->have_posts()){
							$query->the_post();
							global $post ;							

							$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
							$content_text_limit = $testimonial_slider_1_element_text_limit;
							$short_description = mazo_short_description(get_the_excerpt(), get_the_content(), $content_text_limit);
						if(!empty($short_description)){
						?>
						<div class="swiper-slide">
							<div class="testimonial-7">
								<?php if(!empty($short_description)){ ?>
								<div class="testimonial-text">
									<p><?php echo esc_html($short_description) ?></p>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php }
						} ?>	
					</div>
					<div class="testimonial-nav9">
						<div class="swiper-button-prev testimonial-prev9"><i class="las la-arrow-left"></i></div>
						<div class="swiper-button-next testimonial-next9"><i class="las la-arrow-right"></i></div>
					</div>
				</div>
			</div>
			<div class="swiper testimonial-swiper9-thumb">
				<div class="swiper-wrapper justify-content-center">
					<?php 
						while($query->have_posts()){
						$query->the_post();
						global $post ;							
						
						$designation = mazo_get_post_meta(get_the_id(),'testimonial_designation');
						$thumbnail = get_the_post_thumbnail();
						if(!empty($thumbnail)){
						?>
					<div class="swiper-slide ">
						<div class="thumb-bx">
							<div class="media">
								<?php the_post_thumbnail('medium'); ?>
							</div>
							<div class="content-info">
								<h4 class="title m-0"><?php the_title() ?></h4>
								<?php if(!empty($designation)){ ?>
									<p><?php echo esc_html($designation) ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php }
					} ?>
				</div>
			</div>
		</div>
	</div>
		
<?php }
} ?>