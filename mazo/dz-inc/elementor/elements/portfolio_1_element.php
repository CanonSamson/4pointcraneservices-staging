<?php	
	$query_args = array(
		'post_type' => 'dz_portfolio',
		'post_status' => 'publish',
		'posts_per_page'   	=> $portfolio_1_element_no_of_posts ,	
		'orderby' =>$portfolio_1_element_orderby,
		'order'	=>$portfolio_1_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($portfolio_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $portfolio_1_element_orderby;
	}
	
	if($portfolio_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	
	if(!empty($portfolio_1_element_posts_in_categories))
	{			
		
		$portfolio_1_element_posts_in_categories = mazo_get_cat_id_by_slug($portfolio_1_element_posts_in_categories,'portfolio_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'portfolio_category',
		'field' => 'id',
		'terms' => $portfolio_1_element_posts_in_categories,
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
	if(!empty($portfolio_1_element_posts_in_categories)) 
	{		
		$category_arr = get_terms( array(
		'taxonomy' => 'portfolio_category',
		'include' => $portfolio_1_element_posts_in_categories,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $portfolio_1_element_order, 
        ) ); 
	}
	
	$section_class = '';
    $section_class .= !empty($portfolio_1_element_section_padding)?' '.$portfolio_1_element_section_padding:'content-inner-1';
	$query = new WP_Query($query_args);
	$allowed_html_tag = mazo_allowed_html_tag();
	if(!empty($query->have_posts())){
	
?>
	<!-- Projects -->
	<section class="<?php echo esc_attr($section_class); ?>" id="DZPortfolioListingElement1">
		<div class="container-fluid">
			<?php if(!empty($portfolio_1_element_title)) { ?>
				<div class="section-head style-1 text-center">
					<?php if(!empty($portfolio_1_element_subtitle)) { ?>
						<h6 class="sub-title">
							<?php echo wp_kses($portfolio_1_element_subtitle,'string') ?>
						</h6>
					<?php } ?>
					
					<h2 class="title">
						<?php echo wp_kses($portfolio_1_element_title, $allowed_html_tag); ?>
					</h2>
					
					<?php if(!empty($portfolio_1_element_description)) { ?>
						<p>
							<?php echo wp_kses($portfolio_1_element_description, $allowed_html_tag); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if(!empty($category_arr)) { ?>
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
			<?php } ?>
			<div class="clearfix">
				<ul id="masonry"  class="row lightgallery">
					<?php
						$count = 1;
						while($query->have_posts())
						{
							
							$query->the_post();
							global $post ;
							
							$cat_arr = get_the_terms( get_the_id(), 'portfolio_category');
							
							$cat_slug_arr = array_column($cat_arr,'slug');
							
							$cat_slugs = implode(' ',$cat_slug_arr);
							
							$post_thumbnail = ($count % 2 == 0)?'mazo_555x450':'medium';
							$mheight = ($count % 2 == 0)?'mheight-md':'mheight-lg';
							
							if($count == 6 || $count == 12){
								$post_thumbnail = 'medium';
								$mheight = 'mheight-lg';
								}else if($count == 7 || $count == 13){
								$post_thumbnail = 'mazo_555x450';
								$mheight = 'mheight-md';
							} 
							
							$image_thumbnail = get_the_post_thumbnail_url();
						
							
						?>
						
						<li class="card-container col-lg-3 col-md-6 col-sm-6 <?php echo esc_attr($cat_slugs); ?> all" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="dz-box dz-overlay-box style-1 m-b30">
								<div class="dz-media dz-img-overlay1 primary <?php echo esc_attr($mheight); ?>" <?php if(!empty($image_thumbnail)){ ?> style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(),$post_thumbnail)) ?>)"<?php } ?>>
									<?php if(!empty($portfolio_1_element_show_largeimagelink) && $portfolio_1_element_show_largeimagelink == 'yes') { ?>	
										<span data-exthumbimage="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(),'thumbnail')) ?>" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(),'full')) ?>" class="lightimg" title="<?php the_title_attribute(); ?>">		
											<i class="la la-plus"></i> 
										</span>
									<?php } ?>	
								</div>
								<div class="dz-info">
									<h4 class="title">
										<?php if(!empty($portfolio_1_element_show_readmore) && $portfolio_1_element_show_readmore == true) { ?>	
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<?php } else { the_title(); 
											} 
										?>
									</h4>
									<div class="tags-list">
										<?php echo mazo_get_cpt_category($cat_arr,', '); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</li>
						<?php 
							++$count;	
						} ?>
				</ul>
			</div>
		</div>
	</section>
<?php } wp_reset_postdata(); ?>