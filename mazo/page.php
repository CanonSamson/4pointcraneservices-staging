<?php 
get_header(); 
global $mazo_option;
extract($mazo_option);

$layout = (!$show_sidebar)?'full':$layout;


if($layout == 'full' || !is_active_sidebar( $sidebar ) )
{
	$classes = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12';
	$content_class = '';
}else{
	$classes = 'col-lg-8 col-md-12 m-b10 ';
	$content_class = 'sidebar';
}

?>



<?php mazo_get_banner(); ?>	

<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row">
			<!-- Left sidebar area -->
			<?php if( $layout == 'left' && is_active_sidebar( $sidebar )) {  ?>
					<div class="col-xl-4 col-lg-4 m-b30">
						<div class="side-bar sticky-top">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
					</div>
			<?php } ?>
				
			<div class="<?php echo esc_attr($classes); ?>">
				<?php 
					while( have_posts() )
					{ 
					the_post();
				?>
				<div class="dz-page-text <?php echo esc_attr($content_class); ?>">
					<?php the_content(); ?>
					<div class="clearfix"></div>
				</div>
				<?php } ?>
				<?php comments_template(); ?>	
				<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'mazo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>	
			</div>
			
			<!-- Right sidebar area -->
			<?php if( $layout == 'right' && is_active_sidebar( $sidebar ) ) {  ?>
					<div class="col-xl-4 col-lg-4 m-b30">
						<div class="side-bar sticky-top">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</div>
	
<?php get_footer() ; ?>