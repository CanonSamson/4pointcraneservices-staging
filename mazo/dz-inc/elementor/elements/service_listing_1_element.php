<?php
	$blog_view = "service_listing_1";
	$page_no = 1;
	$post_type = 'dz_service';
	
	$query_args = array(	
		'post_type' 		=> $post_type,
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $service_listing_1_element_no_of_posts ,		
		'order' 			=> $service_listing_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($service_listing_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $service_listing_1_element_orderby;
	}

  
	$service_listing_1_element_image_preference = !empty($service_listing_1_element_image_preference)?$service_listing_1_element_image_preference:'all_posts';
	
	if($service_listing_1_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($service_listing_1_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	
	
	if($service_listing_1_element_posts_in_categories) {
		
		$service_listing_1_element_posts_in_categories1 = mazo_get_cat_id_by_slug($service_listing_1_element_posts_in_categories,'service_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'service_category',
		'field' => 'id',
		'terms' => $service_listing_1_element_posts_in_categories1,
		'operator' => 'IN'
		); 
		$service_listing_1_element_posts_in_categories = implode(',',$service_listing_1_element_posts_in_categories);
	}
	
	
	
	if($service_listing_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	$category_arr = array();
	if(!empty($service_listing_1_element_posts_in_categories)) 
	{		
		$category_arr = get_terms( array(
		'taxonomy' => 'service_category',
		'include' => $service_listing_1_element_posts_in_categories,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $service_listing_1_element_order, 
        ) ); 
	}
	
	$query = new WP_Query($query_args);	
	
	$blog_view_container = '';
	if($service_listing_1_element_pagination_style == 'load_more')
	{
		$blog_view_container = $blog_view."_LoadMoreContainer";
	}
	
	global $mazo_query_result;
	$mazo_query_result['posts'] = $query->posts;	
	$mazo_query_result['posts_per_page'] = $service_listing_1_element_no_of_posts;	
	$mazo_query_result['current_page'] = $page_no;
	$mazo_query_result['title_text_limit'] = $service_listing_1_element_text_limit;
	$mazo_query_result['show_column'] = $service_listing_1_element_column;
	$mazo_query_result['element_style'] = $service_listing_1_element_style;
	$mazo_query_result['blog_view_container'] = $blog_view_container;	
	$max_num_pages = $query->max_num_pages;	
	$allowed_html_tag = mazo_allowed_html_tag();
	if($service_listing_1_element_style=='style_1'){
		$section_class = '';
		$section_class .= 'service-area-1';
		$section_class .= !empty($service_listing_1_element_section_padding)?' '.$service_listing_1_element_section_padding:'';
		$class = 'row';
	}else{
		$section_class = '';
		$section_class .= 'clearfix';
		$section_class .= !empty($service_listing_1_element_section_padding)?' '.$service_listing_1_element_section_padding:'';
		$class = 'row';
		
	}
	
	$bg_class = ($service_listing_1_element_style=='style_4')?'overflow-hidden':'';
	$bg_class2 = ($service_listing_1_element_style=='style_6')?'services-box-area':'';
	$background_class = '';
	$background_class .= !empty($service_listing_1_element_section_background)?' '.$service_listing_1_element_section_background:'bg-white';
	
	/* section class */
	$combine_class = $bg_class.' '.$section_class.' '.$bg_class2.' '.$background_class;
	
	$mp_class = ($service_listing_1_element_margin_padding=='yes')?'spno':'';
	$service_class = $service_listing_1_element_class;
	
	$fontsize = 'style-1';
	if(!empty($service_listing_1_element_heading_fontsize)){
		$fontsize = $service_listing_1_element_heading_fontsize;
	}
	if($query->have_posts()) {
?>
<!-- Blog -->
<section class="<?php echo esc_attr($combine_class); ?> " id="DZServiceListingElement" <?php if($service_listing_1_element_style=='style_3' || $service_listing_1_element_style=='style_6' && !empty($service_listing_1_element_bg_img['url'])){ ?>  style="background-image: url(<?php echo esc_url($service_listing_1_element_bg_img['url']); ?>);" <?php } elseif($service_listing_1_element_style=='style_4' && !empty($service_listing_1_element_bg_img['url'])) { ?> style="background-image: url(<?php echo esc_url($service_listing_1_element_bg_img['url']); ?>);  background-repeat: repeat-x; background-position: bottom;" <?php } ?>>
	<?php if($service_listing_1_element_show_experience=='yes'){ ?>
		<div class="container position-relative">
			<div class="year-exp aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
				<?php if(!empty($service_listing_1_element_year)){ ?>
					<h2 class="year text-primary">
						<?php echo wp_kses($service_listing_1_element_year,'string'); ?>
					</h2>
				<?php } ?>
				<?php if(!empty($service_listing_1_element_year_title)){ ?>
					<h4 class="text">
						<?php echo wp_kses($service_listing_1_element_year_title,$allowed_html_tag); ?>
					</h4>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	<div class="container">
		<?php if(!empty($service_listing_1_element_title) && $service_listing_1_element_style=='style_1'){ ?>
			<div class="row align-items-center section-head style-1">
				<div class="col-lg-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
					<?php if(!empty($service_listing_1_element_subtitle)){ ?>
						<h5 class="text-primary sub-title">
							<?php echo wp_kses($service_listing_1_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($service_listing_1_element_title,'string'); ?>
					</h2>
				</div>
				<?php if(!empty($service_listing_1_element_description)){ ?>
					<div class="col-lg-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
						<p class="m-b0">
							<?php echo wp_kses($service_listing_1_element_description,'string'); ?>
						</p>
					</div>
				<?php } ?>
			</div>
		<?php } else if(!empty($service_listing_1_element_title) && $service_listing_1_element_style=='style_6'){ 
			$text_color  = '';
			$text_color .= (!empty($service_listing_1_element_bg_img['id']))?' text-white':'';
		?>
				<div class="row">
					<div class="col-lg-12 section-head text-center style-1 <?php echo esc_attr($text_color); ?>">
						<?php if(!empty($service_listing_1_element_subtitle)){ ?>
							<h6 class="title-small">
								<?php echo wp_kses($service_listing_1_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						
						<div class="dz-separator-outer">
							<div class="dz-separator bg-primary style-skew"></div>
						</div>
						<h3 class="title">
							<?php echo wp_kses($service_listing_1_element_title,'string'); ?>
						</h3>
						<?php if(!empty($service_listing_1_element_description)){ ?>
							<p>
								<?php echo wp_kses($service_listing_1_element_description,'string'); ?>
							</p>
						<?php } ?>
					</div>
				</div>
			<?php } else { ?>	
			<?php if(!empty($service_listing_1_element_title)){ ?>
				<div class="section-head text-center <?php echo esc_attr($fontsize); ?>">	
					<?php if(!empty($service_listing_1_element_subtitle)){ ?>
						<h6 class="text-primary sub-title">
							<?php echo wp_kses($service_listing_1_element_subtitle,'string'); ?>
						</h6>
					<?php } ?>
			
					<h2 class="title">
						<?php echo wp_kses($service_listing_1_element_title,'string'); ?>
					</h2>
					<?php if(!empty($service_listing_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($service_listing_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
		<?php } } ?>	
			<!-- Left part start -->
			<div <?php if(!empty($blog_view_container)){ ?> id="<?php echo esc_attr($blog_view_container) ?>" <?php } ?> class="<?php echo esc_attr($class.' '.$mp_class.' '.$service_class); ?>">
				<?php get_template_part('dz-inc/elementor/ajax/service_listing_1_ajax'); ?>
			</div>
			<?php
				if($service_listing_1_element_pagination_style == 'load_more')
				{	
					$blog_view_btn = $blog_view."_LoadMoreBtn";
					$blog_view_container = $blog_view."_LoadMoreContainer";
					
					if( 1 < $max_num_pages ) 
					{ 
					?>
					<!-- Pagination start -->
					<div class="reload-btn text-center mb-4">
					<a href="javascript:void(0);" class="btn shadow-primary btn-primary btn-rounded btn-ov-secondary loadmore-btn dz-load-more " id="<?php echo esc_attr($blog_view_btn); ?>"   
						data-ajax-container = "<?php echo esc_js($blog_view_container); ?>"					
						data-post-type = "<?php echo esc_js($post_type);?>" 
						data-blog-view = "<?php echo esc_js($blog_view);?>" 
						data-max-num-pages="<?php echo esc_js($max_num_pages);?>" 
						data-posts-per-page="<?php echo esc_js($service_listing_1_element_no_of_posts);?>"
						data-only-featured-post="<?php echo esc_js($service_listing_1_element_only_featured_posts)?>" 
						data-post-order="<?php echo esc_js($service_listing_1_element_order)?>"	
						data-post-order-by="<?php echo esc_js($service_listing_1_element_orderby)?>"	
						data-title-text-limit="<?php echo esc_js($service_listing_1_element_text_limit);?>"
						data-show-column="<?php echo esc_js($service_listing_1_element_column);?>"
						data-element-style="<?php echo esc_js($service_listing_1_element_style);?>"
						data-posts-in-categories="<?php echo esc_js($service_listing_1_element_posts_in_categories);?>"
						>
					<?php echo esc_html__('Load More', 'mazo'); ?> <i class="fa fa-refresh fas fa-spinner fa-spin"></i></a>
					</div>
					<!-- Pagination End -->
					<?php 
					}
				}
				?>
        <!-- Side bar END -->
    </div>
</section>
<?php } ?>