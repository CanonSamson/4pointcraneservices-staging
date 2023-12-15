<?php
global $mazo_option;
extract($mazo_option);
?>
		<!-- Footer -->
    <footer class="site-footer style-4 overflow-hidden" id="footer">
		<img src="<?php echo MAZO_URL ?>assets/images/pattern/pt13.png" class="circle-bg" alt="<?php echo esc_attr__('Image','mazo') ?>">
		<img src="<?php echo MAZO_URL ?>assets/images/pattern/pt13.png" class="circle-bg-2" alt="<?php echo esc_attr__('Image','mazo') ?>">
		
		<?php if ( is_active_sidebar( 'dz_footer_sidebar4' ) && !empty($footer_top_on)) { ?> 
			<div class="footer-top line-img">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'dz_footer_sidebar4' );  ?>
					</div>
				</div>
			</div>
		<?php } ?> 
		
		<?php if(!empty($footer_bottom_on)){ ?>
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 text-lg-start"> 
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
						<?php if(!empty($footer_copyright_text)){ ?>					
							<div class="col-lg-6 text-lg-end"> 
								<span class="copyright-text">
									<?php echo wp_kses($footer_copyright_text, $allowed_html_tags);?>
								</span>
							</div>
						<?php } ?>
						
					</div>
				</div>
			</div>
		<?php } ?>
    </footer>
    <!-- Footer End -->