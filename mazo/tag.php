<?php get_header(); 
	global $mazo_option;
	extract($mazo_option);
	
	$queried_object_data = $wp_query->get_queried_object();	
	
	$tag_name = $queried_object_data->name;
	
	
	$total_post_count = $wp_query->found_posts;
	
	$page_title = (!empty($queried_object_data->name)) ? $page_title .'<span>'. $queried_object_data->name .'</span>' : $page_title; 
	
	$layout = (!$show_sidebar)?'full':$layout;
	
	if($layout == 'full' || !is_active_sidebar( $sidebar ) || !mazo_is_theme_sidebar_active() )
	{
		$layout_class = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12';
	}else{
		$layout_class = 'col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12';
	}
	
	set_query_var( 'queried_object_data', $queried_object_data );
?>
<?php mazo_get_banner(); ?>														  

<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row">
		<?php  if( $show_sidebar && $layout == 'left' && is_active_sidebar( $sidebar )  && mazo_is_theme_sidebar_active() ) {  ?>
		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="side-bar p-r30 sticky-top">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div>
		</div>
		<?php } ?>
		
		<div class="<?php echo esc_attr($layout_class);?>">
			<?php 
				if( have_posts() ) 
				{ 
					if($disable_ajax_pagination)
					{
						get_template_part('dz-inc/elements/tag_page_ajax_posts_element');
					}
					else
					{					
						get_template_part('dz-inc/elements/tag_page_pagination_posts_element');
					}
				}
				else
				{
					get_template_part('dz-inc/elements/page_no_record_found_element');
				}
			?>	
		</div>
		<?php  if( $show_sidebar && $layout == 'right' && is_active_sidebar( $sidebar )  && mazo_is_theme_sidebar_active() ) {  ?>	
		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="side-bar p-l30 sticky-top">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div>
		</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>