<?php
	$blog_view = "post_listing_3";
	$page_no = 1;
	
	$query_args = array(	
		'post_type' 		=> 'post',
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $post_listing_3_element_no_of_posts ,		
		'order' 			=> $post_listing_3_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($post_listing_3_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $post_listing_3_element_orderby;
	}

  
	$post_listing_3_element_image_preference = !empty($post_listing_3_element_image_preference)?$post_listing_3_element_image_preference:'all_posts';
	
	if($post_listing_3_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($post_listing_3_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	if($post_listing_3_element_posts_in_categories) {
		$post_listing_3_element_posts_in_categories = implode(',',$post_listing_3_element_posts_in_categories);
		$query_args['category_name'] = $post_listing_3_element_posts_in_categories;
	}
	
	if($post_listing_3_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
  
	if($post_listing_3_element_selected_sidebar == 'No_Sidebar' || !is_active_sidebar( $post_listing_3_element_selected_sidebar ) || !mazo_is_theme_sidebar_active())
	{
		$col_classes = 'col-xl-12 col-lg-12';
		
	}else{
		$col_classes = 'col-xl-8 col-lg-8';
	}
	
	$query = new WP_Query($query_args);	
	
	$blog_view_container = '';
	if($post_listing_3_element_pagination_style == 'load_more')
	{
		$blog_view_container = $blog_view."_LoadMoreContainer";
	}
	
	global $mazo_query_result;
	$mazo_query_result['posts'] = $query->posts;	
	$mazo_query_result['posts_per_page'] = $post_listing_3_element_no_of_posts;	
	$mazo_query_result['current_page'] = $page_no;
	$mazo_query_result['side_bar'] = $post_listing_3_element_selected_sidebar;
	$mazo_query_result['title_text_limit'] = $post_listing_3_element_text_limit;
	$mazo_query_result['show_column'] = $post_listing_3_element_column;
	$mazo_query_result['blog_view_container'] = $blog_view_container;	
	$max_num_pages = $query->max_num_pages;	
		
	
	if($query->have_posts()) {
?>
<!-- Blog -->
<section class="content-inner" id="DZPostListingElement3">
  <div class="container">
    <?php if(!empty($post_listing_3_element_title)){ ?>
		<div class="section-head style-1 text-center">
			<?php if(!empty($post_listing_3_element_subtitle)){ ?>
				<h6 class="sub-title text-primary">
					<?php echo wp_kses($post_listing_3_element_subtitle,'string'); ?>
				</h6>
			<?php } ?>
			
			<h2 class="title">
				<?php echo wp_kses($post_listing_3_element_title,'string'); ?>
			</h2>
			
			<?php if(!empty($post_listing_3_element_description)){ ?>
				<p>
					<?php echo wp_kses($post_listing_3_element_description,'string'); ?>
				</p>
			<?php } ?>
		</div>
	<?php } ?>
    <div class="row">
      <?php 
        if ($post_listing_3_element_sidebar_layout == 'left' && 
            is_active_sidebar( $post_listing_3_element_selected_sidebar ) && 
            mazo_is_theme_sidebar_active() ){ 
        ?>
        <div class="col-xl-4 col-lg-4 dz-order-1">
			<aside class="side-bar sticky-top left">
            <?php dynamic_sidebar( $post_listing_3_element_selected_sidebar ); ?>
          </aside>
        </div>
      <?php } ?>
      <!-- Side bar END -->
      <!-- Left part start -->
      <div class="<?php echo esc_attr($col_classes); ?>" >
        <div <?php if(!empty($blog_view_container)){ ?> id="<?php echo esc_attr($blog_view_container) ?>" <?php } ?> class="row masonry">
        <?php get_template_part('dz-inc/elementor/ajax/post_listing_3_ajax'); ?>
        </div>
      <?php
				if($post_listing_3_element_pagination_style == 'load_more')
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
						data-blog-view = "<?php echo esc_js($blog_view);?>" 
						data-max-num-pages="<?php echo esc_js($max_num_pages);?>" 
						data-posts-per-page="<?php echo esc_js($post_listing_3_element_no_of_posts);?>"
						data-image-preference="<?php echo esc_js($post_listing_3_element_image_preference); ?>"
						data-only-featured-post="<?php echo esc_js($post_listing_3_element_only_featured_posts)?>" 
						data-post-order="<?php echo esc_js($post_listing_3_element_order)?>"	
						data-post-order-by="<?php echo esc_js($post_listing_3_element_orderby)?>"	
						data-posts-in-categories="<?php echo esc_js($post_listing_3_element_posts_in_categories);?>"
						data-side-bar="<?php echo esc_js($post_listing_3_element_selected_sidebar);?>"
						data-show-column="<?php echo esc_js($post_listing_3_element_column);?>"
						data-title-text-limit="<?php echo esc_js($post_listing_3_element_text_limit);?>" 
						>
					<?php echo esc_html__('LOAD MORE', 'mazo'); ?> <i class="fa fa-refresh fas fa-spinner  fa-spin"></i></a>
					</div>
					<!-- Pagination End -->
					<?php 
					}
				}
				?>
			</div>
      <?php 
        if ($post_listing_3_element_sidebar_layout == 'right' && 
            is_active_sidebar( $post_listing_3_element_selected_sidebar ) && 
            mazo_is_theme_sidebar_active() ){ 
        ?>
        <div class="col-xl-4 col-lg-4 dz-order-1">
			<aside class="side-bar sticky-top right">
				<?php dynamic_sidebar( $post_listing_3_element_selected_sidebar ); ?>
			</aside>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>