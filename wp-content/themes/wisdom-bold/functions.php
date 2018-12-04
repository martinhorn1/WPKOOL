<?php
/**
 * Describe child theme functions
 *
 * @package Wisdom Blog
 * @subpackage Wisdom Bold
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wisdom_bold_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wisdom_bold_setup() {

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'wisdom_bold_top_menu' => esc_html__( 'Top Menu', 'wisdom-bold' )
        ) );

	    // theme version
        $wisdom_bold_theme_info = wp_get_theme();
	    $GLOBALS['wisdom_bold_version'] = $wisdom_bold_theme_info->get( 'Version' );

	}
	endif;

add_action( 'after_setup_theme', 'wisdom_bold_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wisdom_bold_fonts_url' ) ) :
	/**
	 * Register Google fonts for News Vibrant Mag.
	 *
	 * @return string Google fonts URL for the theme.
	 * @since 1.0.0
	 */
    function wisdom_bold_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Lora, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Lora font: on or off', 'wisdom-bold' ) ) {
            $font_families[] = 'Lora:400,700';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
	
if( ! function_exists( 'wisdom_bold_customize_register' ) ) :
	/**
	 * Managed the theme default color
	 */
	function wisdom_bold_customize_register( $wp_customize ) {
		
		global $wp_customize;

		$wp_customize->get_setting( 'wisdom_blog_theme_color' )->default = '#00bcd4';

        /**
         * Add Top Header Section
         */
        $wp_customize->add_section(
            'wisdom_blod_top_header_section',
            array(
                'priority'       => 10,
                'panel'          => 'wisdom_blog_header_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Top Header Section', 'wisdom-bold' )
            )
        );

        /**
         * Checkbox for Top Header Section
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'wisdom_blod_top_header_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'wisdom_blog_sanitize_checkbox',
            )
        );
        $wp_customize->add_control( new Wisdom_Blog_Toggle_Checkbox_Custom_Control(
            $wp_customize, 
            'wisdom_blod_top_header_option',
                array(
                    'label'         => __( 'Top Header', 'wisdom-bold' ),
                    'description'   => __( 'Option to control top header section.', 'wisdom-bold' ),
                    'section'       => 'wisdom_blod_top_header_section',
                    'settings'      => 'wisdom_blod_top_header_option',
                    'priority'      => 5
                )
            )
        );

	}
endif;

add_action( 'customize_register', 'wisdom_bold_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'wisdom_bold_scripts', 20 );

function wisdom_bold_scripts() {
    
    global $wisdom_bold_version;
    
    wp_enqueue_style( 'wisdom-bold-google-font', wisdom_bold_fonts_url(), array(), null );
    
    wp_dequeue_style( 'wisdom-blog-style' );
    wp_dequeue_style( 'wisdom-blog-responsive-style' );
    
	wp_enqueue_style( 'wisdom-blog-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $wisdom_bold_version ) );
    
    wp_enqueue_style( 'wisdom-blog-parent-responsive', get_template_directory_uri() . '/assets/css/cv-responsive.css', array(), esc_attr( $wisdom_bold_version ) );
    
    wp_enqueue_style( 'wisdom-bold', get_stylesheet_uri(), array(), esc_attr( $wisdom_bold_version ) );
    
    $wisdom_bold_theme_color = esc_attr( get_theme_mod( 'wisdom_blog_theme_color', '#00bcd4' ) );
    
    $output_css = '';
    
    $output_css .= ".edit-link .post-edit-link,.reply .comment-reply-link,.widget_search .search-submit,.widget_search .search-submit,article.sticky:before,.widget_search .search-submit:hover{ background: ". esc_attr( $wisdom_bold_theme_color ) ."}\n";
    
    $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.banner-btn a:hover,.entry-title a:hover,.entry-title a:hover,.cat-links a:hover,.wisdom_blog_latest_posts .cv-post-title a:hover{ color: ". esc_attr( $wisdom_bold_theme_color ) ."}\n";

    $output_css .= "widget_search .search-submit,.widget_search .search-submit:hover { border-color: ". esc_attr( $wisdom_bold_theme_color ) ."}\n";

    $refine_output_css = wisdom_blog_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'wisdom-bold', $refine_output_css );
    
}

/*-------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'wisdom_bold_top_header_section' ) ) :
    
    /**
     * Function to display top header section
     */

    function wisdom_bold_top_header_section() {

        $wisdom_blod_top_header_option = get_theme_mod( 'wisdom_blod_top_header_option', true );
        if( $wisdom_blod_top_header_option === false ) {
            return;
        }

?>
        <div class="cv-top-header-wrap">
            <div class="cv-container">
                
                <div class="cv-top-left-section">
                    <div class="date-section"><?php echo esc_html( date_i18n('l, F d, Y') ) ;?></div>
                    <div class="cv-top-header-social"><?php wisdom_blog_social_media(); ?></div>
                </div><!-- .cv-top-left-section -->
                
                <div class="cv-top-right-section">
                    <nav id="top-navigation" class="top-navigation" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'wisdom_bold_top_menu', 'menu_id' => 'top-menu', 'depth' => 1, 'fallback_cb' => false ) );
                        ?>
                    </nav><!-- #site-navigation -->
                </div><!-- .cv-top-right-section -->

            </div><!-- .cv-container -->
        </div><!-- .cv-top-header-wrap -->
<?php
    }

endif;

add_action( 'wisdom_blog_before_header', 'wisdom_bold_top_header_section', 10 );