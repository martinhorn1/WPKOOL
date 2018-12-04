<?php
/**
 * Content Posts Blocks Widget
 *
 * @package           Hootkit
 * @subpackage        Hootkit/admin
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class HootKit_Content_Posts_Blocks_Widget
 */
class HootKit_Content_Posts_Blocks_Widget extends HootKit_WP_Widget {

	function __construct() {

		$settings['id'] = 'hootkit-posts-blocks';
		$settings['name'] = __( 'HootKit > Posts Blocks', 'hootkit' );
		$settings['widget_options'] = array(
			'description'	=> __( 'Display Styled Content Blocks (Posts)', 'hootkit' ),
			// 'classname'		=> 'hoot-posts-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			'title' => array(
				'name'		=> __( 'Title (optional)', 'hootkit' ),
				'type'		=> 'text',
			),
			'style' => array(
				'name'		=> __( 'Blocks Style', 'hootkit' ),
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> hootkit()->uri . 'assets/images/content-block-style-1.png',
					'style2'	=> hootkit()->uri . 'assets/images/content-block-style-2.png',
					// 'style3'	=> hootkit()->uri . 'assets/images/content-block-style-3.png',
					'style4'	=> hootkit()->uri . 'assets/images/content-block-style-4.png',
				),
			),
			'category' => array(
				'name'		=> __( 'Category (Optional)', 'hootkit' ),
				'desc'		=> __( 'Leave empty to display posts from all categories.', 'hootkit' ),
				'type'		=> 'select',
				'options'	=> array( '0' => '' ) + (array)Hoot_List::categories('category'),
			),
			'columns' => array(
				'name'		=> __( 'No. Of Columns', 'hootkit' ),
				'type'		=> 'smallselect',
				'std'		=> '4',
				'options'	=> array(
					'1'	=> __( '1', 'hootkit' ),
					'2'	=> __( '2', 'hootkit' ),
					'3'	=> __( '3', 'hootkit' ),
					'4'	=> __( '4', 'hootkit' ),
					'5'	=> __( '5', 'hootkit' ),
				),
			),
			'count' => array(
				'name'		=> __( 'Number of Posts to show', 'hootkit' ),
				'desc'		=> __( 'Default: 4', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'offset' => array(
				'name'		=> __( 'Offset', 'hootkit' ),
				'desc'		=> __( 'Number of posts to skip from the start. Leave empty to start from the latest post.', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'show_author' => array(
				'name'		=> __( 'Show Author', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_date' => array(
				'name'		=> __( 'Show Post Date', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_comments' => array(
				'name'		=> __( 'Show number of comments', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_cats' => array(
				'name'		=> __( 'Show categories', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_tags' => array(
				'name'		=> __( 'Show tags', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'fullcontent' => array(
				'name'		=> __( 'Content', 'hootkit' ),
				'type'		=> 'select',
				'std'		=> 'excerpt',
				'options'	=> array(
					'excerpt'	=> __( 'Display Excerpt', 'hootkit' ),
					'content'	=> __( 'Display Full Content', 'hootkit' ),
					'none'		=> __( 'None', 'hootkit' ),
				),
			),
			'excerptlength' => array(
				'name'		=> __( 'Custom Excerpt Length', 'hootkit' ),
				'desc'		=> __( 'Select \'Display Excerpt\' in option above. Leave empty for default excerpt length.', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'border' => array(
				'name'		=> __( 'Border', 'hootkit' ),
				'desc'		=> __( 'Top and bottom borders.', 'hootkit' ),
				'type'		=> 'select',
				'std'		=> 'none none',
				'options'	=> array(
					'line line'		=> __( 'Top - Line || Bottom - Line', 'hootkit' ),
					'line shadow'	=> __( 'Top - Line || Bottom - DoubleLine', 'hootkit' ),
					'line none'		=> __( 'Top - Line || Bottom - None', 'hootkit' ),
					'shadow line'	=> __( 'Top - DoubleLine || Bottom - Line', 'hootkit' ),
					'shadow shadow'	=> __( 'Top - DoubleLine || Bottom - DoubleLine', 'hootkit' ),
					'shadow none'	=> __( 'Top - DoubleLine || Bottom - None', 'hootkit' ),
					'none line'		=> __( 'Top - None || Bottom - Line', 'hootkit' ),
					'none shadow'	=> __( 'Top - None || Bottom - DoubleLine', 'hootkit' ),
					'none none'		=> __( 'Top - None || Bottom - None', 'hootkit' ),
				),
			),
			'customcss' => array(
				'name'		=> __( 'Widget Options', 'hootkit' ),
				'type'		=> 'collapse',
				'fields'	=> array(
					'class' => array(
						'name'		=> __( 'Custom CSS Class', 'hootkit' ),
						'desc'		=> __( 'Give this widget a custom css classname', 'hootkit' ),
						'type'		=> 'text',
					),
					'mt' => array(
						'name'		=> __( 'Margin Top', 'hootkit' ),
						'desc'		=> __( '(in pixels) Leave empty to load default margins', 'hootkit' ),
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3 ),
						'sanitize'	=> 'integer',
					),
					'mb' => array(
						'name'		=> __( 'Margin Bottom', 'hootkit' ),
						'desc'		=> __( '(in pixels) Leave empty to load default margins', 'hootkit' ),
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3 ),
						'sanitize'	=> 'integer',
					),
					'widgetid' => array(
						'name'		=> __( 'Widget ID', 'hootkit' ),
						'type'		=> '<span class="widgetid" data-baseid="' . $settings['id'] . '">' . __( 'Save this widget to view its ID', 'hootkit' ) . '</span>',
					),
				),
			),
		);

		$settings = apply_filters( 'hootkit_content_posts_blocks_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Display the widget content
	 */
	function display_widget( $instance, $before_title = '', $title = '', $after_title = '' ) {
		// Allow theme/child-themes to use their own template
		$widget_template = hoot_get_widget( 'content-posts-blocks', false );
		// Use Hootkit template if theme does not have one
		$widget_template = ( $widget_template ) ? $widget_template : hootkit()->dir . 'template/widget-content-posts-blocks.php';
		// Fire up the template
		extract( $instance, EXTR_SKIP );
		if ( is_string( $widget_template ) && file_exists( $widget_template ) ) include ( $widget_template );
	}

}

/**
 * Register Widget
 */
function hootkit_content_posts_blocks_widget_register(){
	register_widget( 'HootKit_Content_Posts_Blocks_Widget' );
}
add_action( 'widgets_init', 'hootkit_content_posts_blocks_widget_register' );