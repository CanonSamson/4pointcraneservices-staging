<?php
	$current_page 		 = $GLOBALS['mazo_query_result']['current_page'];
	$posts_per_page 	 = $GLOBALS['mazo_query_result']['posts_per_page']; 
	$current_post_number = (($current_page * $posts_per_page ) - $posts_per_page ) + 1;
	$blog_view_container = $GLOBALS['mazo_query_result']['blog_view_container'];
	$element_style 		 = $GLOBALS['mazo_query_result']['element_style'];
	$show_share 		 = $GLOBALS['mazo_query_result']['show_share'];
	$posts 				 = $GLOBALS['mazo_query_result']['posts']; /*NOTE - DO NOT PUT THIS LINE ABOVE OTHERWISE IT WILL GIVE NOTICE */
	
	$animation_time = 200;
	
	foreach ( $posts as $post ){ 
		
		$post_id  = $post->ID; 
		$post_title = (has_post_thumbnail()) ? mazo_trim(get_the_title(), 7) : get_the_title();
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		
		/* implement post layout icons on listing post */
		$post_setting = get_post_meta($post_id, '_post_settings', true);
		$author_name = get_the_author_meta('display_name', $post->post_author);
		$is_featured_post = isset($post_setting['is_featured_post']) ? $post_setting['is_featured_post'] : 0 ;
		
		$animation_time += 200;
		$views_arr = get_post_meta($post_id,'_views_count');
		$views = (isset($views_arr[0]))?$views_arr[0]:0;
		
		$no_image_class = (!has_post_thumbnail()) ? 'no-image-box' : '';
		
		$designation = mazo_get_post_meta(get_the_id(),'team_designation');
		
		$team_social_data = mazo_get_team_social_link(get_the_id());
	?>

<!-- Team -->

<?php if($element_style=='style_1'){	?>
	<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-4 col-sm-6' . $no_image_class); ?>>
		<div class="dz-team style-1 text-center overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
			<?php if(has_post_thumbnail()) { ?>
				<div class="dz-media">
					<?php the_post_thumbnail('mazo_500x650'); ?>
				</div>
			<?php } ?>
			<div class="dz-content">
				<?php 	if($show_share=='yes'){ 
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
				<?php   	}   
						} ?> 
				
				<h4 class="dz-name">
					<?php the_title(); ?>
				</h4>
				<h6 class="dz-position m-b0 text-primary">
					<?php echo esc_html($designation); ?>
				</h6>
			</div>
		</div>
	</div>
	<?php } else if($element_style=='style_2') {	?>
	<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-4 col-sm-6' . $no_image_class); ?>>
		<div class="dz-team style-2 overlay-shine aos-item m-b50" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
			<?php if(has_post_thumbnail()) { ?>
				<div class="dz-media">
					<?php the_post_thumbnail('mazo_500x650'); ?>
				</div>
			<?php } ?>
			<div class="dz-content">
				<div class="cleafix">
					<h4 class="dz-name">
						<?php the_title(); ?>
					</h4>
					<h6 class="dz-position m-b0">
						<?php echo esc_html($designation); ?>
					</h6>
				</div>
				<?php 
						if($show_share=='yes'){ 
							if($team_social_data['any_fill']) { ?>
								<ul class="team-social">
									<?php
										foreach($team_social_data['data'] as $key => $value){
											if(!empty($value['url'])){
									?>
										<li>
											<a href="<?php echo esc_url($value['url']); ?>" target="_blank">
												<i class="<?php echo esc_attr($value['class']) ?>"></i>
											</a>
										</li>
								<?php }
									} ?>
								</ul>
				<?php } } ?> 
			</div>
		</div>
	</div>
	<?php } else if($element_style=='style_3') { 
	
	?>
	<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-3 col-sm-6 m-b30' . $no_image_class); ?>>
		<div class="dz-team style-3 text-center overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
			<?php if(has_post_thumbnail()) { ?>
				<div class="dz-media">
					<?php the_post_thumbnail('mazo_500x650'); ?>
					
					<?php 
					
						if($show_share=='yes'){ 
							if($team_social_data['any_fill']) { ?>
								<ul class="team-social">
									<li class="share"><i class="fas fa-plus"></i></li>
									<?php
										foreach($team_social_data['data'] as $key => $value){
											if(!empty($value['url'])){
									?>
										<li>
											<a href="<?php echo esc_url($value['url']); ?>" target="_blank">
												<i class="<?php echo esc_attr($value['class']) ?>"></i>
											</a>
										</li>
								<?php }
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
	<?php } else if($element_style=='style_4') { ?>
		<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-4 col-sm-6' . $no_image_class); ?>>
			<div class="dz-team style-5 text-center m-b30 overlay-shine aos-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($animation_time); ?>">
				<?php if(has_post_thumbnail()) { ?>
					<div class="dz-media">
						<?php the_post_thumbnail('mazo_500x650'); ?>
						
						<?php 
							if($show_share=='yes'){ 
								if($team_social_data['any_fill']) { ?>
									<ul class="team-social">
										<?php
											foreach($team_social_data['data'] as $key => $value){
												if(!empty($value['url'])){
										?>
											<li>
												<a href="<?php echo esc_url($value['url']); ?>" target="_blank">
													<i class="<?php echo esc_attr($value['class']) ?>"></i>
												</a>
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
	<?php } else if($element_style=='style_5') { ?>
		<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-3 col-sm-6' . $no_image_class); ?>>
			<div class="dz-team style-4 text-center m-b30 overlay-shine aos-item">
				<?php if(has_post_thumbnail()) { ?>
					<div class="dz-media">
						<?php the_post_thumbnail('mazo_500x650'); ?>
						
						<?php 
							if($show_share=='yes'){ 
								if($team_social_data['any_fill']) { ?>
									<ul class="team-social">
										<?php
											foreach($team_social_data['data'] as $key => $value){
												if(!empty($value['url'])){
										?>
											<li>
												<a href="<?php echo esc_url($value['url']); ?>" target="_blank">
													<i class="<?php echo esc_attr($value['class']) ?>"></i>
												</a>
											</li>
									<?php }
										} ?>
									</ul>
						<?php } } ?> 
					</div>
				<?php } ?>
				<div class="dz-content m-t20">
					<h6 class="dz-position line text-primary">
						<?php echo esc_html($designation); ?>
					</h6>
					<h5 class="dz-name">
						<?php the_title(); ?>
					</h5>
				</div>
			</div>
		</div>
	<?php } else if($element_style=='style_6') { ?>
		<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-3 col-md-6 col-sm-6 wow fadeInUp' . $no_image_class); ?>  data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="dz-box m-b30 dz-team9">
				<?php if(has_post_thumbnail()) { ?>
					<div class="dz-media dz-media-right">
						<?php the_post_thumbnail('mazo_500x650'); ?>
					
						<?php 
							if($show_share=='yes'){ 
								if($team_social_data['any_fill']) { ?>
									<div class="dz-info-has">
										<ul class="dz-social-icon">
											<?php
											foreach($team_social_data['data'] as $key => $value){
												if(!empty($value['url'])){
										?>
											<li>
												<a class="site-button <?php echo esc_attr($value['class']) ?>" href="<?php echo esc_url($value['url']); ?>" target="_blank">
												</a>
											</li>
										<?php }
											} ?>
										</ul>
									</div>
						<?php } } ?> 
						<div class="clearfix">
							<h4 class="dz-title">
								<?php the_title(); ?>
							</h4>
						</div>
					</div>
				<?php } ?> 
			</div>
		</div>
	<?php } else if($element_style=='style_7') { ?>
		<div id="post-<?php the_ID(); ?>" <?php echo post_class('col-lg-3 col-md-6 col-sm-6 ' . $no_image_class); ?>>
			<div class="dz-box m-b50 dz-team10">
				<div class="dz-media">
					<?php if(has_post_thumbnail()) { ?>
							<?php the_post_thumbnail('mazo_500x650'); ?>
					<?php }?>
				</div>
				<div class="dz-info">
					<h4 class="dz-title">
						<?php the_title(); ?>
					</h4>
					<?php if(!empty($designation)) {?>
						<span class="dz-position"><?php echo esc_html($designation); ?></span>
					<?php }?>
					
					<?php 
						if($show_share=='yes'){ 	
							if($team_social_data['any_fill']) {?>
								<ul class="dz-social-icon">
									<?php
										foreach($team_social_data['data'] as $key => $value){
											if(!empty($value['url'])){
										?>
												<li><a class="site-button <?php echo esc_attr($value['class']) ?>" href="<?php echo esc_url($value['url']); ?>"></a></li>
										<?php }
										}
										?>
								</ul>
					<?php } } ?>
				</div>
			</div>
		</div>
	<?php } ?>
		
	<?php 
	} 
	wp_reset_postdata();
?>