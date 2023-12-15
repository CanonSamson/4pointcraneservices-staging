<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  mazo_Post_Metabox $metabox
 */
 
/**
 * Get list menu.
 * @return array
 */

function mazo_get_default_option($key, $default = '')
{
    if (empty($key))
    {
        return '';
    }
    $options = get_option(mazo_get_opt_name() , array());
    $value = isset($options[$key]) ? $options[$key] : $default;

    return $value;
}

function mazo_page_options_register($metabox)
{

    $post_layouts_options = mazo_get_post_layouts_options();
    $sidebar_layout_options = mazo_get_sidebar_layout_options();
    $header_style_options = mazo_get_header_style_options();
    $page_banner_options = mazo_get_page_banner_options();
    $page_banner_layout_options = mazo_get_page_banner_layout_options();
    $post_banner_options = mazo_get_post_banner_options();
    $footer_style_options = mazo_get_footer_style_options();
    $banner_type = mazo_banner_type();

    /**
     * Option for single posts.
     *
     */
    if (!$metabox->isset_args('post'))
    {
        $metabox->set_args('post', array(
            'opt_name' => mazo_get_post_opt_name() ,
            'display_name' => esc_html__('Post Settings', 'mazo') ,
            'show_options_object' => false,
            'hints' => array(
                'icon' => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1085e4',
                'icon_size' => '10',
                'tip_style' => array(
                    'color' => '#1085e4',
                    'shadow' => true,
                    'rounded' => false,
                    'style' => '',
                ) ,
                'tip_position' => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ) ,
                'tip_effect' => array(
                    'show' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'mouseover',
                    ) ,
                    'hide' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'click mouseleave',
                    )
                )
            )
        ) , array(
            'context' => 'advanced',
            'priority' => 'default'
        ));
    }

    $metabox->add_section('post', array(
        'title' => esc_html__('General', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'featured_post',
                'type' => 'checkbox',
                'title' => esc_html__('Featured Post?', 'mazo') ,
                'desc' => esc_html__('Check if you want to make this post as featured post', 'mazo') ,
                'default' => ''
            ) ,
        )
    ));

    $metabox->add_section('post', array(
        'title' => esc_html__('Post Header', 'mazo') ,
        'desc' => esc_html__('Header settings for the post.', 'mazo') ,
        'icon' => 'fa fa-window-maximize',
        'fields' => array(
            array(
                'id' => 'post_header_setting',
                'type' => 'button_set',
                'title' => esc_html__('Post Header Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'post_header_style',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'mazo') ,
                'subtitle' => esc_html__('Choose header style. White header is set as default header for this post.', 'mazo') ,
                'options' => $header_style_options,
                'default' => mazo_get_opt('header_style') ,
                'force_output' => true,
                'required' => array(
                    0 => 'post_header_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
        )
    ));

    $metabox->add_section('post', array(
        'title' => esc_html__('Post Layout', 'mazo') ,
        'icon' => 'fa fa-file-text-o',
        'fields' => array(
            array(
                'id' => 'post_layout',
                'type' => 'image_select',
                'height' => '55',
                'title' => esc_html__('Layout', 'mazo') ,
                'subtitle' => esc_html__('Select a template.', 'mazo') ,
                'desc' => esc_html__('Click on the template icon to select.', 'mazo') ,
                'options' => $post_layouts_options,
                'default' => mazo_get_opt('post_general_layout') ,
                'hint' => array(
                    'title' => esc_html__('How it Works?', 'mazo') ,
                    'content' => esc_html__('Once you select the template from here, the template will apply for this page only.', 'mazo')
                )
            ) ,
            array(
                'id' => 'post_type_gallery1',
                'type' => 'gallery',
                'title' => esc_html__('Gallery', 'mazo') ,
                'subtitle' => esc_html__('Select the gallery images', 'mazo') ,
				'desc' => esc_html__('For better layout, Image size width greater than 1000 and height greater than 600', 'mazo') ,
                'default' => '',
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'slider_post_1'
                )
            ) ,
            array(
                'id' => 'post_type_gallery2',
                'type' => 'gallery',
                'title' => esc_html__('Gallery', 'mazo') ,
                'subtitle' => esc_html__('Select the gallery images', 'mazo') ,
				'desc' => esc_html__('For better layout, Image size width greater than 1000 and height greater than 600', 'mazo') ,
                'default' => '',
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'slider_post_2'
                )
            ) ,
            array(
                'id' => 'post_type_gallery3',
                'type' => 'gallery',
                'title' => esc_html__('Gallery', 'mazo') ,
                'subtitle' => esc_html__('Select the gallery images', 'mazo') ,
				'desc' => esc_html__('For better layout, Image size width greater than 1000 and height greater than 600', 'mazo') ,
                'default' => '',
                'required' => array(
				0 => 'post_layout',
                    1 => 'equals',
                    2 => 'slider_post_3'
                )
            ) ,
            array(
                'id' => 'post_type_link',
                'type' => 'text',
                'title' => esc_html__('External Link', 'mazo') ,
                'default' => '',
                'validate' => 'url',
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'link_post'
                )
            ) ,
            array(
                'id' => 'post_type_quote_author',
                'type' => 'text',
                'title' => esc_html__('Author Name', 'mazo') ,
                'default' => esc_html__('Author Name', 'mazo') ,
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'quote_post'
                )
            ) ,
            array(
                'id' => 'post_type_quote_text',
                'type' => 'textarea',
                'title' => esc_html__('Quote Text', 'mazo') ,
                'default' => esc_html__('Quote Text', 'mazo') ,
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'quote_post'
                )
            ) ,
            array(
                'id' => 'post_type_audio',
                'type' => 'text',
                'title' => esc_html__('Sound Cloud Link', 'mazo') ,
                'default' => '',
                'validate' => 'url',
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'audio_post'
                )
            ) ,
            array(
                'id' => 'post_type_video',
                'type' => 'text',
                'title' => esc_html__('Video Link', 'mazo') ,
                'default' => '',
                'validate' => 'url',
                'required' => array(
                    0 => 'post_layout',
                    1 => 'equals',
                    2 => 'video_post'
                )
            ) ,
            array(
                'id' => 'post_show_sidebar',
                'type' => 'switch',
                'title' => esc_html__('Sidebar', 'mazo') ,
                'desc' => esc_html__('Show / hide sidebar from this posts detail page.', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('show_sidebar') ,
                'required' => array(
                    array(
                        0 => 'post_layout',
                        1 => '!=',
                        2 => 'gutenberg'
                    ) ,
                )
            ) ,
            array(
                'id' => 'post_sidebar_layout',
                'type' => 'image_select',
                'title' => esc_html__('Sidebar Layout', 'mazo') ,
                'subtitle' => esc_html__('Choose the layout for page. (Default : Right Side).', 'mazo') ,
                'options' => $sidebar_layout_options,
                'default' => 'right',
                'required' => array(
                    0 => 'post_show_sidebar',
                    1 => 'equals',
                    2 => '1'
                )
            ) ,
            array(
                'id' => 'post_sidebar',
                'type' => 'select',
                'data' => 'sidebars',
                'title' => esc_html__('Sidebar', 'mazo') ,
                'subtitle' => esc_html__('Select sidebar.', 'mazo') ,
                'default' => 'dz_blog_sidebar',
                'required' => array(
                    0 => 'post_sidebar_layout',
                    1 => 'equals',
                    2 => array(
                        'right',
                        'left'
                    )
                )
            ) ,
            array(
                'id' => 'featured_image',
                'type' => 'switch',
                'title' => esc_html__('Show Feature Image', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => 1
            ) ,
            array(
                'id' => 'post_pagination',
                'type' => 'switch',
                'title' => esc_html__('Show Post Pagination', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => 0
            ) ,
        )
    ));

    $metabox->add_section('post', array(
        'title' => esc_html__('Post Banner', 'mazo') ,
        'desc' => esc_html__('Settings for post banner.', 'mazo') ,
        'icon' => 'fa fa-television',
        'fields' => array(
            array(
                'id' => 'post_banner_setting',
                'type' => 'button_set',
                'title' => esc_html__('Post Banner Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ) ,
            array(
                'id' => 'post_banner_on',
                'type' => 'switch',
                'title' => esc_html__('Post Banner', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('post_general_banner_on') ,
                'required' => array(
                    0 => 'post_banner_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
			
			array(
                'id' => 'post_banner_type',
                'type' => 'button_set',
                'title' => esc_html__('Post Banner Type', 'mazo') ,
                'options' => $banner_type,
                'default' => mazo_get_opt('post_general_banner_type') ,
                'required' => array(
                    0 => 'post_banner_on',
                    1 => 'equals',
                    2 => '1'
                )
            ) ,
			
            array(
                'id' => 'post_banner_height',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Height', 'mazo') ,
                'subtitle' => esc_html__('Choose the height for all tag page banner. Default : Medium Banner', 'mazo') ,
                'options' => $page_banner_options,
                'height' => '20',
                'default' => mazo_get_opt('post_general_banner_height') ,
                'required' => array(
                    0 => 'post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
			
			array(
                'id' => 'post_general_banner_custom_height',
                'type' => 'slider',
                'title' => esc_html__('Post Banner Custom Height', 'mazo') ,
                'desc' => esc_html__('Height description. Min: 100, max: 800', 'mazo') ,
                "default" => mazo_get_opt('post_general_banner_height') ,
                "min" => 100,
                "max" => 800,
                'display_value' => 'text',
                'required' => array(
                    0 => 'post_general_banner_height',
                    1 => 'equals',
                    2 => 'page_banner_custom'
                )
            ) ,
			array(
                'id' => 'post_banner_layout',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Layout', 'mazo') ,
                'subtitle' => esc_html__('Choose the layout for all page banner. Default : Banner Layout 1', 'mazo') ,
                'height' => '40',
                'options' => $page_banner_layout_options,
                'default' => 'banner_layout_1',
                'required' => array(
                    0 => 'post_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,
			
            array(
                'id' => 'post_banner',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Post Banner Image', 'mazo') ,
                'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for all pages', 'mazo') ,
                'desc' => esc_html__('Upload banner image.', 'mazo') ,
                'default' => mazo_get_opt('post_general_banner') ,
                'required' => array(
                    0 => 'post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
            array(
                'id' => 'post_breadcrumb',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumb Area', 'mazo') ,
                'subtitle' => esc_html__('Click on the tab to Enable / Disable the website breadcrumb.', 'mazo') ,
                'desc' => esc_html__('This setting affects only on this page.', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('show_breadcrumb') ,
                'required' => array(
                    0 => 'post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
        )
    ));
    
    $metabox->add_section('post', array(
        'title' => esc_html__('Post Footer', 'mazo') ,
        'desc' => esc_html__('Settings for footer area.', 'mazo') ,
        'icon' => 'fa fa-home',
        'fields' => array(
            array(
                'id' => 'post_footer_setting',
                'type' => 'button_set',
                'title' => esc_html__('Post Footer Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id'      => 'post_footer_on',
                'type'    => 'switch',
                'title'   => esc_html__('Footer', 'mazo'),
                'on'      => esc_html__('Enabled', 'mazo'),
                'off'     => esc_html__('Disabled', 'mazo'),
                'default' => mazo_get_opt( 'footer_on' ),
                'required' => array(
                    0 => 'post_footer_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ),
            array(
                'id'       => 'post_footer_style',
                'type'     => 'image_select',
                'height'   => '80',
                'title'    => esc_html__('Footer Template', 'mazo'),
                'subtitle' => esc_html__('Choose a template for footer.', 'mazo'),
                'options'  => $footer_style_options,
                'default'  => mazo_get_opt( 'footer_style' ),
                'required' => array(
                    array(
                        0 => 'post_footer_setting',
                        1 => 'equals',
                        2 => 'custom'
                    ),
                    array(
                        0 => 'post_footer_on',
                        1 => 'equals',
                        2 => 1
                    ),
                )
            )
        )
    ));

    /**
     * Option for single pages.
     *
     */
    if (!$metabox->isset_args('page'))
    {
        $metabox->set_args('page', array(
            'opt_name' => mazo_get_page_opt_name() ,
            'display_name' => esc_html__('Page Settings', 'mazo') ,
            'show_options_object' => false,
            'hints' => array(
                'icon' => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1085e4',
                'icon_size' => '10',
                'tip_style' => array(
                    'color' => '#1085e4',
                    'shadow' => true,
                    'rounded' => false,
                    'style' => '',
                ) ,
                'tip_position' => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ) ,
                'tip_effect' => array(
                    'show' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'mouseover',
                    ) ,
                    'hide' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'click mouseleave',
                    )
                )
            )
        ) , array(
            'context' => 'advanced',
            'priority' => 'default'
        ));
    }
	
    $metabox->add_section('page', array(
        'title' => esc_html__('Page Header', 'mazo') ,
        'desc' => esc_html__('Header settings for the page.', 'mazo') ,
        'icon' => 'fa fa-window-maximize',
        'fields' => array(
			array(
                'id' => 'page_header_setting',
                'type' => 'button_set',
                'title' => esc_html__('Page Header Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'page_header_style',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'mazo') ,
                'subtitle' => esc_html__('Choose header style. White header is set as default header for this page.', 'mazo') ,
                'options' => $header_style_options,
                'default' => mazo_get_opt('header_style') ,
                'force_output' => true,
				'required' => array(
                    0 => 'page_header_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
        )
    ));
	
	$metabox->add_section('page', array(
        'title' => esc_html__('Page Banner', 'mazo') ,
        'desc' => esc_html__('Settings for page banner.', 'mazo') ,
        'icon' => 'fa fa-television',
        'fields' => array(
            array(
                'id' => 'page_banner_setting',
                'type' => 'button_set',
                'title' => esc_html__('Page Banner Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'page_banner_on',
                'type' => 'switch',
                'title' => esc_html__('Page Banner', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('page_general_banner_on') ,
                'required' => array(
                    0 => 'page_banner_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
            array(
                'id' => 'page_banner_type',
                'type' => 'button_set',
                'title' => esc_html__('Page Banner Type', 'mazo') ,
                'options' => $banner_type,
                'default' => mazo_get_opt('page_general_banner_type') ,
                'required' => array(
                    0 => 'page_banner_on',
                    1 => 'equals',
                    2 => '1'
                )
            ) ,
            array(
                'id' => 'page_banner_height',
                'type' => 'image_select',
                'title' => esc_html__('Page Banner Height', 'mazo') ,
                'subtitle' => esc_html__('Choose the height for all tag page banner. Default : Medium Banner', 'mazo') ,
                'options' => $page_banner_options,
                'height' => '20',
                'default' => mazo_get_opt('page_general_banner_height') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,
			
			array(
                'id' => 'page_banner_custom_height',
                'type' => 'slider',
                'title' => esc_html__('Page Banner Custom Height', 'mazo') ,
                'desc' => esc_html__('Hight description. Min: 100, max: 800', 'mazo') ,
                "default" => mazo_get_opt('page_general_banner_height') ,
                "min" => 100,
                "max" => 800,
                'display_value' => 'text',
                'required' => array(
                    0 => 'page_banner_height',
                    1 => 'equals',
                    2 => 'page_banner_custom'
                )
            ) ,
			array(
                'id' => 'page_banner_layout',
                'type' => 'image_select',
                'title' => esc_html__('Page Banner Layout', 'mazo') ,
                'subtitle' => esc_html__('Choose the layout for all page banner. Default : Banner Layout 1', 'mazo') ,
                'height' => '40',
                'options' => $page_banner_layout_options,
                'default' => 'banner_layout_1',
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,
			
            
            array(
                'id' => 'page_banner',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Page Banner Image', 'mazo') ,
                'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for all pages', 'mazo') ,
                'desc' => esc_html__('Upload banner image.', 'mazo') ,
                'default' => mazo_get_opt('page_general_banner') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,

            array(
                'id' => 'page_banner_title',
                'type' => 'text',
                'url' => true,
                'title' => esc_html__('Page Banner Title', 'mazo') ,
                'subtitle' => esc_html__('Enter page banner title.', 'mazo') ,
                'default' => '',
                'required' => array(
                    array(
                        0 => 'page_banner_type',
                        1 => 'equals',
                        2 => 'image'
                    ) ,
                )
            ) ,

            array(
                'id' => 'page_banner_sub_title',
                'type' => 'text',
                'url' => true,
                'title' => esc_html__('Page Banner Sub Title', 'mazo') ,
                'subtitle' => esc_html__('Enter page banner Sub title.', 'mazo') ,
                'default' => '',
                'required' => array(
                    array(
                        0 => 'page_banner_type',
                        1 => 'equals',
                        2 => 'image'
                    ) ,
                    array(
                        0 => 'page_banner_height',
                        1 => 'equals',
                        2 => 'page_banner_big'
                    ) ,
                    array(
                        0 => 'page_header_style',
                        1 => 'equals',
                        2 => 'header_3'
                    ) ,
                )
            ) ,

            array(
                'id' => 'page_breadcrumb',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumb Area', 'mazo') ,
                'subtitle' => esc_html__('Click on the tab to Enable / Disable the website breadcrumb.', 'mazo') ,
                'desc' => esc_html__('This setting affects only on this page.', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('show_breadcrumb') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,
            array(
                'id' => 'page_banner_hide',
                'type' => 'checkbox',
                'title' => esc_html__('Don`t use banner image for this page', 'mazo') ,
                'default' => mazo_get_opt('page_general_banner_hide') ,
                'desc' => esc_html__('Check if you don`t want to use banner image', 'mazo') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'image'
                ) ,
                'hint' => array(
                    'content' => esc_html__('If we don`t have suitable image then we can hide current or default banner images and show only banner container with theme default color.', 'mazo')
                )
            ) ,
            array(
                'id' => 'page_no_of_post',
                'type' => 'text',
                'title' => esc_html__('Number of Posts', 'mazo') ,
                'subtitle' => esc_html__('Enter number of post. Default : 3', 'mazo') ,
                'default' => mazo_get_opt('page_general_no_of_post') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'post'
                )
            ) ,
            array(
                'id' => 'page_post_banner_layout',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Layout', 'mazo') ,
                'subtitle' => esc_html__('Select banner layout. Default : Full Banner', 'mazo') ,
                'options' => $post_banner_options,
                'default' => mazo_get_opt('general_post_banner_layout') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'post'
                )
            ) ,
            array(
                'id' => 'page_banner_cat',
                'type' => 'select',
                'multi' => true,
                'data' => 'terms',
                'args' => array(
                    'taxonomies' => 'category'
                ) ,
                'title' => esc_html__('Post Category', 'mazo') ,
                'subtitle' => esc_html__('Select post category. It will work as default banner for all pages', 'mazo') ,
                'default' => mazo_get_opt('page_general_banner_cat') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'post'
                )
            ) ,
            array(
                'id' => 'page_post_type',
                'type' => 'button_set',
                'title' => esc_html__('Post Type', 'mazo') ,
                'options' => array(
                    'all' => esc_html__('All', 'mazo') ,
                    'featured' => esc_html__('Featured', 'mazo')
                ) ,
                'default' => mazo_get_opt('page_general_post_type') ,
                'force_output' => true,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'post'
                )
            ) ,
            array(
                'id' => 'page_items_with',
                'type' => 'button_set',
                'title' => esc_html__('Items With', 'mazo') ,
                'options' => array(
                    'with_any_type' => esc_html__('Any Type', 'mazo') ,
                    'with_featured_image' => esc_html__('With Featured Image', 'mazo') ,
                    'without_featured_image' => esc_html__('Without Featured Iimage', 'mazo')
                ) ,
                'default' => mazo_get_opt('page_general_items_with') ,
                'required' => array(
                    0 => 'page_banner_type',
                    1 => 'equals',
                    2 => 'post'
                )
            )
        )
    ));

    $metabox->add_section('page', array(
        'title' => esc_html__('Page Sidebar', 'mazo') ,
        'desc' => esc_html__('Settings for sidebar area.', 'mazo') ,
        'icon' => 'fa fa-server',
        'fields' => array(
			array(
                'id' => 'page_show_sidebar_information',
                'type'  => 'info',
				'style' => 'warning',
				'title' => esc_html__('Sidebar Information!', 'mazo'),
				'icon'  => 'el-icon-info-sign',
				'desc'  => esc_html__( 'These settings only working with default template in page attribute.', 'mazo'),
                'default' => mazo_get_opt('page_general_show_sidebar')
            ) ,
            array(
                'id' => 'page_show_sidebar',
                'type' => 'switch',
                'title' => esc_html__('Sidebar', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('page_general_show_sidebar')
            ) ,
            array(
                'id' => 'page_sidebar_layout',
                'type' => 'image_select',
                'title' => esc_html__('Sidebar Layout', 'mazo') ,
                'subtitle' => esc_html__('Choose the layout for page. (Default : Right Side).', 'mazo') ,
                'options' => $sidebar_layout_options,
                'default' => mazo_get_opt('page_general_sidebar_layout') ,
                'required' => array(
                    0 => 'page_show_sidebar',
                    1 => 'equals',
                    2 => '1'
                )
            ) ,
            array(
                'id' => 'page_sidebar',
                'type' => 'select',
                'data' => 'sidebars',
                'title' => esc_html__('Sidebar', 'mazo') ,
                'subtitle' => esc_html__('Select sidebar for the page', 'mazo') ,
                'default' => mazo_get_opt('page_general_sidebar') ,
                'required' => array(
                    0 => 'page_sidebar_layout',
                    1 => 'equals',
                    2 => array(
                        'left',
                        'right'
                    )
                )
            )
        )
    ));

    $metabox->add_section('page', array(
        'title' => esc_html__('Page Footer', 'mazo') ,
        'desc' => esc_html__('Settings for footer area.', 'mazo') ,
        'icon' => 'fa fa-home',
        'fields' => array(
			array(
                'id' => 'page_footer_setting',
                'type' => 'button_set',
                'title' => esc_html__('Page Footer Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
			),
			array(
		        'id'      => 'page_footer_on',
	            'type'    => 'switch',
	            'title'   => esc_html__('Footer', 'mazo'),
	            'on'      => esc_html__('Enabled', 'mazo'),
	            'off'     => esc_html__('Disabled', 'mazo'),
				'default' => mazo_get_opt( 'footer_on' ),
	            'required' => array(
                    0 => 'page_footer_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
		    ),
    		array(
	            'id'       => 'page_footer_style',
	            'type'     => 'image_select',
	            'height'   => '80',
	            'title'    => esc_html__('Footer Template', 'mazo'),
	            'subtitle' => esc_html__('Choose a template for footer.', 'mazo'),
	            'options'  => $footer_style_options,
	            'default'  => mazo_get_opt( 'footer_style' ),
				'required' => array(
					array(
						0 => 'page_footer_setting',
						1 => 'equals',
						2 => 'custom'
					),
					array(
						0 => 'page_footer_on',
						1 => 'equals',
						2 => 1
					),
                )
	        )
        )
    ));

    /**
     * Option for single pages.
     *
     */
    if (!$metabox->isset_args('dz_team'))
    {
        $metabox->set_args('dz_team', array(
            'opt_name' => mazo_get_page_opt_name() ,
            'display_name' => esc_html__('Team Settings', 'mazo') ,
            'show_options_object' => false,
            'hints' => array(
                'icon' => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1085e4',
                'icon_size' => '10',
                'tip_style' => array(
                    'color' => '#1085e4',
                    'shadow' => true,
                    'rounded' => false,
                    'style' => '',
                ) ,
                'tip_position' => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ) ,
                'tip_effect' => array(
                    'show' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'mouseover',
                    ) ,
                    'hide' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'click mouseleave',
                    )
                )
            )
        ) , array(
            'context' => 'advanced',
            'priority' => 'default'
        ));
    }
	
	$metabox->add_section('dz_team', array(
        'title' => esc_html__('Featured Post', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'featured_post',
                'type' => 'checkbox',
                'title' => esc_html__('Featured Post?', 'mazo') ,
                'desc' => esc_html__('Check if you want to make this post as featured post', 'mazo') ,
                'default' => ''
            ) ,
        )
    ));

    $metabox->add_section('dz_team', array(
        'title' => esc_html__('General', 'mazo') ,
        'desc' => esc_html__('Header settings for the page.', 'mazo') ,
        'icon' => 'fa fa-window-maximize',
        'fields' => array(
            
            array(
                'id' => 'team_designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'mazo') ,
                'desc' => esc_html__('Enter client designation', 'mazo') ,
                'default' => 'Director',
            ) ,

        )
    ));

    $metabox->add_section('dz_team', array(
        'title' => esc_html__('Social Settings', 'mazo') ,
        'desc' => esc_html__('Settings for page banner.', 'mazo') ,
        'icon' => 'fa fa-television',
        'fields' => array(

            array(
                'id' => 'team_social_facebook',
                'type' => 'text',
                'url' => true,
                'title' => esc_html__('Facebook Link', 'mazo') ,
                'desc' => esc_html__('Enter Facebook Url', 'mazo') ,
                'default' => 'https://www.facebook.com'
            ) ,
            array(
                'id' => 'team_social_twitter',
                'type' => 'text',
                'url' => true,
                'title' => esc_html__('Twitter Link', 'mazo') ,
                'desc' => esc_html__('Enter Twitter Url', 'mazo') ,
                'default' => 'https://www.twitter.com'
            ) ,
            array(
                'id' => 'team_social_instagram',
                'type' => 'text',
                'url' => true,
                'title' => esc_html__('Instagram Link', 'mazo') ,
                'desc' => esc_html__('Enter Instagram Url', 'mazo') ,
                'default' => 'https://www.instagram.com'
            ) ,
            array(
                'id' => 'team_social_youtube',
                'type' => 'text',
                'url' => true,
                'title' => esc_html__('Youtube Link', 'mazo') ,
                'desc' => esc_html__('Enter Youtube Url', 'mazo') ,
                'default' => 'https://www.youtube.com'
            ) ,

        )
    ));

    /**
     * Option for Testimonial single posts.
     *
     */
    if (!$metabox->isset_args('dz_testimonial'))
    {
        $metabox->set_args('dz_testimonial', array(
            'opt_name' => mazo_get_post_opt_name() ,
            'display_name' => esc_html__('Testimonial Setting', 'mazo') ,
            'show_options_object' => false,
            'hints' => array(
                'icon' => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1085e4',
                'icon_size' => '10',
                'tip_style' => array(
                    'color' => '#1085e4',
                    'shadow' => true,
                    'rounded' => false,
                    'style' => '',
                ) ,
                'tip_position' => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ) ,
                'tip_effect' => array(
                    'show' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'mouseover',
                    ) ,
                    'hide' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'click mouseleave',
                    )
                )
            )
        ) , array(
            'context' => 'advanced',
            'priority' => 'default'
        ));
    }
	
	$metabox->add_section('dz_testimonial', array(
        'title' => esc_html__('Feature Post', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'featured_post',
                'type' => 'checkbox',
                'title' => esc_html__('Featured Post?', 'mazo') ,
                'desc' => esc_html__('Check if you want to make this post as featured post', 'mazo') ,
                'default' => ''
            ) ,
        )
    ));
	
    $metabox->add_section('dz_testimonial', array(
        'title' => esc_html__('General', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'testimonial_designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'mazo') ,
                'desc' => esc_html__('Enter client designation', 'mazo') ,
                'default' => 'CEO & Founder'
            ) ,
			
			array(
				'id'       => 'testimonial_rating',
				'type'     => 'select',
				'title'    => esc_html__('Rating', 'mazo'), 
				'desc'     => esc_html__('Select Rating.', 'mazo'),
				/* Must provide key => value pairs for select options */
				'options'  => array(
					'1' => '1 Star',
					'2' => '2 Star',
					'3' => '3 Star',
					'4' => '4 Star',
					'5' => '5 Star'
				),
				'default'  => '5',
			),
            
            array(
                'id' => 'testimonial_rating_title',
                'type' => 'text',
                'title' => esc_html__('Rating Title', 'mazo') ,
                'desc' => esc_html__('Enter Rating Title', 'mazo') ,
                'default' => 'Awesome'
            ) ,
        )
    ));

    /**
     * Option for Service single posts.
     *
     */
    if (!$metabox->isset_args('dz_service'))
    {
        $metabox->set_args('dz_service', array(
            'opt_name' => mazo_get_post_opt_name() ,
            'display_name' => esc_html__('Service Setting', 'mazo') ,
            'show_options_object' => false,
            'hints' => array(
                'icon' => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1085e4',
                'icon_size' => '10',
                'tip_style' => array(
                    'color' => '#1085e4',
                    'shadow' => true,
                    'rounded' => false,
                    'style' => '',
                ) ,
                'tip_position' => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ) ,
                'tip_effect' => array(
                    'show' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'mouseover',
                    ) ,
                    'hide' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'click mouseleave',
                    )
                )
            )
        ) , array(
            'context' => 'advanced',
            'priority' => 'default'
        ));
    }
	
	$metabox->add_section('dz_service', array(
        'title' => esc_html__('Feature Post', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'featured_post',
                'type' => 'checkbox',
                'title' => esc_html__('Featured Post?', 'mazo') ,
                'desc' => esc_html__('Check if you want to make this post as featured post', 'mazo') ,
            ) ,
			
        )
    ));

    $metabox->add_section('dz_service', array(
        'title' => esc_html__('Service Page Header', 'mazo') ,
        'desc' => esc_html__('Header settings for the page.', 'mazo') ,
        'icon' => 'fa fa-window-maximize',
        'fields' => array(

            array(
                'id' => 'service_page_header_setting',
                'type' => 'button_set',
                'title' => esc_html__('Header Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'service_page_header_style',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'mazo') ,
                'subtitle' => esc_html__('Choose header style. White header is set as default header for this service.', 'mazo') ,
                'options' => $header_style_options,
                'default' => mazo_get_opt('header_style') ,
                'force_output' => true,
                'required' => array(
                    0 => 'service_page_header_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
        )
    )); 
	
    $metabox->add_section('dz_service', array(
        'title' => esc_html__('General', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
			array(
                'id' => 'service_subtitle',
                'type' => 'text',
                'title' => esc_html__('Subtitle', 'mazo') ,
                'desc' => esc_html__('Enter Subtitle', 'mazo') ,
                'default' => esc_html__('Rules Of Business', 'mazo')
            ),
			array(
                'id' => 'service_icon_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Service Icon image', 'mazo') ,
                'desc' => esc_html__('Upload banner image.', 'mazo') ,
                'default' => mazo_get_opt('service_icon_image') ,
            ) ,    
            array(
                'id' => 'service_icon_type',
                'type' => 'select',
                'title' => esc_html__('Service Icon', 'mazo') ,
                'options' => array(
                    'fontawesome' => esc_html__('Font Awesome', 'mazo') ,
                    'flaticon' => esc_html__('Flat Icon', 'mazo') ,
                    'themify' => esc_html__('Themify Icon', 'mazo') ,
                ) ,
                'desc' => esc_html__('Select Service Icon', 'mazo') ,
                'default' => 'fontawesome'
            ) ,
            array(
                'id' => 'service_icon_fontawesome',
                'type' => 'select',
                'title' => esc_html__('Service Icon', 'mazo') ,
                'options' => mazo_get_fontawesome_icon() ,
                'desc' => esc_html__('Select Service Icon', 'mazo') ,
                'required' => array(
                    0 => 'service_icon_type',
                    1 => 'equals',
                    2 => 'fontawesome'
                )
            ) ,
            array(
                'id' => 'service_icon_flaticon',
                'type' => 'select',
                'title' => esc_html__('Service Icon', 'mazo') ,
                'options' => mazo_get_flaticon_icon() ,
                'desc' => esc_html__('Select Service Icon', 'mazo') ,
                'required' => array(
                    0 => 'service_icon_type',
                    1 => 'equals',
                    2 => 'flaticon'
                )
            ) ,
            array(
                'id' => 'service_icon_themify',
                'type' => 'select',
                'title' => esc_html__('Service Icon', 'mazo') ,
                'options' => mazo_get_themify_icon() ,
                'desc' => esc_html__('Select Service Icon', 'mazo') ,
                'required' => array(
                    0 => 'service_icon_type',
                    1 => 'equals',
                    2 => 'themify'
                )
            ) ,
        )
    ));
	
	
    $metabox->add_section('dz_service', array(
        'title' => esc_html__('Service Post Banner', 'mazo') ,
        'desc' => esc_html__('Settings for post banner.', 'mazo') ,
        'icon' => 'fa fa-television',
        'fields' => array(
            array(
                'id' => 'service_post_banner_setting',
                'type' => 'button_set',
                'title' => esc_html__('Service Post Banner Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'service_post_banner_on',
                'type' => 'switch',
                'title' => esc_html__('Post Banner', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('post_general_banner_on') ,
				'required' => array(
                    0 => 'service_post_banner_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
                
            ) ,
			
			
			array(
                'id' => 'service_post_banner_type',
                'type' => 'button_set',
                'title' => esc_html__('Service Post Banner Type', 'mazo') ,
                'options' => $banner_type,
                'default' => mazo_get_opt('post_general_banner_type') ,
                'required' => array(
                    0 => 'service_post_banner_on',
                    1 => 'equals',
                    2 => '1'
                )
            ) ,
            array(
                'id' => 'service_post_banner_height',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Height', 'mazo') ,
                'subtitle' => esc_html__('Choose the height for all tag page banner. Default : Medium Banner', 'mazo') ,
                'options' => $page_banner_options,
                'height' => '20',
                'default' => mazo_get_opt('service_post_general_banner_height') ,
                'required' => array(
                    0 => 'service_post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
			
			array(
                'id' => 'service_post_banner_layout',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Layout', 'mazo') ,
                'subtitle' => esc_html__('Choose the layout for all page banner. Default : Banner Layout 1', 'mazo') ,
                'height' => '40',
                'options' => $page_banner_layout_options,
                'default' => 'banner_layout_1',
                'required' => array(
                    0 => 'service_post_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,
			
            array(
                'id' => 'service_post_banner',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Post Banner Image', 'mazo') ,
                'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for all pages', 'mazo') ,
                'desc' => esc_html__('Upload banner image.', 'mazo') ,
                'default' => mazo_get_opt('service_post_general_banner') ,
                'required' => array(
                    0 => 'service_post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
            array(
                'id' => 'service_post_breadcrumb',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumb Area', 'mazo') ,
                'subtitle' => esc_html__('Click on the tab to Enable / Disable the website breadcrumb.', 'mazo') ,
                'desc' => esc_html__('This setting affects only on this page.', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('show_breadcrumb') ,
                'required' => array(
                    0 => 'service_post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
        )
    ));
	

    $metabox->add_section('dz_service', array(
        'title' => esc_html__('Service Post Footer', 'mazo') ,
        'desc' => esc_html__('Settings for footer area.', 'mazo') ,
        'icon' => 'fa fa-home',
        'fields' => array(
            array(
                'id' => 'service_page_footer_setting',
                'type' => 'button_set',
                'title' => esc_html__('Service Post Footer Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id'      => 'service_page_footer_on',
                'type'    => 'switch',
                'title'   => esc_html__('Footer', 'mazo'),
                'on'      => esc_html__('Enabled', 'mazo'),
                'off'     => esc_html__('Disabled', 'mazo'),
                'default' => mazo_get_opt( 'footer_on' ),
                'required' => array(
                    0 => 'service_page_footer_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ),
            array(
                'id'       => 'service_page_footer_style',
                'type'     => 'image_select',
                'height'   => '80',
                'title'    => esc_html__('Footer Template', 'mazo'),
                'subtitle' => esc_html__('Choose a template for footer.', 'mazo'),
                'options'  => $footer_style_options,
                'default'  => mazo_get_opt( 'footer_style' ),
                'required' => array(
                    array(
                        0 => 'service_page_footer_setting',
                        1 => 'equals',
                        2 => 'custom'
                    ),
                    array(
                        0 => 'service_page_footer_on',
                        1 => 'equals',
                        2 => 1
                    ),
                )
            )
        )
    ));
	
	/**
     * Option for Portfolio single posts.
     *
     */
    if (!$metabox->isset_args('dz_portfolio'))
    {
        $metabox->set_args('dz_portfolio', array(
            'opt_name' => mazo_get_post_opt_name() ,
            'display_name' => esc_html__('Portfolio Setting', 'mazo') ,
            'show_options_object' => false,
            'hints' => array(
                'icon' => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1085e4',
                'icon_size' => '10',
                'tip_style' => array(
                    'color' => '#1085e4',
                    'shadow' => true,
                    'rounded' => false,
                    'style' => '',
                ) ,
                'tip_position' => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ) ,
                'tip_effect' => array(
                    'show' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'mouseover',
                    ) ,
                    'hide' => array(
                        'effect' => 'slide',
                        'duration' => '500',
                        'event' => 'click mouseleave',
                    )
                )
            )
        ) , array(
            'context' => 'advanced',
            'priority' => 'default'
        ));
    }
	
	 $metabox->add_section('dz_portfolio', array(
        'title' => esc_html__('Feature Post', 'mazo') ,
        'icon' => 'fa fa-newspaper-o',
        'fields' => array(
            array(
                'id' => 'featured_post',
                'type' => 'checkbox',
                'title' => esc_html__('Featured Post?', 'mazo') ,
                'desc' => esc_html__('Check if you want to make this post as featured post', 'mazo') ,
                'default' => ''
            ) ,
        )
    ));

    $metabox->add_section('dz_portfolio', array(
        'title' => esc_html__('Portfolio Page Header', 'mazo') ,
        'desc' => esc_html__('Header settings for the page.', 'mazo') ,
        'icon' => 'fa fa-window-maximize',
        'fields' => array(

            array(
                'id' => 'portfolio_page_header_setting',
                'type' => 'button_set',
                'title' => esc_html__('Header Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'portfolio_page_header_style',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'mazo') ,
                'subtitle' => esc_html__('Choose header style. White header is set as default header for this service.', 'mazo') ,
                'options' => $header_style_options,
                'default' => mazo_get_opt('header_style') ,
                'force_output' => true,
                'required' => array(
                    0 => 'portfolio_page_header_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
        )
    ));
	
    $metabox->add_section('dz_portfolio', array(
        'title' => esc_html__('Portfolio Post Banner', 'mazo') ,
        'desc' => esc_html__('Settings for post banner.', 'mazo') ,
        'icon' => 'fa fa-television',
        'fields' => array(
            array(
                'id' => 'portfolio_post_banner_setting',
                'type' => 'button_set',
                'title' => esc_html__('Portfolio Post Banner Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id' => 'portfolio_post_banner_on',
                'type' => 'switch',
                'title' => esc_html__('Post Banner', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('post_general_banner_on') ,
                'required' => array(
                    0 => 'portfolio_post_banner_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ) ,
			
			array(
                'id' => 'portfolio_post_banner_type',
                'type' => 'button_set',
                'title' => esc_html__('Portfolio Post Banner Type', 'mazo') ,
                'options' => $banner_type,
                'default' => mazo_get_opt('post_general_banner_type') ,
                'required' => array(
                    0 => 'portfolio_post_banner_on',
                    1 => 'equals',
                    2 => '1'
                )
            ) ,
			
            array(
                'id' => 'portfolio_post_banner_height',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Height', 'mazo') ,
                'subtitle' => esc_html__('Choose the height for all tag page banner. Default : Medium Banner', 'mazo') ,
                'options' => $page_banner_options,
                'height' => '20',
                'default' => mazo_get_opt('portfolio_post_general_banner_height') ,
                'required' => array(
                    0 => 'portfolio_post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
			
			array(
                'id' => 'portfolio_post_banner_layout',
                'type' => 'image_select',
                'title' => esc_html__('Post Banner Layout', 'mazo') ,
                'subtitle' => esc_html__('Choose the layout for all post banner. Default : Banner Layout 1', 'mazo') ,
                'height' => '40',
                'options' => $page_banner_layout_options,
                'default' => 'banner_layout_1',
                'required' => array(
                    0 => 'portfolio_post_banner_type',
                    1 => 'equals',
                    2 => 'image'
                )
            ) ,
			
            array(
                'id' => 'portfolio_post_banner',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Post Banner Image', 'mazo') ,
                'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for all pages', 'mazo') ,
                'desc' => esc_html__('Upload banner image.', 'mazo') ,
                'default' => mazo_get_opt('portfolio_post_general_banner') ,
                'required' => array(
                    0 => 'portfolio_post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
            array(
                'id' => 'portfolio_post_breadcrumb',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumb Area', 'mazo') ,
                'subtitle' => esc_html__('Click on the tab to Enable / Disable the website breadcrumb.', 'mazo') ,
                'desc' => esc_html__('This setting affects only on this page.', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => mazo_get_opt('show_breadcrumb') ,
                'required' => array(
                    0 => 'portfolio_post_banner_on',
                    1 => 'equals',
                    2 => 1
                ) ,
            ) ,
        )
    ));
    

    $metabox->add_section('dz_portfolio', array(
        'title' => esc_html__('Portfolio Post Footer', 'mazo') ,
        'desc' => esc_html__('Settings for footer area.', 'mazo') ,
        'icon' => 'fa fa-home',
        'fields' => array(
            array(
                'id' => 'portfolio_page_footer_setting',
                'type' => 'button_set',
                'title' => esc_html__('Portfolio Post Footer Settings', 'mazo') ,
                'options' => array(
                    'theme_default' => esc_html__('Theme Default', 'mazo') ,
                    'custom' => esc_html__('Custom Setting', 'mazo')
                ) ,
                'default' => 'theme_default',
            ),
            array(
                'id'      => 'portfolio_page_footer_on',
                'type'    => 'switch',
                'title'   => esc_html__('Footer', 'mazo'),
                'on'      => esc_html__('Enabled', 'mazo'),
                'off'     => esc_html__('Disabled', 'mazo'),
                'default' => mazo_get_opt( 'footer_on' ),
                'required' => array(
                    0 => 'portfolio_page_footer_setting',
                    1 => 'equals',
                    2 => 'custom'
                )
            ),
            array(
                'id'       => 'portfolio_page_footer_style',
                'type'     => 'image_select',
                'height'   => '80',
                'title'    => esc_html__('Footer Template', 'mazo'),
                'subtitle' => esc_html__('Choose a template for footer.', 'mazo'),
                'options'  => $footer_style_options,
                'default'  => mazo_get_opt( 'footer_style' ),
                'required' => array(
                    array(
                        0 => 'portfolio_page_footer_setting',
                        1 => 'equals',
                        2 => 'custom'
                    ),
                    array(
                        0 => 'portfolio_page_footer_on',
                        1 => 'equals',
                        2 => 1
                    ),
                )
            )
        )
    ));
}

add_action('dsx_post_metabox_register', 'mazo_page_options_register');

