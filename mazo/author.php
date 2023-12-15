<?php 
	get_header(); 
	global $mazo_option;
	extract($mazo_option);
  
  $layout = (!$show_sidebar)?'full':$layout;
	
	if($layout == 'full' || !is_active_sidebar( $sidebar ) || !mazo_is_theme_sidebar_active() )
	{
		$layout_class = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12';
	}else{
		$layout_class = 'col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12';
	}

 mazo_get_banner();
  ?>

<!-- Blog Post -->
<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row">
			<?php  if( $show_sidebar && $layout == 'left' && is_active_sidebar( $sidebar )  && mazo_is_theme_sidebar_active() ) {  ?>
					<div class="col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="side-bar sticky-top">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
					</div>
			<?php } ?>
			
			<div class="<?php echo esc_attr($layout_class);?>  col-sm-12 col-12" >
					<?php if( have_posts() )  { 
						if($disable_ajax_pagination == 'load_more')
						{
							get_template_part('dz-inc/elements/author_page_ajax_posts_element');
						}
						else
						{					
							get_template_part('dz-inc/elements/author_page_pagination_posts_element');
						}
					} else {
							get_template_part('dz-inc/elements/page_no_record_found_element');
					}
					?>
			</div>
			<?php if( $show_sidebar && $layout == 'right' && is_active_sidebar( $sidebar ) && mazo_is_theme_sidebar_active() ) {   ?>
					<div class="col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="side-bar sticky-top">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
					</div>
			<?php } ?>	
		</div>
	</div>
</div>

<!-- Blog Post End -->

<?php  get_footer(); ?>