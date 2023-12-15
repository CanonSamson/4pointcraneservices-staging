<?php

/* Single Pages Template */
function mazo_page_template_options(){
	
	$page_templates = array(
		'landing' => array(
			array(
				'title' => esc_html__('Mazo Home 1','mazo'),
				'id'   => 'landing_style_1',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/landing_style_1.png',
				'param'  => array()
			),
			array(
				'title' => esc_html__('Mazo Home 2','mazo'),
				'id'   => 'landing_style_2',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/landing_style_2.png',
				'param'  => array()
			),
			array(
				'title' => esc_html__('Mazo Home 3','mazo'),
				'id'   => 'landing_style_3',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/landing_style_3.png',
				'param'  => array()
			),
			array(
				'title' => esc_html__('Mazo Home 4','mazo'),
				'id'   => 'landing_style_4',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/landing_style_4.png',
				'param'  => array()
			),
			array(
				'title' => esc_html__('Mazo Home 5','mazo'),
				'id'   => 'landing_style_5',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/landing_style_5.png',
				'param'  => array()
			)
		),
		'inner' => array(
			
		),
		'coming' => array(
			array(
				'title' => esc_html__('Comingsoon','mazo'),
				'id'   => 'coming_style_1',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/coming-soon.png',
				'param'  => array()
			)
		),
		'maintenance' => array(
			array(
				'title' => esc_html__('Maintenance','mazo'),
				'id'   	=> 'maintenance_style_1',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/site-down-for-maintain.png',
				'param'  => array()
			),
			array(
				'title' => esc_html__('Maintenance 2','mazo'),
				'id'   	=> 'maintenance_style_2',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/site-down-for-maintain2.png',
				'param'  => array()
			),
			array(
				'title' => esc_html__('Maintenance 3','mazo'),
				'id'   	=> 'maintenance_style_3',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/site-down-for-maintain3.png',
				'param'  => array()
			)
		),
		'error' => array(
			array(
				'title' => esc_html__('Error','mazo'),
				'id'   => 'error_style_1',
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/page-template/error-404.png',
				'param'  => array()
			)
		)
	);
	return $page_templates;
}

