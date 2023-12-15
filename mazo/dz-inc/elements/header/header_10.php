<?php
global $mazo_option;
extract($mazo_option);

?>
<!-- header -->
	<header class="site-header style-5 mo-left onepage construct-header header">
		<!-- main header -->
		<?php get_template_part('dz-inc/elements/header_top_bar6'); ?>	
	
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix onepage">
				<div class="container clearfix">
					
					<!-- Website Logo -->
					<div class="logo-header mostion">
						<?php do_action( 'mazo_get_logo','site_logo'); ?>
					</div>
					
					<!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
					<!-- Extra Nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<?php if(!empty($header_button_1_text)) { ?>
							<a href="<?php echo esc_url($header_button_1_url); ?>" target="<?php echo esc_attr($header_button_1_target); ?>" class="btn shadow-primary btn-primary btn-quote btn-sm d-sm-block d-none">
								<span><?php echo esc_html($header_button_1_text); ?></span>
							</a>
						<?php } ?>
							
						</div>
					</div>
					<!-- Extra Nav -->
					
					<!-- Quik Search -->
					<div class="dz-quik-search">
						<form action="#">
							<input name="search" value="" type="text" class="form-control" placeholder="Enter Your Keyword ...">
							<span id="quik-search-remove"><i class="ti-close"></i></span>
						</form>
					</div>
					
					<!-- Main nav -->
					<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
					<div class="logo-header">
						<?php do_action( 'mazo_get_logo','site_logo'); ?>
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
						<?php }
						if(!is_user_logged_in() && get_option( 'users_can_register' ) && $show_login_registration) { ?>
						<div class="sidebar-footer">
							<div class="dlab-login-register">
							<?php 
								  if($header_login_on ) {?>
								  <a class="dz-login-btn btn btn-primary btn-sm" href="<?php echo esc_url(wp_login_url());?>"><?php echo esc_html__('Sign In', 'mazo'); ?></a> 
								  <?php } ?>	
								
								<?php if( $header_register_on ) {?>
								  <a class="dz-register-btn btn btn-primary btn-sm" href="<?php echo esc_url(home_url('/wp-login.php?action=register'));?>"><?php echo esc_html__('Sign Up', 'mazo'); ?></a>
								<?php } ?>
							</div>
						</div>
					  <?php }?>
					</div>
				</div>
			</div>
		</div>
		<!-- main header END -->
	</header>
	<!-- header END -->