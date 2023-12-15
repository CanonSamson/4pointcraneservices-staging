<?php
/**
 ReduxFramework Theme Option File
 For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 *
 */

if (!class_exists('ReduxFramework'))
{
    return;
}

if (!class_exists('Mazo_Redux_Framework_config'))
{
    class Mazo_Redux_Framework_config
    {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;
        public $page_template_options;
        public $coming_template_options;
        public $maintenance_template_options;
        public $error_template_options;
        public $header_style_options;
        public $footer_style_options;
        public $post_layouts_options;
        public $sidebar_layout_options;
        public $page_banner_options;
        public $post_banner_options;
        public $theme_layout_options;
        public $theme_color_background_options;
        public $theme_image_background_options;
        public $theme_pattern_background_options;
        public $theme_color_options;
        public $page_loader_options;
        public $sort_by_options;
        public $link_target_options;
        public $social_link_options;
        public $post_related_layout_options;
        public $banner_type;

        function __construct()
        {

            /** Option Variable assigning values **/
            $this->page_template_options = mazo_get_page_template_options();
            $this->coming_template_options = mazo_get_coming_template_options();
            $this->maintenance_template_options = mazo_get_maintenance_template_options();
            $this->error_template_options = mazo_get_error_template_options();
            $this->header_style_options = mazo_get_header_style_options();
            $this->footer_style_options = mazo_get_footer_style_options();
            $this->post_layouts_options = mazo_get_post_layouts_options();
            $this->sidebar_layout_options = mazo_get_sidebar_layout_options();
            $this->page_banner_options = mazo_get_page_banner_options();
            $this->page_banner_layout_options = mazo_get_page_banner_layout_options();
            $this->post_banner_options = mazo_get_post_banner_options();
            $this->theme_layout_options = mazo_get_theme_layout_options();
            $this->theme_color_background_options = mazo_get_theme_color_background_options();
            $this->theme_image_background_options = mazo_get_theme_image_background_options();
            $this->theme_pattern_background_options = mazo_get_theme_pattern_background_options();
            $this->theme_color_options = mazo_get_theme_color_options();
            $this->page_loader_options = mazo_get_page_loader_options();
            $this->sort_by_options = mazo_get_sort_by_options();
            $this->link_target_options = mazo_get_link_target_options();
            $this->social_link_options = mazo_get_social_link_options();
            $this->post_related_layout_options = mazo_get_post_related_layout_options();
            $this->social_share_options = mazo_get_social_share_options();
            $this->banner_type = mazo_banner_type();
            $this->mazo_fontawesome_icon = mazo_get_fontawesome_icon();
            /** End Option Variable assigning values **/

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // array of widgets
            $this->mazo_get_wp_widgets();

            // Create the sections and fields
            $this->setSections();

            // default theme options
            if (!isset($this->args['opt_name']))
            { // No errors please
                return;
            }
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**
			* All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         *
         */

        function setArguments()
        {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.
			
            $opt_name = mazo_get_opt_name();

            $this->args = array(

                // TYPICAL -> Change these values as you need/desire
                'opt_name' => $opt_name,
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name') ,
                // Name that appears at the top of your panel
                'display_version' => $theme->get('Version') ,
                // Version that appears at the top of your panel
                'menu_type' => class_exists('Mazo_Menu_Handle') ? 'submenu' : 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => false,
                // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Theme Options', 'mazo') ,
                'page_title' => esc_html__('Theme Options', 'mazo') ,
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography' => false,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar' => false,
                // Show the panel pages on the admin bar
                'admin_bar_icon' => 'dashicons-admin-generic',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable' => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode' => true,
                // Show the time the page took to load, etc
                'update_notice' => true,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer' => false,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
                'show_options_object' => false,
                // OPTIONAL -> Give you extra features
                'page_priority' => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => class_exists('Mazo_Menu_Handle') ? $theme->get('TextDomain') : '',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon' => '',
                // Specify a custom URL to an icon
                'last_tab' => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug' => 'theme-options',
                // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
                'save_defaults' => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show' => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'use_cdn' => true,
                // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
                // HINTS
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
                        ) ,
                    ) ,
                ) ,
                'templates_path' => class_exists('DZCore') ? dzcore()
                    ->path('APP_DIR') . '/templates/redux/' : '',
            );
        }

        /**
         * Custom query for widget list array
         *
         * @param  array $all_widgets
         */
        function mazo_get_wp_widgets_in_progress()
        {

            global $wpdb;
            $table = $wpdb->prefix . 'options';
            $attrPrefix = 'widget_';

			$query = "SELECT `option_id`, `option_name` FROM $table WHERE `option_name` LIKE '%$attrPrefix%' AND `option_name` != 'sidebars_widgets' ORDER BY `option_id` ASC";
			$prepare = $wpdb->prepare($query);
            $result = $wpdb->get_row($prepare);
			
			$all_widgets = array();

            foreach ($result as $widget)
            {
                $all_widgets[$widget->option_name] = ucwords(str_replace("_", " ", $widget->option_name));
            }

            return $all_widgets;
        }
		
		
		function mazo_get_wp_widgets()
        {

            global $wpdb;
            $table = $wpdb->prefix . 'options';
            $attrPrefix = 'widget_';

            $result = $wpdb->get_results("SELECT `option_id`, `option_name` FROM $table WHERE `option_name` LIKE '%$attrPrefix%' AND `option_name` != 'sidebars_widgets' ORDER BY `option_id` ASC");

			

            $all_widgets = array();

            foreach ($result as $widget)
            {
                $all_widgets[$widget->option_name] = ucwords(str_replace("_", " ", $widget->option_name));
            }

            return $all_widgets;
        }

        /**
         * All the possible sections for Redux.
         *
         */
        function setSections()
        {

            /*--------------------------------------------------------------
            # 1. General Settings
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('General Settings', 'mazo') ,
                'desc' => esc_html__('General Settings is a global setting that will affects all the pages of you website. From here you can make changes globaly. The setting will apply if there is no individual settings.', 'mazo') ,
                'icon' => 'el-icon-home',
                'fields' => array(
                    array(
                        'id' => 'website_status',
                        'type' => 'button_set',
                        'title' => esc_html__('Website Status', 'mazo') ,
                        'subtitle' => esc_html__('Click on the option tabs to change the status of your website.', 'mazo') ,
                        'desc' => esc_html__('Select option tabs to change the status.', 'mazo') ,
                        'options' => array(
                            'live_mode' => esc_html__('Live', 'mazo') ,
                            'comingsoon_mode' => esc_html__('Coming Soon', 'mazo') ,
                            'maintenance_mode' => esc_html__('Site Down For Maintenance', 'mazo')
                        ) ,
                        'default' => 'live_mode',
                        'hint' => array(
                            'title' => esc_html__('Status', 'mazo') ,
                            'content' => esc_html__('1. Live status indicate that your website is available and operational.', 'mazo') . '<br><br>' . esc_html__('2. Coming Soon status show your website visitors that you are working on your website for making it better.', 'mazo') . '<br><br>' . esc_html__('3. Maintenance mode show your website visitors that you are working on your website for making it better.', 'mazo') . '<br><br> <strong>Note : </strong> ' . esc_html__(' Coming soon template and maintenance template will not show when user login.', 'mazo')
                        )
                    ) ,

                    array(
                        'id' => 'coming_soon_template',
                        'type' => 'image_select',
                        'title' => esc_html__('Coming Soon Template', 'mazo') ,
                        'subtitle' => esc_html__('Choose the template for Coming Soon page. (Default : 1).', 'mazo') ,
                        'desc' => esc_html__('Click on the icon to change the template.', 'mazo') ,
                        'options' => $this->coming_template_options,
                        'default' => 'coming_style_1',
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'comingsoon_mode' ) ,
                        'hint' => array(
                            'title' => esc_html__('Hint Title', 'mazo') ,
                            'content' => esc_html__('Choose the coming soon template design as you want to show.', 'mazo')
                        )
                    ) ,
					array(
                        'id' => 'comingsoon_launch_date',
                        'type' => 'date',
                        'title' => esc_html__('Coming soon Date', 'mazo') ,
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'comingsoon_mode' ) ,
                    ) ,
                    array(
                        'id' => 'comingsoon_bg',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Coming Soon Page Background', 'mazo') ,
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'comingsoon_mode' ) ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/bg8.jpg'
                        ) ,
                    ) ,
					array(
                        'id' => 'comingsoon_page_title',
                        'type' => 'text',
                        'title' => esc_html__('Comingsoon Soon Page Title', 'mazo') ,
                        'desc' => esc_html__('Default Comingsoon Soon page title.', 'mazo') ,
                        'default' => esc_html__('WE ARE DOING GREAT', 'mazo').'<br>'.esc_html__('ALMOST DONE...', 'mazo'),
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'comingsoon_mode' ) ,
                    ) ,
					array(
						'id' => 'comingsoon_page_url',
						'type' => 'text',
						'url' => true,
						'title' => esc_html__('Comingsoon Soon Page Button Url', 'mazo') ,
						'desc' => esc_html__('Enter Comingsoon Soon Page Button Url', 'mazo') ,
						'default' => '',
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'comingsoon_mode' ) ,
					) ,
					array(
                        'id' => 'comingsoon_subscribe_on',
                        'type' => 'switch',
                        'title' => esc_html__('Subscribe Button', 'mazo') ,
                        'subtitle' => esc_html__('Show or hide the subscribe button.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'comingsoon_mode' ) ,
                    ),
                    array(
                        'id' => 'maintenance_template',
                        'type' => 'image_select',
                        'title' => esc_html__('Maintenance Template', 'mazo') ,
                        'subtitle' => esc_html__('Choose the template for Maintenance page. (Default : 1).', 'mazo') ,
                        'desc' => esc_html__('Click on the icon to change the template.', 'mazo') ,
                        'options' => $this->maintenance_template_options,
                        'default' => 'maintenance_style_1',
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'maintenance_mode' ) ,
                        'hint' => array(
                            'title' => esc_html__('Hint Title', 'mazo') ,
                            'content' => esc_html__('Choose the maintenance template design as you want to show.', 'mazo')
                        )
                    ) ,
					
					array(
			            'id'       => 'maintenance_icon',
			            'type'     => 'media',
						'url'      => true,
			            'title'    => esc_html__('Maintenance Icon', 'mazo'),
			            'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'maintenance_mode' ),
			            'default'  => array(
			                'url'=> get_template_directory_uri() . '/assets/images/vlc.png'
			            ),
			        ),
					
                    array(
                        'id' => 'maintenance_bg',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Background Image', 'mazo') ,
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'maintenance_mode' ) ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/background/under-construct.jpg'
                        ) ,
                    ) ,
                    
                    array(
                        'id' => 'maintenance_title',
                        'type' => 'textarea',
                        'title' => esc_html__('Maintenance Page Title', 'mazo') ,
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'maintenance_mode' ) ,
                        'default' => esc_html__('Site Is Down', 'mazo') . ' <br/>' . esc_html__('For Maintenance', 'mazo') ,
                    ) ,
                    array(
                        'id' => 'maintenance_desc',
                        'type' => 'textarea',
                        'title' => esc_html__('Maintenance Page Description', 'mazo') ,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'maintenance_mode' ) ,
                        'default' => esc_html__('This is the Technical Problems Page.', 'mazo') . ' <br/>' . esc_html__('Or any other page.', 'mazo') ,
                    ) ,
                    array(
                        'id' => 'logo_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Logo Type', 'mazo') ,
                        'subtitle' => esc_html__('Choose the logo type', 'mazo') ,
                        'desc' => esc_html__('Click o the tab to change the logo type.', 'mazo') ,
                        'options' => array(
                            'image_logo' => esc_html__('Image Logo', 'mazo') ,
                            'text_logo' => esc_html__('Text Logo', 'mazo')
                        ) ,
                        'default' => 'image_logo',
                        'hint' => array(
                            'title' => esc_html__('Choose Logo Type:', 'mazo') ,
                            'content' => esc_html__('1. Image Logo will be the .pmg / .jpg type. This setting affects all the site pages.', 'mazo') . '<br><br>' . esc_html__('2. Text Logo will the text type. This setting affects all the site pages.', 'mazo')
                        ),
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                    array(
                        'id' => 'blog_page_title',
                        'type' => 'text',
                        'title' => esc_html__('Blog Page Title', 'mazo') ,
                        'desc' => esc_html__('Default blog page title.', 'mazo') ,
                        'default' => esc_html__('Blog', 'mazo'),
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                    array(
                        'id' => 'page_loading_on',
                        'type' => 'switch',
                        'title' => esc_html__('Page Loading', 'mazo') ,
                        'subtitle' => esc_html__('Click on the tab to Enable / Disable the page loading setting.', 'mazo') ,
                        'desc' => esc_html__('Once you click on disable, This setting affects all the site pages.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,

                    array(
                        'id' => 'show_social_icon',
                        'type' => 'switch',
                        'title' => esc_html__('Social Icon', 'mazo') ,
                        'subtitle' => esc_html__('Click on the tab to Enable / Disable the social icon setting.', 'mazo') ,
                        'desc' => esc_html__('Once you click on disable, This setting affects all the site pages.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                    array(
                        'id' => 'show_breadcrumb',
                        'type' => 'switch',
                        'title' => esc_html__('Breadcrumb Area', 'mazo') ,
                        'subtitle' => esc_html__('Click on the tab to Enable / Disable the website breadcrumb.', 'mazo') ,
                        'desc' => esc_html__('Once you click on disable, This setting affects all the site pages.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
						'hint' => array(
                            'title' => esc_html__('Select Breadcrumb Area:', 'mazo') ,
                            'content' => esc_html__('This breadcrumb option only works when page level banner Theme Settings option selected. This option will not work when custom settings selected.', 'mazo'),
                        )
                    ) ,
                    array(
                        'id' => 'show_login_registration',
                        'type' => 'switch',
                        'title' => esc_html__('Login / Register', 'mazo') ,
                        'subtitle' => esc_html__('Click on the tab to Enable / Disable the login / register button / likns.', 'mazo') ,
                        'desc' => esc_html__('Once you click on disable, This setting affects all the site pages.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                        'hint' => array(
                            'title' => esc_html__('Login/Register Visible', 'mazo') ,
                            'content' => esc_html__('This is show in top bar.', 'mazo')
                        )
                    ) ,
                    array(
                        'id' => 'show_sidebar',
                        'type' => 'switch',
                        'title' => esc_html__('Sidebar', 'mazo') ,
                        'subtitle' => esc_html__('Click on the tab to Enable / Disable the sidebar.', 'mazo') ,
                        'desc' => esc_html__('Once you click on disable, This setting affects all the site pages.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
					
					array(
			            'id'       => 'rtl_on',
			            'type'     => 'switch',
			            'title'    => esc_html__('RTL', 'mazo'),
			            'subtitle' => esc_html__('Click on the tab to Enable / Disable right to left view.', 'mazo'),
			            'on'       => esc_html__('Enabled', 'mazo'),
			            'off'       => esc_html__('Disabled', 'mazo'),
			            'default'  => false,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
			        ),

                    array(
                        'id' => 'map_api_key',
                        'type' => 'text',
                        'title' => esc_html__('Map Api Key', 'mazo') ,
                        'desc' => esc_html__('Input an API key to enable map.', 'mazo') ,
                        'default' => '',
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                    array(
                        'id' => 'mailchimp',
                        'type' => 'switch',
                        'title' => esc_html__('Mailchimp', 'mazo') ,
                        'subtitle' => esc_html__('Click on the tab to Enable / Disable mailchimp subscription.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true,
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                    array(
                        'id' => 'mailchimp_api_key',
                        'type' => 'text',
                        'title' => esc_html__('MailChimp Api Key', 'mazo') ,
                        'desc' => esc_html__('Input an API key to enable MailChimp.', 'mazo') ,
                        'default' => '',
                        'required' => array(
                            array(
                                0 => 'mailchimp',
                                1 => 'equals',
                                2 => 1
                            ) ,
                        )
                    ) ,
                    array(
                        'id' => 'mailchimp_list_id',
                        'type' => 'text',
                        'title' => esc_html__('MailChimp List ID', 'mazo') ,
                        'desc' => esc_html__('Input an List ID to enable MailChimp.', 'mazo') ,
                        'default' => '',
                        'required' => array(
                            array(
                                0 => 'mailchimp',
                                1 => 'equals',
                                2 => 1
                            ) ,
                        )
                    ) ,
					array(
                        'id' => 'subscribe_popup_title',
                        'type' => 'text',
                        'title' => esc_html__('Subscribtion Popup Title', 'mazo') ,
                        'default' => esc_html__('SUBSCRIBE TO OUR NEWSLETTER', 'mazo') ,
						'hint' => array(
                            'title' => esc_html__('Subscribtion Pop Up', 'mazo') ,
                            'content' => esc_html__('Enable/Disable Setting Is Available On Coming Soon Page Setting.', 'mazo')
                        ),
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ),
                    array(
                        'id' => 'subscribe_popup_image',
                        'type' => 'media',
                        'title' => esc_html__('Subscribtion Popup Image', 'mazo') ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/img1.jpg'
                        ) ,
						'hint' => array(
                            'title' => esc_html__('Subscribtion Pop Up', 'mazo') ,
                            'content' => esc_html__('Enable/Disable Setting Is Available On Coming Soon Page Setting.', 'mazo')
                        ),
                        'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
					),
                    array(
                        'id' => 'site_phone_number',
                        'type' => 'text',
                        'title' => esc_html__('Phone Number', 'mazo') ,
                        'subtitle' => esc_html__('Show in header top ', 'mazo') ,
                        'default' => '+91-1234567890',
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                    array(
                        'id' => 'site_address',
                        'type' => 'textarea',
                        'title' => esc_html__('Address', 'mazo') ,
                        'subtitle' => esc_html__('Show in header top ', 'mazo') ,
                        'default' => esc_html__('6701 Democracy Blvd, Suite 300, USA', 'mazo'),
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ) ,
                   
                    array(
                        'id' => 'site_email',
                        'type' => 'text',
                        'title' => esc_html__('Email', 'mazo') ,
                        'subtitle' => esc_html__('Show in header top ', 'mazo') ,
                        'default' => 'info@example.com',
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
                    ),
					
					array(
						'id' => 'booking_page_url',
						'type' => 'text',
						'url' => true,
						'title' => esc_html__('Booking Page Url', 'mazo') ,
						'desc' => esc_html__('Enter Booking Page Url', 'mazo') ,
						'default' => '',
						'required' => array( 0 => 'website_status', 1 => 'equals', 2 => 'live_mode' ) ,
					) ,
					
                )
            );

            /*--------------------------------------------------------------
            # 2. Logo Settings
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('Logo Settings', 'mazo') ,
                'icon' => 'el el-cog-alt',
                'fields' => array(
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Favicon', 'mazo') ,
                        'subtitle' => esc_html__('Select favicon image.', 'mazo') ,
                        'desc' => esc_html__('Upload favicon image.', 'mazo') ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/favicon.png'
                        ) ,
                        'hint' => array(
                            'title' => esc_html__('Favicon', 'mazo') ,
                            'content' => esc_html__('From here you can upload an image. This setting affects all the site pages.', 'mazo')
                        )
                    ) ,
                    array(
                        'id' => 'logo_text',
                        'type' => 'text',
                        'title' => esc_html__('Logo Text', 'mazo') ,
                        'subtitle' => esc_html__('Name your text logo.', 'mazo') ,
                        'default' => get_bloginfo('name') ,
                    ) ,
                    array(
                        'id' => 'tag_line',
                        'type' => 'text',
                        'title' => esc_html__('Tag Line', 'mazo') ,
                        'subtitle' => esc_html__('Name a tagline for the text logo.', 'mazo') ,
                        'default' => get_bloginfo('description') ,
                    ) ,
                    array(
                        'id' => 'logo_title',
                        'type' => 'text',
                        'title' => esc_html__('Logo Title', 'mazo') ,
                        'subtitle' => esc_html__('Title attribute for the logo. This attribute specifies extra information about the logo. Most browsers will show a tooltip with this text on logo hover.', 'mazo') ,
                        'default' => get_bloginfo('name') ,

                    ) ,
                    array(
                        'id' => 'logo_alt',
                        'type' => 'text',
                        'title' => esc_html__('Logo Alt', 'mazo') ,
                        'subtitle' => esc_html__('Alt attribute for the logo. This is the alternative text if the logo cannot be displayed. It`s useful for SEO and generally is the name of the site.', 'mazo') ,
                        'default' => get_bloginfo('name') ,
                    ) ,
                    array(
                        'id' => 'logo-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Site Logo Setting', 'mazo') ,
                        'indent' => true
                    ) ,
					array(
                        'id' => 'site_logo_icon',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Logo Icon', 'mazo') ,
                        'subtitle' => esc_html__('Upload your logo Icon(272 x 90px) .png or .jpg', 'mazo') ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/logo-icon.png'
                        )
                    ) ,
                    array(
                        'id' => 'site_logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Logo', 'mazo') ,
                        'subtitle' => esc_html__('Upload your logo (272 x 90px) .png or .jpg', 'mazo') ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/logo.png'
                        )
                    ) ,
                    array(
                        'id' => 'site_other_logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Other Logo', 'mazo') ,
                        'subtitle' => esc_html__('Upload your logo (272 x 90px) .png or .jpg', 'mazo') ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/logo-white.png'
                        )
                    ),
                    array(
                        'id' => 'logo-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                )
            );

            /*--------------------------------------------------------------
            # 3. Header Settings
            --------------------------------------------------------------*/
            $header_social_links = $header_social_defaults = array();

            foreach ($this->social_link_options as $social_link)
            {

                $link_value = mazo_get_opt('social_' . $social_link['id'] . '_url');

                if (!empty($link_value))
                {
                    $header_social_links[$social_link['id']] = $social_link['title'];
                    $header_social_defaults[$social_link['id']] = false;
                }
            }

            $header_style_options = mazo_header_style_options();
            $header_aditional_array = array();
            $mobile_header_aditional_array = array();
            foreach ($header_style_options as $header)
            {
                $header_id = $header['id'];

                $header_social_defaults_1 = $header_social_defaults;

                $header_search_on = mazo_set($header['param'], 'search', false);
                $social_link = mazo_set($header['param'], 'social_link', false);
                $header_top_bar = mazo_set($header['param'], 'top_bar', false);
                $header_location_on = mazo_set($header['param'], 'location', false);
				
                $call_to_action_button = mazo_set($header['param'], 'call_to_action_button', 0);

                $total_links = mazo_set($header['param'], 'social_links', 0);
                if ($total_links > 0)
                {
                    $i = 1;
                    foreach ($header_social_links as $key => $value)
                    {
                        if ($i <= $total_links)
                        {
                            $header_social_defaults_1[$key] = 1;
                        }
                        else
                        {
                            $header_social_defaults_1[$key] = 0;
                        }
                        $i++;
                    }
                }

               
				
				$header_aditional_array[] = array(
					'id'    => $header_id . '_information',
					'type'  => 'info',
					'style' => 'success',
					'title' => esc_html__('Header Information!', 'mazo'),
					'icon'  => 'el-icon-info-sign',
					'desc'  => $header_id.' '.esc_html__( 'header settings display here.', 'mazo'),
					'required' => array(
                        0 => 'header_style',
                        1 => 'equals',
                        2 => $header_id
                    )
				);

					
					
				$header_aditional_array[] = array(
                    'id' => $header_id . '_top_bar_on',
                    'type' => 'switch',
                    'title' => esc_html__('Top Bar', 'mazo') ,
                    'subtitle' => esc_html__('Show or hide the top bar.', 'mazo') ,
                    'on' => esc_html__('Enabled', 'mazo') ,
                    'off' => esc_html__('Disabled', 'mazo') ,
                    'default' => $header_top_bar,
                    'required' => array(
                        0 => 'header_style',
                        1 => 'equals',
                        2 => $header_id
                    )
                );
				
				
				 if ($social_link > 0)
                {
					 $header_aditional_array[] = array(
						'id' => $header_id . '_social_link_on',
						'type' => 'switch',
						'title' => esc_html__('Social Link', 'mazo') ,
						'subtitle' => esc_html__('Show or hide the hader social link option.', 'mazo') ,
						'on' => esc_html__('Enabled', 'mazo') ,
						'off' => esc_html__('Disabled', 'mazo') ,
						'default' => $social_link,
						'required' => array(
							array(
								0 => 'header_style',
								1 => 'equals',
								2 => $header_id
							) ,
						)
					);	
				}
				
               
				
				if(!empty($header_social_links)) {
                $header_aditional_array[] = array(
                    'id' => $header_id . '_social_links',
                    'type' => 'checkbox',
                    'title' => esc_html__('Choose for this Header', 'mazo') ,
                    'subtitle' => esc_html__('No validation can be done on this field type', 'mazo') ,
                    'desc' => esc_html__('This is the description field, again good for additional info.', 'mazo') ,
                    //Must provide key => value pairs for multi checkbox options
                    'options' => $header_social_links,
                    //See how std has changed? you also don't need to specify opts that are 0.
                    'default' => $header_social_defaults_1,
                    'required' => array(
                        array(
                            0 => 'header_style',
                            1 => 'equals',
                            2 => $header_id
                        ) ,
                        array(
                            0 => $header_id . '_social_link_on',
                            1 => 'equals',
                            2 => 1
                        )
                    )
                );
				}
				
                if ($call_to_action_button > 0)
                {
                    for ($i = 1;$i <= $call_to_action_button;$i++)
                    {
                        $header_aditional_array[] = array(
                            'id' => $header_id . '_button_' . $i . '_text',
                            'type' => 'text',
                            'title' => esc_html__('Button ', 'mazo') . $i . esc_html__(' Text', 'mazo') ,
                            'default' => '',
                            'required' => array(
                                0 => 'header_style',
                                1 => 'equals',
                                2 => $header_id
                            )
                        );
                        $header_aditional_array[] = array(
                            'id' => $header_id . '_button_' . $i . '_url',
                            'type' => 'text',
                            'title' => esc_html__('Button ', 'mazo') . $i . esc_html__(' URL', 'mazo') ,
                            'default' => '',
                            'required' => array(
                                0 => 'header_style',
                                1 => 'equals',
                                2 => $header_id
                            )

                        );
                        $header_aditional_array[] = array(
                            'id' => $header_id . '_button_' . $i . '_target',
                            'type' => 'select',
                            'title' => esc_html__('Choose Button ', 'mazo') . $i . esc_html__(' Target', 'mazo') ,
                            'options' => $this->link_target_options,
                            'default' => '_self',
                            'required' => array(
                                0 => 'header_style',
                                1 => 'equals',
                                2 => $header_id
                            )
                        );
                    }
                }
				
				if($social_link > 0){
                $mobile_header_aditional_array[] = array(
                    'id' => $header_id . '_mobile_social_link_on',
                    'type' => 'switch',
                    'title' => esc_html__('Header Social Link', 'mazo') ,
                    'subtitle' => esc_html__('Show or hide the hader social link option.', 'mazo') ,
                    'on' => esc_html__('Enabled', 'mazo') ,
                    'off' => esc_html__('Disabled', 'mazo') ,
                    'default' => $social_link,
                    'required' => array(
                        0 => 'header_style',
                        1 => 'equals',
                        2 => $header_id
                    )
                );
				}

                /******Header Related Fields *****/
            }

            $headerDefaultOption = array(
                'title' => esc_html__('Header Settings', 'mazo') ,
                'desc' => esc_html__('Describe header settings here.....................', 'mazo') ,
                'icon' => 'fa fa-header',
                'fields' => array(
                    array(
                        'id' => 'header_style',
                        'type' => 'image_select',
                        'title' => esc_html__('Header Style', 'mazo') ,
                        'subtitle' => esc_html__('Choose header style. White header is set as default header for all theme.', 'mazo') ,
                        'options' => $this->header_style_options,
                        'default' => 'header_1',
                        'hint' => array(
                            array(
                                'title' => 'Hint Title',
                                'content' => esc_html__('This is the content of the tool-tip', 'mazo')
                            )
                        )
                    ) ,
				
					
                    array(
                        'id' => 'header_login_on',
                        'type' => 'switch',
                        'title' => esc_html__('Login', 'mazo') ,
                        'subtitle' => esc_html__('Show or hide the header login option.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'header_register_on',
                        'type' => 'switch',
                        'title' => esc_html__('Register', 'mazo') ,
                        'subtitle' => esc_html__('Show or hide the header register option.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false,
                    ) ,
                    array(
                        'id' => 'header_sticky_on',
                        'type' => 'switch',
                        'title' => esc_html__('Sticky Header', 'mazo') ,
                        'subtitle' => esc_html__('Header will be sticked when applicable.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'mobile_section_start',
                        'type' => 'section',
                        'title' => esc_html__('Mobile Device Options', 'mazo') ,
                        'indent' => false
                    ) ,
                    array(
                        'id' => 'mobile_header_login_on',
                        'type' => 'switch',
                        'title' => esc_html__('Login', 'mazo') ,
                        'subtitle' => esc_html__('Show or hide the header login option.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'mobile_header_register_on',
                        'type' => 'switch',
                        'title' => esc_html__('Register', 'mazo') ,
                        'subtitle' => esc_html__('Show or hide the header register option.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                )
            );

            array_splice($headerDefaultOption['fields'], 1, 0, $header_aditional_array);
            $mobileFieldPosition = count($headerDefaultOption['fields']);
            array_splice($headerDefaultOption['fields'], $mobileFieldPosition, 0, $mobile_header_aditional_array);

            $this->sections[] = $headerDefaultOption;
			
			
			/*--------------------------------------------------------------
            # 4. Footer
            --------------------------------------------------------------*/
            $all_widgets = $this->mazo_get_wp_widgets();

            $footer_setting_fields[] = array(
                'id' => 'footer_on',
                'type' => 'switch',
                'title' => esc_html__('Footer', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => true
            );
			
			

            $footer_setting_fields[] = array(
                'id' => 'footer_style',
                'type' => 'image_select',
                'title' => esc_html__('Footer Template', 'mazo') ,
                'subtitle' => esc_html__('Choose a template for footer.', 'mazo') ,
                'options' => $this->footer_style_options,
                'default' => 'footer_template_1',
                'required' => array(
                    0 => 'footer_on',
                    1 => 'equals',
                    2 => '1'
                )
            );
			
			 $footer_setting_fields[] = array(
                'id' => 'footer_top_on',
                'type' => 'switch',
                'title' => esc_html__('Footer Top On', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => false,
                
            );
            $footer_setting_fields[] = array(
                'id' => 'footer_bottom_on',
                'type' => 'switch',
                'title' => esc_html__('Footer Bottom On', 'mazo') ,
                'on' => esc_html__('Enabled', 'mazo') ,
                'off' => esc_html__('Disabled', 'mazo') ,
                'default' => false,
                
            );
			
            $footer_style_options = mazo_footer_style_options();
            $total_footer = count($this->footer_style_options);

            $footer_block = array();
            $footer_block['All Widgets'] = $all_widgets;

            
            foreach ($footer_style_options as $key => $footer)
            {
                $footer_id = $footer['id'];
                $informative_fields = mazo_set($footer['param'], 'informative_field', 0);
				$call_to_action_button = mazo_set($footer['param'], 'call_to_action_button', 0);
                $bg_image = mazo_set($footer['param'], 'bg_image', 0);

                if ($footer['param']['copyright'] == 1)
                {

                }

                if ($footer['param']['powered_by'] == 1)
                {

                }

                if ($bg_image > 0)
                {
                    $footer_setting_fields[] = array(
                        'id' => $footer_id . '_bg_image',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Footer Image', 'mazo') ,
                        'subtitle' => esc_html__('Show or hide the image.', 'mazo') ,
						'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/background/map-bg.png'
                        ) ,
                        'required' => array(
                            array(
                                0 => 'footer_style',
                                1 => 'equals',
                                2 => $footer_id
                            ) ,
                        )
                    );
                }
				
				if ($call_to_action_button > 0)
                {
                    for ($i = 1;$i <= $call_to_action_button;$i++)
                    {

                        $footer_setting_fields[] = array(
                            'id' => $footer_id . '_button_' . $i . '_text',
                            'type' => 'text',
                            'title' => esc_html__('Button ', 'mazo') . $i . esc_html__(' Text', 'mazo') ,
                            'default' => '',
                            'required' => array(
                                0 => 'footer_style',
                                1 => 'equals',
                                2 => $footer_id
                            )
                        );
                        $footer_setting_fields[] = array(
                            'id' => $footer_id . '_button_' . $i . '_url',
                            'type' => 'text',
                            'title' => esc_html__('Button ', 'mazo') . $i . esc_html__(' URL', 'mazo') ,
                            'default' => '',
                            'required' => array(
                                0 => 'footer_style',
                                1 => 'equals',
                                2 => $footer_id
                            )

                        );
                        $footer_setting_fields[] = array(
                            'id' => $footer_id . '_button_' . $i . '_target',
                            'type' => 'select',
                            'title' => esc_html__('Choose Button ', 'mazo') . $i . esc_html__(' Target', 'mazo') ,
                            'options' => $this->link_target_options,
                            'default' => '_self',
                            'required' => array(
                                0 => 'footer_style',
                                1 => 'equals',
                                2 => $footer_id
                            )
                        );
                    }
                }

                if ($informative_fields > 0)
                {
                    for ($i = 1;$i <= $informative_fields;$i++)
                    {
						
                       $footer_setting_fields[] = array(
                            'id' => $footer_id . '_info_field_' . $i . '_text',
                            'type' => 'text',
                            'title' => esc_html__('Field ', 'mazo') . $i . esc_html__(' Title', 'mazo') ,
                            'default' => '',
                            'required' => array(
                                0 => 'footer_style',
                                1 => 'equals',
                                2 => $footer_id
                            )
                        );
                        $footer_setting_fields[] = array(
                            'id' => $footer_id . '_info_field_' . $i . '_content',
                            'type' => 'textarea',
                            'title' => esc_html__('Field ', 'mazo') . $i . esc_html__(' Content', 'mazo') ,
                            'default' => '',
                            'required' => array(
                                0 => 'footer_style',
                                1 => 'equals',
                                2 => $footer_id
                            )

                        );
                    }
                }

            }

            $footer_setting_fields[] = array(
                'id' => 'footer_copyright_text',
                'type' => 'textarea',
                'title' => esc_html__('Copyright Text', 'mazo') ,
                'subtitle' => esc_html__('Write footer copyright text here.', 'mazo') ,
                'default' => esc_html__('Copyright © 2021', 'mazo'). ' <a href="https://dexignzone.com/" class="text-primary" target="_blank">'.esc_html__('DexignZone', 'mazo').'</a> '. esc_html__('All rights reserved.', 'mazo'),
                'required' => array(
                    0 => 'footer_on',
                    1 => 'equals',
                    2 => '1'
                )
            );

            $this->sections[] = array(
                'title' => esc_html__('Footer Settings', 'mazo') ,
                'desc' => esc_html__('The footer uses widgets to show information. Here you can customize the number of layouts. In order to add widgets to the footer go to footer widgets section and drag widget to the footer block (s).', 'mazo') . '<br><br>' . esc_html__('Footer blocks are change according to footer templates.', 'mazo') ,
                'icon' => 'fa fa-home',
                'fields' => $footer_setting_fields
            );
			
			
			 /*--------------------------------------------------------------
            # 5. Menu Settings
            --------------------------------------------------------------*/
			$this->sections[] = array(
                'title' => esc_html__('Menu Settings', 'mazo') ,
                'icon' => 'el el-cog',
                'fields' => array(
                    array(
                        'id' => 'scroll_menu_pages',
                        'type' => 'select',
                        'data' => 'pages',
						'multi'=>true,
                        'title' => esc_html__('Choose Scroll Menu Pages', 'mazo') ,
                        'subtitle' => esc_html__('Select Page For One Page Menus', 'mazo') ,
                   
                    ) ,
                )
            );

            /*--------------------------------------------------------------
            # 5. Post Setting
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('Post Settings', 'mazo') ,
                'icon' => 'fa fa-newspaper-o'
            );

            $this->sections[] = array(
                'title' => esc_html__('General Settings', 'mazo') ,
                'desc' => esc_html__('This option will work on all new post and edit post sections. On new post page we will display only Post Layout Selection , all other settings will be applicable from here.', 'mazo') ,
                'subsection' => true,
                'icon' => 'fa fa-gear',
                'fields' => array(
                    array(
                        'id' => 'post_general_layout',
                        'type' => 'image_select',
                        'height' => '100',
                        'title' => esc_html__('Single Post Layout', 'mazo') ,
                        'subtitle' => esc_html__('Select a layout for post page.', 'mazo') ,
                        'desc' => esc_html__('Click on the template icon to select.', 'mazo') ,
                        'options' => $this->post_layouts_options,
                        'default' => 'standard',
                        'hint' => array(
                            'title' => esc_html__('How it Works?', 'mazo') ,
                            'content' => esc_html__('Once you select the template from here the template will apply for default post page.', 'mazo')
                        )
                    ) ,
                    
                    array(
                        'id' => 'date_on',
                        'type' => 'switch',
                        'title' => esc_html__('Date', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    array(
                        'id' => 'comment_count_on',
                        'type' => 'switch',
                        'title' => esc_html__('Comment Count', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    array(
                        'id' => 'comment_view_on',
                        'type' => 'switch',
                        'title' => esc_html__('Comment View', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
					
					array(
			            'id'       => 'post_view_on',
			            'type'     => 'switch',
			            'title'    => esc_html__('Post View', 'mazo'),
			            'on'       => esc_html__('Enabled', 'mazo'),
			            'off'       => esc_html__('Disabled', 'mazo'),
			            'default'  => false
			        ), 
                    array(
                        'id' => 'post_start_view',
                        'type' => 'text',
                        'title' => esc_html__('Post Start View', 'mazo') ,
                        'default' => '',
                        'desc' => esc_html__('Enter only number.', 'mazo') ,
                        'hint' => array(
                            'title' => esc_html__('Post Views', 'mazo') ,
                            'content' => esc_html__('We will display view count by adding this number in original post views. It will help to build post reputation on blog.', 'mazo')
                        )
                    ) ,
                    array(
                        'id' => 'author_box_on',
                        'type' => 'switch',
                        'title' => esc_html__('Author Box', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'category_on',
                        'type' => 'switch',
                        'title' => esc_html__('Category', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,

                    array(
                        'id' => 'pre_next_post_on',
                        'type' => 'switch',
                        'title' => esc_html__('Previous & Next Post', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    array(
                        'id' => 'featured_img_on',
                        'type' => 'switch',
                        'title' => esc_html__('Featured Image', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    
                    array(
                        'id' => 'related_post_on',
                        'type' => 'switch',
                        'title' => esc_html__('Related Post', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
					
					array(
                        'id' => 'related_post_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Related Post Layout', 'mazo') ,
                        'height' => '100',
                        'options' => $this->post_related_layout_options,
                        'default' => 'post_related_1',
                        'required' => array(
                            0 => 'related_post_on',
                            1 => 'equals',
                            2 => 1
                        )
                    ) ,
					
                    array(
                        'id' => 'show_image_on_post_list',
                        'type' => 'switch',
                        'title' => esc_html__('Show Image On Post List', 'mazo') ,
                        'subtitle' => esc_html__('Show feature image on post listing in admin panel.', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'post_general_banner_on',
                        'type' => 'switch',
                        'title' => esc_html__('Post Banner', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
					
					array(
                        'id' => 'post_general_banner_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Post Banner Type', 'mazo') ,
                        'options' => $this->banner_type,
                        'default' => 'image',
                        'required' => array(
                            0 => 'post_general_banner_on',
                            1 => 'equals',
                            2 => '1'
                        )
                    ),
					
                    array(
                        'id' => 'post-general-img-banner-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Banner Setting', 'mazo') ,
                        'indent' => true,
						'required' => array(
                            0 => 'post_general_banner_on',
                            1 => 'equals',
                            2 => 1
                        )

                    ) ,
                    array(
                        'id' => 'post_general_banner_height',
                        'type' => 'image_select',
                        'title' => esc_html__('Post Banner Height', 'mazo') ,
                        'subtitle' => esc_html__('Choose the height for all tag page banner. Default : Small Banner', 'mazo') ,
                        'height' => '40',
                        'options' => $this->page_banner_options,
                        'default' => 'page_banner_small',
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
                        'options' => $this->page_banner_layout_options,
                        'default' => 'banner_layout_2',
                        'required' => array(
                            0 => 'post_general_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
					
                    array(
                        'id' => 'post_general_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Post Banner Image', 'mazo') ,
                        'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for all pages', 'mazo') ,
                        'desc' => esc_html__('Upload banner image.', 'mazo') ,
                        'default' => '',
                    ) ,
                    array(
                        'id' => 'post-general-img-banner-section-end',
                        'type' => 'section',
                        'indent' => false,
						'required' => array(
                            0 => 'post_general_banner_on',
                            1 => 'equals',
                            2 => 1
                        )
                    ),
					
                    array(
                        'id' => 'post_bg_image_custom',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Custom Post Background Image', 'mazo') ,
                        'subtitle' => esc_html__('Choose custom background image for post single page.', 'mazo') ,
                        'desc' => esc_html__('Upload background image.', 'mazo') ,
                        'default' => array(
                            'url' => ''
                        ) ,
                        'required' => array(
                            0 => 'post_background_type',
                            1 => 'equals',
                            2 => 'custom'
                        )
                    ) ,
                )
            );

            /*--------------------------------------------------------------
            # 6. Page Setting
            --------------------------------------------------------------*/

            $this->sections[] = array(
                'title' => esc_html__('Page Settings', 'mazo') ,
                'icon' => 'fa fa-file'
            );

            $this->sections[] = array(
                'title' => esc_html__('General Settings', 'mazo') ,
                'icon' => 'fa fa-gear',
                'desc' => '',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id' => 'page_general_banner_on',
                        'type' => 'switch',
                        'title' => esc_html__('Page Banner', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    array(
                        'id' => 'page_general_banner_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Page Banner Type', 'mazo') ,
                        'options' => $this->banner_type,
                        'default' => 'image',
                        'required' => array(
                            0 => 'page_general_banner_on',
                            1 => 'equals',
                            2 => '1'
                        )
                    ),
                    array(
                        'id' => 'general-img-banner-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Image Banner Setting', 'mazo') ,
                        'indent' => true,
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
                    array(
                        'id' => 'page_general_banner_height',
                        'type' => 'image_select',
                        'title' => esc_html__('Page Banner Height', 'mazo') ,
                        'subtitle' => esc_html__('Choose the height for all tag page banner. Default : Medium Banner', 'mazo') ,
                        'height' => '40',
                        'options' => $this->page_banner_options,
                        'default' => 'page_banner_medium',
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
					
					array(
						'id' => 'page_general_banner_custom_height',
						'type' => 'slider',
						'title' => esc_html__('Page Banner Custom Height', 'mazo') ,
						'desc' => esc_html__('Height description. Min: 100, max: 800', 'mazo') ,
						"default" => mazo_get_opt('page_general_banner_height') ,
						"min" => 100,
						"max" => 800,
						'display_value' => 'text',
						'required' => array(
							0 => 'page_general_banner_height',
							1 => 'equals',
							2 => 'page_banner_custom'
						)
					) ,
                    
					array(
                        'id' => 'page_general_banner_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Page Banner Layout', 'mazo') ,
                        'subtitle' => esc_html__('Choose the layout for all page banner. Default : Banner Layout 1', 'mazo') ,
                        'height' => '40',
                        'options' => $this->page_banner_layout_options,
                        'default' => 'banner_layout_2',
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
					
                    array(
                        'id' => 'page_general_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Page Banner Image', 'mazo') ,
                        'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for all pages', 'mazo') ,
                        'desc' => esc_html__('Upload banner image.', 'mazo') ,
						'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/bnr8.jpg'
                        ) ,
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
                    array(
                        'id' => 'general-img-banner-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                    array(
                        'id' => 'general-post-banner-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Post Banner Setting', 'mazo') ,
                        'indent' => true,
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => 'page_general_no_of_post',
                        'type' => 'text',
                        'title' => esc_html__('Number of Posts', 'mazo') ,
                        'subtitle' => esc_html__('Enter number of post. Default : 3', 'mazo') ,
                        'default' => '3',
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => 'general_post_banner_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Post Banner Layout', 'mazo') ,
                        'subtitle' => esc_html__('Select banner layout. Default : Full Banner', 'mazo') ,
                        'options' => $this->post_banner_options,
                        'default' => 'post_banner_v1',
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => 'page_general_banner_cat',
                        'type' => 'select',
                        'multi' => true,
                        'data' => 'terms',
                        'args' => array(
                            'taxonomies' => 'category'
                        ) ,
                        'title' => esc_html__('Post Category', 'mazo') ,
                        'subtitle' => esc_html__('Select post category. It will work as default banner for all pages', 'mazo') ,
                        'desc' => esc_html__('Allow you to select multiple categories.', 'mazo') ,
                        'default' => '',
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => 'page_general_post_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Post Type', 'mazo') ,
                        'options' => array(
                            'all' => esc_html__('All', 'mazo') ,
                            'featured' => esc_html__('Featured', 'mazo')
                        ) ,
                        'default' => 'all',
                        'force_output' => true,
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => 'page_general_items_with',
                        'type' => 'button_set',
                        'title' => esc_html__('Items With', 'mazo') ,
                        'options' => array(
                            'with_any_type' => esc_html__('Any Type', 'mazo') ,
                            'with_featured_image' => esc_html__('With Featured Image', 'mazo') ,
                            'without_featured_image' => esc_html__('Without Featured Iimage', 'mazo')
                        ) ,
                        'default' => 'with_any_type',
                        'required' => array(
                            0 => 'page_general_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => 'general-post-banner-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                    array(
                        'id' => 'general-sidebar-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Sidebar Setting', 'mazo') ,
                        'indent' => true
                    ) ,
                    array(
                        'id' => 'page_general_show_sidebar',
                        'type' => 'switch',
                        'title' => esc_html__('Sidebar', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    array(
                        'id' => 'page_general_sidebar_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Sidebar Layout', 'mazo') ,
                        'subtitle' => esc_html__('Choose the layout for page. (Default : Right Side).', 'mazo') ,
                        'options' => $this->sidebar_layout_options,
                        'default' => 'right',
                        'required' => array(
                            0 => 'page_general_show_sidebar',
                            1 => 'equals',
                            2 => '1'
                        )
                    ) ,
                    array(
                        'id' => 'page_general_sidebar',
                        'type' => 'select',
                        'data' => 'sidebars',
                        'title' => esc_html__('Sidebar', 'mazo') ,
                        'subtitle' => esc_html__('Select sidebar for all pages', 'mazo') ,
                        'default' => 'dz_blog_sidebar',
                        'required' => array(
                            0 => 'page_general_sidebar_layout',
                            1 => 'equals',
                            2 => array(
                                'right',
                                'left'
                            )
                        )
                    ) ,
                    array(
                        'id' => 'general-sidebar-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                    array(
                        'id' => 'page_general_paging',
                        'type' => 'button_set',
                        'title' => esc_html__('Pagination', 'mazo') ,
                        'options' => array(
                            'default' => esc_html__('Default', 'mazo') ,
                            'load_more' => esc_html__('Load More', 'mazo') ,
                            
                        ) ,
                        'default' => 'default',
                        'force_output' => true
                    ) ,
                )
            );

            $default_pages_data = array(
                'page_author' => array(
                    'top_desc' => esc_html__('The author template is shown when a user clicks on the author in the front end of the site.', 'mazo'),
                    'id' => 'author',
                    'title' => 'Author',
                    'icon' => 'fa fa-user'
                ) ,
                'page_category' => array(
                    'top_desc' => esc_html__('The category template is shown when a user clicks on the category in the front end of the site.', 'mazo'),
                    'id' => 'category',
                    'title' => 'Category',
                    'icon' => 'fa fa-list-alt'
                ) ,
                'page_search' => array(
                    'top_desc' => esc_html__('Set the default layout for all the search page.', 'mazo'),
                    'id' => 'search',
                    'title' => 'Search',
                    'icon' => 'fa fa-search'
                ) ,
                'page_archive' => array(
                'top_desc' => esc_html__('This template is used by WordPress to generate the archives. By default WordPress generates daily, monthly and yearly archives.', 'mazo'),
                    'id' => 'archive',
                    'title' => 'Archive',
                    'icon' => 'fa fa-archive'
                ) ,
                'page_tag' => array(
                    'top_desc' => esc_html__('Set the default layout for all the tag page.', 'mazo'),
                    'id' => 'tag',
                    'title' => 'Tag',
                    'icon' => 'fa fa-tags'
                ) ,

            );
			
			if(mazo_is_woocommerce_active())
			{
				$default_pages_data['page_woocommerce'] = array(
												'top_desc' => esc_html__('Set the default layout for all the woo-commerce pages.', 'mazo'),
												'id' => 'woocommerce',
												'title' => esc_html__('WooCommerce', 'mazo'),
												'icon' => 'fa fa-shopping-cart',
												'sidebar'=>'dz_shop_sidebar'
											);
			}
			
            foreach ($default_pages_data as $key => $page_data)
            {

                $pg_desc = $page_data['top_desc'];
                $pg_id = $page_data['id'];
                $pg_name = $page_data['title'];
                $pg_icon = $page_data['icon'];
                $pg_sidebar = !empty($page_data['sidebar']) ? $page_data['sidebar'] : 'dz_blog_sidebar';

                if ($key == 'page_cmsoon')
                {
                    $page_templates = $this->coming_template_options;
                }
                elseif ($key == 'page_maintenance')
                {
                    $page_templates = $this->maintenance_template_options;
                }
                else
                {
                    $page_templates = $this->page_template_options;
                }

                $page_default_settings = $page_sorting = $page_pagination = array();

                $page_default_settings = array(
                    array(
                        'id' => $pg_id . '_page_title',
                        'type' => 'text',
                        'title' => esc_html__('Page Title', 'mazo') ,
                        'default' => $pg_name . esc_html__(' : ', 'mazo') ,
                        'force_output' => true
                    ) ,
                    array(
                        'id' => $pg_id . '_page_banner_on',
                        'type' => 'switch',
                        'title' => esc_html__('Page Banner', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,

                    array(
                        'id' => $pg_id . '_page_banner_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Page Banner Type', 'mazo') ,
                        'options' => $this->banner_type,
                        'default' => 'image',
                        'required' => array(
                            0 => $pg_id . '_page_banner_on',
                            1 => 'equals',
                            2 => '1'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '-img-banner-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Image Banner Setting', 'mazo') ,
                        'indent' => true,
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_banner_height',
                        'type' => 'image_select',
                        'title' => esc_html__('Page Banner Height', 'mazo') ,
                        'subtitle' => esc_html__('Choose the height for page banner. Default : Medium Banner', 'mazo') ,
                        'height' => '40',
                        'options' => $this->page_banner_options,
                        'default' => 'page_banner_medium',
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
					array(
                        'id' => $pg_id . '_page_banner_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Page Banner Layout', 'mazo') ,
                        'subtitle' => esc_html__('Choose the layout for all page banner. Default : Banner Layout 1', 'mazo') ,
                        'height' => '40',
                        'options' => $this->page_banner_layout_options,
                        'default' => 'banner_layout_2',
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_banner_custom_height',
                        'type' => 'slider',
                        'title' => esc_html__('Page Banner Custom Height', 'mazo') ,
                        'desc' => esc_html__('Hight description. Min: 100, max: 800', 'mazo') ,
                        'default' => '',
                        'min' => 100,
                        'max' => 800,
                        'display_value' => 'text',
                        'required' => array(
                            0 => $pg_id . '_page_banner_height',
                            1 => 'equals',
                            2 => 'page_banner_custom'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Page Banner Image', 'mazo') ,
                        'subtitle' => esc_html__('Enter page banner image. It will work as default banner image for the page.', 'mazo') ,
                        'desc' => esc_html__('Upload banner image.', 'mazo') ,
                        'default' => array(
                            'url' => get_template_directory_uri() . '/assets/images/bnr8.jpg'
                        ) ,
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_banner_hide',
                        'type' => 'checkbox',
                        'title' => esc_html__('Don`t use banner image for this page', 'mazo') ,
                        'default' => '0',
                        'desc' => esc_html__('Check if you don`t want to use banner image', 'mazo') ,
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'image'
                        ) ,
                        'hint' => array(
                            'content' => esc_html__('If we don`t have suitable image then we can hide current or default banner images and show only banner container with theme default color.', 'mazo')
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '-img-banner-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                    array(
                        'id' => $pg_id . '-post-banner-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Post Banner Setting', 'mazo') ,
                        'indent' => true,
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_no_of_post',
                        'type' => 'text',
                        'title' => esc_html__('Number of Posts', 'mazo') ,
                        'subtitle' => esc_html__('Enter number of post. Default : 3', 'mazo') ,
                        'default' => '3',
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_post_banner_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Post Banner Layout', 'mazo') ,
                        'subtitle' => esc_html__('Select banner layout. Default : Full Banner', 'mazo') ,
                        'options' => $this->post_banner_options,
                        'default' => 'post_banner_v1',
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_banner_cat',
                        'type' => 'select',
                        'multi' => true,
                        'data' => 'terms',
                        'args' => array(
                            'taxonomies' => 'category'
                        ) ,
                        'title' => esc_html__('Post Category', 'mazo') ,
                        'subtitle' => esc_html__('Select post category. It will work as default banner for the page.', 'mazo') ,
                        'desc' => esc_html__('Allow you to select multiple categories.', 'mazo') ,
                        'default' => '',
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_post_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Post Type', 'mazo') ,
                        'options' => array(
                            'all' => esc_html__('All', 'mazo') ,
                            'featured' => esc_html__('Featured', 'mazo')
                        ) ,
                        'default' => 'all',
                        'force_output' => true,
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_items_with',
                        'type' => 'button_set',
                        'title' => esc_html__('Items With', 'mazo') ,
                        'options' => array(
                            'with_any_type' => esc_html__('Any Type', 'mazo') ,
                            'with_featured_image' => esc_html__('With Featured Image', 'mazo') ,
                            'without_featured_image' => esc_html__('Without Featured Iimage', 'mazo')
                        ) ,
                        'default' => 'with_any_type',
                        'required' => array(
                            0 => $pg_id . '_page_banner_type',
                            1 => 'equals',
                            2 => 'post'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '-post-banner-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                );

                $page_sorting = array(
                    array(
                        'id' => $pg_id . '-sidebar-section-start',
                        'type' => 'section',
                        'title' => esc_html__('Sidebar Setting', 'mazo') ,
                        'indent' => true
                    ) ,
                    array(
                        'id' => $pg_id . '_page_show_sidebar',
                        'type' => 'switch',
                        'title' => esc_html__('Sidebar', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => true
                    ) ,
                    array(
                        'id' => $pg_id . '_page_sidebar_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Sidebar Layout', 'mazo') ,
                        'subtitle' => esc_html__('Choose the layout for the page. (Default : Right Side).', 'mazo') ,
                        'options' => $this->sidebar_layout_options,
                        'default' => 'right',
                        'required' => array(
                            0 => $pg_id . '_page_show_sidebar',
                            1 => 'equals',
                            2 => '1'
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '_page_sidebar',
                        'type' => 'select',
                        'data' => 'sidebars',
                        'title' => esc_html__('Sidebar', 'mazo') ,
                        'subtitle' => esc_html__('Select sidebar for the page.', 'mazo') ,
                        'default' => $pg_sidebar,
                        'required' => array(
                            0 => $pg_id . '_page_sidebar_layout',
                            1 => 'equals',
                            2 => array(
                                'right',
                                'left'
                            )
                        )
                    ) ,
                    array(
                        'id' => $pg_id . '-sidebar-section-end',
                        'type' => 'section',
                        'indent' => false,
                    ) ,
                );

                if ($pg_id != 'woocommerce')
                {
                    $page_pagination = array(
                        array(
                            'id' => $pg_id . '_page_paging',
                            'type' => 'button_set',
                            'title' => esc_html__('Pagination', 'mazo') ,
                            'options' => array(
                                'default' => esc_html__('Default', 'mazo') ,
                                'load_more' => esc_html__('Load More', 'mazo') ,
                                
                            ) ,
                            'default' => 'default',
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $pg_id . '_page_sorting_on',
                            'type' => 'switch',
                            'title' => esc_html__('Sorting', 'mazo') ,
                            'on' => esc_html__('Enabled', 'mazo') ,
                            'off' => esc_html__('Disabled', 'mazo') ,
                            'default' => true
                        ) ,
                        array(
                            'id' => $pg_id . '_page_sorting',
                            'type' => 'select',
                            'title' => esc_html__('Select Sorting', 'mazo') ,
                            'subtitle' => esc_html__('Select Sorting', 'mazo') ,
                            'desc' => esc_html__('Select Sorting', 'mazo') ,
                            'options' => $this->sort_by_options,
                            'default' => 'date_asc',
                            'force_output' => true,
                            'required' => array(
                                0 => $pg_id . '_page_sorting_on',
                                1 => 'equals',
                                2 => '1'
                            )
                        ) ,
                    );
                }

                $final_page_options = array_merge($page_default_settings, $page_sorting, $page_pagination);

                $this->sections[] = array(
                    'title' => $pg_name . esc_html__(' Page', 'mazo') ,
                    'icon' => $pg_icon,
                    'desc' => '',
                    'subsection' => true,
                    'fields' => $final_page_options,
                );

            }

            $this->sections[] = array(
                'title' => esc_html__('404 Page', 'mazo') ,
                'icon' => 'fa fa-warning',
                'desc' => '',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id' => 'error_page_title',
                        'type' => 'text',
                        'title' => esc_html__('Page Title', 'mazo') ,
                        'default' => esc_html__('404', 'mazo') ,
                        'force_output' => true
                    ) ,

                    array(
                        'id' => 'error_page_template',
                        'type' => 'image_select',
                        'height' => '80',
                        'title' => esc_html__('404 Template', 'mazo') ,
                        'subtitle' => esc_html__('Select a template for the page.', 'mazo') ,
                        'options' => array(
                            'error_style_1' => get_template_directory_uri() . '/dz-inc/assets/images/page-template/error-404.png',

                        ) ,
                        'default' => 'error_style_1'
                    ) ,
                   
					
                    array(
                        'id' => 'error_page_text',
                        'type' => 'textarea',
                        'title' => esc_html__('404 Page Text', 'mazo') ,
                        'default' => esc_html__('We are sorry. But the page you are looking for cannot be found.', 'mazo')
                    ) ,
                  
                    array(
                        'id' => 'error_page_button_text',
                        'type' => 'text',
                        'title' => esc_html__('404 Page Button Text', 'mazo') ,
                        'default' => esc_html__('BACK TO HOME PAGE', 'mazo')
                    ) ,
                    

                )
            );

			/*--------------------------------------------------------------
			# 9. WooCommerce Setting
			--------------------------------------------------------------*/
			if(mazo_is_woocommerce_active())
			{
				$this->sections[] = array(
					'title'  => esc_html__('WooCommerce Settings', 'mazo'),
					'icon'   => 'el el-shopping-cart'
				);

				$this->sections[] = array(
					'title'  => esc_html__('WooCommerce', 'mazo'),
					'icon'   => 'fa fa-shopping-basket',
					'subsection' => true,
					'fields' => array(
						array(
							'id'       => 'cart_on',
							'type'     => 'switch',
							'title'    => esc_html__('Cart Enable', 'mazo'),
							'subtitle' => esc_html__('Click on the tab to show / hide cart from header.', 'mazo'),
							'on'       => esc_html__('Enabled', 'mazo'),
							'off'       => esc_html__('Disabled', 'mazo'),
							'default'  => true,
							'hint'     => array(
								'title'   => esc_html__('Cart Visible', 'mazo'),
								'content' => esc_html__('Cart will show in top bar.', 'mazo')
							)
						),
						array(
							'id'       => 'cart_on_mobile',
							'type'     => 'switch',
							'title'    => esc_html__('Cart On Mobile Enable', 'mazo'),
							'subtitle' => esc_html__('Click on the tab to show / hide cart in mobile view.', 'mazo'),
							'on'       => esc_html__('Enabled', 'mazo'),
							'off'       => esc_html__('Disabled', 'mazo'),
							'default'  => true
						),
						array(
							'id'       => 'no_of_product_per_page',
							'type'     => 'spinner',
							'title'    => esc_html__('Number of Product Display Per Page', 'mazo'),
							'subtitle' => esc_html__('Show number of product page', 'mazo'),
							'default'  => 10,
							'min'      => 1,
							'step'     => 1,
							'max'      => 100,
						),
						array(
							'id'       => 'no_of_product_column',
							'type'     => 'slider',
							'title'    => esc_html__('Product Columns', 'mazo'),
							'default'   => 3,
							'min'       => 1,
							'step'      => 1,
							'max'       => 4,
							'display_value' => 'label'
						),
						array(
							'id'       => 'show_related_product',
							'type'     => 'switch',
							'title'    => esc_html__('Show Related Product', 'mazo'),
							'subtitle' => esc_html__('Click on the tab to show / hide related products on single product page.', 'mazo'),
							'on'       => esc_html__('Enabled', 'mazo'),
							'off'       => esc_html__('Disabled', 'mazo'),
							'default'  => true
						),
						array(
							'id'       => 'no_of_related_product',
							'type'     => 'slider',
							'title'    => esc_html__('Related Product', 'mazo'),
							'default'   => 3,
							'min'       => 1,
							'step'      => 1,
							'max'       => 4,
							'display_value' => 'label'
						)
					)
				);
			}

            /*--------------------------------------------------------------
            # 10. Theme Setting
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('Theme Settings', 'mazo') ,
                'icon' => 'el el-cogs'
            );

            $this->sections[] = array(
                'title' => esc_html__('Color & Design', 'mazo') ,
                'icon' => 'fa fa-pencil',
                'subsection' => true,
                'fields' => array(
					array(
                        'id' => 'color_skin_setting',
                        'type' => 'button_set',
                        'title' => esc_html__('Theme Color Settings', 'mazo') ,
                        'desc' => esc_html__('Choose Color Setting', 'mazo') ,
                        'options' => array(
                            'predefined_color_skin' => esc_html__('Predefined Color', 'mazo') ,
                            'custom_color_skin' => esc_html__('Custom Color', 'mazo')
                        ) ,
                        'default' => 'predefined_color_skin',
						
                    ) ,
				
				
                    array(
                        'id' => 'predefined_color_skin',
                        'type' => 'image_select',
                        'title' => esc_html__('Theme Color', 'mazo') ,
                        'subtitle' => esc_html__('Only color validation can be done on this field type', 'mazo') ,
                        'options' => $this->theme_color_options,
                        'default' => 'red',
                        'height' => '50',
						'required' => array(
                            0 => 'color_skin_setting',
                            1 => 'equals',
                            2 => 'predefined_color_skin'
                        )
                    ) ,
					
					array(
						'id'          => 'primary_color',
						'type'        => 'color',
						'title'       => esc_html__('Primary Color', 'mazo'),
						'transparent' => false,
						'default'     => '#ff5ea5',
						'required' => array(
                            0 => 'color_skin_setting',
                            1 => 'equals',
                            2 => 'custom_color_skin'
                        )
					),
					array(
						'id'          => 'secondary_color',
						'type'        => 'color',
						'title'       => esc_html__('Secondary Color', 'mazo'),
						'transparent' => false,
						'default'     => '#00becf',
						'required' => array(
                            0 => 'color_skin_setting',
                            1 => 'equals',
                            2 => 'custom_color_skin'
                        )
					),
					array(
						'id'      => 'link_color',
						'type'    => 'link_color',
						'title'   => esc_html__('Link Colors', 'mazo'),
						'default' => array(
							'regular' => '#ff5ea5',
							'hover'   => '#e54d90',
							'active'  => '#e54d90'
						),
						'output'  => array('a'),
						'required' => array(
                            0 => 'color_skin_setting',
                            1 => 'equals',
                            2 => 'custom_color_skin'
                        )
					),
					
					array(
                        'id' => 'theme_corner',
                        'type' => 'button_set',
                        'title' => esc_html__('Theme Corner Settings', 'mazo') ,
                        'desc' => esc_html__('Choose Theme Corner Setting', 'mazo') ,
                        'options' => array(
                            'rounded' => esc_html__('Rounded', 'mazo') ,
                            'sharped' => esc_html__('Sharp', 'mazo')
                        ) ,
                        'default' => 'sharped',
						
                    ) ,
                    
                    array(
                        'id' => 'theme_font_style',
                        'type' => 'button_set',
                        'title' => esc_html__('Theme Font Style', 'mazo') ,
                        'desc' => esc_html__('Choose Font Style Setting', 'mazo') ,
                        'options' => array(
                            'default' => esc_html__('Default', 'mazo') ,
                            'oswald_style' => esc_html__('Oswald Style', 'mazo'),
                            'montserrat_style' => esc_html__('Montserrat Style', 'mazo')
                        ) ,
                        'default' => 'default',
                        'hint' => array(
                            'content' => esc_html__('Oswald style is using in mining demo and Monestrrat style is using in solar demo.', 'mazo')
                        )
						
                    ) ,
					
					array(
                        'id' => 'theme_corner_rounded',
                        'type' => 'slider',
                        'title' => esc_html__('Round Corner', 'mazo') ,
                        'desc' => esc_html__('Round Corner . Min: 10, max: 50, default value: 10', 'mazo') ,
                        'default' => 4,
                        'min' => 4,
                        'max' => 50,
                        'display_value' => 'text',
                        'required' => array(
                            array(
                                0 => 'theme_corner',
                                1 => 'equals',
                                2 => 'rounded'
                            ),
							array(
                                0 => 'color_skin_setting',
                                1 => 'equals',
                                2 => 'custom_color_skin'
                            )
                        )
                    ) ,
					
                    array(
                        'id' => 'page_loader_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Page Loader Type', 'mazo') ,
                        'subtitle' => esc_html__('Select Loader Type.', 'mazo') ,
                        'desc' => esc_html__('Choose Loading Image', 'mazo') ,
                        'options' => array(
                            'loading_image' => esc_html__('Loading Image', 'mazo') ,
                            'advanced_loader' => esc_html__('Advanced Page Loader', 'mazo')
                        ) ,
                        'default' => 'loading_image',                        
                    ) ,
                    array(
                        'id' => 'page_loader_image',
                        'type' => 'image_select',
                        'title' => esc_html__('Loding Image (Gif)', 'mazo') ,
                        'subtitle' => esc_html__('Select Gif Image.', 'mazo') ,
                        'desc' => esc_html__('Choose Gif Image.', 'mazo') ,
                        'options' => $this->page_loader_options,
                        'default' => 'loading1',
                        'height' => '35',
                        'hint' => array(
                            'title' => esc_html__('Loding Image (Gif)', 'mazo') ,
                            'content' => esc_html__('Choose Gif Image.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'page_loader_type',
                            1 => 'equals',
                            2 => 'loading_image'
                        )
                    ) ,
                    array(
                        'id' => 'custom_page_loader_image',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Custom Loding Image (Gif)', 'mazo') ,
                        'subtitle' => esc_html__('Select Custom Loding Gif Image.', 'mazo') ,
                        'desc' => esc_html__('Choose Gif Image', 'mazo') ,
                        'hint' => array(
                            'title' => esc_html__('Custom Loding Image (Gif)', 'mazo') ,
                            'content' => esc_html__('Choose Gif Image.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'page_loader_type',
                            1 => 'equals',
                            2 => 'loading_image'
                        )
                    ) ,
                    array(
                        'id' => 'advanced_page_loader_image',
                        'type' => 'image_select',
                        'title' => esc_html__('Advanced Loding Image', 'mazo') ,
                        'subtitle' => esc_html__('Select Advance Loding Image (Gif)', 'mazo') ,
                        'desc' => esc_html__('Choose Advance Loding Image', 'mazo') ,
                        'options' => array(
                            'loading1' => get_template_directory_uri() . '/dz-inc/assets/images/advanced-loading-images/loading1.gif',
                            'loading2' => get_template_directory_uri() . '/dz-inc/assets/images/advanced-loading-images/loading2.gif',
                        ) ,
                        'default' => 'loading1',
                        'height' => '60',
                        'hint' => array(
                            'title' => esc_html__('Advance Loding Image (Gif)', 'mazo') ,
                            'content' => esc_html__('Choose Advance Loding Image', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'page_loader_type',
                            1 => 'equals',
                            2 => 'advanced_loader'
                        )
                    ) ,
                    array(
                        'id' => 'theme_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Theme Layout', 'mazo') ,
                        'subtitle' => esc_html__('Choose theme layout.', 'mazo') ,
                        'desc' => esc_html__('Click in the image icon to select the theme layout (Default : Full Width).', 'mazo') ,
                        'options' => $this->theme_layout_options,
                        'height' => '80',
                        'default' => 'theme_layout_1',
                        'hint' => array(
                            'title' => esc_html__('How it Works?', 'mazo') ,
                            'content' => esc_html__('1. Full Width: the web pages will be full width as shown in image.', 'mazo') . '<br><br>' . esc_html__('2. Boxed: with the box layout the padding will be apply on two sides (Left, Right) of the page.', 'mazo') . '<br><br>' . esc_html__('3. Frame: with the frame layout the padding will be apply on all the sides (Top, Right, Bottom, Left) of the page.', 'mazo')
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_bg_pattern_padding',
                        'type' => 'slider',
                        'title' => esc_html__('Padding', 'mazo') ,
                        'desc' => esc_html__('Padding description. Min: 10, max: 100, default value: 20', 'mazo') ,
                        'default' => 20,
                        'min' => 10,
                        'max' => 100,
                        'display_value' => 'text',
                        'required' => array(
                            array(
                                0 => 'theme_layout',
                                1 => 'equals',
                                2 => 'theme_layout_3'
                            )
                        )
                    ) ,
                    array(
                        'id' => 'body_boxed_bg_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Background Type', 'mazo') ,
                        'subtitle' => esc_html__('Select the background type.', 'mazo') ,
                        'desc' => esc_html__('Click on the tab to choose background type', 'mazo') ,
                        'options' => array(
                            'bg_type_color' => esc_html__('Type Color', 'mazo') ,
                            'bg_type_image' => esc_html__('Type Image', 'mazo') ,
                            'bg_type_pattern' => esc_html__('Type Pattern', 'mazo')
                        ) ,
                        'default' => 'bg_type_color',
                        'hint' => array(
                            'title' => esc_html__('How it Works?', 'mazo') ,
                            'content' => esc_html__('1. Type Color: page background will be type color.', 'mazo') . '<br><br>' . esc_html__('2. Type Image: page background will be type image.', 'mazo') . '<br><br>' . esc_html__('3. Type Pattern: page background will be type pattern.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'theme_layout',
                            1 => 'equals',
                            2 => array(
                                'theme_layout_2',
                                'theme_layout_3'
                            )
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_bg_color',
                        'type' => 'image_select',
                        'title' => esc_html__('Background Color', 'mazo') ,
                        'subtitle' => esc_html__('Select background color', 'mazo') ,
                        'desc' => esc_html__('Click on the image icon to choose background color.', 'mazo') ,
                        'options' => $this->theme_color_background_options,
                        'height' => '35',
                        'default' => 'bg_color_1',
                        'hint' => array(
                            'title' => esc_html__('Write title text here', 'mazo') ,
                            'content' => esc_html__('Write content text here.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'body_boxed_bg_type',
                            1 => 'equals',
                            2 => 'bg_type_color'
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_custom_bg_color',
                        'type' => 'color_rgba',
                        'title' => 'Custom Background Color',
                        'subtitle' => esc_html__('(Optional) Choose background color as gradient color.', 'mazo') ,
                        'default' => array(
                            'color' => '',
                            'alpha' => 1
                        ) ,
                        'options' => array(
                            'show_input' => true,
                            'show_initial' => true,
                            'show_alpha' => true,
                            'show_palette' => false,
                            'show_palette_only' => false,
                            'show_selection_palette' => true,
                            'max_palette_size' => 10,
                            'allow_empty' => true,
                            'clickout_fires_change' => false,
                            'choose_text' => 'Choose',
                            'cancel_text' => 'Cancel',
                            'show_buttons' => true,
                            'use_extended_classes' => true,
                            'palette' => null, // show default
                            'input_text' => 'Select Color'
                        ) ,
                        'hint' => array(
                            'title' => esc_html__('How it Works?', 'mazo') ,
                            'content' => esc_html__('1. Click on Select Color button content text here.', 'mazo') . '<br><br>' . esc_html__('2. Select the color as you want and ckick on Choose.', 'mazo') . '<br><br>' . esc_html__('3. On top / bottom of the panel click on Save Changes button.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'body_boxed_bg_type',
                            1 => 'equals',
                            2 => 'bg_type_color'
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_bg_image',
                        'type' => 'image_select',
                        'title' => esc_html__('Background Image', 'mazo') ,
                        'subtitle' => esc_html__('Select Background Image', 'mazo') ,
                        'desc' => esc_html__('Choose Background Image', 'mazo') ,
                        'options' => $this->theme_image_background_options,
                        'height' => '35',
                        'default' => 'bg_img_1',
                        'hint' => array(
                            'title' => esc_html__('Background Image', 'mazo') ,
                            'content' => esc_html__('Choose Background Image.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'body_boxed_bg_type',
                            1 => 'equals',
                            2 => 'bg_type_image'
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_custom_bg_image',
                        'type' => 'media',
                        'url' => true,
                        'height' => '35',
                        'title' => esc_html__('Custom Background Image', 'mazo') ,
                        'subtitle' => esc_html__('Select Custom Background Image.', 'mazo') ,
                        'desc' => esc_html__('Choose Custom Background Image.', 'mazo') ,
                        'default' => array(
                            'url' => ''
                        ) ,
                        'hint' => array(
                            'title' => esc_html__('Custom Background Image', 'mazo') ,
                            'content' => esc_html__('Choose Custom Background Image.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'body_boxed_bg_type',
                            1 => 'equals',
                            2 => 'bg_type_image'
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_bg_pattern',
                        'type' => 'image_select',
                        'title' => esc_html__('Background Pattern', 'mazo') ,
                        'subtitle' => esc_html__('Select Background Pattern.', 'mazo') ,
                        'desc' => esc_html__('Choose Background Pattern.', 'mazo') ,
                        'options' => $this->theme_pattern_background_options,
                        'default' => 'bg_pattern_1',
                        'height' => '35',
                        'hint' => array(
                            'title' => esc_html__('Background Pattern', 'mazo') ,
                            'content' => esc_html__('Choose Background Pattern.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'body_boxed_bg_type',
                            1 => 'equals',
                            2 => 'bg_type_pattern'
                        )
                    ) ,
                    array(
                        'id' => 'boxed_layout_custom_bg_pattern',
                        'type' => 'media',
                        'url' => true,
                        'width' => '35',
                        'height' => '35',
                        'title' => esc_html__('Custom Background Pattern', 'mazo') ,
                        'subtitle' => esc_html__('Select Custom Background Pattern.', 'mazo') ,
                        'desc' => esc_html__('Choose Custom Background Pattern.', 'mazo') ,
                        'default' => array(
                            'url' => ''
                        ) ,
                        'hint' => array(
                            'title' => esc_html__('Custom Background Pattern', 'mazo') ,
                            'content' => esc_html__('Choose Custom Background Pattern.', 'mazo')
                        ) ,
                        'required' => array(
                            0 => 'body_boxed_bg_type',
                            1 => 'equals',
                            2 => 'bg_type_pattern'
                        )
                    )
                )
            );


            $theme_fonts = array(
                'Font & Sizes' => array(
                    'id' => 'general',
                    'title' => 'General Fonts',
                    'heading' => 'General Settings',
                    'desc' => esc_html__('Choose fonts and font sizes for all pages', 'mazo')
                ) ,
            );

            foreach ($theme_fonts as $key => $font)
            {

                $font_id = $font['id'];
                $font_title = $font['title'];
                $font_heading = $font['heading'];
                $font_desc = $font['desc'];

                $this->sections[] = array(
                    'title' => $key,
                    'heading' => $font_heading,
                    'desc' => $font_desc,
                    'icon' => 'el-icon-text-width',
                    'subsection' => true,
                    'fields' => array(
                        array(
                            'id' => $font_id . '_font',
                            'type' => 'button_set',
                            'title' => $font_title,
                            'options' => array(
                                'Open-Sans' => esc_html__('Default', 'mazo') ,
                                'Google-Font' => esc_html__('Google Fonts', 'mazo') ,
                            ) ,
                            'default' => 'Open-Sans',
                        ) ,
                        array(
                            'id' => $font_id . '_font_body',
                            'type' => 'typography',
                            'title' => esc_html__('Body', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for body tag of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'body'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true,

                        ) ,
                        array(
                            'id' => $font_id . '_font_h1',
                            'type' => 'typography',
                            'title' => esc_html__('H1', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all H1 tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'h1'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $font_id . '_font_h2',
                            'type' => 'typography',
                            'title' => esc_html__('H2', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all H2 tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'h2'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $font_id . '_font_h3',
                            'type' => 'typography',
                            'title' => esc_html__('H3', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all H3 tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'h3'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $font_id . '_font_h4',
                            'type' => 'typography',
                            'title' => esc_html__('H4', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all H4 tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'h4'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $font_id . '_font_h5',
                            'type' => 'typography',
                            'title' => esc_html__('H5', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all H5 tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'h5'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $font_id . '_font_h6',
                            'type' => 'typography',
                            'title' => esc_html__('H6', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all H6 tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'h6'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        ) ,
                        array(
                            'id' => $font_id . '_font_p_tag',
                            'type' => 'typography',
                            'title' => esc_html__('P (Paragraph Text)', 'mazo') ,
                            'subtitle' => esc_html__('This will be the default font for all P tags of your website.', 'mazo') ,
                            'google' => true,
                            'font-backup' => true,
                            'all_styles' => true,
                            'text-align' => false,
                            'color' => true,
                            'output' => array(
                                'p'
                            ) ,
                            'units' => 'px',
                            'required' => array(
                                0 => $font_id . '_font',
                                1 => 'equals',
                                2 => 'Google-Font'
                            ) ,
                            'force_output' => true
                        )
                    )
                );
            }

            /*--------------------------------------------------------------
            # 11. Social Setting
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('Social Setting', 'mazo') ,
                'icon' => 'el el-twitter',
            );

            $socialLinkFiels[] = array(
                'id' => 'social_link_target',
                'type' => 'select',
                'title' => esc_html__('Choose Social Link Target', 'mazo') ,
                'options' => $this->link_target_options,
                'default' => '_blank'
            );

            foreach ($this->social_link_options as $social_link)
            {

                $sl_id = $social_link['id'];
                $sl_title = $social_link['title'];

                $socialLinkFiels[] = array(
                    'id' => 'social_' . $sl_id . '_url',
                    'type' => 'text',
                    'title' => $sl_title . esc_html__(' URL', 'mazo') ,
                    'subtitle' => esc_html__('Link to : ', 'mazo') . $sl_title,
                    'default' => '',
                );
            }

            $this->sections[] = array(
                'title' => esc_html__('Social Link', 'mazo') ,
                'icon' => 'el-icon-facebook',
                'subsection' => true,
                'fields' => $socialLinkFiels
            );

            $social_share_list = $social_share_default = array();
            $i = 1;
            foreach ($this->social_share_options as $social_link)
            {

                $social_share_list[$social_link['id']] = $social_link['title'];

                if ($i <= 3)
                {
                    $social_share_default[$social_link['id']] = true;
                }
                else
                {
                    $social_share_default[$social_link['id']] = false;
                }
                $i++;
            }

            $this->sections[] = array(
                'title' => esc_html__('Social Sharing', 'mazo') ,
                'icon' => 'el-icon-facebook',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id' => 'social_shaing_on_post',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Social Shaing On Post', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'social_shaing_on_page',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Social Shaing On Page', 'mazo') ,
                        'on' => esc_html__('Enabled', 'mazo') ,
                        'off' => esc_html__('Disabled', 'mazo') ,
                        'default' => false
                    ) ,
                    array(
                        'id' => 'share_sort_link',
                        'type' => 'sortable',
                        'title' => esc_html__('Social Sharing', 'mazo') ,
                        'subtitle' => esc_html__('Select active social share links and sort them with drag and drop.', 'mazo') ,
                        'mode' => 'checkbox',
                        'options' => $social_share_list,
                        // For checkbox mode
                        'default' => $social_share_default
                    )
                )
            );

            /*--------------------------------------------------------------
            # 12. Custom Script Setting
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('Custom Script', 'mazo') ,
                'icon' => 'el el-list-alt'
            );

            $this->sections[] = array(
                'title' => esc_html__('Custom Script', 'mazo') ,
                'icon' => 'el el-list-alt',
                'subsection' => true,
                'fields' => array(
                    array(
                        'id' => 'body_class',
                        'type' => 'text',
                        'title' => esc_html__('Body Class(s)', 'mazo') ,
                        'subtitle' => esc_html__('You can add one or more classes on theme body element. If you need more then one class, add them with a space between them.', 'mazo') ,
                        'desc' => esc_html__('Ex: body-class-1 body-class-2', 'mazo')
                    ) ,
                    array(
                        'id' => 'css_editor',
                        'type' => 'ace_editor',
                        'title' => esc_html__('CSS Code', 'mazo') ,
                        'subtitle' => esc_html__('Paste your CSS code here.', 'mazo') ,
                        'mode' => 'css',
                        'theme' => 'monokai'
                    ) ,
                    array(
                        'id' => 'js_editor',
                        'type' => 'ace_editor',
                        'title' => esc_html__('Javascript Code', 'mazo') ,
                        'subtitle' => esc_html__('Paste your JS code here.', 'mazo') ,
                        'mode' => 'javascript',
                        'theme' => 'chrome'
                    ) ,
                    array(
                        'id' => 'html_editor',
                        'type' => 'ace_editor',
                        'title' => esc_html__('HTML Code', 'mazo') ,
                        'subtitle' => esc_html__('Paste your HTML code here.', 'mazo') ,
                        'mode' => 'html',
                        'theme' => 'chrome'
                    )
                )
            );

            $this->sections[] = array(
                'title' => esc_html__('Analytic Code', 'mazo') ,
                'icon' => 'el-icon-edit',
                'subsection' => true,
                'fields' => array(

                    array(
                        'id' => 'site_header_code',
                        'type' => 'textarea',
                        'theme' => 'chrome',
                        'title' => esc_html__('Header Custom Codes', 'mazo') ,
                        'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'mazo') ,
                    ) ,
                    array(
                        'id' => 'site_footer_code',
                        'type' => 'textarea',
                        'theme' => 'chrome',
                        'title' => esc_html__('Footer Custom Codes', 'mazo') ,
                        'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'mazo') ,
                    )
                )
            );

            /*--------------------------------------------------------------
            # 15. Advance Settings
            --------------------------------------------------------------*/
            $this->sections[] = array(
                'title' => esc_html__('Advance Options', 'mazo') ,
                'icon' => 'el el-cogs'
            );

            $advanceSettingSidebarFields[] = array(
                'id' => 'new_sidebar_input',
                'type' => 'multi_text',
                'title' => esc_html__('Sidebar Name', 'mazo') ,
                'subtitle' => esc_html__('Name your sidebar!', 'mazo') ,
                'desc' => esc_html__('Enter the text only. ', 'mazo') . '<a href="' . admin_url('widgets.php') . '" target="_blank">' . esc_html__('Click Here.', 'mazo') . '</a>' . esc_html__(' to check your sidebars', 'mazo') ,
                'hint' => array(
                    'title' => esc_html__('What to Do?', 'mazo') ,
                    'content' => esc_html__('1. Once you named your sidebar click on the Save Changes button @ the top of the panel.', 'mazo') . '<br><br>' . esc_html__('2. After save changes please just refresh the page, you will see the sidebar listed below.', 'mazo')
                ) ,
            );

            $sidebars_widgets = get_option('sidebars_widgets');

            if (!empty($sidebars_widgets))
            {
                $i = 1;
                foreach ($sidebars_widgets as $key => $value)
                {
                    $keyExt = substr($key, 3);
                    $keyRep1 = str_replace('-', ' ', $keyExt);
                    $keyRep2 = str_replace('-', '_', $keyExt);
                    $dzWidget = ucfirst($keyRep1);

                    if (strpos($key, 'dz-') === 0)
                    {
                        $advanceSettingSidebarFields[] = array(
                            'id' => 'avail_sidebar_' . $keyRep2 . '_' . $i,
                            'type' => 'info',
                            'style' => 'info',
                            'desc' => esc_html($dzWidget, 'mazo')
                        );
                    }
                    $i++;
                }
            }

            $this->sections[] = array(
                'title' => esc_html__('Create Sidebar', 'mazo') ,
                'icon' => 'el el-pencil',
                'desc' => esc_html__('Dexignlab gives you the functionality to create your own Sidebars. Default there are three Sidebars as display below.', 'mazo') ,
                'subsection' => true,
                'fields' => $advanceSettingSidebarFields
            );
        }

        /**
         * Get default theme oiptions
         *
         * @param $key
         * @param $default
         * @return $value
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

    }

    global $mazothemeoption;

    $mazothemeoption = new Mazo_Redux_Framework_config();
}

