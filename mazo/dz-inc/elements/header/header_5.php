<?php
global $mazo_option;
extract($mazo_option);
$cart_on = mazo_get_opt('cart_on');
$allowed_html_tags = mazo_allowed_html_tag();
?>
<!-- Header -->
	<header class="site-header mo-left header style-2">
		<!-- Header Top Bar -->
		<?php get_template_part('dz-inc/elements/header_top_bar3'); ?>	
		
		<!-- Main Header -->
		<div class="<?php echo esc_attr($header_sticky_class); ?> main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix">
				<div class="container-fluid clearfix">
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
							<?php if(!empty($site_phone_number)) { ?>
								<div class="phone-call">
									<i class="fas fa-phone-alt"></i>
									<span><?php echo wp_kses($site_phone_number, 'string'); ?></span>
								</div>
							<?php } ?>
							
							<?php if($cart_on){ ?>
								<div class="shop-cart navbar-right">
									<?php if(mazo_is_woocommerce_active() 
										&& is_active_sidebar('shopping-cart')
										&& mazo_is_woo_catalog_shop_enable()
										&& !is_cart() 
										&& !is_checkout()
										) { 
										global $woocommerce;
										ob_start();
									?>
									<a class="cart-btn" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'mazo'); ?>">
										<span class="badge bg-black cart-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'mazo'), $woocommerce->cart->cart_contents_count);?></span>
									</a>
									<div class="minicart">
										<?php  dynamic_sidebar('shopping-cart'); ?>
									</div>
									<?php } ?>
								</div>
							<?php } ?>
							
							<?php if(!empty($header_button_1_text)) { ?>
								<a href="<?php echo esc_url($header_button_1_url); ?>" target="<?php echo esc_attr($header_button_1_target); ?>" class="btn shadow-primary btn-primary btn-quote">
									<i class="flaticon-briefing"></i>
									<span><?php echo esc_html($header_button_1_text); ?></span>
								</a>
							<?php } ?>
							
						</div>
					</div>
					<!-- Extra Nav -->
					
					<div class="header-nav navbar-collapse collapse justify-content-start nav-style-1" id="navbarNavDropdown">
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
						
						<?php } ?>
						
						<div class="sidebar-footer">
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
								<div class="dz-social-icon">
									<ul>
										<?php echo mazo_get_social_icons('header') ;?>
									</ul>
								</div>		
							<?php } ?>	
						</div>
							
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
	<!-- Header End -->