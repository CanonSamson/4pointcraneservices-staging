<?php
global $mazo_option;
extract($mazo_option);
?>
<!-- Footer -->
    <footer class="site-footer style-3 overlay-black-dark" id="footer" <?php if(!empty($footer_bg_image['url'])) { ?> style="background-image: url(<?php echo esc_url($footer_bg_image['url']);?>); background-size: cover; background-attachment: fixed;" <?php } ?>>
		<?php if(!empty($footer_top_on)){ ?>
			<div class="footer-top">
				<div class="container">
					<div class="row footer-logo-head spno">
						<div class="col-xl-6 col-lg-4 col-sm-12 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
							<div class="footer-logo">
								<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
							<div class="icon-bx-wraper style-13 m-b15">
								<div class="icon-bx-sm text-primary m-r15 border radius icon-bx">
									<i class="fas fa-phone-alt"></i> 
								</div>
								<div class="icon-content">
									<h4 class="title m-b5"><?php echo esc_html__('Phone Number','mazo'); ?></h4>
									<?php if(!empty($site_phone_number)) { ?>
										<p>
											<?php echo wp_kses($site_phone_number, 'string'); ?>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
							<div class="icon-bx-wraper style-13 m-b15">
								<div class="icon-bx-sm text-primary m-r15 border radius icon-bx">
									<i class="fas fa-envelope-open-text"></i> 
								</div>
								<div class="icon-content">
									<h4 class="title m-b5"><?php echo esc_html__('Email Address','mazo'); ?></h4>
									<?php if(!empty($site_email)) { ?>
										<p>
											<?php echo wp_kses($site_email, 'string'); ?>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<?php if ( is_active_sidebar( 'dz_footer_sidebar3' )) { ?> 
						<div class="row justify-content-center">
							<?php dynamic_sidebar( 'dz_footer_sidebar3' );  ?>
						</div>
					<?php } ?> 
				</div>
			</div>
		<?php } ?>
		
		<?php if(!empty($footer_bottom_on)){ ?>
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row align-items-center fb-inner spno">
						<?php if(!empty($footer_copyright_text)){ ?>					
							<div class="col-lg-6 col-md-6 text-center text-lg-start"> 
								<span class="copyright-text">
									<?php echo wp_kses($footer_copyright_text, $allowed_html_tags);?>
								</span>
							</div>
						<?php } ?>
						
						<div class="col-lg-6 col-md-6 text-center text-lg-end"> 
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