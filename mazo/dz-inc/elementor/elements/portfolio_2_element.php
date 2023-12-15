<?php	
	$query_args = array(
		'post_type' => 'dz_portfolio',
		'post_status' => 'publish',
		'posts_per_page'   	=> 6 ,	
		'orderby' =>$portfolio_2_element_orderby,
		'order'	=>$portfolio_2_element_order,
		'ignore_sticky_posts' => true,
	);
	
	if($portfolio_2_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $portfolio_2_element_orderby;
	}
	
	if($portfolio_2_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	
	if(!empty($portfolio_2_element_posts_in_categories))
	{			
		
		$portfolio_2_element_posts_in_categories = mazo_get_cat_id_by_slug($portfolio_2_element_posts_in_categories,'portfolio_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'portfolio_category',
		'field' => 'id',
		'terms' => $portfolio_2_element_posts_in_categories,
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
	if(!empty($portfolio_2_element_posts_in_categories)) 
	{		
		$category_arr = get_terms( array(
		'taxonomy' => 'portfolio_category',
		'include' => $portfolio_2_element_posts_in_categories,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $portfolio_2_element_order, 
        ) ); 
	}
	
	$allowed_html_tag = mazo_allowed_html_tag();
	$query = new WP_Query($query_args);
	$section_class = '';
    $section_class .= !empty($portfolio_2_element_section_padding)?' '.$portfolio_2_element_section_padding:'content-inner';
	if(!empty($query->have_posts())){
	
?>
	<!-- Projects -->
	<section class="<?php echo esc_attr($section_class); ?>" id="DZPortfolioListingElement2">
		<div class="container">
			<?php if(!empty($portfolio_2_element_title)) { ?>
				<div class="section-head style-1 text-center">
					<?php if(!empty($portfolio_2_element_subtitle)) { ?>
						<h6 class="sub-title text-primary m-b15">
							<?php echo wp_kses($portfolio_2_element_subtitle,'string') ?>
						</h6>
					<?php } ?>
						<h2 class="title"><?php echo wp_kses($portfolio_2_element_title,'string'); ?></h2>
						<?php if(!empty($portfolio_2_element_description)) { ?>
						<p><?php echo wp_kses($portfolio_2_element_description, $allowed_html_tag); ?></p>
					<?php } ?>
				</div>
			<?php } ?>
			<div class="clearfix">
				<div class="row lightgallery">
					<?php $output = '';
						$count = 1;
						while($query->have_posts())
						{ 				
							$query->the_post();
							global $post ;
							
							$cat_arr = get_the_terms( get_the_id(), 'portfolio_category');
							
							$cat_slug_arr = array_column($cat_arr,'slug');
							
							$cat_slugs = implode(' ',$cat_slug_arr);
							
							$count = ($count == 7)?1:$count;
							
							
							
							$col_arr = array(
								1=>'card-container col-lg-7 col-md-6 col-sm-6',
								2=>'card-container col-lg-5 col-md-6 col-sm-6',
								3=>'card-container col-lg-6 col-md-6 col-sm-6',
								4=>'card-container col-lg-6 col-md-6 col-sm-6',
								5=>'card-container col-lg-12 col-md-12 col-sm-12',
								6=>'card-container col-lg-5 col-md-12 col-sm-6',
							);
							
							
							$thumbnail_arr = array(
								1=>'large',
								2=>'large',
								3=>'medium',
								4=>'medium',
								5=>'large',
								6=>'large',
							);
							
							$mheight_arr = array(
								1=>'mheight-lg',
								2=>'mheight-lg',
								3=>'mheight-sm',
								4=>'mheight-sm',
								5=>'mheight-md',
								6=>'mheight-lg',
							);
							
							$author = $title = '';
							
							if(!empty($portfolio_2_element_show_readmore) && $portfolio_2_element_show_readmore == 'yes') { 	
								$title = '<a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a>';
								
								} else {  
								$title = esc_html(get_the_title()); 
							} 
							if(!empty($portfolio_2_element_show_author) && $portfolio_2_element_show_author == 'yes') { 	
								$author = '<p class="post-author">
								'.esc_html__('By','mazo').' <a href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )).'" class="text-capitalize">'.esc_html(get_the_author()).'</a>
								</p>';
							} 	
							
							$link = '<span data-exthumbimage="'.esc_url(get_the_post_thumbnail_url(get_the_id(),'thumbnail')).'" data-src="'.esc_url(get_the_post_thumbnail_url(get_the_id(),'full')).'" class="lightimg" title="'.get_the_title().'">		
							<i class="la la-plus"></i> </span>';
							
							
							$image = '<div class="dz-media dz-img-overlay1 '.$mheight_arr[$count].'" style="background-image: url('.esc_url(get_the_post_thumbnail_url(get_the_id(),$thumbnail_arr[$count])).');" data-src="'.esc_url(get_the_post_thumbnail_url(get_the_id(),$thumbnail_arr[$count])).'">
									'.$link.'
									</div>';
							
							if($count == 3 ){
								$output .= '<div class="col-lg-7 col-md-12 col-sm-12">
								<div class="row">';	
							}
							
							if($count == 6){
								$output .= '
								
								</div>
								</div>
								';	
							}
							
							
							$output .= '
							
							
							
							
							<div class="'.esc_attr($col_arr[$count]).'">
								<div class="dz-box dz-overlay-box style-2 m-b30">
									'.$image.'
									<div class="dz-info">
										<h5 class="title text-white">
										'.$title.'
										</h5>
										'.$author.'
									</div>
								</div>	
							</div>';
							
						?>
						
						<?php ++$count;	
						
						} 
						echo wp_kses($output, $allowed_html_tag);
					?>
					
				</div>
			</div>
		</div>
	</section>
<?php } wp_reset_postdata(); ?>





