<?php 
add_action('after_setup_theme', 'mazo_bunch_theme_setup');

function mazo_bunch_theme_setup() 
{
	global $wp_version;
	$theme = wp_get_theme();
	if(!defined('MAZO_VERSION')) {define('MAZO_VERSION', '1.5');}
	if( !defined( 'MAZO_ROOT' ) ) {define('MAZO_ROOT', get_template_directory().'/');}
	if( !defined( 'MAZO_URL' ) ) {define('MAZO_URL', get_template_directory_uri().'/');}

	if( !defined( 'MAZO_COMINGSOON' ) ) {define('MAZO_COMINGSOON', get_template_directory_uri().'/assets/images/bg1.jpg');}
	if( !defined( 'MAZO_MAINTENANCE' ) ) {define('MAZO_MAINTENANCE', get_template_directory_uri().'/assets/images/bg2.jpg');}
	if( !defined( 'MAZO_MAINTENANCE_VLC' ) ) {define('MAZO_MAINTENANCE_VLC', get_template_directory_uri().'/assets/images/vlc.png');}

	if( !defined( 'MAZO_DEFAULT_LOGO' ) ) {define('MAZO_DEFAULT_LOGO', get_template_directory_uri().'/assets/images/logo.png');}
	if( !defined( 'MAZO_DEFAULT_WHITE_LOGO' ) ) {define('MAZO_DEFAULT_WHITE_LOGO', get_template_directory_uri().'/assets/images/logo.png');}

	if( !defined( 'MAZO_DEFAULT_TEXT_LOGO' ) ) {define('MAZO_DEFAULT_TEXT_LOGO', $theme->get('Name'));}

	if( !defined( 'MAZO_DEFAULT_TAG' ) ) {define('MAZO_DEFAULT_TAG', esc_html__('Personal Blog', 'mazo'));}

	if( !defined( 'MAZO_BANNER' ) ) {define('MAZO_BANNER', get_template_directory_uri().'/assets/images/bnr4.jpg');}
	if( !defined( 'MAZO_COPYWRITE_TEXT' ) ) {define('MAZO_COPYWRITE_TEXT', esc_html__('© 2022 All Rights Reserved.','mazo'));}
	
	if( !defined( 'MAZO_FAVICON' ) ) {define('MAZO_FAVICON', get_template_directory_uri().'/assets/images/favicon.png');}
	
	include_once get_template_directory() . '/dz-inc/loader.php';
	
	load_theme_textdomain('mazo', get_template_directory() . '/languages');
	
	/*	ADD THUMBNAIL SUPPORT	*/
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links'); /* Enables post and comment RSS feed links to head. */
	add_theme_support('widgets'); /* Add widgets and sidebar support */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' ); /* Enable woo-commerce page template */
	add_theme_support( 'wc-product-gallery-lightbox' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu')) {
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'mazo'),
				'one_page_menu' => esc_html__('One Page Menu', 'mazo'),
				'footer_menu' => esc_html__('Footer Menu', 'mazo'),
			)
		);
	}
	if ( ! isset( $content_width ) ) { $content_width = 960;	}
		 
		 /** Image Size Setting For Mazo **/
		 
		/*** Post Images ***/
		add_image_size( 'mazo_500x650', 500, 650, true ); /* Team */
		add_image_size( 'mazo_555x400', 555, 400, true ); /* Portfolio */
		add_image_size( 'mazo_555x800', 555, 800, true ); /* Portfolio */
		
		/* Change default image thumbnail sizes in wordpress */
		//Thumbnail
		update_option('thumbnail_size_w', 200); /* Testimonial, Author Box */
		update_option('thumbnail_size_h', 200); 
		update_option('thumbnail_crop', 1);
		
		//Medium
		update_option('medium_size_w', 500); /* Team, Blog List, Blog Grid */
		update_option('medium_size_h', 400);
		update_option('medium_crop', 1);
		
		//Large
		update_option('large_size_w', 1000); /* Blog Large, Grid */
		update_option('large_size_h', 500);
		update_option('large_crop', 1);
		/** Image Size Setting For Mazo END **/
		
}


/**
 * Register sidebar
 */
function mazo_sidebar() 
{
	global $wp_registered_sidebars;
	
	register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'mazo'),
        'id'            => 'dz_blog_sidebar',
        'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'mazo' ),
        'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s substitute-class">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h5 class="title">',
		'after_title' => '</h5></div>'
    ));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'mazo' ),
	  'id' => 'dz_footer_sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-xl-3 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-1" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4><div class="dz-separator style-1 text-primary mb-0"></div></div>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar 2', 'mazo' ),
	  'id' => 'dz_footer_sidebar2',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-xl-3 col-lg-3 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4></div>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar 3', 'mazo' ),
	  'id' => 'dz_footer_sidebar3',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-xl-3 col-lg-3 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4></div>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar 4', 'mazo' ),
	  'id' => 'dz_footer_sidebar4',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-xl-3 col-lg-3 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4></div>'
	));
    
    register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar 5', 'mazo' ),
	  'id' => 'dz_footer_sidebar5',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-xl-3 col-lg-3 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4></div>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar 6', 'mazo' ),
	  'id' => 'dz_footer_sidebar6',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-md-6 col-lg-4 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4></div>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar 7', 'mazo' ),
	  'id' => 'dz_footer_sidebar7',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'mazo' ),
	  'before_widget'=>'<div id="%1$s" class="widget col-md-6 col-lg-3 col-sm-6 aos-item  %2$s substitute-class footer-sidebar-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h4 class="title">',
	  'after_title' => '</h4></div>'
	));
  
	if(mazo_is_woocommerce_active())
	{
		register_sidebar(array(
		  'name' => esc_html__( 'Shop Sidebar', 'mazo' ),
		  'id' => 'dz_shop_sidebar',
		  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'mazo' ),
		  'before_widget'=>'<div id="%1$s" class="widget shop-widget %2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<div class="widget-title"><h4 class="title">',
		  'after_title' => '</h4><div class="dz-separator style-1 text-primary mb-0"></div></div>'
		));
		
		register_sidebar(array(
		  'name' => esc_html__( 'Header Shopping Cart', 'mazo' ),
		  'id' => 'shopping-cart',
		  'description' => esc_html__( 'Widgets in this area will be shown in Header Area.', 'mazo' ),
		  'before_widget'=>'<div id="%1$s" class="%2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<h4 class="acod-title">',
		  'after_title' => '</h4>'
		));
	}
	/* "substitute-class" using for replace required class dynamically. */
	
	if (class_exists('ReduxFramework')) {

        $sidebar_input_arr = mazo_get_opt( 'new_sidebar_input' );
        
		if(!empty( $sidebar_input_arr[0])) {
            foreach($sidebar_input_arr as $sidebar_input)
			{
				$sidebarId = str_replace(' ', '_', $sidebar_input);
            
				register_sidebar(array(
					'name'          => ucfirst($sidebar_input),
					'id'            => sanitize_title('dz_' . $sidebarId),
					'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'mazo' ),
					'before_widget'	=>'<div id="%1$s" class="widget ext-sidebar-menu sidebar-widget substitute-class">',
					'after_widget'	=>'</div>',
					'before_title' 	=> '<h4 class="title">',
					'after_title' 	=> '</h4>'
				));	
			}
        }
    }	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action('widgets_init', 'mazo_sidebar');



