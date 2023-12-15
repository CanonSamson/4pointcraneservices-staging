<?php
	$query_args = array(
		'post_type' => 'dz_team',
		'post_status' => 'publish',
		'posts_per_page'   	=> $team_slider_1_element_no_of_posts ,	
		'orderby'=>$team_slider_1_element_orderby,
		'order'=>$team_slider_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($team_slider_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $team_slider_1_element_orderby;
	}			
	
	
	$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'EXISTS'
		),
	);	
	
	if($team_slider_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	if(!empty($team_slider_1_element_posts_in_categories))
	{			
		$team_slider_1_element_posts_in_categories = mazo_get_cat_id_by_slug($team_slider_1_element_posts_in_categories,'team_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'team_category',
		'field' => 'id',
		'terms' => $team_slider_1_element_posts_in_categories,
		'operator' => 'IN'
		); 
	}
	
	$query = new WP_Query($query_args);
	
	if(!empty($query->have_posts())){
	$section_class = '';
	$section_class .= !empty($team_slider_1_element_section_background)?' '.$team_slider_1_element_section_background:'bg-white ';	
	$section_class .= !empty($team_slider_1_element_section_padding)?' '.$team_slider_1_element_section_padding:'content-inner';
	
	if($team_slider_1_element_style=='style_1'){	
	?>

<!-- Team -->
<section class="<?php echo esc_attr($section_class); ?>" >
	<div class="container">
		<?php if(!empty($team_slider_1_element_title)){ ?>
			<div class="section-head style-1 text-center">
				<?php if(!empty($team_slider_1_element_subtitle)){ ?>
					<h6 class="sub-title text-primary">
						<?php echo wp_kses($team_slider_1_element_subtitle,'string'); ?>
					</h6>
				<?php } 
					if(!empty($team_slider_1_element_title)){	
				?>
				<h2 class="title">
					<?php echo wp_kses($team_slider_1_element_title,'string'); ?>
				</h2>
				<?php }?>
				<?php if(!empty($team_slider_1_element_description)){ ?>
					<p>
						<?php echo wp_kses($team_slider_1_element_description,'string'); ?>
					</p>
				<?php } ?>
			</div>
		<?php } ?>
		
		<div class="relative team-swiper-area">
			<div class="swiper-container team-swiper1 owl-btn-1 owl-btn-primary owl-btn-center-lr">
				<div class="swiper-wrapper">
					<?php
						$animate_time=200;
						while($query->have_posts())
						{ 
							$query->the_post();
							global $post ;
							$designation = mazo_get_post_meta(get_the_id(),'team_designation');	
							$team_social_data = mazo_get_team_social_link(get_the_id());							
							$animate_time += 200;
					?>
						<div class="swiper-slide">
							<div class="dz-team style-1 text-center overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
								<div class="dz-media">
									<?php the_post_thumbnail('mazo_500x650') ?>
								</div>
								 
								<div class="dz-content">
									<?php 											
										if($team_slider_1_element_show_social=='yes'){ 
											if($team_social_data['any_fill']){ 										
									?>
												<ul class="team-social">
													<?php
														foreach($team_social_data['data'] as $key => $value){
															if(!empty($value['url'])){
													?>
															<li>
																 <a class="<?php echo esc_attr($value['class']) ?>" target="_blank" href="<?php echo esc_url($value['url']); ?>"></a>
															</li>
													
													<?php   } 
													    } ?>
												</ul>
									<?php } } ?> 
									
									<h4 class="dz-name">
										<?php the_title(); ?>
									</h4>
									<h6 class="dz-position m-b0 text-primary">
										<?php echo esc_html($designation); ?>
									</h6>
								</div>
							</div>
						</div>	
					<?php } ?> 						
				</div>
			</div>
			<div class="btn-prev swiper-button-prev2"><i class="las la-arrow-left"></i></div>
			<div class="btn-next swiper-button-next2"><i class="las la-arrow-right"></i></div>
		</div>
	</div>
</section>

<?php } if($team_slider_1_element_style=='style_2'){ ?>
	<!-- Team -->
	<section class="<?php echo esc_attr($section_class); ?>" <?php if(!empty($team_slider_1_element_bg_img['url'])){ ?> 
			style="background-image:url(<?php echo esc_url($team_slider_1_element_bg_img['url']); ?>);background-position: left bottom ;background-size: 70%;background-repeat: no-repeat;" <?php } ?> id="DZTeamSliderElement2">
		<div class="container">
			<?php if(!empty($team_slider_1_element_title)){ ?>
				<div class="section-head style-1 text-center">
					<?php if(!empty($team_slider_1_element_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo wp_kses($team_slider_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($team_slider_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($team_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($team_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="swiper-container team-swiper2">
						<div class="swiper-wrapper">
							<?php
								$animate_time=200;
								while($query->have_posts())
								{ 
									$query->the_post();
									global $post ;
									$designation = mazo_get_post_meta(get_the_id(),'team_designation');	
									$team_social_data = mazo_get_team_social_link(get_the_id());
									
									$animate_time += 200;
							?>
								<div class="swiper-slide">
									<div class="dz-team style-3 text-center overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
										<?php if(has_post_thumbnail()) { ?> 
											<div class="dz-media">
												<?php the_post_thumbnail('mazo_500x650') ?>
												
												<?php 
													if($team_slider_1_element_show_social=='yes'){ 
														if($team_social_data['any_fill']){ 								
												?>
													<ul class="team-social">
														<li class="share"><i class="fas fa-plus"></i></li>
														<?php
															foreach($team_social_data['data'] as $key => $value){
																if(!empty($value['url'])){
														?>
																	<li>
																		 <a class="<?php echo esc_attr($value['class']) ?>" target="_blank" href="<?php echo esc_url($value['url']); ?>"></a>
																	</li>												
														<?php   } 
														    } ?>
													</ul>
												<?php } } ?>  
											</div>
										<?php } ?> 										
										<div class="dz-content m-t20">
											<h4 class="dz-name">
												<?php the_title(); ?>
											</h4>
											<h6 class="dz-position text-primary">
												<?php echo esc_html($designation); ?>
											</h6>
										</div>										
									</div>
								</div>	
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php } else if($team_slider_1_element_style=='style_3'){ ?>
	<!-- Team -->
<section class="<?php echo esc_attr($section_class); ?>" <?php if(!empty($team_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($team_slider_1_element_bg_img['url']); ?>);background-position: top right;background-repeat: no-repeat;background-size: 60%;" <?php } ?> id="DZTeamSliderElement3">
	<div class="container">
		<?php if(!empty($team_slider_1_element_title)){ ?>
			<div class="section-head style-2 text-center">
				<h2 class="title">
					<?php echo wp_kses($team_slider_1_element_title,mazo_allowed_html_tag()); ?>
				</h2>
				
				<?php if(!empty($team_slider_1_element_description)){ ?>
					<p>
						<?php echo wp_kses($team_slider_1_element_description,'string'); ?>
					</p>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-lg-12 m-b30">
				<div class="swiper-container team-swiper3">
					<div class="swiper-wrapper">
						<?php $animate_time=200;
							while($query->have_posts())
							{ 
								$query->the_post();
								global $post ;
								$designation = mazo_get_post_meta(get_the_id(),'team_designation');
								
								$animate_time += 200;
								$team_social_data = mazo_get_team_social_link(get_the_id());
						?>
							<div class="swiper-slide">
								<div class="dz-team style-4 text-center m-b30 overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
									<?php if(has_post_thumbnail()) { ?> 
										<div class="dz-media">
											<?php the_post_thumbnail() ?>
											
											<?php 
												if($team_slider_1_element_show_social=='yes'){ 
													if($team_social_data['any_fill']) { 
											?>
												<ul class="team-social">
													<?php foreach($team_social_data['data'] as $key => $value) {		
														if(!empty($value['url'])){
													?>
													<li>
														 <a class="<?php echo esc_attr($value['class']) ?>" target="_blank" href="<?php echo esc_url($value['url']); ?>"></a>
													</li>
													
													<?php 	} 
														}
													?>
												</ul>
											<?php } } ?> 
										</div>
									<?php } ?>
									<div class="dz-content m-t20">
										<h6 class="dz-position line text-primary"><?php echo esc_html($designation); ?></h6>
										<h5 class="dz-name">
											<?php the_title(); ?>
										</h5>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } else if($team_slider_1_element_style=='style_4') { 
	$fontsize = 'style-3';
	if(!empty($team_slider_1_element_heading_fontsize)){
		$fontsize = $team_slider_1_element_heading_fontsize;
	}
?>
	<!-- Team -->
	<section class="section-title <?php echo esc_attr($section_class); ?>" id="DZTeamSliderElement4">
		<div class="container">
			<?php if(!empty($team_slider_1_element_title)){ ?>
				<div class="section-head text-center <?php echo esc_attr($fontsize); ?>">
					<h2 class="title">
						<?php echo wp_kses($team_slider_1_element_title,mazo_allowed_html_tag()); ?>
					</h2>
			
					<?php if(!empty($team_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($team_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
		
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="swiper-container pagination-style1 team-swiper2">
						<div class="swiper-wrapper">
							<?php $animate_time=200;
								while($query->have_posts())
								{ 
									$query->the_post();
									global $post ;
									$designation = mazo_get_post_meta(get_the_id(),'team_designation');
									
									$animate_time += 200;
									$team_social_data = mazo_get_team_social_link(get_the_id());
							?>
								<div class="swiper-slide">
									<div class="dz-team style-5 text-center m-b30 overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
										<?php if(has_post_thumbnail()) { ?> 
											<div class="dz-media">
												<?php the_post_thumbnail() ?>
												
												<?php 
													if($team_slider_1_element_show_social=='yes'){ 
														if($team_social_data['any_fill']) { 
												?>
													<ul class="team-social">
														<?php foreach($team_social_data['data'] as $key => $value) {
														
															if(!empty($value['url'])){
														?>
														<li>
															 <a class="<?php echo esc_attr($value['class']) ?>" target="_blank" href="<?php echo esc_url($value['url']); ?>"></a>
														</li>
														
														<?php 	} 
															}
														?>
													</ul>
												<?php } } ?> 
											</div>
										<?php } ?>
										<div class="dz-content">
											<h5 class="dz-name">
												<?php the_title(); ?>
											</h5>
											<h6 class="dz-position text-primary">
												<?php echo esc_html($designation); ?>
											</h6>										
										</div>
									</div>
								</div>	
							<?php } ?>
						</div>
						<div class="swiper-pagination-team-2 text-center"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else if($team_slider_1_element_style=='style_5') { ?>
	<section class="section-title <?php echo esc_attr($section_class); ?>" id="DZTeamSliderElement5">
		<div class="container">
			<?php if(!empty($team_slider_1_element_title)){ ?>
				<div class="section-head style-1 text-center">
					<?php if(!empty($team_slider_1_element_subtitle)){ ?>
						<h6 class="sub-title text-primary">
							<?php echo wp_kses($team_slider_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($team_slider_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($team_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($team_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="row">
				<div class="col-lg-12 m-b10">
					<div class="swiper-container team-swiper">
						<div class="swiper-wrapper">
							<?php
								$animate_time=200;
								while($query->have_posts())
								{ 
									$query->the_post();
									global $post ;
									$designation = mazo_get_post_meta(get_the_id(),'team_designation');	
									$team_social_data = mazo_get_team_social_link(get_the_id());
									
									$animate_time += 200;
							?>
							
								<div class="swiper-slide">
									<div class="dz-team style-1 text-center m-b30 overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animate_time); ?>">
										<?php if(has_post_thumbnail()) { ?> 
											<div class="dz-media">
												<?php the_post_thumbnail('medium') ?>
												
												<?php 
													if($team_slider_1_element_show_social=='yes'){ 
														if($team_social_data['any_fill']){ 
													
												?>
													<ul class="team-social">
														<?php
															foreach($team_social_data['data'] as $key => $value){
																if(!empty($value['url'])){
														?>
														<li>
															 <a class="<?php echo esc_attr($value['class']) ?>" target="_blank" href="<?php echo esc_url($value['url']); ?>"></a>
														</li>
														
														<?php } 
														} ?>
													</ul>
												<?php } } ?>  
											</div>
										<?php } ?> 
										
										<div class="dz-content">
											<h5 class="dz-name">
												<?php the_title(); ?>
											</h5>
											<h6 class="dz-position text-primary">
												<?php echo esc_html($designation); ?>
											</h6>
										</div>
									</div>
								</div>	
						<?php } ?> 	
						</div>
						<div class="swiper-pagination2 text-center"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else if($team_slider_1_element_style=='style_6') { ?>
	<div class="section-full <?php echo esc_attr($section_class); ?> overlay-primary-dark" id="DZTeamSliderElement6" <?php if(!empty($team_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($team_slider_1_element_bg_img['url']); ?>);" <?php } ?>>
		<div class="container-fluid">
		<?php if(!empty($team_slider_1_element_title) || !empty($team_slider_1_element_subtitle)){ ?>
			<div class="row">
				<div class="section-head text-center text-white col-md-12 style-1">
					<?php if(!empty($team_slider_1_element_subtitle)){ ?>
						<h5 class="title-small">
							<?php echo wp_kses($team_slider_1_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					<div class="dz-separator-outer">
						<div class="dz-separator bg-white style-skew"></div>
					</div>
					<?php if(!empty($team_slider_1_element_title)){ ?>
						<h3 class="title">
							<?php echo wp_kses($team_slider_1_element_title,'string'); ?>
						</h3>
					<?php } ?>
				</div>
			</div>
        <?php }	?>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="team-swiper4 swiper-container">
					<div class="swiper-wrapper">
						<?php
							while($query->have_posts())
							{
								$query->the_post();
								global $post ;
								$designation = mazo_get_post_meta(get_the_id(),'team_designation');	
								$team_social_data = mazo_get_team_social_link(get_the_id());
						?>
							<div class="swiper-slide">
								<div class="team-box1">
									<div class="team-member">
										<?php 
											if(has_post_thumbnail()) { 
												the_post_thumbnail('medium');
											}
										?>
										
										<?php 
											if($team_slider_1_element_show_social=='yes'){ 
												if($team_social_data['any_fill']){ 
										?>                                    
											<ul class="member-social list-inline">
												<?php
													foreach($team_social_data['data'] as $key => $value){
														if(!empty($value['url'])){
												?>
														<li>
															<a href="<?php echo esc_url($value['url']); ?>" class="<?php echo esc_attr($value['class']) ?>"></a>
														</li>
												<?php } 
													} 
												?>
											</ul>                                    
										<?php } } ?>
									</div>
									<div class="member-info text-white">
										<h3>
											<?php the_title(); ?> 
											<span>
												<?php echo esc_html($designation); ?>
											</span>
										</h3>
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
<?php } else if($team_slider_1_element_style=='style_7') { ?>
		<!-- Our Team -->
	<div class="section-full overflow-hidden content-inner-2 bg-img-fix bg-white" id="dzTeam">
		<div class="container">
			<?php if(!empty($team_slider_1_element_title) || !empty($team_slider_1_element_subtitle)){ ?>
				<div class="section-head style-6  text-center">
					<?php if(!empty($team_slider_1_element_subtitle)){ ?>
					<h5 class="sub-title"><?php echo esc_html($team_slider_1_element_subtitle) ?></h5>
					<?php } if(!empty($team_slider_1_element_title)){ ?>
					<h2 class="title"><?php echo esc_html($team_slider_1_element_title) ?></h2>
					<?php } if(!empty($team_slider_1_element_description)){ ?>	
					<p><?php echo esc_html($team_slider_1_element_description) ?></p>
					<?php } ?>
				</div>
			<?php } ?>	
			<div class="team-swiper6 swiper-container">
				<div class="swiper-wrapper">
					<?php 
					while($query->have_posts()){ 
						$query->the_post();
						global $post ;
						$designation = mazo_get_post_meta(get_the_id(),'team_designation');	
						$team_social_data = mazo_get_team_social_link(get_the_id());
					?>
			
					<div class="swiper-slide">
						<div class="dz-box m-b30 dz-team style-7">							
							<div class="dz-media dz-media-right">
								
									<?php the_post_thumbnail('full'); ?>
								
							</div>
							<?php if($team_slider_1_element_show_social=='yes'){  ?>
							<ul class="dz-social-icon">
									<?php
									foreach($team_social_data['data'] as $key => $value){
										if(!empty($value['url'])){
										?>
										<li>
											 <a class="<?php echo esc_attr($value['class']) ?>" target="_blank" href="<?php echo esc_url($value['url']); ?>"></a>
										</li>
									<?php   } 
										} 
									?>
							</ul>
							<?php } ?>
							<div class="dz-info">
								   <h4 class="dz-title m-0"><a href="javascript:void();"><?php the_title(); ?></a></h4>
								<?php if(!empty($designation)){ ?>	
								<h6 class="dz-position m-b0 "><?php echo esc_html($designation); ?></h6>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<?php } 



 } wp_reset_postdata(); ?>