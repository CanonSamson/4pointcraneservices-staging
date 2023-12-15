<?php
	
	$query_args = array(
	'post_type' => 'dz_portfolio',
	'post_status' => 'publish',
	'posts_per_page'   	=> $gallery_slider_1_element_no_of_posts ,	
	'orderby' =>$gallery_slider_1_element_orderby,
	'order'	=>$gallery_slider_1_element_order,
	'ignore_sticky_posts' => true,
	);
	
	if($gallery_slider_1_element_orderby == 'views_count'){
		$query_args['meta_key']	= '_views_count';
	}
	else{
		$query_args['orderby']	= $gallery_slider_1_element_orderby;
	}
	
	
	if($gallery_slider_1_element_only_featured_posts == 'yes') 
	{ 		
		$query_args['meta_key'] = 'featured_post';		
		$query_args['meta_value'] = 1;				
		$query_args['meta_compare'] = 'LIKE';		
	}
	
	if(!empty($gallery_slider_1_element_posts_in_categories))
	{			
		
		$gallery_slider_1_element_posts_in_categories = mazo_get_cat_id_by_slug($gallery_slider_1_element_posts_in_categories,'portfolio_category');
		
		$query_args['tax_query'][] = array(
		'taxonomy' => 'portfolio_category',
		'field' => 'id',
		'terms' => $gallery_slider_1_element_posts_in_categories,
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
	if(!empty($gallery_slider_1_element_posts_in_categories)) 
	{		
		$category_arr = get_terms( array(
		'taxonomy' => 'portfolio_category',
		'include' => $gallery_slider_1_element_posts_in_categories,
		'hide_empty'  => false, /* Not return that didn't have any post in it's category */
		'orderby'  => 'include', 
		'order'  => $gallery_slider_1_element_order, 
        ) ); 
	}
	
	
	$query = new WP_Query($query_args);
	
	if(!empty($query->have_posts())){

?>

<!-- Our Portfolio -->

<div class="section-full content-inner-1 bg-white" id="DZGallerySlider" <?php if(!empty($gallery_slider_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($gallery_slider_1_element_bg_img['url']); ?>);" <?php } ?>>

    <div class="food-project">
        <?php if(!empty($gallery_slider_1_element_title) || !empty($gallery_slider_1_element_subtitle)){ ?>
			<div class="section-head text-left style-1">
				<?php if(!empty($gallery_slider_1_element_subtitle)){ ?>
					<h5 class="title-small">
						<?php echo wp_kses($gallery_slider_1_element_subtitle,'string'); ?>
					</h5>
				<?php } ?>					 
				<div class="dz-separator-outer">
					<div class="dz-separator bg-primary style-skew"></div>
				</div>
				
				<?php if(!empty($gallery_slider_1_element_title)){ ?>
					<h3 class="title">
						<?php echo wp_kses($gallery_slider_1_element_title,'string'); ?>
					</h3>
				<?php }?>
			</div>
        <?php } ?>
            
        <div class="content-section position-relative">
            <div class="project-carousel swiper-container">
				<div class="swiper-wrapper">
					<?php
                        while ($query->have_posts())
                        {
                            $query->the_post();
                            global $post;
                             $post_title =  ($gallery_slider_1_element_text_limit != 0) ? mazo_trim( $post->post_title , $gallery_slider_1_element_text_limit) : mazo_trim( $post->post_title,2);
							 $post_thumbnail = get_the_post_thumbnail_url();
                    ?>
                        <div class="swiper-slide">
                            <div class="dz-box dz-gallery-box" >
                                <div class="dz-media mheight-md" <?php if(!empty($post_thumbnail)) { ?> style="background-image:url('<?php echo esc_url($post_thumbnail); ?>')" <?php } ?>>
                                    <div class="product-info">
                                        <div class="title">
                                            <h3>
												<a href="<?php the_permalink(); ?>">
													<?php echo esc_html($post_title); ?>
												</a>
											</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    <?php } ?>
				</div>
            </div>
        </div>
             
    </div>	
</div>

<?php  } wp_reset_postdata(); ?>