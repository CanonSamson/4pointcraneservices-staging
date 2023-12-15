<?php
	$blog_view = "team_listing_1";
	$page_no = 1;
	$post_type = 'dz_team';
	
	$query_args = array(	
		'post_type' 		=> $post_type,
		'post_status' 		=> 'publish',
		'posts_per_page'   	=> $team_listing_1_element_no_of_posts ,		
		'order' 			=> $team_listing_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($team_listing_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $team_listing_1_element_orderby;
	}

  
	$team_listing_1_element_image_preference = !empty($team_listing_1_element_image_preference)?$team_listing_1_element_image_preference:'all_posts';
	
	if($team_listing_1_element_image_preference == 'image_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		);
	}
	elseif($team_listing_1_element_image_preference == 'text_post_only')
	{
		$query_args['meta_query'] = array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'Not EXISTS'
			),
		);
	}
	
	
	if($team_listing_1_element_posts_in_categories) {
		
		$team_listing_1_element_posts_in_categories1 = mazo_get_cat_id_by_slug($team_listing_1_element_posts_in_categories,'team_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'team_category',
		'field' => 'id',
		'terms' => $team_listing_1_element_posts_in_categories1,
		'operator' => 'IN'
		); 
		$team_listing_1_element_posts_in_categories = implode(',',$team_listing_1_element_posts_in_categories);
	}
	
	if($team_listing_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	$query = new WP_Query($query_args);	
	
	$blog_view_container = '';
	if($team_listing_1_element_pagination_style == 'load_more')
	{
		$blog_view_container = $blog_view."_LoadMoreContainer";
	}
	
	global $mazo_query_result;
	$mazo_query_result['posts'] = $query->posts;	
	$mazo_query_result['posts_per_page'] = $team_listing_1_element_no_of_posts;	
	$mazo_query_result['current_page'] = $page_no;
	$mazo_query_result['element_style'] = $team_listing_1_element_style;
	$mazo_query_result['show_share'] = $team_listing_1_element_show_social;
	
	$mazo_query_result['blog_view_container'] = $blog_view_container;	
	$max_num_pages = $query->max_num_pages;	
	
	$section_class = '';
	$section_class .= !empty($team_listing_1_element_section_padding)?' '.$team_listing_1_element_section_padding:'';
	$section_class .= !empty($team_listing_1_element_section_background)?' '.$team_listing_1_element_section_background:'bg-white';
	$bg_class = (!empty($team_listing_1_element_bg_img['url']) && $team_listing_1_element_style=='style_7')?'section-full overlay-black-dark':'';
	$text_class = (!empty($team_listing_1_element_bg_img['url']) && $team_listing_1_element_style=='style_7')?'text-white':'';
	if($query->have_posts()) {
?>
<!-- Blog -->
<section class="<?php echo esc_attr($section_class.' '.$bg_class); ?>" id="DZTeamListing1Element" <?php if (!empty($team_listing_1_element_bg_img['url']) && $team_listing_1_element_style=='style_7'){ ?> style="background-image:url(<?php echo esc_url($team_listing_1_element_bg_img['url']); ?>);" <?php } ?>>
  <div class="container">
	<?php if(!empty($team_listing_1_element_title) && $team_listing_1_element_style=='style_7'){ ?>
		<div class="section-head text-center  style-1 <?php echo esc_attr($text_class); ?>">
			<?php if(!empty($team_listing_1_element_subtitle)){ ?>
				<h5 class="title-small">
					<?php echo wp_kses($team_listing_1_element_subtitle,'string'); ?>
				</h5>	
				<div class="dz-separator-outer">
					<div class="dz-separator bg-primary style-skew"></div>
				</div>				  
			<?php } ?>
			<h3 class="title">
				<?php echo wp_kses($team_listing_1_element_title,'string'); ?>
			</h3>
		</div>
	<?php } else if(!empty($team_listing_1_element_title) && $team_listing_1_element_style=='style_6'){ ?>
		<div class="row">
			<div class="col-lg-12 section-head text-center style-1">
				<?php if(!empty($team_listing_1_element_subtitle)){ ?>
					<h6 class="title-small">
						<?php echo wp_kses($team_listing_1_element_subtitle,'string'); ?>
					</h6>
				<?php } ?>
				
				<div class="dz-separator-outer">
					<div class="dz-separator bg-primary style-skew"></div>
				</div>
				<h3 class="title">
					<?php echo wp_kses($team_listing_1_element_title,'string'); ?>
				</h3>
			</div>
		</div>
	<?php } else { ?>	
	<?php if(!empty($team_listing_1_element_title)){ ?>
		<div class="section-head style-1 text-center">
			<?php if(!empty($team_listing_1_element_subtitle)){ ?>
				<h6 class="sub-title text-primary">
					<?php echo wp_kses($team_listing_1_element_subtitle,'string'); ?>
				</h6>
			<?php } ?>
			
			<h2 class="title">
				<?php echo wp_kses($team_listing_1_element_title,'string'); ?>
			</h2>
			
			<?php if(!empty($team_listing_1_element_description)){ ?>
				<p>
					<?php echo wp_kses($team_listing_1_element_description,'string'); ?>
				</p>
			<?php } ?>
		</div>
	<?php } } ?>
	
    <div>      
      <!-- Left part start -->
        <div <?php if(!empty($blog_view_container)){ ?> id="<?php echo esc_attr($blog_view_container) ?>" <?php } ?> class="row">
        <?php get_template_part('dz-inc/elementor/ajax/team_listing_1_ajax'); ?>
        </div>
        <!-- Side bar END -->
      <?php
				if($team_listing_1_element_pagination_style == 'load_more')
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
						data-posts-per-page="<?php echo esc_js($team_listing_1_element_no_of_posts);?>"
						data-only-featured-post="<?php echo esc_js($team_listing_1_element_only_featured_posts)?>" 
						data-post-order="<?php echo esc_js($team_listing_1_element_order)?>"	
						data-post-order-by="<?php echo esc_js($team_listing_1_element_orderby)?>"
						data-element-style="<?php echo esc_js($team_listing_1_element_style);?>"	
						data-show-share="<?php echo esc_js($team_listing_1_element_show_social);?>"	
						data-posts-in-categories="<?php echo esc_js($team_listing_1_element_posts_in_categories);?>"
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