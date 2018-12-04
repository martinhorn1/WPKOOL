<?php
/**
 * General Variables available: $name, $params, $args, $content
 * $args has been 'extract'ed
 */

/* Do nothing if we dont have a template to show */
if ( !is_string( $slider_template ) || !file_exists( $slider_template ) )
	return;

/* Prevent errors : do not overwrite existing values */
$defaults = array( 'category' => '', 'count' => '', 'offset' => '', 'fullcontent' => '', 'excerptlength' => '', );
extract( $defaults, EXTR_SKIP );

/* Reset any previous slider */
global $hoot_data;
hoot_set_data( 'slider', array(), true );
hoot_set_data( 'slidersettings', array(), true );

/* Create slider settings object */
$slidersettings = array();
$slidersettings['type'] = 'postcarousel';
$slidersettings['source'] = 'slider-postcarousel.php';
$slidersettings['class'] = 'hootkitslider-postcarousel';
$slidersettings['adaptiveheight'] = 'true'; // Default Setting else adaptiveheight = false and class .= fixedheight
// https://github.com/sachinchoolur/lightslider/issues/118
// https://github.com/sachinchoolur/lightslider/issues/119#issuecomment-93283923
$slidersettings['slidemove'] = '1';
$pause = empty( $pause ) ? 5 : absint( $pause );
$pause = ( $pause < 1 ) ? 1 : ( ( $pause > 15 ) ? 15 : $pause );
$slidersettings['pause'] = $pause * 1000;
$items = intval( $items );
$slidersettings['item'] = ( empty( $items ) ) ? '3' : $items;

// Create a custom WP Query
$query_args = array();
$count = intval( $count );
$query_args['posts_per_page'] = ( empty( $count ) || $count > 4 ) ? 4 : $count;
$offset = intval( $offset );
if ( $offset )
	$query_args['offset'] = $offset;
if ( $category )
	$query_args['category'] = $category;
$query_args = apply_filters( 'hootkit_slider_postcarousel_query', $query_args, ( ( !isset( $instance ) ) ? array() : $instance ) );
$slider_posts_query = get_posts( $query_args );

/* Create Slides */
$slider = array();
$counter = 0;
global $post;
foreach ( $slider_posts_query as $post ) :
	setup_postdata( $post );
	$key = 'g' . $counter;
	$counter++;
	$slider[$key]['image']      = ( has_post_thumbnail( $post->ID ) ) ? get_post_thumbnail_id( $post->ID ) : '';
	$slider[$key]['title']      = get_the_title( $post->ID );
	/*if ( $fullcontent === 'content' ) {
		$slider[$key]['caption'] = get_the_content();
	} else*/
	if( $fullcontent === 'excerpt' ) {
		$excerptlength = intval( $excerptlength );
		if ( function_exists( 'hoot_remove_readmore_link' ) ) hoot_remove_readmore_link();
		if( !empty( $excerptlength ) )
			$slider[$key]['caption'] = hoot_get_excerpt( $excerptlength );
		else
			$slider[$key]['caption'] = apply_filters( 'the_excerpt', get_the_excerpt() );
		if ( function_exists( 'hoot_reinstate_readmore_link' ) ) hoot_reinstate_readmore_link();
	}
	// $slider[$key]['button']     = ( function_exists( 'hoot_get_mod' ) ) ? hoot_get_mod('read_more') : __( 'Know More', 'hootkit' );
	$slider[$key]['url']        = esc_url( get_permalink( $post->ID ) );
endforeach;
wp_reset_postdata();

/* Set Slider */
hoot_set_data( 'slider', $slider, true );
hoot_set_data( 'slidersettings', $slidersettings, true );

/* Let developers alter slider */
do_action( 'hootkit_slider_loaded', 'postcarousel', ( ( !isset( $instance ) ) ? array() : $instance ) );

/* Finally get Slider Template HTML */
include ( $slider_template );