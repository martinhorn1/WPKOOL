<?php
/**
 * traza Theme Customizer
 *
 * @package traza
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function traza_customize_register( $wp_customize ) {

	global $traza_options_array;
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'traza_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'traza_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_section( 'traza_settings', array(
		
		'title'      => __('Traza Settings', 'traza'),
		'priority'   => 20,
		'active_callback' => '',
		
	) );
	
	$wp_customize->add_setting( 'traza_slider_cat',
	 array(
		'default'    => 'select',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'traza_sanitize_category_select',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, //Pass the $wp_customize object (required)
	'traza_slider_cat', //Set a unique ID for the control
		array(
		'label'      => __( 'Slider Category', 'traza' ),
		'description' => __( 'Posts from this category will show up in slider.', 'traza'),
		'settings'   => 'traza_slider_cat',
		'priority'   => 10,
		'section'    => 'traza_settings',
		'type'    => 'select',
		'choices' => $traza_options_array['categories'],
	 	)
	) );
	
	$wp_customize->add_setting( 'traza_slider_num',
	 array(
		'default'    => '5',
		'capability' => 'edit_theme_options',
		 'sanitize_callback' => 'traza_sanitize_slider_slides',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'traza_slider_num', //Set a unique ID for the control
	 array(
		'label'      => __( 'How many slides', 'traza' ),
		'description' => __( 'Select how many slides to show in slider.', 'traza'),
		'settings'   => 'traza_slider_num',
		'priority'   => 20,
		'section'    => 'traza_settings',
		'type'    => 'select',
		'choices' => $traza_options_array['slides'],
	 )
	) );
	
	$wp_customize->add_setting( 'traza_home_cat_one',
	 array(
		'default'    => 'select',
		'capability' => 'edit_theme_options',
		 'sanitize_callback' => 'traza_sanitize_category_select',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'traza_home_cat_one', //Set a unique ID for the control
	 array(
		'label'      => __( 'Home Middle Column Category # 1', 'traza' ),
		'description' => __( 'Posts from this category will show up in middle column of homepage.', 'traza'),
		'settings'   => 'traza_home_cat_one',
		'priority'   => 30,
		'section'    => 'traza_settings',
		'type'    => 'select',
		'choices' => $traza_options_array['categories'],
	 )
	) );
	
	$wp_customize->add_setting( 'traza_home_cat_two',
	 array(
		'default'    => 'select',
		'capability' => 'edit_theme_options',
		 'sanitize_callback' => 'traza_sanitize_category_select',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'traza_home_cat_two', //Set a unique ID for the control
	 array(
		'label'      => __( 'Home Middle Column Category # 2', 'traza' ),
		'description' => __( 'Posts from this category will show up in middle column of homepage.', 'traza'),
		'settings'   => 'traza_home_cat_two',
		'priority'   => 40,
		'section'    => 'traza_settings',
		'type'    => 'select',
		'choices' => $traza_options_array['categories'],
	 )
	) );
	
	$wp_customize->add_setting( 'traza_home_cat_three',
	 array(
		'default'    => 'select',
		'capability' => 'edit_theme_options',
		 'sanitize_callback' => 'traza_sanitize_category_select',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'traza_home_cat_three', //Set a unique ID for the control
	 array(
		'label'      => __( 'Home Middle Column Category # 3', 'traza' ),
		'description' => __( 'Posts from this category will show up in middle column of homepage.', 'traza'),
		'settings'   => 'traza_home_cat_three',
		'priority'   => 50,
		'section'    => 'traza_settings',
		'type'    => 'select',
		'choices' => $traza_options_array['categories'],
	 )
	) );	
	
	
}
add_action( 'customize_register', 'traza_customize_register' );

$traza_options_array = array();
$traza_options_array['categories'] = array( 'select' => 'Select' );
$traza_options_array['slides'] = array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10' );

$traza_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $traza_categories_raw as $category ){
	
	$traza_options_array['categories'][$category->term_id] = $category->name;
	
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function traza_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function traza_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function traza_customize_preview_js() {
	wp_enqueue_script( 'traza-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'traza_customize_preview_js' );

function traza_sanitize_category_select( $value ){
	
	global $traza_options_array;
	
	if( ! array_key_exists( $value, $traza_options_array['categories'] ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function traza_sanitize_slider_slides( $value ){
	
	global $traza_options_array;
	
	if( ! array_key_exists( $value, $traza_options_array['slides'] ) ){
		
		$value = '5';
		
	}
	return $value;
	
}
