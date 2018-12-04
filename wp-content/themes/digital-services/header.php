<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>> 
    <div class="preloader-block"><span class="preloader-gif"></span> </div>
    <?php if(get_theme_mod('top_header_switch',true) == true ): ?>
    <div class="top-nav ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="top-right">
                        <?php if(get_theme_mod('top_header_email','') != '' || get_theme_mod('top_header_phone','') != '' ): ?>
                        <ul>
                            <?php if(get_theme_mod('top_header_email','') != ''): ?>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html(get_theme_mod('top_header_email',''));  ?></li>
                            <?php endif; 
                            if(get_theme_mod('top_header_phone','') != '' ): ?>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html(get_theme_mod('top_header_phone',''));  ?></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="top-left">
                        <ul>
                            <?php for($i=1; $i<=10; $i++) :
                            if(get_theme_mod('digital_services_social_icon'.$i) != '' && get_theme_mod('digital_services_social_icon_links'.$i) != '' ): ?>
                                <li>
                                    <a href="<?php echo esc_url(get_theme_mod('digital_services_social_icon_links'.$i)); ?>" class="fb" title="" target="_blank">
                                        <i class="fa <?php echo esc_attr(get_theme_mod('digital_services_social_icon'.$i)); ?>"></i>
                                    </a>
                                </li>
                            <?php endif;
                            endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php endif; ?>
    <header class="home-nav">
        <div class="container">
        <nav id='cssmenu'>
            <div class="brand">
                    <?php if(has_custom_logo()){
                        the_custom_logo();
                    }
                    if(get_theme_mod('header_text',true)): 
                      echo '<div class="logo-light "><a href="'.esc_url( home_url('/')).'" rel="home" class="brand_text site-title"><h4 class="custom-logo ">'.esc_html(get_bloginfo('name')).'</h4></a><h6 class="custom-logo site-description">'.esc_html(get_bloginfo('description')).'</h6></div>';
                    ?>                    
                <?php endif; ?>
            </div>
            <div id="head-mobile"></div>
            <div class="button"></div>
            <?php if (has_nav_menu('top-menu')) :
             $digital_services_defaults = array(
                'theme_location' => 'top-menu',
                'container' => false,
                'items_wrap' => '<ul class="offside">%3$s</ul>',
            );
            wp_nav_menu($digital_services_defaults);
            else :
                wp_nav_menu(
                    array(
                      'theme_location' => 'top-menu',
                      'fallback_cb'    => 'digital_services_default_menu'
                )); 
            endif;?>
        </nav>
        </div>
    </header>   