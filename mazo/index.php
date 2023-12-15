<?php /* Default Page Settings managed by Theme Option */
get_header();	
global $mazo_option;
extract($mazo_option);

if(isWebsiteReadyForVisitor($website_status)){
	
	$layout = (!$show_sidebar)?'full':$layout;
	
	if($layout == 'full' || !is_active_sidebar( $sidebar ) || !mazo_is_theme_sidebar_active() )
	{
		$layout_class = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12';
	}else{
		$layout_class = 'col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12';
	}
?>	
<?php mazo_get_banner(); ?>
<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row">
			<?php  if( $show_sidebar && $layout == 'left' && is_active_sidebar( $sidebar )  && mazo_is_theme_sidebar_active() ) {  ?>
			<!-- Left sidebar area -->
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="side-bar sticky-top">
					<?php dynamic_sidebar( $sidebar ); ?>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php } ?>

			<!--Content Side-->	
			<div class="<?php echo esc_attr($layout_class);?>" >
				<?php 
				if( have_posts() )
				{ 
					if($disable_ajax_pagination == 'load_more')
					{
						get_template_part('dz-inc/elements/index_page_ajax_posts_element');
					}
					else
					{					
						get_template_part('dz-inc/elements/index_page_pagination_posts_element');
						
						/* Pagination start */
						mazo_the_pagination();
						/* Pagination END */
					}
				}
				else
				{
					get_template_part('dz-inc/elements/page_no_record_found_element');
				}
				?>
			</div>  
			<!-- End Content Side--> 
		
		<!-- Right sidebar area -->
		<?php  if( $show_sidebar && $layout == 'right' && is_active_sidebar( $sidebar )  && mazo_is_theme_sidebar_active() ) {  ?>
		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
			<div class="side-bar sticky-top">
				<?php dynamic_sidebar( $sidebar ); ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php }  ?>
		</div>
	</div>
</div>

<?php }

get_footer(); ?>