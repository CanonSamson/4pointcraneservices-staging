<?php
global $mazo_option;
extract($mazo_option);
$cart_on = mazo_get_opt('cart_on');
$allowed_html_tags = mazo_allowed_html_tag();
?>
<!-- header -->
    <header class="site-header mo-left style-4 header-full header header-transparent dz-header-4">
		<!-- main header -->
        <div class="<?php echo esc_attr($header_sticky_class); ?> main-bar-wraper">
            <div class="main-bar clearfix ">
				<div class="header-content-bx">
					<button class="navbar-toggler collapsed navicon justify-content-end menu-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<div class="logo-header">
						<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
					</div>
				</div>
            </div>
        </div>
		<div class="header-nav navbar-collapse collapse full-sidenav content-scroll">
			<div class="menu-close">
				<i class="ti-close"></i>
			</div>
			<div class="logo-header">
				<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
			</div>
			<?php
							
				if( ! empty( $mazo_option['scroll_menu_pages'] ) && 
						in_array( mazo_get_current_page_id(), $mazo_option['scroll_menu_pages'])  
					 ) 
					{
						$theme_location = 'one_page_menu';
						$menu_class = 'navbar-nav-scroll';
						
					}else{
						$theme_location = 'main_menu';
						$menu_class = '';
					
					}
					
					
					if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled($theme_location) ){
							
						wp_nav_menu( array( 'theme_location' => $theme_location, 'container_id' => 'navbar-collapse-1',
							'container_class'=>'',
							'menu_class'=>'nav navbar-nav',
							'fallback_cb'=>false, 
							'items_wrap' => '%3$s', 
							'container'=>false,
							'depth'=>'4',
							'walker'=> new Bootstrap_walker()  
							) ); 
						
					}else {
			
			?>
			
				<ul class="nav navbar-nav navbar navbar-left <?php echo esc_attr($menu_class); ?>">	
					<?php wp_nav_menu( array( 'theme_location' => $theme_location, 'container_id' => 'navbar-collapse-1',
						'container_class'=>'',
						'menu_class'=>'nav navbar-nav',
						'fallback_cb'=>false, 
						'items_wrap' => '%3$s', 
						'container'=>false,
						'depth'=>'4',
						'walker'=> new Bootstrap_walker()  
						) ); 
					?>
				</ul>
				
				<?php } ?>
				
				<div class="sidebar-footer pb-0">
					<div class="dlab-login-register">
					<?php 
						if(!is_user_logged_in() && get_option( 'users_can_register' ) && $show_login_registration) {
						  if( $header_login_on ) {?>
						  <a class="dz-login-btn btn btn-primary btn-sm" href="<?php echo esc_url(wp_login_url());?>"><?php echo esc_html__('Sign In', 'mazo'); ?></a> 
						  <?php } ?>	
						
						<?php if( $header_register_on ) {?>
						  <a class="dz-register-btn btn btn-primary btn-sm" href="<?php echo esc_url(home_url('/wp-login.php?action=register'));?>"><?php echo esc_html__('Sign Up', 'mazo'); ?></a>
						<?php }?>
					  <?php }?>
					</div>
			
					<?php if($header_social_link_on && $show_social_icon){ ?>
						<div class="social-menu">
							<ul>
								<?php echo mazo_get_social_icons('header') ;?>
							</ul>
							<?php if(!empty($footer_copyright_text)){ ?>					
								<p class="copyright-head">
									<?php echo wp_kses($footer_copyright_text, $allowed_html_tags);?>
								</p>
							<?php } ?>
						</div>		
					<?php } ?>	
				</div>
			</div>
		
        <!-- main header END -->
    </header>
    <!-- header END -->