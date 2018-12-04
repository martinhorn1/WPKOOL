<?php
/**
* Customization options
**/
function digital_services_customize_register( $wp_customize ) { 

  $wp_customize->add_panel(
   'general_setting',
   array(
     'title' => esc_html__( 'General Settings', 'digital-services' ),
     'description' => esc_html__('General options','digital-services'),
     'priority' => 20, 
     )
  ); 

  $wp_customize->get_section('title_tagline')->panel = 'general_setting'; 
  $wp_customize->get_section('header_image')->panel = 'general_setting'; 
  $wp_customize->get_section('static_front_page')->panel = 'general_setting';
  $wp_customize->get_section('colors')->panel = 'styling';
/*   Header Section  */

/*
 * Multiple logo upload code
 */
$wp_customize->add_setting(
  'digital_services_dark_logo',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'digital_services_dark_logo', array(
  'section'     => 'title_tagline',
  'label'       => esc_html__( 'Upload Dark Logo' ,'digital-services'),
  'flex_width'  => true,
  'flex_height' => true,
  'width'       => 120,
  'height'      => 50,
  'priority'    => 40,
  'default-image' => '',
  ) ) );
$wp_customize->add_setting(
  'logo_height',
  array(
    'default' => '50',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'logo_height',
  array(
    'section' => 'title_tagline',
    'label'      => esc_html__('Enter Logo Size', 'digital-services'),
    'description' => esc_html__("Use if you want to increase or decrease logo size (optional) Don't add 'px' in the string. e.g. 20 (default: 10px)",'digital-services'),
    'type'       => 'text',
    'priority'  => 50,
    )
  );
$wp_customize->add_setting(
  'fixed_header',
  array(
    'default'    => false,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'digital_services_field_sanitize_checkbox',
    )
  );
$wp_customize->add_control(
  'fixed_header',
  array(
    'section' => 'title_tagline',
    'label'      => esc_html__('Fixed Header', 'digital-services'),
    'type'       => 'checkbox',
    'priority'  => 55,
    )
  );

$wp_customize->add_section(
    'digital_services_top_header',
    array(
      'title' => esc_html__('Top Header Section', 'digital-services'),
      'priority' => 120,
      'description' => esc_html__('Add business Email id and phone.', 'digital-services'),
      'panel' => 'general_setting'
      )
    );

$wp_customize->add_setting(
  'top_header_switch',
  array(
    'default'    => true,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'digital_services_field_sanitize_checkbox',
    )
  );
$wp_customize->add_control(
  'top_header_switch',
  array(
    'section' => 'digital_services_top_header',
    'label'      => esc_html__('Check this if you want Top Header hide .', 'digital-services'),
    'type'       => 'checkbox',
    'priority'  => 55,
    )
  );
$wp_customize->add_setting(
  'top_header_email',
  array(
    'default'    => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'top_header_email',
  array(
    'section' => 'digital_services_top_header',
    'label'      => esc_html__('Top header Email Id', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter Email Id','digital-services') ),
    'type'       => 'text',
    'priority'  => 55,
    )
  );
$wp_customize->add_setting(
  'top_header_phone',
  array(
    'default'    => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'top_header_phone',
  array(
    'section' => 'digital_services_top_header',
    'label'      => esc_html__('Top header Phone Number', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter phone number','digital-services') ),
    'type'       => 'text',
    'priority'  => 55,
    )
  );

/*   Header social setting  */
//All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'digital_services_social_links',
    array(
      'title' => esc_html__('Top Header Social Accounts', 'digital-services'),
      'priority' => 120,
      'description' => esc_html__('Enter the URL of your social accounts. Leave it empty to hide the icon.', 'digital-services'),
      'panel' => 'general_setting'
      )
    );
 $digital_services_social_icon = array();
for($i=1;$i <= 10;$i++):  
    $digital_services_social_icon[] =  array( 'slug'=>sprintf('digital_services_social_icon%d',$i),   
      'default' => '',   
      'label' => esc_html__( 'Social Account ', 'digital-services' ) . $i,
      'priority' => sprintf('%d',$i) );  
  endfor;
foreach($digital_services_social_icon as $digital_services_social_icons){
    $wp_customize->add_setting(
        $digital_services_social_icons['slug'],
        array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'type' => 'theme_mod',
          'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        $digital_services_social_icons['slug'],
        array(
            'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','digital-services') ),
            'section' => 'digital_services_social_links',
            'label'      =>   $digital_services_social_icons['label'],
            'priority' => $digital_services_social_icons['priority']
        )
    );
}
$digital_services_social_icon_links = array();
for($i=1;$i <= 10;$i++):  
    $digital_services_social_icon_links[] =  array( 'slug'=>sprintf('digital_services_social_icon_links%d',$i),   
      'default' => '',   
      'label' => esc_html__( 'Social Link ', 'digital-services' ) . $i,   
      'priority' => sprintf('%d',$i) );  
  endfor;

foreach($digital_services_social_icon_links as $digital_services_social_icons){
    $wp_customize->add_setting(
        $digital_services_social_icons['slug'],
        array(

            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        $digital_services_social_icons['slug'],
        array(
            'input_attrs' => array( 'placeholder' => esc_attr__('Enter URL','digital-services') ),
            'section' => 'digital_services_social_links',
            'priority' => $digital_services_social_icons['priority']
        )
    );
}

/*-------------------- Pre Loader Option --------------------------*/
$wp_customize->add_section( 'preloaderSection' , array(
    'title'       => esc_html__( 'Preloader', 'digital-services' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general_setting',
) );
$wp_customize->add_setting(
    'preloader',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'preloader',
    array(
        'section' => 'preloaderSection',                
        'label'   => esc_html__('Preloader','digital-services'),
        'type'    => 'radio',
        'choices'        => array(
            "1"   => esc_html__( "On ", 'digital-services' ),
            "2"   => esc_html__( "Off", 'digital-services' ),
        ),
    )
);

$wp_customize->add_setting( 'customPreloader', array(
    'sanitize_callback' => 'esc_url_raw',
    'capability'     => 'edit_theme_options',
    'priority' => 40,
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customPreloader', array(
    'label'    => esc_html__( 'Upload Custom Preloader', 'digital-services' ),
    'section'  => 'preloaderSection',
    'settings' => 'customPreloader',
) ) );

//----  Blog Settings -------
  $wp_customize->add_section( 'blog_settings' , array(
    'title'       => esc_html__( 'Blog (Archive) Settings', 'digital-services' ),
    'description' => esc_html__( 'These settings work for default blog pages like 404, search and etc., but it will not work with "Posts page". You can change "Posts page" settings by page option.','digital-services' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general_setting'
    ) ); 
  $wp_customize->add_setting(
  'blog_title',
  array(
    'default'    => esc_attr__('Blog','digital-services'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'blog_title',
  array(
    'section' => 'blog_settings',
    'label'      => esc_html__('Blog Title', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Blog','digital-services') ),
    'type'       => 'text',    
    )
  );
  $wp_customize->add_setting(
    'sidebar_style',
    array(
      'default' => 'right_sidebar',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      )
    );
  $wp_customize->add_control(
    'sidebar_style',
    array(
      'section' => 'blog_settings',
      'label'      => esc_html__('Sidebar Style', 'digital-services'),
      'type'       => 'select',
      'choices' => array(
        'no_sidebar'  => esc_html__('No Sidebar','digital-services'),
        'right_sidebar'  => esc_html__('Right Sidebar','digital-services'),
        'left_sidebar'  => esc_html__('Left Sidebar','digital-services'),
        ),
      )
    );
  
  //-------- Single Blog Settings -----
  $wp_customize->add_section( 'single_blog_settings' , array(
    'title'       => esc_html__( 'Single Blog (Archive) Settings', 'digital-services' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general_setting'
  ) );
  $wp_customize->add_setting(
    'single_sidebar_style',
    array(
      'default' => 'right_sidebar',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      )
    );
  $wp_customize->add_control(
    'single_sidebar_style',
    array(
      'section' => 'single_blog_settings',
      'label'      => esc_html__('Sidebar Style', 'digital-services'),
      'type'       => 'select',
      'choices' => array(
        'no_sidebar'  => esc_html__('No Sidebar','digital-services'),
        'right_sidebar'  => esc_html__('Right Sidebar','digital-services'),
        'left_sidebar'  => esc_html__('Left Sidebar','digital-services'),
        ),
      )
    );

/*-------------------- Home Page Option Setting --------------------------*/
$wp_customize->add_panel(
    'frontpage_section',
    array(
        'title' => esc_html__( 'Front Page Options', 'digital-services' ),
        'description' => esc_html__('Front Page options','digital-services'),
        'priority' => 20, 
    )
  );

$wp_customize->add_section( 'frontpage_slider_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Slider', 'digital-services' ),
      'priority'    => 32,
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

$wp_customize->add_setting(
    'frontpage_sliderswitch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'frontpage_sliderswitch',
    array(
        'section' => 'frontpage_slider_section',
        'label'      => esc_html__('Slider Section', 'digital-services'),
        'description' => esc_html__('Slider Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
  'frontpage_slider_category',
  array(
    'default' => 0 ,
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'frontpage_slider_category',
  array(
    'label' => esc_html__('Select Category For Slider','digital-services'),
    'section' => 'frontpage_slider_section',
    'type'    => 'select',
    'choices' => digital_services_posts_category(),
  )
);

$wp_customize->add_setting(
  'frontpage_slider_count',
  array(
    'default'    => 3,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control(
  'frontpage_slider_count',
  array(
    'section' => 'frontpage_slider_section',
    'label'      => esc_html__('Post Count', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter number. default 3','digital-services') ),
    'type'       => 'text',    
    )
  );
$wp_customize->add_setting(
  'frontpage_slider_readmore',
  array(
    'default'    => esc_attr__('Read More','digital-services'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'frontpage_slider_readmore',
  array(
    'section' => 'frontpage_slider_section',
    'label'      => esc_html__('Read More Text', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Default Read More','digital-services') ),
    'type'       => 'text',    
    )
  );


$wp_customize->add_setting(
    'frontpage_sliderindicator',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'frontpage_sliderindicator',
    array(
        'section' => 'frontpage_slider_section',
        'label'      => esc_html__('Slider indicator (hide/show)', 'digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
    'frontpage_slidercontrol',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'frontpage_slidercontrol',
    array(
        'section' => 'frontpage_slider_section',
        'label'      => esc_html__('Slider Navigation (hide/show)', 'digital-services'),        
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

/*Front Page : About us Section*/
$wp_customize->add_section(
  'aboutus_section',
  array(
    'title' => esc_html__('Front Page : About Us Section','digital-services'),
    'panel' => 'frontpage_section',
    'description' => esc_html__('Using this option you can display the category wise latest single post on about us Section.','digital-services'),
  )
);

$wp_customize->add_setting(
    'aboutus_sectionswitch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'aboutus_sectionswitch',
    array(
        'section' => 'aboutus_section',
        'label'      => esc_html__('AboutUs Section', 'digital-services'),
        'description' => esc_html__('about us Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
  'aboutus_category_title',
  array(
    'default' => esc_html__('About Us','digital-services'),
    'sanitize_callback' => 'sanitize_text_field',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'aboutus_category_title',
  array(
    'label' => esc_html__('Section Title','digital-services'),   
    'section' => 'aboutus_section',
    'type'    => 'text',
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter Section Title','digital-services') ),
  )
);
$wp_customize->add_setting(
  'aboutus_category_sub_title',
  array(
    'default' => esc_html__('About Us Sub title','digital-services'),
    'sanitize_callback' => 'sanitize_text_field',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'aboutus_category_sub_title',
  array(
    'label' => esc_html__('Section Sub Title','digital-services'),   
    'section' => 'aboutus_section',
    'type'    => 'text',
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter Section Sub Title','digital-services') ),
  )
);
$wp_customize->add_setting(
  'aboutus_category_content',
  array(
    'default' => esc_html__('About Us Content','digital-services'),
    'sanitize_callback' => 'wp_kses_post',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'aboutus_category_content',
  array(
    'label' => esc_html__('Section Content','digital-services'),   
    'section' => 'aboutus_section',
    'type'    => 'textarea',
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter Section Content','digital-services') ),
  )
);
$wp_customize->add_setting(
  'aboutus_category_img',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'aboutus_category_img', array(
  'section'     => 'aboutus_section',
  'label'       => esc_html__( 'About Us Image :' ,'digital-services'),
  'flex_width'  => true,
  'flex_height' => true,
  'width'       => 1200,
  'height'      => 600,
  'priority'    => 40,
  'default-image' => '',
  ) ) );

/* Front page Key Feature section */
$wp_customize->add_section( 'keyfeature_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Key Feature Section', 'digital-services' ),     
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_keyfeature_switch*/
$wp_customize->add_setting(
    'homepage_keyfeature_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'homepage_keyfeature_switch',
    array(
        'section' => 'keyfeature_section',
        'label'      => esc_html__('Key Feature Section', 'digital-services'),
        'description' => esc_html__('Key Feature Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
  'homepage_keyfeature_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_keyfeature_category',
  array(
    'label' => esc_html__('Select Category For Key Feature','digital-services'),
    'section' => 'keyfeature_section',
    'type'    => 'select',
    'choices' => digital_services_posts_category(),
  )
);

for($i=1;$i <= 4;$i++):

$wp_customize->add_setting(
    'homepage_keyfeature'.$i.'_icon',
    array(
        'default'           => 'fa fa-bell',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    new Digital_Services_Fontawesome_Icon_Chooser(
    $wp_customize,
    'homepage_keyfeature'.$i.'_icon',
        array(
            'settings'      => 'homepage_keyfeature'.$i.'_icon',
            'section'       => 'keyfeature_section',
            'label'         => $i. esc_html__( ' Key Feature Icon ', 'digital-services' ),
        )
    )
);
endfor;

/* Front page Testimonial section */
$wp_customize->add_section( 'testimonial_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Testimonial Section', 'digital-services' ),      
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_Testimonial_switch*/
$wp_customize->add_setting(
    'homepage_testimonial_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'homepage_testimonial_switch',
    array(
        'section' => 'testimonial_section',
        'label'      => esc_html__('Testimonial Section', 'digital-services'),
        'description' => esc_html__('Testimonial Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
  'homepage_testimonial_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_testimonial_category',
  array(
    'label' => esc_html__('Select Category For Testimonial','digital-services'),
    'section' => 'testimonial_section',
    'type'    => 'select',
    'choices' => digital_services_posts_category(),
  )
);

$wp_customize->add_setting(
  'homepage_testimonial_count',
  array(
    'default'    => 3,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control(
  'homepage_testimonial_count',
  array(
    'section' => 'testimonial_section',
    'label'      => esc_html__('Post Count', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter number. default 3','digital-services') ),
    'type'       => 'text',    
    )
  );
  $wp_customize->add_setting(
  'testimonial_section_bg_img',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'testimonial_section_bg_img', array(
  'section'     => 'testimonial_section',
  'label'       => esc_html__( 'Testimonial Background Image :' ,'digital-services'),
  'flex_width'  => true,
  'flex_height' => true,
  'width'       => 1200,
  'height'      => 400,
  'priority'    => 40,
  'default-image' => '',
  ) ) );

/* Front page Service section */
$wp_customize->add_section( 'service_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Service Section', 'digital-services' ),     
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_service_switch*/
$wp_customize->add_setting(
    'homepage_service_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'homepage_service_switch',
    array(
        'section' => 'service_section',
        'label'      => esc_html__('Service Section', 'digital-services'),
        'description' => esc_html__('Service Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
  'homepage_service_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_service_category',
  array(
    'label' => esc_html__('Select Category For Service','digital-services'),
    'section' => 'service_section',
    'type'    => 'select',
    'choices' => digital_services_posts_category(),
  )
);

for($i=1;$i <= 4;$i++):

$wp_customize->add_setting(
    'homepage_service'.$i.'_icon',
    array(
        'default'           => 'fa fa-bell',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    new Digital_Services_Fontawesome_Icon_Chooser(
    $wp_customize,
    'homepage_service'.$i.'_icon',
        array(
            'settings'      => 'homepage_service'.$i.'_icon',
            'section'       => 'service_section',
            'label'         => $i. esc_html__( ' Service Icon ', 'digital-services' ),
        )
    )
);
endfor;

/*Front Page : Team Section*/
$wp_customize->add_section(
  'team_section',
  array(
    'title' => esc_html__('Front Page : Team Section','digital-services'),
    'panel' => 'frontpage_section',
    'description' => esc_html__('Using this option you can display Team Section.','digital-services'),
  )
);

/*digital_services_Team_sectionswitch*/
$wp_customize->add_setting(
    'team_section_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'team_section_switch',
    array(
        'section' => 'team_section',
        'label'      => esc_html__('Team Section', 'digital-services'),
        'description' => esc_html__('Team Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting( 'team_title',
    array(
        'default' => 'Our Team',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'priority' => 20, 
    )
);
$wp_customize->add_control( 'team_title',
    array(
        'section' => 'team_section',                
        'label'   => esc_html__('Team Section Title ','digital-services'),
        'type'    => 'text',
    )
);

$wp_customize->add_setting(
  'team_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'team_category',
  array(
    'label' => esc_html__('Select Category For Team','digital-services'),
    'section' => 'team_section',
    'type'    => 'select',
    'choices' => digital_services_posts_category(),
  )
);

for($i=1;$i <= 3;$i++):    
    for($j=1;$j<=3;$j++):
      $wp_customize->add_setting(
          'team_'.$i.$j.'_icon',
          array(
              'default'           => 'fa fa-facebook',
              'sanitize_callback' => 'sanitize_text_field',
              'transport'         => 'postMessage'
          )
      );
      $wp_customize->add_control(
          new Digital_Services_Fontawesome_Icon_Chooser(
          $wp_customize,
          'team_'.$i.$j.'_icon',
              array(
                  'settings'      => 'team_'.$i.$j.'_icon',
                  'section'       => 'team_section',
                  'label'         => $i. esc_html__( ' Team Member Social Icon ', 'digital-services' ).$j,
              )
          )
      );
      $wp_customize->add_setting( 'team_'.$i.$j.'_link',
          array(
              'capability'     => 'edit_theme_options',
              'sanitize_callback' => 'esc_url_raw',
              'priority' => 20, 
          )
      );
      $wp_customize->add_control( 'team_'.$i.$j.'_link',
          array(
              'section' => 'team_section',                
              'label'   => $i. esc_html__(' Team Member Social Link ','digital-services').$j,
              'type'    => 'text',
              'input_attrs' => array( 'placeholder' => esc_attr__('Enter facebook.com etc.','digital-services') ),
          )
      );
    endfor;
endfor;

/* Front page Portfolio section */
$wp_customize->add_section( 'portfolio_section' ,
   array(
      'title'       => esc_html__( 'Front Page : Portfolio Section', 'digital-services' ),      
      'capability'     => 'edit_theme_options', 
      'panel' => 'frontpage_section'   
  )
);

/*homepage_Portfolio_switch*/
$wp_customize->add_setting(
    'homepage_portfolio_switch',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'digital_services_field_sanitize_select',
    )
);
$wp_customize->add_control(
    'homepage_portfolio_switch',
    array(
        'section' => 'portfolio_section',
        'label'      => esc_html__('Portfolio Section', 'digital-services'),
        'description' => esc_html__('Portfolio Section hide or show .','digital-services'),
        'type'       => 'select',
        'choices' => array(
          "1"   => esc_html__( "Show", 'digital-services' ),
          "2"   => esc_html__( "Hide", 'digital-services' ),      
        ),
    )
);

$wp_customize->add_setting(
  'homepage_portfolio_category',
  array(
    'default' => 0,
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'capability'  => 'edit_theme_options',
  )
);
$wp_customize->add_control(
  'homepage_portfolio_category',
  array(
    'label' => esc_html__('Select Category For Portfolio','digital-services'),
    'section' => 'portfolio_section',
    'type'    => 'select',
    'choices' => digital_services_posts_category(),
  )
);

$wp_customize->add_setting(
  'homepage_portfolio_count',
  array(
    'default'    => 3,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control(
  'homepage_portfolio_count',
  array(
    'section' => 'portfolio_section',
    'label'      => esc_html__('Post Count', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('Enter number. default 3','digital-services') ),
    'type'       => 'text',    
    )
  );

$wp_customize->add_setting(
  'homepage_portfolio_view_all_link',
  array(
    'default'    => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
  );
$wp_customize->add_control(
  'homepage_portfolio_view_all_link',
  array(
    'section' => 'portfolio_section',
    'label'      => esc_html__('View Link ', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('http://example.com','digital-services') ),
    'type'       => 'text',    
    )
  );

$wp_customize->add_setting(
  'homepage_portfolio_view_all_link_text',
  array(
    'default'    => esc_html__('View All Portfolio', 'digital-services'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'homepage_portfolio_view_all_link_text',
  array(
    'section' => 'portfolio_section',
    'label'      => esc_html__('View Link Text', 'digital-services'),
    'input_attrs' => array( 'placeholder' => esc_attr__('View All Portfolio','digital-services') ),
    'type'       => 'text',    
    )
  );


/*------------------------  Styling -----------------------------------------*/
/*--------------  Coolr ---------------------------*/
$wp_customize->add_panel(
  'styling',
  array(
    'title' => __( 'Styling', 'digital-services' ),
    'description' => __('styling options','digital-services'),
    'priority' => 31, 
    )
  );
  
  $wp_customize->add_setting(
    'digital_services_theme_color',
    array(
      'default'           => '#f69323',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
      'digital_services_theme_color',
      array(
        'label'   => esc_html__( 'Theme Color', 'digital-services' ),
        'section' => 'colors',
      )
  ) );
  $wp_customize->add_setting(
    'digital_services_secondary_color',
    array(
      'default'           => '#333333',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
      'digital_services_secondary_color',
      array(
        'label'   => esc_html__( 'Secondary Color', 'digital-services' ),
        'section' => 'colors',
      )
  ) );
/*--------------  Typography ---------------------------*/
// Text Panel Starts Here 

$wp_customize->add_section( 'typography_text' , array(
  'title'       => esc_html__( 'Typography', 'digital-services' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'styling'
  ) );
// Text Font Type
$wp_customize->add_setting(
  'text_font_type',
  array(
    'default' => esc_html__('Open Sans', 'digital-services'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$text_font_choices = digital_services_get_font_choices();
$wp_customize->add_control(
  'text_font_type',
  array(
    'section' => 'typography_text',
    'label'      => esc_html__('Select Body Font Family', 'digital-services'),
    'type'       => 'select',
    'choices' => $text_font_choices,
    )
  );


//Menu Font Type
$wp_customize->add_setting(
  'menu_font_type',
  array(
    'default' => esc_html__('Open Sans', 'digital-services'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );

$wp_customize->add_control(
  'menu_font_type',
  array(
    'section' => 'typography_text',
    'label'      => esc_html__('Select Menu Font Family', 'digital-services'),
    'type'       => 'select',
    'choices' => $text_font_choices,
    )
  );

// Heading Font Type
$wp_customize->add_setting(
  'heading_font_type',
  array(
    'default' => esc_html__('Montserrat', 'digital-services'),
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
//$text_font_choices = digital_services_get_font_choices();
$wp_customize->add_control(
  'heading_font_type',
  array(
    'section' => 'typography_text',
    'label'      => esc_html__('Select Heading Font Family', 'digital-services'),
    'type'       => 'select',
    'choices' => $text_font_choices,
    )
  );
$wp_customize->add_setting( 'h1_font_size', array(
  'default'        => 42,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'h1_font_size', array(
  'label'   => esc_html__('H1 Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) );
$wp_customize->add_setting( 'h2_font_size', array(
  'default'        => 36,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'h2_font_size', array(
  'label'   => esc_html__('H2 Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) ); 
$wp_customize->add_setting( 'h3_font_size', array(
  'default'        => 30,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'h3_font_size', array(
  'label'   => esc_html__('H3 Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) ); 
$wp_customize->add_setting( 'h4_font_size', array(
  'default'        => 24,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'h4_font_size', array(
  'label'   => esc_html__('H4 Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) ); 
$wp_customize->add_setting( 'h5_font_size', array(
  'default'        => 20,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'h5_font_size', array(
  'label'   => esc_html__('H5 Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) );
$wp_customize->add_setting( 'h6_font_size', array(
  'default'        => 16,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'h6_font_size', array(
  'label'   => esc_html__('H6 Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) );
$wp_customize->add_setting( 'normal_font_size', array(
  'default'        => 14,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'normal_font_size', array(
  'label'   => esc_html__('Normal Text Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) );
$wp_customize->add_setting( 'menu_font_size', array(
  'default'        => 14,
  'sanitize_callback' => 'sanitize_text_field',
  'capability'     => 'edit_theme_options',
  ) );
$wp_customize->add_control( 'menu_font_size', array(
  'label'   => esc_html__('Menu Text Font Size','digital-services'),
  'section' => 'typography_text',
  'type'    => 'text',
  ) ); 

/* -----------------------  Footer Section --------------------------- */
$wp_customize->add_panel(
  'footer',
  array(
    'title' => esc_html__( 'Footer', 'digital-services' ),
    'description' => esc_html__('Footer options','digital-services'),
    'priority' => 35, 
    )
  );
$wp_customize->add_section( 'footer_widget_area' , array(
  'title'       => esc_html__( 'Footer Widget Area', 'digital-services' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_section( 'footer_social_section' , array(
  'title'       => esc_html__( 'Social Settings', 'digital-services' ),
  'description' => esc_html__( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.' , 'digital-services'),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );

$wp_customize->add_setting(
  'hide_footer_widget_bar',
  array(
    'default' => '1',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'priority' => 20, 
    )
  );
$wp_customize->add_control(
  'hide_footer_widget_bar',
  array(
    'section' => 'footer_widget_area',                
    'label'   => esc_html__('Hide Widget Area','digital-services'),
    'type'    => 'select',
    'choices'        => array(
      "1"   => esc_html__( "Show", 'digital-services' ),
      "2"   => esc_html__( "Hide", 'digital-services' ),
      ),
    )
  );
$wp_customize->add_setting(
  'footer_widget_style',
  array(
    'default' => '3',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'digital_services_field_sanitize_select',
    'priority' => 20, 
    )
  );
$wp_customize->add_control(
  'footer_widget_style',
  array(
    'section' => 'footer_widget_area',                
    'label'   => esc_html__('Select Widget Area','digital-services'),
    'type'    => 'select',
    'choices'        => array(
      "1"   => esc_html__( "2 column", 'digital-services' ),
      "2"   => esc_html__( "3 column", 'digital-services' ),
      "3"   => esc_html__( "4 column", 'digital-services' )
      ),
    )
  );
//Footer Section
$wp_customize->add_section( 'footer_copyright' , array(
  'title'       => esc_html__( 'Footer Copyright Area', 'digital-services' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_setting(
  'copyright_area_text',
  array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => 20, 
    )
  );
$wp_customize->add_control(
  'copyright_area_text',
  array(
    'section' => 'footer_copyright',                
    'label'   => esc_html__('Enter Copyright Text','digital-services'),
    'type'    => 'textarea',
    )
  );
// Text Panel Starts Here 

}
add_action( 'customize_register', 'digital_services_customize_register' );

if( class_exists( 'WP_Customize_Control' ) ):

/* Class for icon selector */

class Digital_Services_Fontawesome_Icon_Chooser extends WP_Customize_Control{
    public $type = 'icon';

    public function render_content(){
        ?>
            <label>
                <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php } ?>

                <div class="digital-services-selected-icon">
                    <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="digital-services-icon-list clearfix">
                    <?php
                    $digital_services_font_awesome_icon_array = digital_services_font_awesome_icon_array();
                    foreach ($digital_services_font_awesome_icon_array as $digital_services_font_awesome_icon) {
                            $icon_class = $this->value() == $digital_services_font_awesome_icon ? 'icon-active' : '';
                            echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $digital_services_font_awesome_icon ).'"></i></li>';
                        }
                    ?>
                </ul>
                <input type="hidden" value="<?php echo esc_attr($this->value()); ?>" <?php echo esc_url($this->link()); ?> />
            </label>
        <?php
    }
}
endif;
function digital_services_field_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

function digital_services_field_sanitize_select( $input, $setting ) {
  
  $input = sanitize_key( $input );
 
  $choices = $setting->manager->get_control( $setting->id )->choices;
 
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function digital_services_custom_css(){ 
  wp_enqueue_style('digital-services-style', get_stylesheet_uri(), array());
  $custom_css='';
  $custom_css .='body{
    font-family: '.esc_attr(get_theme_mod('text_font_type','Open Sans')).', sans-serif;
  }
  .bg-sec{
    background-image:url('.get_header_image().');
    background-size: cover;
    background-repeat: no-repeat;
  }
  .sow-headline,h1 a,h1,h2 a,h2,h3 a,h3,h4 a,h4,h5 a,h5,h6 a,h6,p.title,.button-base a,
  .footer-box .widget-title {
   font-family: '.esc_attr(get_theme_mod('heading_font_type','Montserrat')).', sans-serif;
  }

  .sow-headline,h1 a,h1,h2 a,h2,h3 a,h3,h4 a,h4,h5 a,h5,h6 a,h6,p.title,.button-base a,
  .blog-content .title-data a,.title-data a.blogTitle,.main-sidebar h5, .process-icon h3 a, .slider-sec .carousel-caption h3 a, #testimonial-section .item .demo-text h2 a, #what-we-do .card .card-block h3.card-title a, #what-we-do .card .card-block a, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_tag_cloud .tagcloud a:hover, .footer-section .widget_tag_cloud.block-md .tagcloud a:hover, footer a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_archive ul li a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_archive ul li a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_pages ul li a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_meta ul li a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_recent_comments ul li a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_recent_entries ul li a:hover, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_nav_menu ul li a:hover, .footer-section .widget_archive ul li a:hover, .footer-section .widget_pages ul li a:hover, .footer-section .widget_meta ul li a:hover, .footer-section .widget_recent_comments ul li a:hover, .footer-section .widget_nav_menu ul li a:hover, .process-icon .icon-number, .teamy__content h3 a, .slider-sec .carousel-caption h3 a:hover, #what-we-do .card .card-block a > i, .teamy:hover .teamy__back .teamy__back-inner a, figcaption.wp-caption-text a, .blog-main .item-holder .text-area .content-text .text p a, .blog-section .item-holder a, td#today, .comment-section .comments-area article.comment-body .reply a:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .tt-sidebar-wrapper.right-sidebar .calendar_wrap table tfoot tr td a, .footer-section .widget_calendar .calendar_wrap table tfoot tr td a { color: '.esc_attr(get_theme_mod('digital_services_theme_color','#f69323')).';}

  .top-nav, .slider-sec .carousel-indicators .active, .process-icon:hover .icon_bigger, .portfoilo-sec .overlay, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_tag_cloud .tagcloud a, .footer-section .widget_tag_cloud.block-md .tagcloud a, .slider-sec .carousel-caption a, .slider-sec .carousel-control .icon-prev, .slider-sec .carousel-control .icon-next, .slider-sec .carousel-control .fa-chevron-left, .slider-sec .carousel-control .fa-chevron-right, .blog-section .item-holder .date-box span, .searchform button.btn:hover, .searchform button.btn:focus, .comments-wrapper .comment-reply-title::after, .comments-wrapper .comments-title::after, .tt-sidebar-wrapper .widget-title::after, button, html input[type="button"], input[type="reset"], input[type="submit"] { background: '.esc_attr(get_theme_mod('digital_services_theme_color','#f69323')).'; background-color: '.esc_attr(get_theme_mod('digital_services_theme_color','#f69323')).';}

  .slider-sec .carousel-indicators .active, .section--title h2, .footer-section .block-title, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_tag_cloud .tagcloud a:hover, .footer-section .widget_tag_cloud.block-md .tagcloud a:hover, .searchform input, .tt-sidebar-wrapper.right-sidebar aside.widget.widget_search form button.btn, .footer-section .widget_search form button.btn, .searchform button.btn, .searchform input:focus, .searchform input:hover, .tt-sidebar-wrapper .widget, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {border-color: '.esc_attr(get_theme_mod('digital_services_theme_color','#f69323')).';}

  #what-we-do .card .card-block i, .teamy__post, .teamy__post a, .teamy:hover .teamy__back .teamy__back-inner a:hover, .comment-section .comments-area article.comment-body .reply a { color: '.esc_attr(get_theme_mod('digital_services_secondary_color','#333333')).';}

  .process-icon .icon_bigger, header, .footer-section, #cssmenu, #cssmenu ul ul li, #cssmenu ul ul li.has-sub:hover, #cssmenu ul li.has-sub ul li.has-sub ul li:hover, footer, #cssmenu .submenu-button.submenu-opened, #cssmenu ul li:hover, #cssmenu ul ul li:hover, .footer-section .widget_archive select, .footer-section .widget_categories select, .footer-section select { background: '.esc_attr(get_theme_mod('digital_services_secondary_color','#333333')).'; background-color: '.esc_attr(get_theme_mod('digital_services_secondary_color','#333333')).';}

  .blog-content .readMore{ color: '.esc_attr(get_theme_mod('digital_services_secondary_color','#333333')).';
  border-color: '.esc_attr(get_theme_mod('digital_services_secondary_color','#333333')).';
  }  

  #cssmenu {
  font-family: '.esc_attr(get_theme_mod('menu_font_type','Open Sans')).', sans-serif;
  }
  h1, .h1{
    font-size: '.esc_attr(get_theme_mod('h1_font_size','42')).'px;
  }
  h2,.h2{
    font-size: '.esc_attr(get_theme_mod('h2_font_size','36')).'px;
  }
  h3,.h3{
    font-size: '.esc_attr(get_theme_mod('h3_font_size','30')).'px;
  }
  h4,.h4,.title-data a h1,.title-data a.blogTitle{
    font-size: '.esc_attr(get_theme_mod('h4_font_size','24')).'px;
  }
  h5,.h5{
    font-size: '.esc_attr(get_theme_mod('h5_font_size','20')).'px;
  }
  h6,.h6{
    font-size: '.esc_attr(get_theme_mod('h6_font_size','16')).'px;
  }
  p, span, li, a,.package-header h4 span,.main-sidebar ul li a{
    font-size: '.esc_attr(get_theme_mod('normal_font_size','14')).'px;
  }
  #cssmenu ul li a{
    font-size: '.esc_attr(get_theme_mod('menu_font_size','14')).'px;
  }
  body{
    background: '.esc_attr(get_theme_mod('body_background_color', '#ffffff')).';
  }
  body, p, time,ul, li{
    color: '.esc_attr(get_theme_mod('body_text_color','#424242')).';
  }
  ';  
  $logo_height = (get_theme_mod('logo_height'))?(get_theme_mod('logo_height')):55;
  $custom_css .=".brand .logo-fixed img, .brand .custom-logo-link .logo-dark {
    max-height: ".esc_attr($logo_height)."px;
      }";

  /* Preloader */
  if(get_theme_mod('preloader') == 2) :
    $custom_css .='.preloader-block .preloader-custom-gif, .preloader-block .preloader-gif,.preloader-block{ background:none !important; }';
  endif;
  if(get_theme_mod('custom_preloader') != '' && get_theme_mod('preloader') != 2 ) : 
    $custom_css .='.preloader-block .preloader-custom-gif, .preloader-block .preloader-gif{  background: url('.esc_url(get_theme_mod('custom_preloader')).'); background-repeat: no-repeat; }';
  endif; 
  /* end Preloader */

  wp_add_inline_style('digital-services-style',$custom_css);

  $header_fix = get_theme_mod('fixed_header',0);
        $script_js = '';
        if($header_fix == 1){
      $script_js.="jQuery(window).scroll(function() { if (jQuery(window).scrollTop()> 50) {jQuery('.home-nav').addClass('fixed-header', 1000, 'easeInOutSine');} else {  jQuery('.home-nav').removeClass('fixed-header', 1000, 'easeInOutSine');}});";         
        }
  wp_add_inline_script( 'digital-services-custom', $script_js );

}
function digital_services_posts_category(){
  $args = array('parent' => 0);
  $categories = get_categories($args);
  $category = array();
  $category[0] = esc_html__('All Category','digital-services');
  $i = 0;
  foreach($categories as $categorys){
      if($i==0){
          $default = $categorys->slug;
          $i++;
      }
      $category[$categorys->term_id] = $categorys->name;
  }
  return $category;
}

function digital_services_sanitize_select( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function digital_services_customize_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');   
    wp_enqueue_style( 'digital-services-admin-style',get_template_directory_uri().'/css/admin.css', '1.0', 'screen' );    
    wp_enqueue_script( 'digital-services-admin-js', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'digital_services_customize_scripts' );