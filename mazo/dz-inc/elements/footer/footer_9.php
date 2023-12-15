<?php
global $mazo_option;
extract($mazo_option);
?>


<!-- Footer -->
    <footer class="site-footer style-6 text-center" id="footer">
		<?php if (!empty($footer_top_on)) { ?> 
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-sm-12">
							<div class="widget widget_about">
								<div class="footer-logo logo-white">
									<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
								</div>
								<?php if(!empty($site_address)){ ?>
									<p>
										<?php echo wp_kses($site_address, mazo_allowed_html_tag()); ?>
									</p>
								<?php } ?>
								<form class="dzSubscribe dz-subscription" action="#" method="post">	
									<div class="input-group">
										<input name="dzEmail" required="required" type="email" class="form-control" placeholder="<?php echo esc_attr__('Enter Your Email Address...','mazo'); ?>">
										<button name="submit" value="Submit" type="submit" class="btn btn-primary">
											<i class="fas fa-chevron-right"></i>
										</button>
									</div>
									<div class="dzSubscribeMsg dz-subscription-msg"></div>
								</form>
								<ul class="footer-link">
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
								<?php if($show_social_icon){ ?>
									<ul class="social-list">
										<?php echo mazo_get_social_icons('header') ;?>
									</ul>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?> 
		
		<?php if(!empty($footer_bottom_on) && !empty($footer_copyright_text)){ ?>
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row fb-inner">
						<div class="col-12 text-center"> 
							<?php echo wp_kses($footer_copyright_text, mazo_allowed_html_tag());?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>	
    </footer>
    <!-- Footer End -->
