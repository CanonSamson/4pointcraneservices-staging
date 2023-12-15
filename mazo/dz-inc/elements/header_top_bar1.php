<?php
	global $mazo_option;
	extract($mazo_option);
	
?>
<?php if($header_top_bar_on) { ?>
    
    <div class="top-bar"  data-tt="<?php echo esc_attr($booking_page_url); ?>">
        <div class="container">
            <div class="dz-topbar-inner d-flex justify-content-between align-items-center">
                <div class="dz-topbar-left">
                    <?php if(!empty($site_email)) { ?>
                        <ul>
                            <li>
                                
                                <a href="mailto:<?php echo esc_attr($site_email);?>"><i class="fa fa-envelope mr-2"></i><?php echo wp_kses($site_email, 'string');?></a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
                <div class="dz-topbar-right">
					<ul>
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