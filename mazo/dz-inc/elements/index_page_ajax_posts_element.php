<div class="loadmore-content" id='masonry1'>					
	<?php 	
	$mazo_query_result = array();	
	$page_view = 'latest_post';
	$page_no = 1;		
	$no_of_posts_per_page = get_option('posts_per_page');		
	
	$query_args = array(	
	'post_type' 		=> 'post',
	'post_status' 		=> 'publish',		
	'posts_per_page'   	=> $no_of_posts_per_page ,	
	'paged' 			=> $page_no,	
	'ignore_sticky_posts' => false,
	'orderby' 			=> 'post_date',
	'order' 			=> 'DESC',						
	);									

	$query = new WP_Query($query_args);	
	$max_num_pages = $query->max_num_pages;		
	set_query_var('mazo_query_result', $query);							
	
	get_template_part('dz-inc/ajax/index_ajax');
	?>
</div>
<?php if( 1 < $max_num_pages ) { ?>
<div class="row">
	<div class="col-lg-12 m-t10">
		<div class="text-center m-b30">
			<a href="javascript:void(0);" class="btn shadow-primary btn-primary btn-rounded btn-ov-secondary dz-load-more loadmore-btn latest-post-dz-load-more " data-posts-per-page="<?php echo esc_js($no_of_posts_per_page);?>" data-max-num-pages="<?php echo esc_js($max_num_pages);?>"><?php echo esc_html__('Load More', 'mazo'); ?> <i class="fa fa-refresh fas fa-spinner fa-spin"></i></a>
		</div>
	</div>
</div>
<?php 	} 
wp_reset_postdata();