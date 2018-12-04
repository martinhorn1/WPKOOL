<?php
/**
 * Foster Charity: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function foster_charity_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'foster_charity_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'foster-charity' ),
	    'description' => __( 'Description of what this panel does.', 'foster-charity' ),
	) );

	$wp_customize->add_section( 'foster_charity_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'foster-charity' ),
		'priority'   => 30,
		'panel' => 'foster_charity_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('foster_charity_layout_settings',array(
        'default' => __('Right Sidebar','foster-charity'),
        'sanitize_callback' => 'foster_charity_sanitize_choices'	        
	));

	$wp_customize->add_control('foster_charity_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'foster-charity'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'foster-charity'),
        'section' => 'foster_charity_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','foster-charity'),
            'Right Sidebar' => __('Right Sidebar','foster-charity'),
            'One Column' => __('Full Width','foster-charity'),
            'Grid Layout' => __('Grid Layout','foster-charity')
        ),
	));

	//Topbar section
	$wp_customize->add_section('foster_charity_topbar',array(
		'title'	=> __('Topbar','foster-charity'),
		'description'	=> __('Add Topbar Content here','foster-charity'),
		'priority'	=> null,
		'panel' => 'foster_charity_panel_id',
	));

	$wp_customize->add_setting('foster_charity_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('foster_charity_email',array(
		'label'	=> __('Add Email','foster-charity'),
		'section'	=> 'foster_charity_topbar',
		'setting'	=> 'foster_charity_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('foster_charity_call1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('foster_charity_call1',array(
		'label'	=> __('Add Phone Number','foster-charity'),
		'section'	=> 'foster_charity_topbar',
		'setting'	=> 'foster_charity_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('foster_charity_donate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('foster_charity_donate',array(
		'label'	=> __('Donate button text','foster-charity'),
		'section'	=> 'foster_charity_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('foster_charity_donate_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('foster_charity_donate_link',array(
		'label'	=> __('Add Donate Link','foster-charity'),
		'section'	=> 'foster_charity_topbar',
		'setting'	=> 'foster_charity_donate_link',
		'type'		=> 'text'
	));

	//Social Icons
	$wp_customize->add_section('foster_charity_social_link',array(
		'title'	=> __('Social Media','foster-charity'),
		'description'	=> __('Add Social Media Url here','foster-charity'),
		'priority'	=> null,
		'panel' => 'foster_charity_panel_id',
	));

	$wp_customize->add_setting('foster_charity_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('foster_charity_facebook_url',array(
		'label'	=> __('Add Facebook link','foster-charity'),
		'section'	=> 'foster_charity_social_link',
		'setting'	=> 'foster_charity_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('foster_charity_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('foster_charity_twitter_url',array(
		'label'	=> __('Add Twitter link','foster-charity'),
		'section'	=> 'foster_charity_social_link',
		'setting'	=> 'foster_charity_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('foster_charity_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('foster_charity_google_plus_url',array(
		'label'	=> __('Add Google Plus link','foster-charity'),
		'section'	=> 'foster_charity_social_link',
		'setting'	=> 'foster_charity_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('foster_charity_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('foster_charity_instagram_url',array(
		'label'	=> __('Add instagram link','foster-charity'),
		'section'	=> 'foster_charity_social_link',
		'setting'	=> 'foster_charity_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('foster_charity_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('foster_charity_youtube_url',array(
		'label'	=> __('Add Youtube link','foster-charity'),
		'section'	=> 'foster_charity_social_link',
		'setting'	=> 'foster_charity_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('foster_charity_linkdin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );	
	$wp_customize->add_control('foster_charity_linkdin_url',array(
		'label'	=> __('Add Linkdin link','foster-charity'),
		'section'	=> 'foster_charity_social_link',
		'setting'	=> 'foster_charity_linkdin_url',
		'type'	=> 'url'
	) );

	//home page slider
	$wp_customize->add_section( 'foster_charity_slider' , array(
    	'title'      => __( 'Slider Settings', 'foster-charity' ),
		'priority'   => null,
		'panel' => 'foster_charity_panel_id'
	) );

	$wp_customize->add_setting('foster_charity_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('foster_charity_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','foster-charity'),
      	'section' => 'foster_charity_slider',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'foster_charity_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'foster_charity_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'foster_charity_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'foster-charity' ),
			'section'  => 'foster_charity_slider',
			'type'     => 'dropdown-pages'
		) );

	}

	//How can you help
	$wp_customize->add_section('foster_charity_how_can_you_help',array(
		'title'	=> __('How Can You Help','foster-charity'),
		'description'	=> __('Add Service Section below.','foster-charity'),
		'panel' => 'foster_charity_panel_id',
	));

	$wp_customize->add_setting('foster_charity_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('foster_charity_section_title',array(
		'label'	=> __('Section title','foster-charity'),
		'section'	=> 'foster_charity_how_can_you_help',
		'setting'	=> 'foster_charity_section_title',
		'type'		=> 'text'
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';	
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('foster_charity_single_post',array(
		'default'	=> 'select',
		'sanitize_callback' => 'foster_charity_sanitize_choices',
	));
	$wp_customize->add_control('foster_charity_single_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','foster-charity'),
		'section' => 'foster_charity_how_can_you_help',
	));

	$wp_customize->add_setting('foster_charity_single_post1',array(
		'default'	=> 'select',
		'sanitize_callback' => 'foster_charity_sanitize_choices',
	));
	$wp_customize->add_control('foster_charity_single_post1',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select Post','foster-charity'),
		'section' => 'foster_charity_how_can_you_help',
	));

	$wp_customize->add_setting('foster_charity_single_post2',array(
		'default'	=> 'select',
		'sanitize_callback' => 'foster_charity_sanitize_choices',
	));
	$wp_customize->add_control('foster_charity_single_post2',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select Post','foster-charity'),
		'section' => 'foster_charity_how_can_you_help',
	));

	//Footer
	$wp_customize->add_section( 'foster_charity_footer' , array(
    	'title'      => __( 'Footer Text', 'foster-charity' ),
		'priority'   => null,
		'panel' => 'foster_charity_panel_id'
	) );

	$wp_customize->add_setting('foster_charity_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('foster_charity_footer_text',array(
		'label'	=> __('Add Copyright Text','foster-charity'),
		'section'	=> 'foster_charity_footer',
		'setting'	=> 'foster_charity_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'foster_charity_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'foster_charity_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'foster_charity_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @since Foster Charity 1.0
 * @see foster-charity_customize_register()
 *
 * @return void
 */
function foster_charity_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Foster Charity 1.0
 * @see foster-charity_customize_register()
 *
 * @return void
 */
function foster_charity_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function foster_charity_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Foster_Charity_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Foster_Charity_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Foster_Charity_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Foster Charity Pro', 'foster-charity' ),
					'pro_text' => esc_html__( 'Go Pro', 'foster-charity' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/charity-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'foster-charity-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'foster-charity-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Foster_Charity_Customize::get_instance();