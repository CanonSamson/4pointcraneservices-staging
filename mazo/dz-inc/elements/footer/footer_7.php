<?php
global $mazo_option;
extract($mazo_option);
?>

<!-- Footer -->
    <footer class="site-footer style-1 food-footer" id="footer">
		<?php if ( is_active_sidebar( 'dz_footer_sidebar6' ) && !empty($footer_top_on)) { ?> 
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'dz_footer_sidebar6' );  ?>						
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if(!empty($footer_bottom_on)){ ?>
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="footer-bottom-in">
						<div class="footer-bottom-logo">
							<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
						</div>
						<?php if($show_social_icon){ ?>
							<div class="footer-bottom-social">
								<ul class="dz-social-icon">
									<?php echo mazo_get_social_icons('header') ;?>
								</ul>
							</div>		
						<?php } ?>	
					</div>
				</div>
			</div>
		<?php } ?>
    </footer>
<!-- Footer END -->