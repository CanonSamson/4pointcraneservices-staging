<?php
global $mazo_option;
extract($mazo_option);
?>
<!-- Footer -->
    <footer class="site-footer style-2" id="footer" <?php if(!empty($footer_bg_image['url'])) { ?> style="background-image: url(<?php echo esc_url($footer_bg_image['url']);?>); background-size: contain; background-repeat: no-repeat;" <?php } ?>>
		<div class="footer-info">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-6 col-sm-6 m-md-b30">
						<div class="footer-logo">
							<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
						</div>
					</div>
					<?php if($show_social_icon){ ?>
						<div class="col-xl-6 col-lg-6 col-sm-6 m-md-b30 order-lg-1 text-end">
							<ul class="social-list">
							<?php echo mazo_get_social_icons(null,'btn btn-primary') ;?>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<?php if ( is_active_sidebar( 'dz_footer_sidebar2' ) && !empty($footer_top_on)) { ?> 
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'dz_footer_sidebar2' );  ?>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if (!empty($footer_bottom_on)) { ?>
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row fb-inner">
						<?php if(!empty($footer_copyright_text)){ ?>					
							<div class="col-md-6 text-start">
								<span class="copyright-text">
									<?php echo wp_kses($footer_copyright_text, $allowed_html_tags);?>
								</span>
							</div>
						<?php } ?>
						<div class="col-md-6 text-end"> 
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