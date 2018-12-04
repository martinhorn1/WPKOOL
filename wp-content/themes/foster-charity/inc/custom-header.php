<?php
/**
 * Custom header implementation
 */

function foster_charity_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'foster_charity_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'foster_charity_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'foster_charity_custom_header_setup' );

if ( ! function_exists( 'foster_charity_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see foster_charity_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'foster_charity_header_style' );
function foster_charity_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #masthead{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'foster-charity-basic-style', $custom_css );
	endif;
}
endif; // foster_charity_header_style