function mazo_load_head_scripts() {
	$options = mazo_dzbase()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
		$map_api_key = mazo_set($options, 'map_api_key');
		
		if(!empty($map_api_key)) {
		$map_path = '?key='.mazo_set($options, 'map_api_key');
			wp_enqueue_script( 'mazo-map-api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
		}
	
	}
}
add_action( 'wp_enqueue_scripts', 'mazo_load_head_scripts' );

/**
 * Check if Plugin is active
 **/
function mazo_plugin_active($plugin)
{
	$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if(!empty($plugin) && !empty($active_plugins) && in_array($plugin,$active_plugins)) 
	{
		return true;
	}else{
		return false;
	}
}
/* global variables */
function mazo_bunch_global_variable() 
{
	
	global $post;
	global $mazo_option;

	if(mazo_plugin_active('redux-framework/redux-framework.php'))
	{
		$options = mazo_dzbase()->option();
	}
	else{
		$options = array();
	}

	$dzRes = array();

	
	$dzRes['allowed_html_tags'] = wp_kses_allowed_html('post');

	$dzRes['website_status'] = mazo_set($options, 'website_status', 'live_mode');	
	$dzRes['theme_corner'] = mazo_set($options, 'theme_corner', 'sharped');
	$dzRes['theme_font_style'] = mazo_set($options, 'theme_font_style', 'default');
	$dzRes['theme_corner_rounded'] = mazo_set($options, 'theme_corner_rounded', 'rounded');
	$dzRes['rtl_on'] = mazo_set($options, 'rtl_on');	
	
	if(function_exists('mazo_get_ws_data')){
		$extra_ws_data = mazo_get_ws_data($options);
		$dzRes = array_merge($dzRes,$extra_ws_data);
	}
	
	/* stuff : header.php  */
	$dzRes['site_favicon'] = isset($options['favicon']) ? mazo_set($options['favicon'], 'url', MAZO_FAVICON ) : MAZO_FAVICON;
	
	/* preloading image */
	$dzRes['page_loading_on'] = mazo_set($options, 'page_loading_on');
	$dzRes['page_loader_type'] = mazo_set($options, 'page_loader_type');
	$dzRes['page_loader_image'] = mazo_set($options, 'page_loader_image', 'loading1');
	$dzRes['custom_page_loader_image'] = mazo_set($options, 'custom_page_loader_image');
	if($dzRes['page_loading_on'] == 1)
	{
		if($dzRes['page_loader_type'] == 'loading_image')
		{
			if(!empty($options['custom_page_loader_image']['url'])) {
				$dzRes['preloader'] = get_template_directory_uri().'/dz-inc/assets/images/loading-images/'.$page_loader_image.'.svg';
			}
			else {
				$page_loader_image = mazo_set($options, 'page_loader_image', 'loading1');
				$dzRes['preloader'] = get_template_directory_uri().'/dz-inc/assets/images/loading-images/'.$page_loader_image.'.svg';
			}
		}	
		elseif($dzRes['page_loader_type'] == 'advanced_loader')
		{
			$dzRes['preloader'] = mazo_set($options,'advanced_page_loader_image', '');
		}	
	}
	
	/* Get header & footer settings */
	$dzRes['header_style'] = mazo_set($options,'header_style', 'header_1');
	$dzRes['footer_style'] = mazo_set($options, 'footer_style', 'footer_template_1'); 
	$dzRes['footer_on'] = mazo_set($options, 'footer_on', true);
	
	/* Get Header & Footer: According to CPT */
	$header_setting_meta_key = '';
	$footer_setting_meta_key = '';

	if(is_page()) 
	{
		$header_setting_meta_key	= 'page_header_setting';
		$header_style_meta_key  	= 'page_header_style';

		$footer_setting_meta_key	= 'page_footer_setting';
		$footer_style_meta_key		= 'page_footer_style';
		$footer_on_meta_key 		= 'page_footer_on';
	}else if(is_singular('dz_service')){
		$header_setting_meta_key	= 'service_page_header_setting';
		$header_style_meta_key		= 'service_page_header_style';

		$footer_setting_meta_key 	= 'service_page_footer_setting';
		$footer_style_meta_key 		= 'service_page_footer_style';
		$footer_on_meta_key 		= 'service_page_footer_on';
	}else if(is_singular('dz_portfolio')){
		$header_setting_meta_key	= 'portfolio_page_header_setting';
		$header_style_meta_key		= 'portfolio_page_header_style';

		$footer_setting_meta_key 	= 'portfolio_page_footer_setting';
		$footer_style_meta_key 		= 'portfolio_page_footer_style';
		$footer_on_meta_key 		= 'portfolio_page_footer_on';
	}
	else if(is_single()) 
	{
		$header_setting_meta_key 	= 'post_header_setting';
		$header_style_meta_key 		= 'post_header_style';

		$footer_setting_meta_key	= 'post_footer_setting';
		$footer_style_meta_key 		= 'post_footer_style';
		$footer_on_meta_key 		= 'post_footer_on';
	} 


	$header_setting 	= 	mazo_dzbase()->get_meta($header_setting_meta_key); 
	$header_setting	=	!empty($header_setting)?$header_setting:'theme_default';
	if($header_setting == 'custom'){
		$header_style 	= mazo_dzbase()->get_meta($header_style_meta_key); 
		$dzRes['header_style']	= !empty($header_style)?$header_style:$dzRes['header_style'];
	}

	$footer_setting 	= mazo_dzbase()->get_meta($footer_setting_meta_key);
	$footer_setting	=	!empty($footer_setting)?$footer_setting:'theme_default';
	if($footer_setting == 'custom'){
		$footer_style 	= mazo_dzbase()->get_meta($footer_style_meta_key); 
		$dzRes['footer_on'] = mazo_dzbase()->get_meta($footer_on_meta_key);
		$dzRes['footer_style']	= !empty($footer_style)?$footer_style:$dzRes['footer_style'];
	}

	/* Get Header & Footer: According to CPT END */
	
	
	$dzRes['header_login_on'] = mazo_set($options,'header_login_on');
	$dzRes['header_register_on'] = mazo_set($options,'header_register_on');
	$dzRes['header_sticky_on'] = mazo_set($options,'header_sticky_on');
	$dzRes['show_website_search'] = mazo_set($options,'show_website_search',true);
	$dzRes['show_login_registration'] = mazo_set($options,'show_login_registration');
	$dzRes['show_social_icon'] = mazo_set($options,'show_social_icon');
	$dzRes['header_sticky_class'] = ($dzRes['header_sticky_on']) ? 'sticky-header' : '';
	
	$dzRes['header_location_on'] = mazo_set($options, $dzRes['header_style'].'_location_on',true);	
	$dzRes['site_phone_number'] = mazo_set($options, 'site_phone_number');
	$dzRes['site_address'] = mazo_set($options, 'site_address');
	$dzRes['site_skype'] = mazo_set($options, 'site_skype');
	$dzRes['site_email'] = mazo_set($options, 'site_email');
	
	$dzRes['header_search_on'] = mazo_set($options, $dzRes['header_style'].'_search_on', true);
	$dzRes['header_search_button_title'] = mazo_set($options, $dzRes['header_style'].'_search_button_title',esc_html__('Search','mazo'));
	$dzRes['header_social_link_on'] = mazo_set($options, $dzRes['header_style'].'_social_link_on');
	$dzRes['header_social_links'] = mazo_set($options, $dzRes['header_style'].'_social_links');
	$dzRes['header_top_bar_on'] = mazo_set($options, $dzRes['header_style'].'_top_bar_on');
	$dzRes['header_author_banner_on'] = mazo_set($options, $dzRes['header_style'].'_author_banner_on');
	$dzRes['header_banner_bg_image'] = mazo_set($options, $dzRes['header_style'].'_banner_bg_image');
	$dzRes['header_banner_bg_image'] = !empty($dzRes['header_banner_bg_image']['url'])?$dzRes['header_banner_bg_image']['url']:'';
	
	/* Manage header Subscription Form */
	$dzRes['header_subscribe_on'] = mazo_set($options, 'header_subscribe_on');
	
	/* End Manage Subscription Form */
	
	
	/* Manage Sidebar About */
	$dzRes['header_about_on'] = mazo_set($options, 'header_about_on');
	$dzRes['header_about_title'] = mazo_set($options, 'header_about_title');
	$dzRes['header_about_url'] = mazo_set($options, 'header_about_url','');
	$dzRes['header_about_desc'] = mazo_set($options, 'header_about_desc');
	/* Manage Sidebar About */
	
	/* Booking Page Url */
	$dzRes['booking_page_url'] = mazo_set($options, 'booking_page_url','');
	/* Booking Page Url */
	
	$header_style_options = mazo_header_style_options();
	foreach($header_style_options as $header)
	{
		$call_to_action_button = mazo_set($header['param'], 'call_to_action_button', 0);
    
		if($call_to_action_button > 0 )
	    {					
			for($i = 1; $i <= $call_to_action_button; $i++ )
			{
				$dzRes['header_button_'.$i.'_text'] = mazo_set($options, $dzRes['header_style'].'_button_'.$i.'_text', '');
				$dzRes['header_button_'.$i.'_url'] = mazo_set($options, $dzRes['header_style'].'_button_'.$i.'_url', ''); 
				$dzRes['header_button_'.$i.'_target'] = mazo_set($options, $dzRes['header_style'].'_button_'.$i.'_target', '');
			}
		}
	}

	$dzRes['mobile_header_login_on'] = mazo_set($options,'mobile_header_login_on', '');
	$dzRes['mobile_header_register_on'] = mazo_set($options,'mobile_header_register_on', '');
	$dzRes['mobile_header_social_link_on'] = mazo_set($options, $dzRes['header_style'].'_mobile_social_link_on', '');
	$dzRes['mobile_search_on'] = mazo_set($options, $dzRes['header_style'].'_mobile_search_on', '');

	$dzRes['social_link_target'] = mazo_set($options,'social_link_target','');
	/* header settings END */

	
	/* Footer Settings Starts */
	$dzRes['footer_top_on'] = mazo_set($options, 'footer_top_on', true);
	$dzRes['footer_bottom_on'] = mazo_set($options, 'footer_bottom_on', true);
	$dzRes['footer_subscribe_on'] = mazo_set($options, 'footer_subscribe_on', false);	
	
	$dzRes['subscription_section_image'] = mazo_set($options, 'subscription_section_image');
	$dzRes['subscription_section_desc'] = mazo_set($options, 'subscription_section_desc',esc_html__('Sed laoreet orci id pretium sodales. Nunc ac est dolor. Donec placerat dolor et mi elementum, in suscipit libero tincidunt. Ut at tempor ex, vel auctor tortor. Sed finibus vitae mi et imperdiet.', 'mazo'));
	$dzRes['subscription_section_email'] = mazo_set($options, 'subscription_section_email',esc_html__('INFO@DEXIGNZONE.COM', 'mazo'));
	
	$dzRes['footer_top'] = mazo_set($options, 'footer_top', false);
	
	$dzRes['footer_bg_image'] = mazo_set($options, $dzRes['footer_style'].'_bg_image');
	$dzRes['footer_social_on'] = mazo_set($options, $dzRes['footer_style'].'_social_on');
	$dzRes['footer_copyright_text'] = isset($options['footer_copyright_text']) ? mazo_set($options, 'footer_copyright_text', MAZO_COPYWRITE_TEXT) : MAZO_COPYWRITE_TEXT;
	
	/* Footer Params Actions */
	$footer_style_options = mazo_footer_style_options();
	foreach($footer_style_options as $footer)
	{
		$call_to_action_button = mazo_set($footer['param'], 'call_to_action_button', 0);
		$bg_image = mazo_set($footer['param'], 'bg_image', 0);
		$informative_field = mazo_set($footer['param'], 'informative_field', 0);
		
		if($call_to_action_button > 0 )
			{					
				for($i = 1; $i <= $call_to_action_button; $i++ )
				{
					$dzRes['footer_button_'.$i.'_text'] = mazo_set($options, $dzRes['footer_style'].'_button_'.$i.'_text', '');
					$dzRes['footer_button_'.$i.'_url'] = mazo_set($options, $dzRes['footer_style'].'_button_'.$i.'_url', ''); 
					$dzRes['footer_button_'.$i.'_target'] = mazo_set($options, $dzRes['footer_style'].'_button_'.$i.'_target', '');
				}
			}
	}
	/* Footer Params Actions END */
	
	/* Footer Instagram Settings */
	$dzRes['footer_top_feeds'] = mazo_set($options, 'footer_top_feeds', 'normal_feeds');
	if($dzRes['footer_top_feeds'] == 'instagram_feeds')
	{
		$dzRes['instagram_shortcode']		= mazo_set($options,'instagram_shortcode');
		$dzRes['footer_instagram_title']	= mazo_set($options,'footer_instagram_title');
		$dzRes['footer_instagram_link']		= mazo_set($options,'footer_instagram_link');
		$dzRes['footer_instagram_btn_text']	= mazo_set($options,'footer_instagram_btn_text');
	}
	$dzRes['scroll_menu_pages'] = mazo_set($options, 'scroll_menu_pages');
	
	/* Footer Instagram Settings END */
	
	/* Footer Settings Starts END */

	/* logo setting , adition logo settings for 'site_other_logo' for mazo theme */
	$dzRes['logo_type'] = mazo_set($options,'logo_type', '');
	$dzRes['logo_title'] = mazo_set($options,'logo_title', MAZO_DEFAULT_TEXT_LOGO);
	$dzRes['tag_line'] = mazo_set($options,'tag_line', MAZO_DEFAULT_TAG);
	
	$dzRes['logo_alt'] = mazo_set($options,'logo_alt', MAZO_DEFAULT_TEXT_LOGO);
	
	if(isset($options['logo_type']) && $options['logo_type'] == 'image_logo')
	{
		$dzRes['logo'] = ($dzRes['header_style'] == 'header_2') ? mazo_set($options['site_other_logo'], 'url', MAZO_DEFAULT_WHITE_LOGO) : mazo_set($options['site_logo'], 'url', MAZO_DEFAULT_LOGO);
	}
	elseif(isset($options['logo_type']) && $options['logo_type'] == 'text_logo') {
		$dzRes['logo_text'] = mazo_set($dzRes,'logo_text', MAZO_DEFAULT_TEXT_LOGO);
		$dzRes['logo_title'] = mazo_set($options,'logo_title', MAZO_DEFAULT_TEXT_LOGO);
	}
	else {
		$dzRes['logo'] = MAZO_DEFAULT_LOGO;
	}
	
	$dzRes['site_logo_icon'] = isset($options['site_logo_icon']) ? mazo_set($options['site_logo_icon'], 'url') : get_template_directory_uri() . '/assets/images/logo-icon.png';
	$dzRes['site_logo'] = isset($options['site_logo']) ? mazo_set($options['site_logo'], 'url', MAZO_DEFAULT_LOGO) : MAZO_DEFAULT_LOGO;

	$dzRes['site_other_logo'] = isset($options['site_other_logo']) ? mazo_set($options['site_other_logo'], 'url', MAZO_DEFAULT_WHITE_LOGO) : MAZO_DEFAULT_WHITE_LOGO;

	$dzRes['ratina_logo'] = isset($options['ratina_logo']) ? mazo_set($options['ratina_logo'], 'url' , '') : '';
	$dzRes['mobile_logo'] = isset($options['mobile_logo']) ? mazo_set($options['mobile_logo'],'url', '') : '';
	$dzRes['ratina_mobile logo'] = isset($options['ratina_mobile_logo']) ? mazo_set($options['ratina_mobile_logo'], 'url', '') : '';
	/* End logo setting  */

	/*************************************************************************************************/
	$dzRes['show_search_button'] = $dzRes['header_search_on'];
	$dzRes['search_button_title'] = $dzRes['header_search_button_title'];
	$dzRes['hide_social_icons_mobile'] = $dzRes['mobile_header_social_link_on'];
	
	/* Post general setting */
	$dzRes['post_layout'] = mazo_set($options, 'post_general_layout', 'standard');
	$dzRes['post_view_on'] = mazo_set($options, 'post_view_on');
	$dzRes['post_start_view'] = mazo_set($options, 'post_start_view', 1);
	$dzRes['pre_next_post_on'] = mazo_set($options, 'pre_next_post_on');
	$dzRes['comment_view_on'] = mazo_set($options, 'comment_view_on');
	$dzRes['featured_img_on'] = mazo_set($options, 'featured_img_on');
	$dzRes['featured_img_on'] = mazo_set($options, 'featured_img_on');
	/* Post general setting end */
	
	/* Page banner setting */
	$dzRes['show_banner'] = isset($options['page_general_banner_on']) ? $options['page_general_banner_on'] : true;
	$dzRes['banner_type'] = 'image';
	$dzRes['banner_height'] = mazo_set($options, 'page_general_banner_height', 'page_banner_big');
	$dzRes['banner_custom_height'] = mazo_set($options, 'page_general_banner_custom_height', '100');
	$dzRes['banner_image'] = isset($options['page_general_banner']) ? mazo_set($options['page_general_banner'], 'url', MAZO_BANNER) : MAZO_BANNER;
	/* End Page banner setting */
	
	/* Sidebar and there layout */
	$dzRes['layout'] = 'right';
	$dzRes['sidebar'] = 'dz_blog_sidebar';
	$dzRes['show_sidebar'] = mazo_set($options, 'page_general_show_sidebar', true);
	if($dzRes['show_sidebar']) {
		$dzRes['layout'] = mazo_set($options, 'page_general_sidebar_layout', 'right');
		$dzRes['sidebar'] = mazo_set($options, 'page_general_sidebar', 'dz_blog_sidebar');
	}
	/* End Sidebar and there layout */

	$pagination = mazo_set($options, 'page_general_paging', 'default');
	$dzRes['disable_ajax_pagination'] = ($pagination == 'load_more') ? $pagination : '';
	/*************************************************************************************************/	
	
	$HomePagetemp = $dzRes;
	
	/* page.php */
	if(is_page()) { 
		
		$page_level_keys = array(
			'page_header_setting',
			'page_header_style',
			'page_banner_height',
			'page_banner_on',
			'page_banner_hide',
			'page_banner',
			'banner_image',
			'page_show_sidebar',
			'page_sidebar_layout',
			'page_sidebar',
			'page_footer_setting',
			'page_footer_style',
		);

		foreach($page_level_keys as $value)
		{
			$page_settings[$value] =  mazo_dzbase($page_level_keys)->get_meta($value);
		}
		
		/* Header & Logo Setting */		
		
		$dzRes['header_top_bar_on'] = mazo_set($options, $dzRes['header_style'].'_top_bar_on');
		$dzRes['header_search_on'] = mazo_set($options, $dzRes['header_style'].'_search_on',true);			
		
		if($dzRes['header_style'] == 'header_2')
		{
			$dzRes['logo'] = mazo_set($options, 'site_other_logo');
			$dzRes['logo'] = mazo_set($dzRes['logo'], 'url', MAZO_DEFAULT_WHITE_LOGO);
		}else{
			$dzRes['logo'] = mazo_set($options, 'site_logo');
			$dzRes['logo'] = mazo_set($dzRes['logo'], 'url', MAZO_DEFAULT_LOGO);
		}
		
		/* End Header & Logo Setting */
		
		/* Page banner setting */
		
		$dzRes['show_banner'] = isset($page_settings['page_banner_on']) ? $page_settings['page_banner_on'] : $dzRes['show_banner'];
		
		$dzRes['banner_height'] = !empty($page_settings['page_banner_height'])?$page_settings['page_banner_height']:$dzRes['banner_height'];
		
		$dzRes['banner_custom_height'] = !empty($page_settings['page_banner_custom_height'])?$page_settings['page_banner_custom_height']:$dzRes['banner_custom_height'];
		
		$dzRes['dont_use_banner_image'] = mazo_set($page_settings,'page_banner_hide', 0);
		
		if($dzRes['dont_use_banner_image'] == 0){
			$dzRes['banner_image'] = isset($page_settings['page_general_banner']) ? mazo_set($page_settings['page_general_banner'], 'url', $dzRes['banner_image']) : $dzRes['banner_image']; 
		}
		else{
			$dzRes['banner_image'] = '';
		}
		/* End page banner setting */		
		
		/* Sidebar and there layout */
		$dzRes['show_sidebar'] = isset($page_settings['page_show_sidebar']) ? $page_settings['page_show_sidebar'] : $dzRes['show_sidebar'];
		if($dzRes['show_sidebar']) {
			$dzRes['layout'] = mazo_set($page_settings, 'page_sidebar_layout', $dzRes['layout']);
			$dzRes['sidebar'] = mazo_set($page_settings, 'page_sidebar', $dzRes['sidebar']);
		}
		/* End Sidebar and there layout */
	}	

	/* single.php */
	if(is_single())	{

		$page_level_keys = array(
			'featured_post',
			'post_layout',
			'post_type_gallery1',
			'post_type_gallery2',
			'post_type_link',
			'post_type_video',
			'post_type_audio',
			'post_show_sidebar',
			'post_sidebar_layout',
			'post_header_setting',
			'post_header_style',
			'post_footer_setting',
			'post_footer_style',
			'post_sidebar'
		);
		
		foreach($page_level_keys as $value)
		{
			$page_settings[$value] =  mazo_dzbase($page_level_keys)->get_meta($value);
		}

		
		$dzRes['is_featured_post'] = mazo_dzbase()->get_meta( 'featured_post' );
		$post_layout = mazo_dzbase()->get_meta( 'post_layout' );
		$dzRes['post_layout'] = (isset($post_layout)) ? $post_layout : $dzRes['post_layout'];

		if($dzRes['post_layout'] == 'slider_post_1') {
			$dzRes['post_gallary_setting'] = mazo_dzbase()->get_meta('post_type_gallery1');
		}
		if($dzRes['post_layout'] == 'slider_post_2') {
			$dzRes['post_gallary_setting'] = mazo_dzbase()->get_meta('post_type_gallery2');
		}
		$dzRes['external_link'] = mazo_dzbase()->get_meta('post_type_link');
		$dzRes['youtube_link'] = mazo_dzbase()->get_meta('post_type_video');
		$dzRes['audio_link'] = mazo_dzbase()->get_meta('post_type_audio');
		
		/* Single post sidebar settings from post level. */
		if($dzRes['post_layout'] == 'gutenberg') {
			$dzRes['sidebar'] = '';
			$dzRes['layout'] = 'full';
		}
		else {

			/* Sidebar and there layout */
			$dzRes['show_sidebar'] = mazo_set($page_settings,'post_show_sidebar',$dzRes['show_sidebar']);
			if($dzRes['show_sidebar'] == true) {
				$dzRes['layout'] = mazo_set($page_settings, 'post_sidebar_layout', $dzRes['layout']);
				$dzRes['sidebar'] = mazo_set($page_settings, 'post_sidebar', $dzRes['sidebar']);
			}
			/* End Sidebar and there layout */
		}
		// Single post sidebar settings from post level end.
		$dzRes['related_post_title'] = mazo_set($options, 'related_post_title', '');
		$dzRes['layout_class'] = (!is_active_sidebar($dzRes['sidebar']) || $dzRes['layout'] == 'full' || $dzRes['show_sidebar'] != true || !mazo_is_theme_sidebar_active()) ? ' col-lg-12 col-md-12 ' : ' col-lg-8 col-md-7 sidebar ';
	}
	
	/* archive.php */
	if(is_archive()) {

		
		$dzRes['page_title'] = mazo_set($options,'archive_page_title', esc_html__('Archive : ', 'mazo'));
		$options['archive_page_banner'] = '';
		/* Page banner setting */
		$dzRes['show_banner'] = isset($options['archive_page_banner_on']) ? $options['archive_page_banner_on'] : $dzRes['show_banner'];
		$dzRes['banner_height'] = mazo_set($options, 'archive_page_banner_height', $dzRes['banner_height']);
		$dzRes['dont_use_banner_image'] = mazo_set($options, 'archive_page_banner_hide', '0');
		
		$dzRes['banner_custom_height'] = mazo_set($options, 'archive_page_banner_custom_height', $dzRes['banner_custom_height']);

		if($dzRes['dont_use_banner_image'] == 0){	
			$dzRes['banner_image'] = isset($options['archive_page_banner']) ? mazo_set($options['archive_page_banner'], 'url', $dzRes['banner_image']) : $dzRes['banner_image'];
		}
		else{
			$dzRes['banner_image'] = '';
		}
		/* End Page banner setting */
				
		/* Sidebar and there layout */
		$dzRes['show_sidebar'] = isset($options['archive_page_show_sidebar']) ? $options['archive_page_show_sidebar'] : true;
		if($dzRes['show_sidebar']) {
			$dzRes['layout'] = mazo_set($options, 'archive_page_sidebar_layout', $dzRes['layout']);
			$dzRes['sidebar'] = mazo_set($options, 'archive_page_sidebar', $dzRes['sidebar']);
		}
		/* End Sidebar and there layout */

		$pagination = mazo_set($options, 'archive_page_paging', $dzRes['disable_ajax_pagination']);
		$dzRes['disable_ajax_pagination'] = ($pagination == 'load_more') ? $pagination : '';
	}

	/* tag.php */
	if(is_tag()) {

		$dzRes['page_title'] = mazo_set($options,'tag_page_title', esc_html__('Tag : ', 'mazo'));
		$options['tag_page_banner'] = '';
		/* Tag banner setting */
		$dzRes['show_banner'] = isset($options['tag_page_banner_on']) ? $options['tag_page_banner_on'] : $dzRes['show_banner'];
		$dzRes['banner_height'] = mazo_set($options, 'tag_page_banner_height', $dzRes['banner_height']);
		$dzRes['dont_use_banner_image'] = mazo_set($options, 'tag_page_banner_hide', '0');
		
		$dzRes['banner_custom_height'] = mazo_set($options, 'tag_page_banner_custom_height', $dzRes['banner_custom_height']);

		if($dzRes['dont_use_banner_image'] == 0){	
			$dzRes['banner_image'] = isset($options['tag_page_banner']) ? mazo_set($options['tag_page_banner'], 'url', $dzRes['banner_image']) : $dzRes['banner_image'];
		}
		else{
			$dzRes['banner_image'] = '';
		}
		/* End Tag banner setting */
		
		/* Sidebar and there layout */
		$dzRes['show_sidebar'] = isset($options['tag_page_show_sidebar']) ? $options['tag_page_show_sidebar'] : true;
		if($dzRes['show_sidebar']) {
			$dzRes['layout'] = mazo_set($options, 'tag_page_sidebar_layout', $dzRes['layout']);
			$dzRes['sidebar'] = mazo_set($options, 'tag_page_sidebar', $dzRes['sidebar']);
		}
		/* End Sidebar and there layout */

		$pagination = mazo_set($options, 'tag_page_paging', $dzRes['disable_ajax_pagination']);
		$dzRes['disable_ajax_pagination'] = ($pagination == 'load_more') ? $pagination : '';
	}
	
	/* author.php */
	if(is_author() ) {

		$options['author_page_banner'] = '';
		$dzRes['page_title'] = mazo_set($options,'author_page_title', esc_html__('Author : ', 'mazo'));
		$dzRes['page_title'] = $dzRes['page_title'] . get_the_author_meta('display_name');

		/* Tag banner setting */

		$dzRes['show_banner'] = isset($options['author_page_banner_on']) ? $options['author_page_banner_on'] : $dzRes['show_banner'];

		$dzRes['banner_height'] = mazo_set($options, 'author_page_banner_height', $dzRes['banner_height']);
		$dzRes['dont_use_banner_image'] = mazo_set($options, 'author_page_banner_hide', '0');
		
		$dzRes['banner_custom_height'] = mazo_set($options, 'author_page_banner_custom_height', $dzRes['banner_custom_height']);

		if($dzRes['dont_use_banner_image'] == 0){	
			$dzRes['banner_image'] = isset($options['author_page_banner']) ? mazo_set($options['author_page_banner'], 'url', $dzRes['banner_image']) : $dzRes['banner_image'];
		}
		else{
			$dzRes['banner_image'] = '';
		}
		/* End Tag banner setting */
		
		$dzRes['show_banner'] = mazo_set($options, 'author_page_banner_on', $dzRes['show_banner']);
		if($dzRes['show_banner'] == true) {
			$dzRes['banner_height'] = mazo_set($options, 'author_page_banner_height', $dzRes['banner_height']);
			$dzRes['banner_image'] = mazo_set($options['author_page_banner'], 'url', $dzRes['banner_image']);
			$dzRes['dont_use_banner_image'] = mazo_set($options, 'author_page_banner_hide', '0');
		}

		/* Sidebar and there layout */
		$dzRes['show_sidebar'] = isset($options['author_page_show_sidebar']) ? $options['author_page_show_sidebar'] : true;
		if($dzRes['show_sidebar']) {
			$dzRes['layout'] = mazo_set($options, 'author_page_sidebar_layout', $dzRes['layout']);
			$dzRes['sidebar'] = mazo_set($options, 'author_page_sidebar', $dzRes['sidebar']);
		}
		/* End Sidebar and there layout */

		$pagination = mazo_set($options, 'author_page_paging', $dzRes['disable_ajax_pagination']);
		$dzRes['disable_ajax_pagination'] = ($pagination == 'load_more') ? $pagination : '';
	}	
	
	/* index.php */
	if(is_home()) {
		$dzRes['page_title'] = mazo_set($options, 'blog_page_title', esc_html__('Mazo Personal Blog', 'mazo'));
	}
	
	/* search.php */
	if(is_search()) {

		$options['search_page_banner'] = '';
		$dzRes['page_title'] = mazo_set($options,'search_page_title', esc_html__('Search : ', 'mazo'));

		/* Search banner setting */
		$dzRes['show_banner'] = isset($options['search_page_banner_on']) ? $options['search_page_banner_on'] : $dzRes['show_banner'];
		$dzRes['banner_height'] = mazo_set($options, 'search_page_banner_height', $dzRes['banner_height']);
		$dzRes['dont_use_banner_image'] = mazo_set($options, 'search_page_banner_hide', '0');
		
		$dzRes['banner_custom_height'] = mazo_set($options, 'search_page_banner_custom_height', $dzRes['banner_custom_height']);

		if($dzRes['dont_use_banner_image'] == 0){	
			$dzRes['banner_image'] = isset($options['search_page_banner']) ? mazo_set($options['search_page_banner'], 'url', $dzRes['banner_image']) : $dzRes['banner_image'];
		}
		else{
			$dzRes['banner_image'] = '';
		}
		/* End Search banner setting */

		/* Sidebar and there layout */
		$dzRes['show_sidebar'] = isset($options['search_page_show_sidebar']) ? $options['search_page_show_sidebar'] : true;
		if($dzRes['show_sidebar']) {
			$dzRes['layout'] = mazo_set($options, 'search_page_sidebar_layout', $dzRes['layout']);
			$dzRes['sidebar'] = mazo_set($options, 'search_page_sidebar', $dzRes['sidebar']);
		}
		/* End Sidebar and there layout */

		$pagination = mazo_set($options, 'search_page_paging', $dzRes['disable_ajax_pagination']);
		$dzRes['disable_ajax_pagination'] = ($pagination == 'load_more') ? $pagination : '';
	}
	
	if(is_page() || is_archive() || is_tag() || is_author() || is_home() || is_search() || is_404()) {

		$dzRes['banner_class'] = '';
		if($dzRes['header_style'] == 'header_2')
		{
			$dzRes['banner_class'] .= ' tp-banner';
		}
		
		if(isset($dzRes['banner_height']) && $dzRes['banner_height'] == 'page_banner_big') {
			$dzRes['banner_class'] .= 'dlab-bnr-inr-lg';
		}elseif(isset($dzRes['banner_height']) && $dzRes['banner_height'] == 'page_banner_medium'){
			$dzRes['banner_class'] .= 'dlab-bnr-inr-md';
		}
		
		$dzRes['page_banner_style_attr'] = !empty($dzRes['banner_image']) ? 'background-image:url('.esc_url($dzRes['banner_image']).')' : '';
	
		$dzRes['container_class'] = (!is_active_sidebar($dzRes['sidebar']) || $dzRes['layout'] == 'full' || $dzRes['show_sidebar'] != true) ? 'min-container' : 'container';
		$dzRes['layout_class'] = (!is_active_sidebar($dzRes['sidebar']) || $dzRes['layout'] == 'full' || $dzRes['show_sidebar'] != true || !mazo_is_theme_sidebar_active()) ? ' col-lg-12 col-md-12 ' : ' col-lg-8 col-md-7 sidebar ';
		
	}
	
	/* category.php */
	if(is_category()) {

		$options['category_page_banner'] = '';
		$dzRes['banner_height'] = '';
		$dzRes['dont_use_banner_image'] = 0;
		$dzRes['page_title'] = mazo_set($options,'category_page_title', esc_html__('Category : ', 'mazo'));
			
		/* Search banner setting */
		$dzRes['show_banner'] = isset($options['category_page_banner_on']) ? $options['category_page_banner_on'] : $dzRes['show_banner'];
		$dzRes['banner_height'] = mazo_set($options, 'category_page_banner_height', $dzRes['banner_height']);
		$dzRes['dont_use_banner_image'] = mazo_set($options, 'category_page_banner_hide', '0');
		
		$dzRes['banner_custom_height'] = mazo_set($options, 'category_page_banner_custom_height', $dzRes['banner_custom_height']);

		if($dzRes['dont_use_banner_image'] == 0){	
			$dzRes['banner_image'] = isset($options['category_page_banner']) ? mazo_set($options['category_page_banner'], 'url', $dzRes['banner_image']) : $dzRes['banner_image'];
		}
		else{
			$dzRes['banner_image'] = '';
		}
		/* End Search banner setting */
				
		/* Sidebar and there layout */
		$dzRes['show_sidebar'] = isset($options['category_page_show_sidebar']) ? $options['category_page_show_sidebar'] : true;
		if($dzRes['show_sidebar']) {
			$dzRes['layout'] = mazo_set($options, 'category_page_sidebar_layout', $dzRes['layout']);
			$dzRes['sidebar'] = mazo_set($options, 'category_page_sidebar', $dzRes['sidebar']);
		}
		/* End Sidebar and there layout */

		/* To manage Category Page banner and layout settings */
		$dzRes['banner_class'] = '';
		if($dzRes['header_style'] == 'header_2')
		{
			$dzRes['banner_class'] .= ' tp-banner';
		}
		
		if(isset($dzRes['banner_height']) && $dzRes['banner_height'] == 'page_banner_big') {
			$dzRes['banner_class'] .= 'dlab-bnr-inr-lg';
		}elseif(isset($dzRes['banner_height']) && $dzRes['banner_height'] == 'page_banner_medium'){
			$dzRes['banner_class'] .= 'dlab-bnr-inr-md';
		}
		
		$dzRes['page_banner_style_attr'] = !empty($dzRes['banner_image']) ? 'background-image:url('.esc_url($dzRes['banner_image']).')' : '';
	
		$dzRes['container_class'] = (!is_active_sidebar($dzRes['sidebar']) || $dzRes['layout'] == 'full' || $dzRes['show_sidebar'] != true) ? 'min-container' : 'container';
		$dzRes['layout_class'] = (!is_active_sidebar($dzRes['sidebar']) || $dzRes['layout'] == 'full' || $dzRes['show_sidebar'] != true || !mazo_is_theme_sidebar_active()) ? ' col-lg-12 col-md-12 ' : ' col-lg-8 col-md-7 sidebar ';
		/* End To manage Category Page banner and layout settings */

		$pagination = mazo_set($options, 'category_page_paging', $dzRes['disable_ajax_pagination']);
		$dzRes['disable_ajax_pagination'] = ($pagination == 'load_more') ? $pagination : '';
		/* all other variable will manage on category page from db. */
	}

	if(is_404()){
    $dzRes['error_404_bg'] = mazo_set($options, 'error_404_bg');
    $dzRes['error_404_bg'] = !empty($dzRes['error_404_bg']['url'])?$dzRes['error_404_bg']['url']:get_template_directory_uri() . '/assets/images/background/bg2.png';
		$dzRes['error_page_title'] = mazo_set($options,'error_page_title', esc_html__('404','mazo'));
		$dzRes['error_page_subtitle'] = mazo_set($options,'error_page_subtitle', esc_html__('Something went wrong !','mazo'));
		$dzRes['error_page_search_on'] = mazo_set($options,'error_page_search_on');
		$dzRes['error_page_text'] = mazo_set($options,'error_page_text', esc_html__('We are sorry. But the page you are looking for cannot be found.','mazo'));
		$dzRes['error_page_text2'] = mazo_set($options,'error_page_text2', esc_html__('You can go back to the Main Page by clicking the button.','mazo'));
		$dzRes['error_page_button_text'] = mazo_set($options,'error_page_button_text', esc_html__('Back to Home','mazo'));
	}
	
	//* Logo Setting According To Theme Color and Header *//
	
	
	/* Remove from package */
	$dzRes['predefined_color_skin'] = mazo_set($options, 'predefined_color_skin');
	/* Remove from package */
	$dzRes['header_logo'] =  $dzRes['site_logo'];
	$dzRes['footer_logo'] = $dzRes['site_other_logo'];
	$dzRes['loading_logo'] = $dzRes['site_logo'];
	if(in_array($dzRes['predefined_color_skin'], array('black-blue-default','blue-white-dark','orange-white-dark', 'black-white-dark')))
	{
		$dzRes['loading_logo'] = $dzRes['site_other_logo'];
	}
	
	if(in_array($dzRes['header_style'], array('header_7')))
	{
		$dzRes['header_logo'] = $dzRes['footer_logo'] = $dzRes['site_logo'];
		if(in_array($dzRes['predefined_color_skin'], array('black-blue-default','blue-white-dark','orange-white-dark', 'black-white-dark')))
		{
			$dzRes['footer_logo'] = $dzRes['site_other_logo'];
			
		}
	}	
	elseif(in_array($dzRes['header_style'], array('header_5')))
	{
		$dzRes['header_logo'] = $dzRes['footer_logo'] = $dzRes['site_other_logo'];
		if(in_array($dzRes['predefined_color_skin'], array('blue-white-light-2', 'orange-white-light', 'black-white-light')))
		{
			$dzRes['footer_logo'] = $dzRes['site_logo'];
		}
	}	
	elseif(in_array($dzRes['header_style'], array('header_3')))
	{
		$dzRes['header_logo'] = $dzRes['footer_logo'] = $dzRes['site_other_logo'];
		if(in_array($dzRes['predefined_color_skin'], array('blue-white-light-2', 'orange-white-light', 'black-white-light')))
		{
			$dzRes['footer_logo'] = $dzRes['site_logo'];
		}
	}
	elseif(
		in_array($dzRes['header_style'], array('header_1', 'header_2','header_4','header_6','header_8')) && 
		in_array($dzRes['predefined_color_skin'], array('black-blue-default', 'blue-white-light-2', 'orange-white-light', 'black-white-light')) 
		)
		{
			$dzRes['header_logo'] = $dzRes['footer_logo'] = $dzRes['site_logo'];
			
			if(in_array($dzRes['predefined_color_skin'], array('black-blue-default')))
			{
				$dzRes['footer_logo'] = $dzRes['site_other_logo'];
			}	
		}
	elseif(
		in_array($dzRes['header_style'], array('header_1', 'header_2','header_4','header_6','header_8')) && 
		in_array($dzRes['predefined_color_skin'], array('blue-white-dark','orange-white-dark', 'black-white-dark')) 
		)
		{
			$dzRes['header_logo'] = $dzRes['footer_logo'] = $dzRes['site_other_logo'];
		}	
	
	/* Set All Option Values to Global Variable */
	$mazo_option = $dzRes;
	

	
	if($mazo_option['website_status'] != 'live_mode' && !is_home() && !is_front_page() && !is_user_logged_in())
	{
		wp_redirect(home_url( '/' ));
	}

}


