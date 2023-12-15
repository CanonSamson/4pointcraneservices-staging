<div class="loadmore-content">
	<?php 	
	/* Author Information */
	get_template_part('dz-inc/elements/author_information_page_element');
	/* Author Information End */
	
	$mazo_query_result = array();	
	$page_view = 'author';
	$page_no = 1;		
	$no_of_posts_per_page = get_option('posts_per_page');		
	$author_id = get_the_author_meta( 'ID' );
	
	/* Post Sorting */
	   $sorting_on = mazo_get_opt('author_page_sorting_on');
	  
	  $orderby = $order = '';
	  
	  if($sorting_on)
			{
				$sorting	= mazo_get_opt('author_page_sorting');
		  
		  if($sorting	== 'most_visited')
				{
			$query_args['meta_key']	= '_views_count';
			$order = 'DESC';
			$orderby = '_views_count';
		  }else{
			$sort_arr	= explode('_',$sorting);
				$orderby 	= !empty($sort_arr[0]) ? $sort_arr[0]:'date';
				$order 		= !empty($sort_arr[1]) ? $sort_arr[1]:'DESC';
		  }
		}else{
		  $orderby = 'date';
		  $order = 'DESC';
		}
		
	  if(!empty($orderby) && $orderby != '_views_count'){
		$query_args['orderby'] = $orderby;
	  }
	  $query_args['order'] = $order; 
	 /* Post Sorting END */
	
	
	$query_args = array(	
	'post_type' 		=> 'post',
	'post_status' 		=> 'publish',		
	'posts_per_page'   	=> $no_of_posts_per_page ,	
	'paged' 			=> $page_no,	
	'ignore_sticky_posts' => true,
	'orderby' 			=> $orderby,
	'order' 			=> $order,
	'author'			=> $author_id,
	);									

	$query = new WP_Query($query_args);	
	$max_num_pages = $query->max_num_pages;		
	set_query_var('mazo_query_result', $query);
	
	get_template_part('dz-inc/ajax/author_ajax'); ?>
</div>
<?php if( 1 < $max_num_pages ) { ?>

<!-- Pagination start -->
<div class="reload-btn text-center mb-4">
<a href="javascript:void(0);" class="btn shadow-primary btn-rounded btn-ov-secondary loadmore-btn btn-primary common-page-dz-load-more dz-load-more"  	data-object-data = "<?php echo esc_js($author_id);?>"
	data-common-page-view = "<?php echo esc_js($page_view);?>" 
	data-posts-per-page="<?php echo esc_js($no_of_posts_per_page);?>" 
	data-max-num-pages="<?php echo esc_js($max_num_pages);?>" 
	data-orderby="<?php echo esc_js($orderby);?>" 
	data-order="<?php echo esc_js($order);?>"
	><?php echo esc_html__('Load More', 'mazo'); ?> <i class="fa fa-refresh fas fa-spinner fa-spin"></i></a>
</div>
<!-- Pagination End -->
<?php 
}
wp_reset_postdata();