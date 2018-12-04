<?php
/**
 * Theme Customizer
 *
 * @package Daron
 */
function daron_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    wp_enqueue_style('customizr', DARON_THEME_URL .'/css/customizer.css');
	//Titles
    class Daron_info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 class="daron-label"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    } 

	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_Daron_Control' ) ) :
	class More_Daron_Control extends WP_Customize_Control {

		/**
		* Render the content on the theme customizer page
		*/
		public function render_content() {
			?>
			<label style="overflow: hidden; zoom: 1;">
				<a style="text-decoration:none" href="https://awplife.com/wordpress-themes/daron-premium/" target="blank">
					<div class="col-md-4 col-sm-6 daron-btn btn btn-success btn">
						<?php esc_html_e('Upgrade To Daron Premium','daron'); ?>
					</div>
				</a>
				<div class="col-md-3 col-sm-6">
					<h3 class="features-btn"><?php echo esc_html_e( 'Daron Premium - Features','daron'); ?></h3>
					<ul>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design','daron'); ?> </li>					
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Translation Ready','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multi Purpose','daron'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('High Performance','daron'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Font Awesome Icons','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Template','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multi Color Option','daron'); ?></li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Advanced Typography','daron'); ?>   </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Flickr Photo Stream Widget','daron'); ?>   </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible','daron'); ?>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Theme Layout','daron'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Ultimate Portfolio layout with Isotope effect','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Home Page Active/Inactive Sections','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Support Access','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Homepage Section Draggable','daron'); ?> </li>
					</ul>
				</div>
				<a style="text-decoration:none" href="https://awplife.com/account/signup/daron-premium" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
							<?php esc_html_e('Buy Now','daron'); ?> 
					</div>
				</a>
				<hr>
				<span class="customize-control-title"><?php esc_html_e( 'Found Useful Daron?', 'daron' ); ?></span>
				<p>
					<?php
						printf( esc_html_e( 'If you Like our Theme , Please do Rate us on WordPress.org  We\'d really appreciate it!', 'daron' ), '<a target="_new" href="https://wordpress.org/support/theme/daron/reviews/?filter=5">', '</a>' );
					?>
				</p>
				<a style="text-decoration:none" href="https://wordpress.org/support/theme/daron/reviews/?filter=5" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
						<?php esc_html_e('Rate US','daron'); ?> 
					</div>
				</a>
				<hr>
				<span class="customize-control-title"><?php esc_html_e( 'Our Top Featured Recommended Plugins', 'daron' ); ?></span>
				<a style="text-decoration:none" href="https://wordpress.org/plugins/portfolio-filter-gallery/" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
						<?php esc_html_e('Portfolio Filter Gallery','daron'); ?> 
					</div>
				</a>
				<a style="text-decoration:none" href="https://wordpress.org/plugins/blog-filter/" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
						<?php esc_html_e('Blog Filter Gallery','daron'); ?> 
					</div>
				</a>
			</label>
			<?php
		}
	}
	endif;	
	
	//Daron Theme Options
	$wp_customize->add_panel('daron_theme_options', array(
				'title' 	=> __( 'Daron Theme Options', 'daron' ),
				'priority' 	=> 1,
            )
        );
		
		//1. Upgrade To daron Premium ======================================
		$wp_customize->add_section( 'upgrade_daron_premium' , array(
			'title'      	=> __( 'Upgrade to Premium', 'daron' ),
			'priority'   	=> 1,
			'panel'=>'daron_theme_options',
		) );

			$wp_customize->add_setting( 'upgrade_daron_premium', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_Daron_Control( $wp_customize, 'upgrade_daron_premium', array(
				'label'    => __( 'Daron Premium', 'daron' ),
				'section'  => 'upgrade_daron_premium',
				'settings' => 'upgrade_daron_premium',
				'priority' => 1,
			) ) ); 
		//1. Upgrade To daron Premium ======================================
			
		//General Settings
		$wp_customize->add_section( 'daron_general_settings' , array(
				'title'      	=> __( 'General Settings', 'daron' ),
				'priority'      => 1,
				'panel'			=> 'daron_theme_options',
			) 
		);
		
			//Theme Color
			$wp_customize->add_setting( 'daron_skin_theme_color' , array(
					'default'   		=> '#F71735',
					'sanitize_callback' => 'daron_sanitize_hex_colors',
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'daron_skin_theme_color', array(
					'label'      => __( 'Theme Color', 'daron' ),
					'section'	 => 'daron_general_settings',
					'settings'   => 'daron_skin_theme_color',
					'priority'  => 1,
					) 
				) 
			);
			
			//Site Layout
			$wp_customize->add_setting( 'daron_theme_layout', array(
					'default'     		=> 'wide',
					'sanitize_callback' => 'daron_sanitize_radio',
				)
			);
			$wp_customize->add_control('daron_theme_layout', array(
					'type'      => 'radio',
					'label'     => __('Theme Layout', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 2,
					'choices'   => array(
						'wide'       => __( 'Wide Layout', 'daron' ),
						'boxed'      => __( 'Box Layout', 'daron' ),
					),
				)
			);
			
			//Boxed Layout Background Image
			$wp_customize->add_setting( 'daron_boxed_layout_bgimg', array(
					'default'      		=> esc_html__( 'wood', 'daron' ),
					'sanitize_callback' => 'daron_sanitize_select',
				)
			);
			$wp_customize->add_control('daron_boxed_layout_bgimg', array(
					'type'      => 'select',
					'label'     => __('Boxed Layout Background Image', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 3,
					'choices'   => array(
						'crossed_stripes'       => __( 'Crossed Stripes', 'daron' ),
						'classy_fabric'         => __( 'Classy Fabric', 'daron' ),
						'low_contrast_linen'    => __( 'Low Contrast Linen', 'daron' ),
						'wood'    				=> __( 'Wood', 'daron' ),
						'diamonds'    			=> __( 'Diamonds', 'daron' ),
						'triangles'    			=> __( 'Triangles', 'daron' ),
						'black_mamba'    		=> __( 'Black Mamba', 'daron' ),
						'vichy'   			 	=> __( 'Vichy', 'daron' ),
						'back_pattern'    		=> __( 'Back Pattern', 'daron' ),
						'checkered_pattern'    	=> __( 'Checkered Pattern', 'daron' ),
						'diamond_upholstery'    => __( 'Diamond Upholstery', 'daron' ),
						'lyonnette'    			=> __( 'Lyonnette', 'daron' ),
						'graphy'    			=> __( 'Graphy', 'daron' ),
						'black_thread'    		=> __( 'Black Thread', 'daron' ),
						'subtlenet2'    		=> __( 'Subtlenet', 'daron' ),
					),
				)
			);
			
			//General Page Layout
			$wp_customize->add_setting( 'daron_general_page_layout', array (
					'default'      		=>  __('fullwidth', 'daron'),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_general_page_layout', array(
					'type'      => 'radio',
					'label'     => __('Page layout', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 4,
					'choices'   => array(
						'leftsidebar'       => __( 'Left Sidebar', 'daron' ),
						'fullwidth'         => __( 'Full width (no sidebar)', 'daron' ),
						'rightsidebar'    	=> __( 'Right Sidebar', 'daron' )
					),
				)
			);
			
			//Enable Topbar			
			$wp_customize->add_setting( 'daron_loader', array(
					'default'      		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_loader', array(
					'type'      => 'radio',
					'label'     => __('Show Site Loader', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 5,
					'choices'   => array(
						'active'       => __( 'Show', 'daron' ),
						'inactive'     => __( 'Hide', 'daron' ),
					),
				)
			);
		
		//Header Settings
		$wp_customize->add_section( 'daron_header_option' , array(
				'title'      	=> __( 'Header Settings', 'daron' ),
				'priority'      => 3,
				'panel'      	=> 'daron_theme_options',
			) 
		);
			
			//Header Max Height
			$wp_customize->add_setting('daron_header_height', array(
					'default' 			=> esc_html__( '460', 'daron' ),
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control('daron_header_height', array(
					'label' 		=> __( 'Header Max Height (px)', 'daron' ),
					'section' 		=> 'daron_header_option',
					'type'		 	=> 'number',
					'description'   => __('Header height in pixels. [default: 10]', 'daron'),       
					'priority' 		=> 4
				)
			);
			
			// Setting custom header show_title.
			$wp_customize->add_setting( 'daron_header_show_title', array(
				'default'           => 1,
				'sanitize_callback' => 'daron_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'daron_header_show_title', array(
				'label'   => esc_html__( 'Show Title', 'daron' ),
				'section' => 'daron_header_option',
				'type'    => 'checkbox',
			) );

			// Setting custom_header_show_breadcrumb.
			$wp_customize->add_setting( 'daron_header_show_breadcrumb', array(
				'default'           => 1,
				'sanitize_callback' => 'daron_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'daron_header_show_breadcrumb', array(
				'label'   => esc_html__( 'Show Breadcrumb', 'daron' ),
				'section' => 'daron_header_option',
				'type'    => 'checkbox',
			) );
			
			
			//Header Color if no image selected
			$wp_customize->add_setting( 'daron_header_background_color' , array(
					'default'   		=> '#29B6F6',
					'sanitize_callback' => 'daron_sanitize_hex_colors',
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'daron_header_background_color', array(
					'label'      => __( 'Gradient Color', 'daron' ),
					'section'	 => 'daron_header_option',
					//'settings'   => 'daron_skin_theme_color',
					'priority'  => 1,
					) 
				) 
			);
			
		
		//Blog Options
		$wp_customize->add_section( 'daron_blog_option' , array(
				'title'      	=> __( 'Blog Settings', 'daron' ),
				'description'	=> __( 'You can change blog page layout and single blog page layout from here.', 'daron' ),
				'priority'      => 4,
				'panel'      	=> 'daron_theme_options',
			) 
		);
		
			//Blog Page Layout
			$wp_customize->add_setting( 'daron_page_layout_style', array(
					'default'      		=>  __( 'rightsidebar', 'daron' ),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_page_layout_style', array(
					'type'      => 'radio',
					'label'     => __('Blog Page layout', 'daron'),
					'section'   => 'daron_blog_option',
					'priority'  => 1,
					'choices'   => array(
						'leftsidebar'       => __( 'Left Sidebar', 'daron' ),
						'fullwidth'         => __( 'Full width (no sidebar)', 'daron' ),
						'rightsidebar'    	=> __( 'Right Sidebar', 'daron' )
					),
				)
			);
			
			//Blog Single Page Layout
			$wp_customize->add_setting( 'daron_blog_single_page_layout', array(
					'default'      		=> __( 'fullwidth', 'daron' ),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_blog_single_page_layout', array(
					'type'      => 'radio',
					'label'     => __('Blog Single Page layout', 'daron'),
					'section'   => 'daron_blog_option',
					'priority'  => 2,
					'choices'   => array(
						'leftsidebar'       => __( 'Left Sidebar', 'daron' ),
						'fullwidth'         => __( 'Full width (no sidebar)', 'daron' ),
						'rightsidebar'    	=> __( 'Right Sidebar', 'daron' )
					),
				)
			);	
			
		//Social Icon Settings
		$wp_customize->add_section( 'daron_topbar_settings' , array(
				'title'      	=> __( 'Social Icon Settings', 'daron' ),
				'priority'      => 5,
				'panel'			=> 'daron_theme_options',
				'description'	=> __('Social Media icons will disappear if you leave it blank.', 'daron')
			) 
		);
		
			//Enable Search Icon			
			$wp_customize->add_setting( 'daron_search_icon', array(
					'default'      		=> __('active', 'daron'),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_search_icon', array(
					'type'      => 'radio',
					'label'     => __('Show Search Icon', 'daron'),
					'section'   => 'daron_topbar_settings',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Show', 'daron' ),
						'inactive'     => __( 'Hide', 'daron' ),
					),
				)
			);
			
			
			//Social Media
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',     
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'social_media', array(
						'label' 	=> __('Social Media', 'daron'),
						'section' 	=> 'daron_topbar_settings',
						'settings' 	=> 'daron_title',
						'priority' 	=> 4,
					) 
				)
			);
			
			//Facebook link
			$wp_customize->add_setting( 'daron_fb_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_fb_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Facebook Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_facebook_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_facebook_url', array(
					'description' 	=> __('Enter your Facebook url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			//Twitter URL
			$wp_customize->add_setting( 'daron_tweet_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_tweet_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Twitter Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_twitter_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_twitter_url', array(
					'description' 	=> __('Enter your Twitter url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			
			//Instagram URL
			$wp_customize->add_setting( 'daron_insta_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_insta_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Instagram Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_instagram_url', array(
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_instagram_url', array(
					'description'	=> __('Enter your Instagram url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			//YouTube URL
			$wp_customize->add_setting( 'daron_youtube_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_youtube_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable YouTube Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_youtube_url', array(
					'default'			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_youtube_url', array(
					'description' 	=> __('Enter your YouTube url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);

			
			
		//Footer Settings
		$wp_customize->add_section( 'daron_footer_settings' , array(
				'title'      	=> __( 'Footer Settings', 'daron' ),
				'priority'      => 6,
				'panel'			=> 'daron_theme_options',
			) 
		);
			//Enable Widget			
			$wp_customize->add_setting( 'daron_widgets_section', array(
					'default'      		=> 'inactive',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_widgets_section', array(
					'type'      => 'radio',
					'label'     => __('Widgets Section', 'daron'),
					'section'   => 'daron_footer_settings',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			

			//Footer Column Layout
			$wp_customize->add_setting( 'daron_footer_column_layout', array(
					'default'      		=> '3',
					'sanitize_callback' => 'daron_sanitize_radio',
				)
			);
			$wp_customize->add_control('daron_footer_column_layout', array(
					'type'      => 'radio',
					'label'     => __('Footer Column Layout', 'daron'),
					'section'   => 'daron_footer_settings',
					'priority'  => 3,
					'choices'   => array(
						'1'   	 => __( 'One Column', 'daron' ),
						'2'      => __( 'Two Column', 'daron' ),
						'3'      => __( 'Three Column', 'daron' ),
						'4'      => __( 'Four Column', 'daron' ),
					),
				)
			);
			
			//Footer Bottom
			$wp_customize->add_setting(
				'copyright_text',
				array(
					'default' => '',
					'sanitize_callback' => 'daron_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'copyright_text',
				array(
					'label' => __( 'Copyright Text.', 'daron' ),
					'section' => 'daron_footer_settings',
					'type' => 'text',
					'priority' => 4
				)
			);
			
			$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

				$wp_customize->selective_refresh->add_partial( 'blogname', array(
					'selector'        => '.s-header-v2__logo a',
					'render_callback' => 'daron_customize_partial_blogname',
				) );
				$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
					'selector'        => '.site-description',
					'render_callback' => 'daron_customize_partial_blogdescription',
				) );
			}
			
}
add_action( 'customize_register', 'daron_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function daron_customize_partial_blogname() {

	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function daron_customize_partial_blogdescription() {

	bloginfo( 'description' );
}


/**
	Sanitize
**/
//checkbox sanitization function
function daron_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return 0;
	}
}
     
//radio box sanitization function
function daron_sanitize_radio( $input, $setting ) {
 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible radio box options 
	$choices = $setting->manager->get_control( $setting->id )->choices;
					 
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	 
}

//select sanitization function
function daron_sanitize_select( $input, $setting ) {
 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options 
	$choices = $setting->manager->get_control( $setting->id )->choices;
					 
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	 
}

/**
 * Function to sanitize alpha color.
 *
 * @param string $input Hex or RGBA color.
 *
 * @return string
 */
function daron_sanitize_hex_colors( $input ) {
	// Is this an rgba color or a hex?
	$mode = ( false === strpos( $input, 'rgba' ) ) ? 'hex' : 'rgba';

	if ( 'rgba' === $mode ) {
		return hestia_sanitize_rgba( $input );
	} else {
		return sanitize_hex_color( $input );
	}
}

//Text
function daron_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Background size
function daron_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => __('Cover', 'daron'),
        'contain'   => __('Contain', 'daron'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
?>