function mazo_enqueue_scripts() {
    
	$options = mazo_dzbase()->option();
	
	$skin = mazo_set($options, 'predefined_color_skin','red');
	$color_skin_setting = mazo_set($options, 'color_skin_setting','predefined_color_skin');
	
	
	//style
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all-min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate-min.css' );
	
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css' );
	
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup-min.css' );
	
	wp_enqueue_style( 'lightgallery', get_template_directory_uri() . '/assets/css/lightgallery-min.css' );
	wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/assets/css/line-awesome-min.css' );
	
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css' ); 
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle-min.css' );
	
	if(class_exists('woocommerce')) wp_enqueue_style( 'mazo-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	
	if(is_child_theme()){
	   	wp_enqueue_style( 'mazo-parent-style', get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'mazo-main-style', get_stylesheet_uri() );
	}else{
	    wp_enqueue_style( 'mazo-main-style', get_stylesheet_uri() );    
	}
	wp_enqueue_style( 'mazo-style', get_template_directory_uri() . '/assets/css/style.css' );
	
	if($color_skin_setting == 'predefined_color_skin'){
		wp_enqueue_style( 'mazo-skin', get_template_directory_uri() . '/assets/css/skin/'.$skin.'.css' );
	}else{
		wp_enqueue_style( 'mazo-skin', get_template_directory_uri() . '/assets/css/skin/theme.css' );
	}
	
	wp_enqueue_style( 'mazo-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	
	
	//scripts
	wp_enqueue_script( 'jquery-ui-core');
	
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/js/bootstrap-bundle-min.js', array( 'jquery' ), '5.0.0', true );

	wp_enqueue_script( 'magnific-popup', get_template_directory_uri().'/assets/js/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
	
	wp_enqueue_script( 'counterup', get_template_directory_uri().'/assets/js/counterup-min.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'imagesloaded', '', array(), false, true ); /* Pre-packaged Library */
	wp_enqueue_script( 'masonry', '', array(), false, true ); /* Pre-packaged Library */
	
	wp_enqueue_script( 'masonry-multiple', get_template_directory_uri().'/assets/js/masonry-filter-multiple.js', array( 'jquery' ), '1.0', true );
	
	
	wp_enqueue_script( 'light-gallery', get_template_directory_uri().'/assets/js/lightgallery-all-min.js', array( 'jquery' ), '1.6.12', true );
	wp_enqueue_script( 'light-gallery-rebuild', get_template_directory_uri().'/assets/js/rebuildLightGallery.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/jquery-countdown.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'waypoint', get_template_directory_uri().'/assets/js/waypoints-min.js', array( 'jquery' ), '1.0', true );
	
	
	wp_enqueue_script( 'swiper-js', get_template_directory_uri().'/assets/js/swiper-bundle-min.js', array( 'jquery' ), '6.5.0', true );
	
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/js/aos.js', array(), false, true ); 
	
	wp_enqueue_script( 'mazo-main-script', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
	wp_enqueue_script( 'mazo-wp-script', get_template_directory_uri().'/assets/js/wp-script.js', array(), false, true );
		
	wp_enqueue_script( 'mazo-dz-carousel', get_template_directory_uri().'/assets/js/dz-carousel.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'mazo-lazyload', get_template_directory_uri().'/assets/js/lazyload-min.js', array( 'jquery' ), '1.7.9', true );
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
	
}

add_action( 'wp_enqueue_scripts', 'mazo_enqueue_scripts' );
/*--------------------------------------------------------------*/


/**
 * Enqueue Scripts on plugin
 */
add_action('admin_enqueue_scripts', 'mazo_admin_script');

/**
 * Function register admin on plugin
 */
function mazo_admin_script()
{
	if(is_admin()) {
		wp_enqueue_style('admin-style', get_template_directory_uri() . '/dz-inc/admin/css/admin.css', array(), '1.0.0');
		wp_enqueue_style('admin-font-awesome', get_template_directory_uri() . '/dz-inc/admin/css/font-awesome-min.css', array(), '4.7.0');
	}
}


function mazo_theme_slug_fonts_url() {
    $fonts_url = '';
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
	$Montserrat = _x( 'on', 'Montserrat font: on or off', 'mazo' );
	$Roboto = _x( 'on', 'Roboto font: on or off', 'mazo' );
	$Rubik = _x( 'on', 'Rubik Sans font: on or off', 'mazo' );
	$Oswald = _x( 'on', 'Oswald font: on or off', 'mazo' );
   
	$font_families = array();
	
	if ( 'off' !== $Montserrat ) {
    $font_families[] = 'Montserrat:wght@100;200;300;400;500;600;700;800;900';
  }
  
	if ( 'off' !== $Roboto ) {
		$font_families[] = '&family=Roboto:wght@100;300;400;500;700;900';
	}
	
	if ( 'off' !== $Rubik ) {
		$font_families[] = '&family=Rubik:wght@300;400;500;600;700;800;900';
	}
	
	if ( 'off' !== $Oswald ) {
		$font_families[] = '&family=Oswald:wght@200;300;400;500;600;700';
	}
	
	$font_families = array_unique( $font_families);
    
	$font_url_string = '';
	foreach($font_families as $font_family){
		$font_url_string .= $font_family;
	}
	
	$query_args = array(
	  'family' =>$font_url_string,
	  'display' => 'swap',
	);

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2');
	
    return esc_url_raw( $fonts_url );
}

function mazo_theme_slug_scripts_styles() {
    wp_enqueue_style( 'mazo-theme-slug-fonts', mazo_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'mazo_theme_slug_scripts_styles' );

function mazo_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'mazo_add_editor_styles' );


function mazo_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong magenta', 'mazo' ),
            'slug' => 'strong-magenta',
            'color' => '#a156b4',
        ),
        array(
            'name' => esc_html__( 'light grayish magenta', 'mazo' ),
            'slug' => 'light-grayish-magenta',
            'color' => '#d0a5db',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'mazo' ),
            'slug' => 'very-light-gray',
            'color' => '#eee',
        ),
        array(
            'name' => esc_html__( 'very dark gray', 'mazo' ),
            'slug' => 'very-dark-gray',
            'color' => '#444',
        ),
    ) );
}

add_action( 'after_setup_theme', 'mazo_setup_theme_supported_features' );

/*js Template Path */
function mazo_set_js_var() {
   
   global $mazo_option;
   
   
	$theme_options 				= mazo_get_theme_option();
	
	$mobile_header_social_link_on = mazo_set($mazo_option,'mobile_header_social_link_on');
	
	$cart_on_mobile				= mazo_set($theme_options,'cart_on_mobile');
	$mobile_header_login_on		= mazo_set($theme_options,'mobile_header_login_on');
	$mobile_header_register_on	= mazo_set($theme_options,'mobile_header_register_on');
	
	$cart_on_mobile					= ($cart_on_mobile)?'Yes':'No';
    $mobile_header_login_on			= ($mobile_header_login_on)?'Yes':'No';
    $mobile_header_register_on		= ($mobile_header_register_on)?'Yes':'No';
    $mobile_header_social_link_on	= ($mobile_header_social_link_on)?'Yes':'No';	
	
	$header_style = $footer_style = $page_banner_layout = $skin = '';
   
    $js_data_array = array(	'template_directory_uri' => get_template_directory_uri(),
							'admin_ajax_url' => admin_url( 'admin-ajax.php' ),								
							'ajax_security_nonce' => wp_create_nonce('ajax_security_key'),
							'cart_on_mobile'=>$cart_on_mobile,	
							'login_on_mobile'=>$mobile_header_login_on,	
							'register_on_mobile'=>$mobile_header_register_on,	
							'header_social_link_on_mobile'=>$mobile_header_social_link_on,
							'header_style'=>$header_style,
							'footer_style'=>$footer_style,
							'page_banner_layout'=>$page_banner_layout,
							'skin'=>$skin
						);						
   wp_localize_script( 'jquery', 'mazo_js_data', $js_data_array );
} 
add_action('wp_enqueue_scripts','mazo_set_js_var');

function mazo_load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');	
}
add_action( 'admin_enqueue_scripts', 'mazo_load_admin_things' );


function mazo_get_attachment( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

function mazo_website_status()
{
	global $mazo_option;
	extract($mazo_option);
	
	if($website_status == 'comingsoon_mode' && !is_user_logged_in()) {
		get_template_part('dz-inc/elements/comingsoon/comingsoon_1');
	}
	elseif($website_status == 'maintenance_mode' && !is_user_logged_in()) {
		if($maintenance_template == 'maintenance_style_1') {
			get_template_part('dz-inc/elements/maintinance/maintinance_1');
		}else if($maintenance_template == 'maintenance_style_2') {
			get_template_part('dz-inc/elements/maintinance/maintinance_2');
		}else{
			get_template_part('dz-inc/elements/maintinance/maintinance_3');
		}
	}
}
add_action('mazo_website_status', 'mazo_website_status');


/* Ensure cart contents update when products are added to the cart via AJAX (place the following in main functions.php) */
add_filter( 'woocommerce_add_to_cart_fragments', 'mazo_header_add_to_cart_fragment' );
function mazo_header_add_to_cart_fragment( $fragments ) 
{
	ob_start();
	?>
	<a class="site-button-link cart-btn" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php echo esc_attr__( 'View your shopping cart','mazo'); ?>"><i class="fa fa-shopping-bag"></i><span class="badge bg-black cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'mazo' ), WC()->cart->get_cart_contents_count() ); ?></span></a> 
	<?php
	
	$fragments['a.cart-btn'] = ob_get_clean();
	
	return $fragments;
}

