<?php
global $mazo_option;
extract($mazo_option);
$cart_on = mazo_get_opt('cart_on');
?>

<!-- header -->
    <header class="site-header header mo-left onepage header-transparent ele-header">
		<!-- main header -->
        <div class="<?php echo esc_attr($header_sticky_class); ?> main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                     <div class="logo-header mostion">
						<?php do_action( 'mazo_get_logo','site_other_logo'); ?>
						<?php do_action( 'mazo_get_logo','site_logo'); ?>
					</div>
					
                    <!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
						<!-- extra nav -->
						<div class="extra-nav">
							<div class="extra-cell">
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
									<a href="<?php echo esc_url($header_button_1_url); ?>" target="<?php echo esc_attr($header_button_1_target); ?>" class="btn btn-primary scroll radius-no d-none d-sm-block btn-sm">
										<?php echo esc_html($header_button_1_text); ?>
									</a>
								<?php } ?>
							</div>
						</div>
					
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<div class="logo-header logo-dark">
							<?php do_action( 'mazo_get_logo','site_logo','none'); ?>
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
					
						<ul class="nav navbar-nav navbar <?php echo esc_attr($menu_class); ?>">	
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
						
						<?php if($header_social_link_on && $show_social_icon){ ?>
							<div class="social-menu">
								<ul>
									<?php echo mazo_get_social_icons('header') ;?>
								</ul>
							</div>
						<?php } ?>
					</div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->