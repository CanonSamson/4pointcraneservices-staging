<?php
	global $mazo_option;
	extract($mazo_option);
	
?>
<?php if($header_top_bar_on) { ?>
	<!-- Header Top Bar -->
	<div class="top-bar bg-primary text-white">
		<div class="container">
			<div class="dz-topbar-inner d-flex justify-content-between align-items-center">
				<div class="dz-topbar-left">
					<ul>
						<?php if(!empty($site_address)) { ?>
							<li>
								<i class="fas fa-map-marker-alt"></i> 
								<?php echo wp_kses($site_address, $allowed_html_tags); ?>
							</li>
						<?php } ?>
						
						<?php if(!empty($site_email)) { ?>
							<li>
								<i class="far fa-envelope"></i> 
								<?php echo wp_kses($site_email, $allowed_html_tags); ?>
							</li>
						<?php } ?>
					</ul>
				</div>
				
				<div class="dz-topbar-right">
					<ul class="dz-social">
						<?php if(($header_social_link_on && $show_social_icon)){ ?>
							<?php echo mazo_get_social_icons('header') ;?>
						<?php } ?>
						
						<?php
							if($show_login_registration && $header_login_on)
							{
								if(!is_user_logged_in() && get_option( 'users_can_register' )) { ?>
							  <li class="dz-login-btn"><a href="<?php echo esc_url(home_url().'/login') ?>"><?php echo esc_html__('Login', 'mazo'); ?></a> </li> 
							<?php } else { ?>
								<a href="<?php echo esc_url($booking_page_url); ?>" class="dz-account-btn"><?php echo esc_html('My Account','mazo'); ?></a>
						<?php } 
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php } ?>