/* Remove Paragraph from contact form 7 plugin fields */
add_filter('wpcf7_autop_or_not', '__return_false');




/*
 * Return Current Page ID
 */
function mazo_get_current_page_id() {
	$current_page = -1;
	
	if ( is_front_page() && is_home() ) {
		$page_for_posts = get_option( 'page_for_posts' );
		if( ! empty( $page_for_posts ) && $page_for_posts != -1 ) {
			$current_page = $page_for_posts;
		}
	} elseif ( is_front_page() ) {
		$page_id = get_option('page_on_front');
		if( ! empty( $page_id ) && $page_id != -1 ) {
			$current_page = $page_id;
		}
	} elseif ( is_home() ) {
		/* Blog page */
		$page_for_posts = get_option( 'page_for_posts' );
		if( ! empty( $page_for_posts ) && $page_for_posts != -1 ) {
			$current_page = $page_for_posts;
		}
	} elseif ( ( function_exists('is_projects_archive') && is_projects_archive() ) || ( function_exists('is_project_category') && is_project_category() ) ) {
		$projects_page_id = projects_get_page_id( 'projects' );
		if( ! empty( $projects_page_id ) && $projects_page_id != -1 ) {
			$current_page = projects_get_page_id( 'projects' );
		}
	} elseif( is_post_type_archive( 'team-member' ) ) {
		$team_member  = -1;
	} elseif( function_exists('is_shop') && is_shop() ) {
		$current_page = get_option( 'woocommerce_shop_page_id' );
	} elseif( function_exists('is_product_category') && is_product_category() ) {
		$current_page = get_option( 'woocommerce_shop_page_id' );
	} elseif( function_exists('is_product_tag') && is_product_tag() ) {
		$current_page = get_option( 'woocommerce_shop_page_id' );
	} elseif( function_exists( 'is_project' ) && is_project() ) {
		$current_page = get_the_ID();
	} elseif( is_404() ) {
		$current_page = -2;
	} elseif( is_page() ) {
		$current_page = get_the_ID();
	} elseif ( is_post_type_archive('post') ) {
		$page_for_posts = get_option( 'page_for_posts' );
		if( ! empty( $page_for_posts ) && $page_for_posts != -1 ) {
			$current_page = $page_for_posts;
		}
	}	
	return $current_page;
}