<?php 
	get_header(); 
	
	global $mazo_option;
	extract($mazo_option);
	

?>
<?php mazo_get_banner(); ?>
<!-- Error Page -->
<section class="content-inner-1">
	<div class="container">
		<div class="error-page text-center">
			<div class="dz_error"><?php echo wp_kses($error_page_title,'string'); ?></div>
			<h2 class="error-head"><?php echo wp_kses($error_page_text,'string'); ?></h2>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><span class="p-lr15"><?php echo wp_kses($error_page_button_text,'string'); ?></span></a>
		</div>
	</div>
</section>

    <!-- Content END-->
<?php get_footer(); ?>


 