<?php function digital_services_enqueues(){

	if(get_theme_mod( 'text_font_type' ,'Open Sans') != '' || get_theme_mod( 'menu_font_type','Open Sans' )!= '' || get_theme_mod( 'heading_font_type','Montserrat' ) != ''){
	    wp_enqueue_style( 'digital-services-google-fonts', digital_services_enqueue_google_font_url(), array(), null);
	  }

	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css', array() );
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css', array() );
	wp_enqueue_style('owl.carousel',get_template_directory_uri().'/css/owl.carousel.css', array() );
	
	wp_enqueue_style('digital-services-menu',get_template_directory_uri().'/css/menu.css', array(), null, false );
	wp_enqueue_style('digital-services-default',get_template_directory_uri().'/css/default.css', array(), null, false );
	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js', array('jquery'));
	wp_enqueue_script('owl.carousel',get_template_directory_uri().'/js/owl.carousel.js', array('jquery'));	

	wp_enqueue_script('digital-services-menu',get_template_directory_uri().'/js/menu.js', array('jquery'), null, false);
	wp_enqueue_script('digital-services-custom',get_template_directory_uri().'/js/custom.js', array('jquery'), null, false);

	digital_services_custom_css();
}
add_action('wp_enqueue_scripts','digital_services_enqueues');
/** Google Fonts **/
function digital_services_enqueue_google_font_url()  {
  $google_fonts = array();
  $google_fonts[] = get_theme_mod( 'text_font_type','Open Sans' );
  $google_fonts[] = get_theme_mod( 'menu_font_type','Open Sans' );
  $google_fonts[] = get_theme_mod( 'heading_font_type','Montserrat');
  
  $google_fonts = array_unique( $google_fonts );
  $i = 0;
  $params = '';
  foreach( $google_fonts as $google_font ) {    
      if( $i > 0 ) {
        $params .= '|';
      }
      $params .= $google_font . ':400,300,600,700,800';
      $i++;
    }
  $google_fonts_url = add_query_arg( 'family', urlencode( $params ), "https://fonts.googleapis.com/css");
  return $google_fonts_url;
}