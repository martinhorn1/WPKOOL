<?php
/**
 * Posts List Widget
 *
 * @package           Hootkit
 * @subpackage        Hootkit/admin
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class HootKit_Posts_List_Widget
 */
class HootKit_Posts_List_Widget extends HootKit_WP_Widget {

	function __construct() {

		$settings['id'] = 'hootkit-posts-list';
		$settings['name'] = __( 'HootKit > Posts List', 'hootkit' );
		$settings['widget_options'] = array(
			'description'	=> __( 'Display Posts List (all or specific category)', 'hootkit' ),
			// 'classname'		=> 'hoot-post-list-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			'title' => array(
				'name'		=> __( 'Title (Optional)', 'hootkit' ),
				'desc'		=> __( 'Leave empty to display category name', 'hootkit' ),
				'type'		=> 'text',
			),
			'style' => array(
				'name'		=> __( 'List Style', 'hootkit' ),
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> hootkit()->uri . 'assets/images/posts-list-style-1.png',
					'style2'	=> hootkit()->uri . 'assets/images/posts-list-style-2.png',
					//'style3'	=> hootkit()->uri . 'assets/images/posts-list-style-3.png',
				),
			),
			'category' => array(
				'name'		=> __( 'Category', 'hootkit' ),
				'desc'		=> __( 'Leave empty to display posts from all categories.', 'hootkit' ),
				'type'		=> 'select',
				'options'	=> array( '0' => '' ) + (array)Hoot_List::categories('category'),
			),
			'viewall' => array(
				'name'		=> __( "'View All Posts' link", 'hootkit' ),
				'desc'		=> __( 'Links to your Blog page. If you have a Category selected below, then this will link to the Category Archive page.', 'hootkit' ),
				'type'		=> 'select',
				'std'		=> 'none',
				'options'	=> array(
					'none'		=> __( 'Do not display', 'hootkit' ),
					'top'		=> __( 'Show at Top', 'hootkit' ),
					'bottom'	=> __( 'Show at Bottom', 'hootkit' ),
				),
			),
			'columns' => array(
				'name'		=> __( 'No. Of Columns', 'hootkit' ),
				'type'		=> 'smallselect',
				'std'		=> '1',
				'options'	=> array(
					'1'	=> __( '1', 'hootkit' ),
					'2'	=> __( '2', 'hootkit' ),
					'3'	=> __( '3', 'hootkit' ),
				),
			),
			'count1' => array(
				'name'		=> __( 'Number of Posts - 1st Column', 'hootkit' ),
				'desc'		=> __( 'Default: 3', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'count2' => array(
				'name'		=> __( 'Number of Posts - 2nd Column', 'hootkit' ),
				'desc'		=> __( 'Default: 3<br>(if selected 2 or 3 columns above)', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'count3' => array(
				'name'		=> __( 'Number of Posts - 3rd Column', 'hootkit' ),
				'desc'		=> __( 'Default: 3<br>(if selected 3 columns above)', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'offset' => array(
				'name'		=> __( 'Skip Posts', 'hootkit' ),
				'desc'		=> __( 'Number of posts to skip from start (By default, the list starts from latest post)', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'seppost' => array(
				'name'		=> __( 'Individual Posts:', 'hootkit' ),
				// 'desc'		=> __( 'INDIVIDUAL POSTS', 'hootkit' ),
				'type'		=> 'separator',
			),
			'show_author' => array(
				'name'		=> __( 'Show Author', 'hootkit' ),
				'type'		=> 'checkbox',
				'std'		=> 1,
			),
			'show_date' => array(
				'name'		=> __( 'Show Post Date', 'hootkit' ),
				'type'		=> 'checkbox',
				'std'		=> 1,
			),
			'show_comments' => array(
				'name'		=> __( 'Show number of comments', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_cats' => array(
				'name'		=> __( 'Show Categories', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_tags' => array(
				'name'		=> __( 'Show tags', 'hootkit' ),
				'type'		=> 'checkbox',
			),
			'show_content' => array(
				'name'		=> __( 'Content', 'hootkit' ),
				'type'		=> 'select',
				'std'		=> 'none',
				'options'	=> array(
					'excerpt'	=> __( 'Display Excerpt', 'hootkit' ),
					'content'	=> __( 'Display Full Content', 'hootkit' ),
					'none'		=> __( 'None', 'hootkit' ),
				),
			),
			'excerpt_length' => array(
				'name'		=> __( 'Custom Excerpt Length', 'hootkit' ),
				'desc'		=> __( 'Select \'Display Excerpt\' in option above. Leave empty for default excerpt length.', 'hootkit' ),
				'type'		=> 'text',
				'settings'	=> array( 'size' => 3, ),
				'sanitize'	=> 'absint',
			),
			'firstpost' => array(
				'name'		=> __( 'First Post', 'hootkit' ),
				'type'		=> 'collapse',
				'settings'	=> array( 'state' => 'open' ),
				'fields'	=> array(
					'size' => array(
						'name'		=> __( 'Image Size', 'hootkit' ),
						'type'		=> 'select',
						'std'		=> 'medium',
						'options'	=> array(
							'thumb'		=> __( 'Thumbnail (like other posts)', 'hootkit' ),
							'small'		=> __( 'Rectangular Small', 'hootkit' ),
							'medium'	=> __( 'Rectangular Medium', 'hootkit' ),
							'big'		=> __( 'Rectangular Big', 'hootkit' ),
							'full'		=> __( 'Full (Non Cropped)', 'hootkit' ),
						),
					),
					'author' => array(
						'name'		=> __( 'Show Author', 'hootkit' ),
						'type'		=> 'checkbox',
						'std'		=> 1,
					),
					'date' => array(
						'name'		=> __( 'Show Post Date', 'hootkit' ),
						'type'		=> 'checkbox',
						'std'		=> 1,
					),
					'comments' => array(
						'name'		=> __( 'Show number of comments', 'hootkit' ),
						'type'		=> 'checkbox',
					),
					'cats' => array(
						'name'		=> __( 'Show Categories', 'hootkit' ),
						'type'		=> 'checkbox',
					),
					'tags' => array(
						'name'		=> __( 'Show tags', 'hootkit' ),
						'type'		=> 'checkbox',
					),
					'show_content' => array(
						'name'		=> __( 'Content', 'hootkit' ),
						'type'		=> 'select',
						'std'		=> 'excerpt',
						'options'	=> array(
							'excerpt'	=> __( 'Display Excerpt', 'hootkit' ),
							'content'	=> __( 'Display Full Content', 'hootkit' ),
							'none'		=> __( 'None', 'hootkit' ),
						),
					),
					'excerpt_length' => array(
						'name'		=> __( 'Custom Excerpt Length', 'hootkit' ),
						'desc'		=> __( 'Select \'Display Excerpt\' in option above. Leave empty for default excerpt length.', 'hootkit' ),
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3, ),
						'sanitize'	=> 'absint',
					),
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

		$settings = apply_filters( 'hootkit_posts_list_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Display the widget content
	 */
	function display_widget( $instance, $before_title = '', $title = '', $after_title = '' ) {
		// Allow theme/child-themes to use their own template
		$widget_template = hoot_get_widget( 'posts-list', false );
		// Use Hootkit template if theme does not have one
		$widget_template = ( $widget_template ) ? $widget_template : hootkit()->dir . 'template/widget-posts-list.php';
		// Fire up the template
		extract( $instance, EXTR_SKIP );
		if ( is_string( $widget_template ) && file_exists( $widget_template ) ) include ( $widget_template );
	}

}

/**
 * Register Widget
 */
function hootkit_posts_list_widget_register(){
	register_widget( 'HootKit_Posts_List_Widget' );
}
add_action( 'widgets_init', 'hootkit_posts_list_widget_register' );