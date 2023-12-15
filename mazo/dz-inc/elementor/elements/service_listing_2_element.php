<?php
	$blog_view = "service_listing_2";
	$page_no = 1;
	$post_type = 'dz_service';
	
	$query_args = array(	
		'post_type' 		=> $post_type,
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $service_listing_2_element_no_of_posts ,		
		'order' 			=> $service_listing_2_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($service_listing_2_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $service_listing_2_element_orderby;
	}

  
	$service_listing_2_element_image_preference = !empty($service_listing_2_element_image_preference)?$service_listing_2_element_image_preference:'all_posts';
	
	if($service_listing_2_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($service_listing_2_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	
	
	if($service_listing_2_element_posts_in_categories && !empty($service_listing_2_element_posts_in_categories[0])) {
		
		$service_listing_2_element_posts_in_categories1 = mazo_get_cat_id_by_slug($service_listing_2_element_posts_in_categories,'service_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'service_category',
		'field' => 'id',
		'terms' => $service_listing_2_element_posts_in_categories1,
		'operator' => 'IN'
		); 
		$service_listing_2_element_posts_in_categories = implode(',',$service_listing_2_element_posts_in_categories1);
	}
	
	if($service_listing_2_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	

	
	$query = new WP_Query($query_args);	
	
	$blog_view_container = '';
	if($service_listing_2_element_pagination_style == 'load_more')
	{
		$blog_view_container = $blog_view."_LoadMoreContainer";
	}
	
	global $mazo_query_result;
	$mazo_query_result['posts'] = $query->posts;	
	$mazo_query_result['posts_per_page'] = $service_listing_2_element_no_of_posts;	
	$mazo_query_result['current_page'] = $page_no;
	$mazo_query_result['title_text_limit'] = $service_listing_2_element_text_limit;
	$mazo_query_result['show_column'] = $service_listing_2_element_column;
	$mazo_query_result['blog_view_container'] = $blog_view_container;	
	$max_num_pages = $query->max_num_pages;
	if($query->have_posts()) {
		
		
?>
<!-- Blog -->
<div class="section-full content-inner bg-gray" id="DZServiceListingElement2" <?php if(!empty($service_listing_2_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($service_listing_2_element_bg_img['url']); ?>);" <?php } ?>>
	<div class="container">		
		<?php if(!empty($service_listing_2_element_title) || !empty($service_listing_2_element_subtitle)){ ?>    			        
			<div class="section-head text-center">
				<?php if(!empty($service_listing_2_element_subtitle)){ ?>
					<h5 class="title-small">
						<?php echo wp_kses($service_listing_2_element_subtitle,'string'); ?>
					</h5>
					<div class="dz-separator-outer">
						<div class="dz-separator bg-primary style-skew"></div>
					</div>
				<?php }?>
				<?php if(!empty($service_listing_2_element_title)){ ?>
					<h2 class="title"><?php echo wp_kses($service_listing_2_element_title,'string'); ?></h2>
				<?php }?>
			</div>
		<?php } ?>
		
		
		<!-- Left part start -->
			<div <?php if(!empty($blog_view_container)){ ?> id="<?php echo esc_attr($blog_view_container) ?>" <?php } ?> class="row">
				<?php get_template_part('dz-inc/elementor/ajax/service_listing_2_ajax'); ?>
			</div>
            <div class="row"> 
			<?php
				if($service_listing_2_element_pagination_style == 'load_more')
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
						data-posts-per-page="<?php echo esc_js($service_listing_2_element_no_of_posts);?>"
						data-only-featured-post="<?php echo esc_js($service_listing_2_element_only_featured_posts)?>" 
						data-post-order="<?php echo esc_js($service_listing_2_element_order)?>"	
						data-post-order-by="<?php echo esc_js($service_listing_2_element_orderby)?>"
						data-show-column="<?php echo esc_js($service_listing_1_element_column);?>"
						data-title-text-limit="<?php echo esc_js($service_listing_2_element_text_limit);?>"
						data-posts-in-categories="<?php echo esc_js($service_listing_2_element_posts_in_categories);?>"
						>
					<?php echo esc_html__('Load More', 'mazo'); ?> <i class="fa fa-refresh fas fa-spinner fa-spin"></i></a>
					</div>
					<!-- Pagination End -->
					<?php 
					}
				}
				?>
			
		</div>
    </div>
</div>
<?php } ?>