/* Single Post Layouts */
function mazo_post_layouts_options(){

	$post_layouts = array(
		array(
			'id'   => 'standard',
			'layout_param' => array(
		    	'title' => esc_html__('Standard','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/standard-post.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'gutenberg',
			'layout_param' => array(
		    	'title' => esc_html__('Gutenberg','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/gutenberg.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'corner_post',
			'layout_param' => array(
		    	'title' => esc_html__('Corner Post','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/corner-image-post.png'
		    ),
			'param'  => array()
		),
    array(
			'id'   => 'post_header_image',
			'layout_param' => array(
		    	'title' => esc_html__('Header Image','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/post-header-image.png'
		    ),
			'param'  => array()
		),
    array(
			'id'   => 'slider_post_2',
			'layout_param' => array(
		    	'title' => esc_html__('Slider Post 2','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/slider-post-2.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'link_post',
			'layout_param' => array(
		    	'title' => esc_html__('Link Post','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/link-post.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'video_post',
			'layout_param' => array(
		    	'title' => esc_html__('Video Post','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/video-post.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'audio_post',
			'layout_param' => array(
		    	'title' => esc_html__('Audio Post','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/audio-post.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'slider_post_1',
			'layout_param' => array(
		    	'title' => esc_html__('Slider Post 1','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/post-layout/slider-post-1.png'
		    ),
			'param'  => array()
		),
	);

	return $post_layouts;
}

/* Header Layouts Options */
function mazo_header_style_options(){
	$header_styles = array(
		array(
			'id'   => 'header_1',
			'img_param' => array(
				'title' => esc_html__('Style - Transparent','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-1.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		array(
			'id'   => 'header_2',
			'img_param' => array(
				'title' => esc_html__('Style - Normal','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-2.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
		array(
			'id'   => 'header_3',
			'img_param' => array(
				'title' => esc_html__('Style - Transparent','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-3.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
		array(
			'id'   => 'header_4',
			'img_param' => array(
				'title' => esc_html__('Style - Sidebar Menu','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-4.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 0,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
        
        array(
			'id'   => 'header_5',
			'img_param' => array(
				'title' => esc_html__('Style - Normal','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-5.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		array(
			'id'   => 'header_6',
			'img_param' => array(
				'title' => esc_html__('Style - Normal','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-6.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
		array(
			'id'   => 'header_7',
			'img_param' => array(
				'title' => esc_html__('Style - Normal','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-7.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
		array(
			'id'   => 'header_8',
			'img_param' => array(
				'title' => esc_html__('Style - Transparent','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-8.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
		array(
			'id'   => 'header_9',
			'img_param' => array(
				'title' => esc_html__('Style - Normal','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-9.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 1,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
		array(
			'id'   => 'header_10',
			'img_param' => array(
				'title' => esc_html__('Style - Normal','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/header/header-10.png'
			),
			'param'  => array(
				'class' => '',
				'social_link' => 0,
				'search' => 1,
				'call_to_action_button' => 1,
				'social_links' => 6,
				'top_bar' => 0,
				'informative_fields_header'	=> 3
			)
		),
		
	);

	return $header_styles;
}

/* Foote Layouts Options */
function mazo_footer_style_options(){
	$footer_styles = array(
		array(
			'title' => esc_html__('Footer 1','mazo'),
			'id'   => 'footer_template_1',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-1.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 0,
				'informative_field'	=> 0,
			)
		),
		array(
			'title' => esc_html__('Footer 2','mazo'),
			'id'   => 'footer_template_2',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-2.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 1,
				'informative_field'	=> 0,
			)
		),
		
		array(
			'title' => esc_html__('Footer 3','mazo'),
			'id'   => 'footer_template_3',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-3.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 1,
				'informative_field'	=> 0,
			)
		),
		
		array(
			'title' => esc_html__('Footer 4','mazo'),
			'id'   => 'footer_template_4',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-4.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 0,
				'informative_field'	=> 0,
			)
		),
        
        array(
			'title' => esc_html__('Footer 5','mazo'),
			'id'   => 'footer_template_5',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-5.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 1,
				'informative_field'	=> 0,
			)
		),
		
		array(
			'title' => esc_html__('Footer 6','mazo'),
			'id'   => 'footer_template_6',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-6.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 0,
				'informative_field'	=> 3,
				'call_to_action_button'	=> 1,
			)
		),
		
		array(
			'title' => esc_html__('Footer 7','mazo'),
			'id'   => 'footer_template_7',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-7.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 0,
				'informative_field'	=> 3,
			)
		),
		
		array(
			'title' => esc_html__('Footer 8','mazo'),
			'id'   => 'footer_template_8',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-8.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 0,
				'informative_field'	=> 0,
			)
		),
		
		array(
			'title' => esc_html__('Footer 9','mazo'),
			'id'   => 'footer_template_9',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-9.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 0,
				'informative_field'	=> 0,
			)
		),
		
			
		array(
			'title' => esc_html__('Footer 10','mazo'),
			'id'   => 'footer_template_10',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/footer/footer-10.png',
			'param'  => array(
				'social_link' => 1,
				'copyright'	=> 1,
				'powered_by'	=> 0,
				'sections'	=> 1,
				'bg_image'	=> 1,
				'informative_field'	=> 0,
			)
		),
	);

	return $footer_styles;
}

/* Sidebar Layouts Options*/
function mazo_sidebar_layout_options(){

	$sidebar_layout = array(
		array(
			'id' => 'full',
			'sidebar_param' => array(
				'title' => esc_html__('Full Width','mazo'),
				'img' 	=> get_template_directory_uri() . '/dz-inc/assets/images/sidebar/sidebar-full.png'),
			'param'  => array()
		),
		array(
			'id' => 'left',
			'sidebar_param' => array(
				'title' => esc_html__('Left Side','mazo'),
				'img' 	=> get_template_directory_uri() . '/dz-inc/assets/images/sidebar/sidebar-left.png'),
			'param'  => array()
		),
		array(
			'id' => 'right',
			'sidebar_param' => array(
				'title' => esc_html__('Right Side','mazo'),
				'img' 	=> get_template_directory_uri() . '/dz-inc/assets/images/sidebar/sidebar-right.png'),
			'param'  => array()
		)
	);

	return $sidebar_layout;
}

/* Post Box/Wrapper Style Options */
function mazo_post_wrapper_options(){
	
	$post_wrapper_layout = array(
		array(
			'id'   => 'post_box_1',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-1.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_2',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 2','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-2.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_3',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 3','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-3.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_4',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 4','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-4.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_5',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 5','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-5.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_6',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 6','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-6.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_7',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 7','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-7.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_8',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 8','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-8.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_9',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 9','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-9.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_box_10',
			'img_param' =>  array(
				'title' => esc_html__('Post Box 10','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-box/box-10.png'
			),
			'param'  => array()
		)
	);

	return $post_wrapper_layout;
}

/* Post Listing Style Options */
function mazo_post_listing_options(){
	// post listing/collage style
	$post_listing_layout = array(
		array(
			'id'   => 'post_listing_1',
			'listing_param' =>  array(
				'title' => esc_html__('Post Listing 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-listing/layout-1.png'),
			'param'  => array()
		),
		array(
			'id'   => 'post_listing_2',
			'listing_param' => array(
				'title' => esc_html__('Post Listing 2','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-listing/layout-2.png'),
			'param'  => array()
		),
		array(
			'id'   => 'team_listing_1',
			'listing_param' =>  array(
				'title' => esc_html__('Team Listing 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-listing/layout-3.png'),
			'param'  => array()
		),
		array(
			'id'   => 'portfolio_listing_1',
			'listing_param' =>  array(
				'title' => esc_html__('Portfolio Listing 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-listing/layout-4.png'),
			'param'  => array()
		),

		array(
			'id'   => 'service_listing_1',
			'listing_param' =>  array(
				'title' => esc_html__('Post Listing 5','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-listing/layout-5.png'),
			'param'  => array()
		)
	);

	return $post_listing_layout;
}

/* Post Tiles Style Options */
function mazo_post_tiles_options(){

	$post_tile_layout = array(
		array(
			'id'   => 'post_tile_1',
			'img_param' =>  array(
				'title' => esc_html__('Post Tile 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-tiles/post_tile-1.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'post_tile_2',
			'img_param' => array(
				'title' => esc_html__('Post Tile 2','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-tiles/post_tile-2.png'
			),
			'param'  => array()
		)
	);

	return $post_tile_layout;
}

/* Page Banner Style Options */
function mazo_page_banner_options(){
	$page_banner_style = array(
		array(
			'id'   => 'page_banner_big',
			'banner_param' => array(
		    	'title' => esc_html__('Fit to Screen','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/page-banner/page-banner-big.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'page_banner_medium',
			'banner_param' => array(
		    	'title' => esc_html__('Banner Medium','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/page-banner/page-banner-medium.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'page_banner_small',
			'banner_param' => array(
		    	'title' => esc_html__('Banner Small','mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/page-banner/page-banner-small.png'
		    ),
			'param'  => array()
		),
		array(
			'id'   => 'page_banner_custom',
			'banner_param' => array(
		    	'title' => esc_html__('Custom Height', 'mazo'),
		    	'img' => get_template_directory_uri() . '/dz-inc/assets/images/page-banner/page-banner-small.png'
		    ),
			'param'  => array()
		)
	);

	return $page_banner_style;
}


/* Posts Banners
'param'  => array(
			'limit' => array(3,12),
			'category' => true,
			'type' => array('all','featured', 'most-visited', 'most-liked')
			'post_with' => array('all', 'images-only','without')
			)
limit : array(3,12) : limit select box value start from 3 and end with 12 
array(3) : limit will be 3 fix with disable input box : hint limit is fixed for this 
array(3,15,3) : limit select box values start from 3 and end with 15 with steps 3 like (3,6,9,12,15)  
*/
/* Post Banner Options */

function mazo_post_banner_options(){
	$post_banners = array(
		array(
			'id'   => 'post_banner_v1',
			'post_banner_param' => array(
				'title' => esc_html__('Post Banner 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-banner/post-slider-v1.png'
			),
			'param'  => array(
				'limit' => array(2,5),
				'category' => true,
				'type' => array('all','featured', 'most-visited', 'most-liked'),
				'post_with' => array('all', 'images-only','without')
				)
		),
		array(
			'id'   => 'post_banner_v2',
			'post_banner_param' => array(
				'title' => esc_html__('Post Banner 2','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-banner/post-slider-v2.png'
			),
			'param'  => array(
				'limit' => array(3,12),
				'category' => true,
				'type' => array('all','featured', 'most-visited', 'most-liked'),
				'post_with' => array('all', 'images-only','without')
				)
		),
		array(
			'id'   => 'post_banner_v3',
			'post_banner_param' => array(
				'title' => esc_html__('Post Banner 3','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/post-banner/post-slider-v3.png'
			),
			'param'  => array(
				'limit' => array(3,12),
				'category' => true,
				'type' => array('all','featured', 'most-visited', 'most-liked'),
				'post_with' => array('all', 'images-only','without')
			)    
		)
	);

	return $post_banners;
}

/* Theme Layout Options */
function mazo_theme_layout_options(){
	$theme_layouts = array(
		array(
			'id'   => 'theme_layout_1',
			'img_param' => array(
				'title' => esc_html__('Full','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/theme-layout/full-width.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'theme_layout_2',
			'img_param' => array(
				'title' => esc_html__('Box','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/theme-layout/boxed.png'
			),
			'param'  => array()
		),
		array(
			'id'   => 'theme_layout_3',
			'img_param' => array(
				'title' => esc_html__('Frame','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/theme-layout/frame.png'
			),
			'param'  => array()
		)
	);

	return $theme_layouts;
}

/* Theme Color Background Options */
function mazo_theme_color_background_options(){
	$theme_color_background = array(
		array(
			'id'   => '#d37b46',
			'img_param' => array(
				'title' => esc_html__('Brown','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-color/brown.png'
			),
			'param'  => array()      
		),
		array(
			'id'   => '#76c381',
			'img_param' => array(
				'title' => esc_html__('Green','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-color/green.png'
			),
			'param'  => array()      
		),
		array(
			'id'   => '#e281ef',
			'img_param' => array(
				'title' => esc_html__('Pink','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-color/pink.png'
			),
			'param'  => array()      
		),
		array(
			'id'   => '#fb4848',
			'img_param' => array(
				'title' => esc_html__('Red','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-color/red.png'
			),
			'param'  => array()      
		),
		array(
			'id'   => '#008080',
			'img_param' => array(
				'title' => esc_html__('Cyan','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-color/cyan.png'
			),
			'param'  => array()      
		),
		array(
			'id'   => '#f8ca00',
			'img_param' => array(
				'title' => esc_html__('Yellow','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-color/yellow.png'
			),
			'param'  => array()      
		)
	);

	return $theme_color_background;
}

/* Theme Image Background Options */
function mazo_theme_image_background_options(){
	$theme_image_background = array(
		array(
			'id'   => 'bg_img_1',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-image/bg_img_1.jpg',
			'param'  => array()
		),
		array(
			'id'   => 'bg_img_2',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-image/bg_img_2.jpg',
			'param'  => array()
		),
		array(
			'id'   => 'bg_img_3',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-image/bg_img_3.jpg',
			'param'  => array()
		),
		array(
			'id'   => 'bg_img_4',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-image/bg_img_4.jpg',
			'param'  => array()
		)
	);

	return $theme_image_background;
}

/* Theme Pattern Background Options */
function mazo_theme_pattern_background_options(){
	$theme_pattern_background = array(
		array(
			'id'   => 'bg_pattern_1',
			'title' => esc_html__('Pattern Name 1','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_1.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_2',
			'title' => esc_html__('Pattern Name 2','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_2.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_3',
			'title' => esc_html__('Pattern Name 3','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_3.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_4',
			'title' => esc_html__('Pattern Name 4','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_4.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_5',
			'title' => esc_html__('Pattern Name 5','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_5.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_6',
			'title' => esc_html__('Pattern Name 6','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_6.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_7',
			'title' => esc_html__('Pattern Name 7','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_7.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_8',
			'title' => esc_html__('Pattern Name 8','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_8.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_9',
			'title' => esc_html__('Pattern Name 9','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_9.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_10',
			'title' => esc_html__('Pattern Name 10','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_10.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_11',
			'title' => esc_html__('Pattern Name 11','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_11.jpg',
			'param' => array()
		),
		array(
			'id'   => 'bg_pattern_12',
			'title' => esc_html__('Pattern Name 12','mazo'),
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/bg-pattern/bg_pattern_12.jpg',
			'param' => array()
		)
	);

	return $theme_pattern_background;
}

/* Page Loader Options */
function mazo_theme_color_options(){
	$theme_color = array(
		array(
			'id'   => 'red',
			'layout_param'=>array(
				'title' => esc_html__('Standard Red','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/pink.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),
		array(
			'id'   => 'dark-yellow',
			'layout_param'=>array(
				'title' => esc_html__('Dark Yellow','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/tulip_tree.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),	
		array(
			'id'   => 'sky-blue',
			'layout_param'=>array(
				'title' => esc_html__('Sky Blue','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/fountain_blue.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),
		array(
			'id'   => 'light-yellow',
			'layout_param'=>array(
				'title' => esc_html__('Light Yellow','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/true_v.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),
		array(
			'id'   => 'green',
			'layout_param'=>array(
				'title' => esc_html__('Green','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/pistachio.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),	
		array(
			'id'   => 'dark-green',
			'layout_param'=>array(
				'title' => esc_html__('Dark Green','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/orchid.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),
		array(
			'id'   => 'apricot',
			'layout_param'=>array(
				'title' => esc_html__('Apricot','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/apricot.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),	
			
		array(
			'id'   => 'purple',
			'layout_param'=>array(
				'title' => esc_html__('Purple','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/skins/sorrell-brown.png',
			),
			'color' => array( '#5f0ee1', '#decaff', '#ffffff', '#3f3f3f', '#666666' ),
			'param'  => array()
		),
	);

	return $theme_color;
}

/* Page Loader Options */
function mazo_page_loader_options(){
	$page_loader = array(
		array(
			'title' => esc_html__('Loading 1','mazo'),
			'id'   => 'loading1',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading1.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 2','mazo'),
			'id'   => 'loading2',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading2.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 3','mazo'),
			'id'   => 'loading3',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading3.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 4','mazo'),
			'id'   => 'loading4',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading4.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 5','mazo'),
			'id'   => 'loading5',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading5.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 6','mazo'),
			'id'   => 'loading6',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading6.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 7','mazo'),
			'id'   => 'loading7',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading7.gif',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 8','mazo'),
			'id'   => 'loading8',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading8.svg',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 9','mazo'),
			'id'   => 'loading9',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading9.svg',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 10','mazo'),
			'id'   => 'loading10',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading10.svg',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 11','mazo'),
			'id'   => 'loading11',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading11.svg',
			'param'  => array()
		),
		array(
			'title' => esc_html__('Loading 12','mazo'),
			'id'   => 'loading12',
			'img'   => get_template_directory_uri() . '/dz-inc/assets/images/loading-images/loading12.svg',
			'param'  => array()
		)
	);

	return $page_loader;
}


/* Sorting Options */
function mazo_sort_by_options(){
	$sort_by = array(
		'date_asc'  => esc_html__('Date ASC', 'mazo'),
		'date_desc'  => esc_html__('Date DESC', 'mazo'),
		'title_asc'  => esc_html__('Title ASC', 'mazo'),
		'title_desc'  => esc_html__('Title DESC', 'mazo'),
		//'featured'  => esc_html__('Featured', 'mazo'),
		'most_visited'  => esc_html__('Most Visited', 'mazo'),
		//'most_liked'  => esc_html__('Most Liked', 'mazo'),
	);

	return $sort_by;
}

/* Button Link Target Options */
function mazo_link_target_options(){
	$link_target = array(
		'_blank' 	=>	esc_html__('Opens the link in a new tab.','mazo'),
		'_parent' 	=> 	esc_html__('Opens the link in the parent frame.','mazo'),
		'_self'		=>	esc_html__('Open the link in the current frame.','mazo'),
		'_top'		=>	esc_html__('Opens the link in the top-most frame.','mazo')
	);
	
	return $link_target;
}

/* Advertisement Banner Size Options */
function mazo_adsence_size_options(){
	$adsence_size = array(
		'auto' => esc_html__('Auto', 'mazo' ),
		'120 x 90' => esc_html__('120 x 90', 'mazo'),
		'120 x 240' => esc_html__('120 x 240', 'mazo'),
		'120 x 600' => esc_html__('120 x 600', 'mazo'),
		'125 x 125' => esc_html__('125 x 125', 'mazo'),
		'160 x 90' => esc_html__('160 x 90', 'mazo'),
		'160 x 600' => esc_html__('160 x 600', 'mazo'),
		'180 x 90' => esc_html__('180 x 90', 'mazo'),
		'180 x 150' => esc_html__('180 x 150', 'mazo'),
		'200 x 90' => esc_html__('200 x 90', 'mazo'),
		'200 x 200' => esc_html__('200 x 200', 'mazo'),
		'234 x 60' => esc_html__('234 x 60', 'mazo'),
		'250 x 250' => esc_html__('250 x 250', 'mazo'),
		'320 x 100' => esc_html__('320 x 100', 'mazo'),
		'300 x 250' => esc_html__('300 x 250', 'mazo'),
		'300 x 600' => esc_html__('300 x 600', 'mazo'),
		'300 x 1050' => esc_html__('300 x 1050', 'mazo'),
		'320 x 50' => esc_html__('320 x 50', 'mazo'),
		'336 x 280' => esc_html__('336 x 280', 'mazo'),
		'360 x 300' => esc_html__('360 x 300', 'mazo'),
		'435 x 300' => esc_html__('435 x 300', 'mazo'),
		'468 x 15' => esc_html__('468 x 15', 'mazo'),
		'468 x 60' => esc_html__('468 x 60', 'mazo'),
		'640 x 165' => esc_html__('640 x 165', 'mazo'),
		'640 x 190' => esc_html__('640 x 190', 'mazo'),
		'640 x 300' => esc_html__('640 x 300', 'mazo'),
		'728 x 15' => esc_html__('728 x 15', 'mazo'),
		'728 x 90' => esc_html__('728 x 90', 'mazo'),
		'970 x 90' => esc_html__('970 x 90', 'mazo'),
		'970 x 250' => esc_html__('970 x 250', 'mazo'),
		'240 x 400' => esc_html__('240 x 400 - Regional ad sizes', 'mazo'),
		'250 x 360' => esc_html__('250 x 360 - Regional ad sizes', 'mazo'),
		'580 x 400' => esc_html__('580 x 400 - Regional ad sizes', 'mazo'),
		'750 x 100' => esc_html__('750 x 100 - Regional ad sizes', 'mazo'),
		'750 x 200' => esc_html__('750 x 200 - Regional ad sizes', 'mazo'),
		'750 x 300' => esc_html__('750 x 300 - Regional ad sizes', 'mazo'),
		'980 x 120' => esc_html__('980 x 120 - Regional ad sizes', 'mazo'),
		'930 x 180' => esc_html__('930 x 180 - Regional ad sizes', 'mazo')
	);

	return $adsence_size;
}

/* Social Link Options */
function mazo_social_link_options(){
	
	$social_links = array(
	    'facebook' => array(
	        'id' => 'facebook',
	        'title' => 'Facebook',
	    ),
	    'twitter' => array(
	        'id' => 'twitter',
	        'title' => 'Twitter',
	    ),
	    'linkedin' => array(
	        'id' => 'linkedin',
	        'title' => 'Linkedin',
	    ),
	     'instagram' => array(
	        'id' => 'instagram',
	        'title' => 'Instagram',
	    ),
	    'behance' => array(
	        'id' => 'behance',
	        'title' => 'Behance',
	    ), 
	    'skype' => array(
	        'id' => 'skype',
	        'title' => 'Skype',
	    ), 
	    'pinterest' => array(
	        'id' => 'pinterest',
	        'title' => 'Pinterest',
	    ),
	    'vimeo' => array(
	        'id' => 'vimeo',
	        'title' => 'Vimeo',
	    ),
	    'youtube' => array(
	        'id' => 'youtube',
	        'title' => 'Youtube',
	    ), 
	    'tumblr' => array(
	        'id' => 'tumblr',
	        'title' => 'Tumblr',
	    ),
	     'rss' => array(
	        'id' => 'rss',
	        'title' => 'Rss',
	    ), 
	    'yelp' => array(
	        'id' => 'yelp',
	        'title' => 'Yelp',
	    ),
	    'tripadvisor' => array(
	        'id' => 'tripadvisor',
	        'title' => 'Tripadvisor',
	    ),
	    'blogger' => array(
	        'id' => 'blogger',
	        'title' => 'Blogger',
	    ),
	    'delicious' => array(
	        'id' => 'delicious',
	        'title' => 'Delicious',
	    ), 
	    'digg' => array(
	        'id' => 'digg',
	        'title' => 'Digg',
	    ),
	    'dribbble' => array(
	        'id' => 'dribbble',
	        'title' => 'Dribbble',
	    ),
	    'flickr' => array(
	        'id' => 'flickr',
	        'title' => 'Flickr',
	    ),
	    'lastfm' => array(
	        'id' => 'lastfm',
	        'title' => 'Lastfm',
	    ),
	    'paypal' => array(
	        'id' => 'paypal',
	        'title' => 'Paypal',
	    ), 
	    'reddit' => array(
	        'id' => 'reddit',
	        'title' => 'Reddit',
	    ),
	    'share' => array(
	        'id' => 'share',
	        'title' => 'Share',
	    ),
	    'soundcloud' => array(
	        'id' => 'soundcloud',
	        'title' => 'Soundcloud',
	    ),
	    'spotify' => array(
	        'id' => 'spotify',
	        'title' => 'Spotify',
	    ),
	    'stack-overflow' => array(
	        'id' => 'stack-overflow',
	        'title' => 'Stack Overflow',
	    ), 
	     'steam' => array(
	        'id' => 'steam',
	        'title' => 'Steam',
	    ),
	    'stumbleupon' => array(
	        'id' => 'stumbleupon',
	        'title' => 'Stumbleupon',
	    ),
	    'telegram' => array(
	        'id' => 'telegram',
	        'title' => 'Telegram',
	    ),
	    'twitch' => array(
	        'id' => 'twitch',
	        'title' => 'Twitch',
	    ),
	    'vk' => array(
	        'id' => 'vk',
	        'title' => 'VKontakte',
	    ),
	    'windows' => array(
	        'id' => 'windows',
	        'title' => 'Windows',
	    ), 
	     'wordpress' => array(
	        'id' => 'wordpress',
	        'title' => 'WordPress',
	    ),
	    'yahoo' => array(
	        'id' => 'yahoo',
	        'title' => 'Yahoo',
	    ) 

	);

	return $social_links;
}

/* Social Share Options */
function mazo_social_share_options(){
	
	$social_share = array(
	    'facebook' => array(
	        'id' => 'facebook',
	        'title' => 'Facebook',
	    ),
	    'twitter' => array(
	        'id' => 'twitter',
	        'title' => 'Twitter',
	    ),
	    'linkedin' => array(
	        'id' => 'linkedin',
	        'title' => 'Linkedin',
	    ),
	   'pinterest' => array(
	        'id' => 'pinterest',
	        'title' => 'Pinterest',
	    ),
	   'tumblr' => array(
	        'id' => 'tumblr',
	        'title' => 'Tumblr',
	    ),
	   'digg' => array(
	        'id' => 'digg',
	        'title' => 'Digg',
	    ),
	    'reddit' => array(
	        'id' => 'reddit',
	        'title' => 'Reddit',
	    ),

	);

	return $social_share;
}

/* Button Link Target Options */
function mazo_banner_type(){
	$banner_type = array(
		'image'  => esc_html__('Image Type Banner', 'mazo'),
		//'post'   => esc_html__('Post Type Banner', 'mazo')
	);
	
	return $banner_type;
}

/* Page Banner Layout Style Options */
function mazo_page_banner_layout_options(){
	// post listing/collage style
	$page_banner_layout = array(
		array(
			'id'   => 'banner_layout_1',
			'listing_param' =>  array(
				'title' => esc_html__('Banner Layout 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/banner-layout/banner-layout-1.png'),
			'param'  => array()
		),
		array(
			'id'   => 'banner_layout_2',
			'listing_param' => array(
				'title' => esc_html__('Banner Layout 2','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/banner-layout/banner-layout-2.png'),
			'param'  => array()
		),
		
		array(
			'id'   => 'banner_layout_3',
			'listing_param' =>  array(
				'title' => esc_html__('Banner Layout 3','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/banner-layout/banner-layout-3.png'),
			'param'  => array()
		),
		
	);

	return $page_banner_layout;
}

/* Page Banner Layout Style Options */
function mazo_post_related_layout_options(){
	// post listing/collage style
	$post_related_layout = array(
		array(
			'id'   => 'post_related_1',
			'listing_param' =>  array(
				'title' => esc_html__('Post Related 1','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/related-post/related-post-1.png'),
			'param'  => array()
		),
		array(
			'id'   => 'post_related_2',
			'listing_param' => array(
				'title' => esc_html__('Post Related 2','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/related-post/related-post-2.png'),
			'param'  => array()
		),
		array(
			'id'   => 'post_related_3',
			'listing_param' => array(
				'title' => esc_html__('Post Related 3','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/related-post/related-post-3.png'),
			'param'  => array()
		),
		array(
			'id'   => 'post_related_4',
			'listing_param' => array(
				'title' => esc_html__('Post Related 4','mazo'),
				'img'   => get_template_directory_uri() . '/dz-inc/assets/images/related-post/related-post-4.png'),
			'param'  => array()
		),
	);

	return $post_related_layout;
}
