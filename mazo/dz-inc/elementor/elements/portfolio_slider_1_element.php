<?php	
	$query_args = array(
		'post_type' => 'dz_portfolio',
		'post_status' => 'publish',
		'posts_per_page'   	=> 6 ,	
		'orderby' =>$portfolio_slider_1_element_orderby,
		'order'	=>$portfolio_slider_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($portfolio_slider_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $portfolio_slider_1_element_orderby;
	}
	
	if($portfolio_slider_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	
	if(!empty($portfolio_slider_1_element_posts_in_categories))
	{			
		
		$portfolio_slider_1_element_posts_in_categories = mazo_get_cat_id_by_slug($portfolio_slider_1_element_posts_in_categories,'portfolio_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'portfolio_category',
		'field' => 'id',
		'terms' => $portfolio_slider_1_element_posts_in_categories,
		'operator' => 'IN'
		); 
	}
	
	/* Thumbnail Required */
	$query_args['meta_query'] = array(
		array(
		'key' => '_thumbnail_id',
		'compare' => 'EXISTS'
		),
	);
	
	$category_arr = array();
	if(!empty($portfolio_slider_1_element_posts_in_categories)) 
	{		
		$category_arr = get_terms( array(
		'taxonomy' => 'portfolio_category',
		'include' => $portfolio_slider_1_element_posts_in_categories,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $portfolio_slider_1_element_order, 
        ) ); 
	}
	
	$fontsize = 'style-2';
	if(!empty($portfolio_slider_1_element_heading_fontsize)){
		$fontsize = $portfolio_slider_1_element_heading_fontsize;
	}
	$query = new WP_Query($query_args);
	
	if(!empty($query->have_posts())){
	
?>
	<!-- Our Portfolio -->
	<section class="content-inner-2 portfolio-area1 bg-secondary" <?php if($portfolio_slider_1_element_bg_img['url']){ ?> style="background-image: url(<?php echo esc_url($portfolio_slider_1_element_bg_img['url']); ?>);" <?php } ?>  id="DZPortfolioListingElement5">
		<?php if(!empty($portfolio_slider_1_element_title)){ ?>
			<div class="container">
				<div class="section-head text-white text-center <?php echo esc_attr($fontsize); ?>">
					<?php if(!empty($portfolio_slider_1_element_subtitle)){ ?>
						<h5 class="sub-title text-primary">
							<?php echo wp_kses($portfolio_slider_1_element_subtitle,'string'); ?>
						</h5>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($portfolio_slider_1_element_title,'string'); ?>
					</h2>
					
					<?php if(!empty($portfolio_slider_1_element_description)){ ?>
						<p>
							<?php echo wp_kses($portfolio_slider_1_element_description,'string'); ?>
						</p>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<div class="swiper-container swiper-portfolio1">
			<div class="swiper-wrapper">
				<?php 
					while ($query->have_posts())
					{
						$query->the_post();
						global $post;

						$cat_arr = get_the_terms(get_the_id() , 'portfolio_category');
						$cat_slug_arr = array_column($cat_arr, 'slug');
						$cat_slugs = implode(' ', $cat_slug_arr);
						$post_thumbnail = get_the_post_thumbnail_url(get_the_id(),'medium');
				?>
					
					<div class="swiper-slide">
						<div class="dz-box overlay style-2 overlay-shine">
							<div class="dz-media mheight-lg" <?php if(!empty($post_thumbnail)){ ?> style="background-image: url(<?php echo esc_url($post_thumbnail); ?>)"<?php } ?>></div>
							<div class="dz-info">
								<a href="<?php the_permalink(); ?>" class="view-btn" title="<?php the_title_attribute(); ?>"></a>
								<h4 class="title m-b15">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h4>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } wp_reset_postdata(); ?>