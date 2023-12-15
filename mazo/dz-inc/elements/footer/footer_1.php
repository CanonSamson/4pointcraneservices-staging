<?php
global $mazo_option;
extract($mazo_option);
?>
<!-- Footer -->
    <footer class="site-footer style-1 dz-footer-1" id="footer">
		<?php if ( is_active_sidebar( 'dz_footer_sidebar' ) && !empty($footer_top_on)) { ?> 
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'dz_footer_sidebar' );  ?>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if (!empty($footer_bottom_on)){ ?> 
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row fb-inner">
						<?php if(!empty($footer_copyright_text)){ ?>					
							<div class="col-12 text-center">  
								<span class="copyright-text">
									<?php echo wp_kses($footer_copyright_text, mazo_allowed_html_tag());?>
								</span>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
    </footer>
    <!-- Footer End -->