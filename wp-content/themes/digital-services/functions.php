<?php
function digital_services_setup() {
	load_theme_textdomain( 'digital-services',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'digital-services-blog-image', $width = 750, $height = 500, true );
	
	register_nav_menus( array(
		'top-menu'    => esc_html__( 'Top Menu', 'digital-services' ),
	) );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*default header image*/
  $digital_services_defaults = array(
      'default-image'          => get_template_directory_uri().'/images/digital-services-bg.jpeg',
      'width'=> 0,'height'=> 0,'flex-height'=> 1400,'flex-width'=> 800,
      'uploads'=> true,'random-default'=> false,'header-text'=> false,'default-text-color' => '',
      'wp-head-callback'       => '','admin-head-callback'    => '', 'admin-preview-callback' => '',);
  register_default_headers( array(
    'default-image' => array(
        'url'           => get_template_directory_uri().'/images/digital-services-bg.jpeg',
        'thumbnail_url' => get_template_directory_uri().'/images/digital-services-bg.jpeg',
        'description'   => __( 'Default Header Image', 'digital-services' ) ),
  ) );
  add_theme_support('custom-header',$digital_services_defaults);

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'digital_services_setup' );
function digital_services_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'digital_services_content_width', 640 );
}
add_action( 'after_setup_theme', 'digital_services_content_width', 0 );

add_filter('get_custom_logo','digital_services_change_logo_class');
function digital_services_change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $html);
	$html = str_replace('width=', 'original-width=', $html);
	$html = str_replace('height=', 'original-height=', $html);
	$html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $html);
	return $html;
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digital_services_widgets_init() {
	register_sidebar( array(
		'name'          		=> esc_html__( 'Sidebar', 'digital-services' ),
		'id'            		=> 'sidebar-1',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your sidebar.', 'digital-services' ),
		'before_widget' 		=> '<aside id="%1$s" class="widget %2$s" data-aos="fade-up">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Footer 1', 'digital-services' ),
		'id'            		=> 'footer-1',
		'romana_description'	=> esc_html__( 'Add widgets here to appear in your footer.', 'digital-services' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s block-md">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h2 class="block-title">',
		'after_title'   		=> '</h2>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 2', 'digital-services' ),
		'id'            		=> 'footer-2',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'digital-services' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s block-md">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h2 class="block-title">',
		'after_title'   		=> '</h2>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 3', 'digital-services' ),
		'id'            		=> 'footer-3',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'digital-services' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s block-md">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h2 class="block-title">',
		'after_title'   		=> '</h2>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 4', 'digital-services' ),
		'id'            		=> 'footer-4',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'digital-services' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s block-md">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h2 class="block-title">',
		'after_title'   		=> '</h2>',
	) );
}
add_action( 'widgets_init', 'digital_services_widgets_init' );
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'digital_services_register_required_plugins' );
function digital_services_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','digital-services'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','digital-services'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => __('Contact Form 7','digital-services'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'id'           => 'digital-services',
        'default_path' => '',
        'menu'         => 'digital-services-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Recommended Plugins', 'digital-services' ),
           'menu_title'                      => __( 'Install Plugins', 'digital-services' ),
           'oops'                            => __( 'Something went wrong with the plugin API.', 'digital-services' ),          
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','digital-services' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','digital-services' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'digital-services' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'digital-services' ),
           
           'nag_type'                        => 'updated'
        )
      );
      tgmpa( $plugins, $config );
    }
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function digital_services_excerpt_more( $link ) {
	if(is_front_page()){return ''; }
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf(/* translator: 1 is permalink , 2 is Read more title. */ '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		esc_html__( 'Read More', 'digital-services' )
	);
	return $link;
}
add_filter( 'excerpt_more', 'digital_services_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function digital_services_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_html(get_bloginfo( 'pingback_url' )) );
	}
}
function digital_services_excerpt_length( $length ) {
        if ( is_admin() ) { return $length; }
        return 20;
}
add_filter( 'excerpt_length', 'digital_services_excerpt_length', 999 );
function digital_service_meta_data(){ 
	$digital_service_taglist = get_the_tag_list('', ', ' );?>
	<div class="blog-info clearfix">
        <div class="left-side">
            <div class="info">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html(ucfirst(get_the_author())); ?></a>                    
            </div>
        </div>
        <ul class="right-side">
            <li><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo esc_html(get_comments_number( get_the_ID())); ?></li>
        </ul>
    </div>
<?php }
add_action( 'wp_head', 'digital_services_pingback_header' );

add_action( 'admin_menu', 'digital_services_admin_menu');
function digital_services_admin_menu( ) {
    add_theme_page( __('WPDigiPro Suite','digital-services'), __('WPDigiPro Suite','digital-services'), 'manage_options', 'digital-services-pro-buynow', 'digital_services_pro_buy_now', 300 ); 
  
}
function digital_services_pro_buy_now(){ ?>  
  <div class="digital_services_pro_version">
  <a href="<?php echo esc_url('https://goo.gl/r6sjWA'); ?>" target="_blank">
    <img src ="<?php echo esc_url('http://d3itwt1jzx3aw2.cloudfront.net/wpdigipro-infographic.jpg') ?>" width="100%" height="auto" />
  </a>
</div>
<?php }

include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/theme-default-setup.php';
include get_template_directory().'/inc/fontawasome.php';
include get_template_directory().'/inc/breadcumbs.php';
include get_template_directory().'/inc/theme-customization.php';
include get_template_directory().'/inc/fonts.php';
include get_template_directory().'/inc/class-tgm-plugin-activation.php';