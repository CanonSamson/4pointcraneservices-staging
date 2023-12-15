<?php
	$blog_view = "portfolio_listing_1";
	$page_no = 1;
	$post_type = 'dz_portfolio';
	
	$query_args = array(	
		'post_type' 		=> $post_type,
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $portfolio_listing_1_element_no_of_posts ,		
		'order' 			=> $portfolio_listing_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($portfolio_listing_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $portfolio_listing_1_element_orderby;
	}

  
	$portfolio_listing_1_element_image_preference = !empty($portfolio_listing_1_element_image_preference)?$portfolio_listing_1_element_image_preference:'all_posts';
	
	if($portfolio_listing_1_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($portfolio_listing_1_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	
	
	if($portfolio_listing_1_element_posts_in_categories) {
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'portfolio_category',
		'field' => 'slug',
		'terms' => $portfolio_listing_1_element_posts_in_categories,
		'operator' => 'IN'
		); 
		$portfolio_listing_1_element_posts_in_categories = implode(',',$portfolio_listing_1_element_posts_in_categories);
	}
	
	if($portfolio_listing_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	$query = new WP_Query($query_args);	
	
	$category_arr = array();
	if($portfolio_listing_1_element_style == 'style_1' && !empty($portfolio_listing_1_element_posts_in_categories)) 
	{		
		$portfolio_listing_1_element_posts_in_categories1 = mazo_get_cat_id_by_slug($portfolio_listing_1_element_posts_in_categories,'portfolio_category');
		
		$category_arr = get_terms( array(
		'taxonomy' => 'portfolio_category',
		'include' => $portfolio_listing_1_element_posts_in_categories1,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $portfolio_listing_1_element_order, 
        ) ); 
	}
	
	
	$blog_view_container = '';
	if($portfolio_listing_1_element_pagination_style == 'load_more')
	{
		$blog_view_container = $blog_view."_LoadMoreContainer";
	}
	
	global $mazo_query_result;
	$mazo_query_result['posts'] = $query->posts;	
	$mazo_query_result['posts_per_page'] = $portfolio_listing_1_element_no_of_posts;	
	$mazo_query_result['title_text_limit'] = $portfolio_listing_1_element_text_limit;	
	$mazo_query_result['element_style'] = $portfolio_listing_1_element_style;
	$mazo_query_result['current_page'] = $page_no;

	$mazo_query_result['blog_view_container'] = $blog_view_container;	
	$max_num_pages = $query->max_num_pages;	
	$section_class = '';	
	$section_class .= !empty($portfolio_listing_1_element_section_padding)?' '.$portfolio_listing_1_element_section_padding:'content-inner-2';
	if($query->have_posts()) {
?>
<!-- Blog -->
<section class="<?php echo esc_attr($section_class); ?>" id="DZPortfolioListingElement4">   
		<?php if(!empty($portfolio_listing_1_element_title) && $portfolio_listing_1_element_style=='style_3'){ ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 section-head style-1">
						<?php if(!empty($portfolio_listing_1_element_subtitle)){ ?>
							<h6 class="title-small">
								<?php echo wp_kses($portfolio_listing_1_element_subtitle,'string'); ?>
							</h6>
						<?php } ?>
						<div class="dz-separator-outer">
							<div class="dz-separator bg-primary style-skew"></div>
						</div>
						<h3 class="title">
							<?php echo wp_kses($portfolio_listing_1_element_title,'string'); ?>
						</h3>
					</div>
				</div>
			</div>
		<?php } else { ?>	
		<div class="container">
			<div class="row ">
		<?php if(!empty($portfolio_listing_1_element_title)){ ?>
			<div class="col-md-12">
				<div class="section-head style-1 text-center">
					<?php if(!empty($portfolio_listing_1_element_subtitle)){ ?>
						<h5 class="text-primary sub-title">
							<?php echo wp_kses($portfolio_listing_1_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($portfolio_listing_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($portfolio_listing_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($portfolio_listing_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			</div>
		<?php } } ?>
		
		
		
		<?php if($portfolio_listing_1_element_style == 'style_1' && !empty($category_arr)) { ?>
			<div class="col-md-12">
				<div class="site-filters style-1 clearfix center">
					<ul class="filters" data-toggle="buttons">
						<li class="btn active" data-filter="all">
							<input type="radio" value="all" >
							<a href="#"><?php echo esc_html__('All','mazo'); ?></a> 
						</li>
						
						<?php foreach($category_arr as $key => $cat_obj) { ?>  
							<li data-filter="<?php echo esc_attr($cat_obj->slug); ?>" class="btn">
								<input type="radio" value="<?php echo esc_attr($cat_obj->slug); ?>">
								<a href="#"><?php echo esc_html($cat_obj->name); ?></a> 
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php 
		if($portfolio_listing_1_element_style == 'style_1'){
			$container_class = 'row masonry'; 
		}elseif($portfolio_listing_1_element_style == 'style_3'){
			$container_class = 'row spno'; 
		}else{
			$container_class = 'row'; 
		}
	
	?>
	      
  <!-- Left part start -->
	
	<div <?php if(!empty($blog_view_container)){ ?> id="<?php echo esc_attr($blog_view_container) ?>" <?php } ?> class="<?php echo esc_attr($container_class); ?>">
		<?php get_template_part('dz-inc/elementor/ajax/portfolio_listing_1_ajax'); ?>
	</div>
	<!-- Side bar END -->
      <?php
		if($portfolio_listing_1_element_pagination_style == 'load_more')
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
				data-posts-per-page="<?php echo esc_js($portfolio_listing_1_element_no_of_posts);?>"
				data-only-featured-post="<?php echo esc_js($portfolio_listing_1_element_only_featured_posts)?>" 
				data-post-order="<?php echo esc_js($portfolio_listing_1_element_order)?>"	
				data-post-order-by="<?php echo esc_js($portfolio_listing_1_element_orderby)?>"
				data-element-style="<?php echo esc_js($portfolio_listing_1_element_style);?>"	
				data-posts-in-categories="<?php echo esc_js($portfolio_listing_1_element_posts_in_categories);?>"
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
</section>
<?php } ?>