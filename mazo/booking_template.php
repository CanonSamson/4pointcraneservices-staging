<?php 
/* Template Name: Booking Template */

get_header(); 
global $mazo_option;
extract($mazo_option);

?>



<?php mazo_get_banner(); ?>	

<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row">
			
				
			<div class="dz-page-text sidebar">
				<?php 
					while( have_posts() )
					{ 
					the_post();
				?>
				
					<?php the_content(); ?>
					<div class="clearfix"></div>
				
				<?php } ?>
				<?php comments_template(); ?>	
				<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'mazo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>	
			</div>
			
		</div>
	</div>
</div>
	
<?php get_footer() ; ?>