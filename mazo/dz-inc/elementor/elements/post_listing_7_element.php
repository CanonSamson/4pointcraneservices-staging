<?php
	$blog_view = "post_listing_7";
	$page_no = 1;
	
	$query_args = array(	
		'post_type' 		=> 'post',
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $post_listing_7_element_no_of_posts ,		
		'order' 			=> $post_listing_7_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($post_listing_7_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $post_listing_7_element_orderby;
	}

  
	$post_listing_7_element_image_preference = !empty($post_listing_7_element_image_preference)?$post_listing_7_element_image_preference:'all_posts';
	
	if($post_listing_7_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($post_listing_7_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	if($post_listing_7_element_posts_in_categories && !empty($post_listing_7_element_posts_in_categories[0])) {
		$post_listing_7_element_posts_in_categories = implode(',',$post_listing_7_element_posts_in_categories);
		$query_args['category_name'] = $post_listing_7_element_posts_in_categories;
	}
	
	if($post_listing_7_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	$query = new WP_Query($query_args);	
	
	$blog_view_container = '';
	if($post_listing_7_element_pagination_style == 'load_more')
	{
		$blog_view_container = $blog_view."_LoadMoreContainer";
	}
	
	global $mazo_query_result;
	$mazo_query_result['posts'] = $query->posts;	
	$mazo_query_result['posts_per_page'] = $post_listing_7_element_no_of_posts;	
	$mazo_query_result['current_page'] = $page_no;
	$mazo_query_result['title_text_limit'] = $post_listing_7_element_text_limit;

	$mazo_query_result['blog_view_container'] = $blog_view_container;	
	$max_num_pages = $query->max_num_pages;	
	
	if($query->have_posts()) {
?>
<!-- Blog -->
<div class="section-full content-inner bg-white" id="DZPostListingElement7" <?php if (!empty($post_listing_7_element_bg_img['id'])){ ?> style="background-image:url(<?php echo esc_url($post_listing_7_element_bg_img['url']); ?>);" <?php } ?>>
  <div class="container">    
		<?php if(!empty($post_listing_7_element_title) || !empty($post_listing_7_element_subtitle)){ ?>
			<div class="row">
				<div class="col-lg-12 section-head text-center style-1">
					<?php if(!empty($post_listing_7_element_subtitle)){ ?>
						<h5 class="title-small">
							<?php echo wp_kses($post_listing_7_element_subtitle,'string'); ?>
						</h5>
						<div class="dz-separator-outer">
							<div class="dz-separator bg-primary style-skew"></div>
						</div>
					<?php }?>
					<?php if(!empty($post_listing_7_element_title)){ ?>
						<h3 class="title">
							<?php echo wp_kses($post_listing_7_element_title,'string'); ?>
						</h3>
					<?php }?>
				</div>
			</div>
		<?php } ?>
         
        <div <?php if(!empty($blog_view_container)){ ?> id="<?php echo esc_attr($blog_view_container) ?>" <?php } ?> class="row">
        <?php get_template_part('dz-inc/elementor/ajax/post_listing_7_ajax'); ?>
        </div>
        <!-- Side bar END -->
        <div class="row">
      <?php
				if($post_listing_7_element_pagination_style == 'load_more')
				{	
					$blog_view_btn = $blog_view."_LoadMoreBtn";
					$blog_view_container = $blog_view."_LoadMoreContainer";
					
					if( 1 < $max_num_pages ) 
					{ 
					?>
					<!-- Pagination start -->
					<div class="reload-btn text-center mb-4">
					<a href="javascript:void(0);" class="btn shadow-primary btn-primary btn-rounded btn-ov-secondary loadmore-btn dz-load-more" id="<?php echo esc_attr($blog_view_btn); ?>"   
						data-ajax-container = "<?php echo esc_js($blog_view_container); ?>"					
						data-blog-view = "<?php echo esc_js($blog_view);?>" 
						data-max-num-pages="<?php echo esc_js($max_num_pages);?>" 
						data-posts-per-page="<?php echo esc_js($post_listing_7_element_no_of_posts);?>"
						data-image-preference="<?php echo esc_js($post_listing_7_element_image_preference); ?>"
						data-only-featured-post="<?php echo esc_js($post_listing_7_element_only_featured_posts)?>" 
						data-post-order="<?php echo esc_js($post_listing_7_element_order)?>"	
						data-post-order-by="<?php echo esc_js($post_listing_7_element_orderby)?>"	
						data-posts-in-categories="<?php echo esc_js($post_listing_7_element_posts_in_categories);?>"
						data-title-text-limit="<?php echo esc_js($post_listing_7_element_text_limit);?>" 
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