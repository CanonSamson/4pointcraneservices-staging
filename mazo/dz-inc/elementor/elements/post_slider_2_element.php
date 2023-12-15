<?php
	
	$allowed_html_tag = mazo_allowed_html_tag();
	$page_no = 1;
	$post_type = 'post';
	
	$query_args = array(	
	'post_type' 		=> $post_type,
	'post_status' 		=> 'publish',
	'posts_per_page'   	=> $post_slider_2_element_no_of_posts ,		
	'order' 			=> $post_slider_2_element_order,
	'ignore_sticky_posts' => true,
	);
	
	if($post_slider_2_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
    }
	else{
		$query_args['orderby']	= $post_slider_2_element_orderby;
    }
	
	
	$post_slider_2_element_image_preference = !empty($post_slider_2_element_image_preference)?$post_slider_2_element_image_preference:'all_posts';
	
	if($post_slider_2_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'EXISTS'
		),
		);
    }
	elseif($post_slider_2_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'Not EXISTS'
		),
		);
    }	
	
	if($post_slider_2_element_posts_in_categories && !empty($post_slider_2_element_posts_in_categories[0])) {
		
		$post_slider_2_element_posts_in_categories1 = mazo_get_cat_id_by_slug($post_slider_2_element_posts_in_categories,'category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'category',
		'field' => 'id',
		'terms' => $post_slider_2_element_posts_in_categories1,
		'operator' => 'IN'
		); 
		$post_slider_2_element_posts_in_categories = implode(',',$post_slider_2_element_posts_in_categories);
    }
	
	if($post_slider_2_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
    }
	
	$query = new WP_Query($query_args);	
	
    
	$max_num_pages = $query->max_num_pages;	
	
	if($query->have_posts()) {
    
    if (!empty($post_slider_2_element_link_title))
    {
        $btn_link = !empty($post_slider_2_element_link)?$post_slider_2_element_link:'';
        $btn_text = !empty($post_slider_2_element_link_title)?$post_slider_2_element_link_title:'';	
        
        $anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
    }
    	$class =  ($post_slider_2_element_show_subscriber_box == 'yes') ? "col-lg-4 col-md-6 col-sm-6" : "col-lg-6 col-md-6 col-sm-6";
        
    
    ?>
	<!-- Blog -->
<div class="section-full content-inner bg-white"  id="DZPostSlider2" <?php if (!empty($post_slider_2_element_bg_img['id'])){ ?> style="background-image:url(<?php echo esc_url($post_slider_2_element_bg_img['url']); ?>);" <?php } ?>>
    <div class="container">
        
        <?php if(!empty($post_slider_2_element_title) || !empty($post_slider_2_element_subtitle)){ ?>
            <div class="row">
                <div class="col-lg-12 section-head text-left style-1">
                    <?php if(!empty($post_slider_2_element_subtitle)){ ?>
                        <h5 class="title-small">
							<?php echo wp_kses($post_slider_2_element_subtitle,'string'); ?>
						</h5>
                    <?php } ?>
                    <div class="dz-separator-outer">
                        <div class="dz-separator bg-primary style-skew"></div>
                    </div>
                    <?php if(!empty($post_slider_2_element_title) || !empty($btn_text)){ ?>
                        <h3 class="title">
                            <?php if(!empty($post_slider_2_element_title)){ ?>
                                <?php echo wp_kses($post_slider_2_element_title,'string'); ?>
                            <?php }?>
                            
                            <?php if(!empty($btn_text)) { ?>
                                <a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute);?>  class="btn btn-primary float-end btn-sm d-md-block d-none"><?php echo esc_html($btn_text); ?></a>
                            <?php } ?>
                        </h3>
                    <?php }?>
                </div>
            </div>
        <?php } ?>
      
        <div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 m-b30">
				<div class="blog-swiper2 swiper-container">
					<div class="swiper-wrapper">
						<?php 
							$count=1;
							while($query->have_posts())
							{ 
								$query->the_post();
								global $post ;
								
								$author_name = get_the_author_meta('display_name', $post->post_author);
								$email = get_the_author_meta('user_email', $post->post_author);
								$avatar = get_avatar( $email, 200 );                        
								$post_id = get_the_id();
								$cat_arr = get_the_terms($post_id , 'category');
								$post_thumbnail = get_the_post_thumbnail_url();
								
						?>
						<div class="swiper-slide">  
							<div class="blog-post trending-post text-center">
									<div class="dz-media dz-img-effect mheight-lg" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>></div>							
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
									<div class="dz-title">
										<span class="post-tag"> 
											<?php echo mazo_get_cpt_category($cat_arr); ?>
										</span>
										<h4 class="dz-title">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h4>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>         
					</div>
				</div>
			</div>
				<?php if($post_slider_2_element_show_subscriber_box == 'yes') {?>
					<div class="col-lg-4 col-md-12 col-sm-12 m-b30">
						<div class="newsletter-box text-white">
							<div class="icon-bx-wraper left">
							<?php if(!empty($post_slider_2_element_subscribe_icon['value']))  {
									$icon_name = $post_slider_2_element_subscribe_icon['value'];
								?>
								<div class="icon-bx-sm bg-white radius text-primary m-b20"> 
									<a href="#" class="icon-cell text-primary"><i class="<?php echo esc_attr($icon_name); ?>"></i></a> 
								</div>
							<?php }?>    
								<?php if(!empty($post_slider_2_element_subscribe_title)) {?>
								<div class="icon-content">
									<h5 class="dz-tilte"><?php echo wp_kses($post_slider_2_element_subscribe_title,'string'); ?></h5>
								</div>
								<?php }?>
							</div>
							<?php if(!empty($post_slider_2_element_subscribe_description)) {?>
								<p><?php echo wp_kses($post_slider_2_element_subscribe_description,'string'); ?></p>
							<?php }?>
							<form class="dzSubscribe dz-subscription" action="#" method="post">
								<div class="dzSubscribeMsg dz-subscription-msg"></div>
								<input name="dzEmail" required="required"  class="form-control" placeholder="<?php echo esc_attr__('Your Email Address','mazo'); ?>" type="email">
								<span class="input-group-btn">
									<button name="submit" value="Submit" type="submit" class="btn btn-outline-light"><?php echo esc_html__('Subscribe','mazo'); ?></button>
								</span>
							</form>
						</div>
					</div>
				<?php } ?>
				
			
			</div>
		</div>
    </div>
</div>
    
<?php } wp_reset_postdata(); ?>