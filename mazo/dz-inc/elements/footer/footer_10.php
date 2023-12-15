<?php
global $mazo_option;
extract($mazo_option);
$img_url = '';	
if(!empty($footer_bg_image['url'])){
	$img_url = $footer_bg_image['url'];
}
?>
<footer class="site-footer style-8" id="footer" style="background-image: url('<?php echo esc_url($img_url)?>'); background-size: cover; background-position: center;">
		<?php if ( is_active_sidebar( 'dz_footer_sidebar7' ) && !empty($footer_top_on)) { ?> 
		<div class="footer-top overlay-black-dark">
			<div class="container">
				<div class="row">
					<div class="row">
						<?php dynamic_sidebar( 'dz_footer_sidebar7' );  ?>
					</div>
				</div>
			</div>
		</div>
		<?php }
		if(!empty($footer_bottom_on)){ ?>
			<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row align-items-center">
					<?php if(!empty($footer_copyright_text)){ ?>
					<div class="col-lg-6 col-md-12 text-center text-lg-start"> 
						<span class="copyright-text"><?php echo wp_kses($footer_copyright_text, $allowed_html_tags);?></span>
					</div>
					<?php } ?>
					
					<div class="col-lg-6 col-md-12 text-center text-lg-end mt-lg-0 mt-2"> 
						<ul class="footer-link d-inline-block">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false, 
								'items_wrap' => '%3$s', 
								'container'=>false,
								'depth'=>'3',
								'walker'=> new Bootstrap_walker()  
								) ); 
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<?php } ?>
	</footer>
    <!-- Footer End -->
