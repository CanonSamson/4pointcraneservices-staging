<?php
global $mazo_option;
extract($mazo_option);
?>

<!-- Footer -->
<footer class="site-footer style-7" id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row  align-items-center">	
				<?php if(!empty($footer_copyright_text)){ ?>
					<div class="col-lg-6 col-sm-12 text-lg-start text-center">
						<div class="widget widget_about">
							<div class="footer-logo logo-white">
								<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
							</div>
							<p>
								<?php echo wp_kses($footer_copyright_text, mazo_allowed_html_tag());?>
							</p>
						</div>	
					</div>	
				<?php } ?>		
				<div class="col-lg-6 col-sm-12 text-lg-end text-center">
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
</footer>
<!-- Footer End -->