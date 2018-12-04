<?php
/**
 * Template Name: Front Page
 * @package Digital Services
 */
get_header(); ?>
<div class="digital-service-container">
    <?php 
    if(get_theme_mod('frontpage_sliderswitch',1)==1) :
       $category = get_theme_mod ( 'frontpage_slider_category',0);
       $perpost = get_theme_mod ( 'frontpage_slider_count',3);
       $arg = ($category>0)?array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => ($perpost+1),'category__in' => array($category)):array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => ($perpost+1));
       $counter=1;
       $section_sliderhomepage = new WP_Query($arg);
       $num = $section_sliderhomepage->post_count;  
       if ($section_sliderhomepage->have_posts()): ?>
    <section class="slider-sec">
        <div id="themeSlider" class="carousel slide" data-ride="carousel">
            <?php if(get_theme_mod('frontpage_sliderindicator',1)==1) : ?>
            <ol class="carousel-indicators">
                <?php for($i=0;$i<($num-1);$i++): ?>
                <li data-target="#themeSlider" data-slide-to="<?php echo esc_attr($i); ?>" class="<?php echo ($i==0)?'active':'';?>"></li>
                <?php endfor;?>
            </ol>
            <?php endif; ?>

            <div class="carousel-inner">
                <?php while ( $section_sliderhomepage->have_posts() ) : $section_sliderhomepage->the_post();
                    $featured_img_url = (has_post_thumbnail())?get_the_post_thumbnail_url(get_the_ID(),'full'):get_template_directory_uri().'/images/no-feature-image.jpg';        ?>
                <div class="item <?php echo ($counter==1)?'active':''?>" style="background-image:url(<?php echo esc_url($featured_img_url);?>);">
                    <div class="imgOverlay"></div>                    
                    <div class="carousel-caption">
                        <h3><a href="<?php the_permalink();?>"><?php echo esc_html(mb_strimwidth(get_the_title(), 0, 100, '...')); ?></a></h3>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink();?>"><?php echo esc_html(get_theme_mod ( 'frontpage_slider_readmore',esc_html__('Read more','digital-services')));?></a>
                    </div>
                </div>
               <?php $counter++; endwhile; wp_reset_postdata(); ?>               
            </div>
            <?php if(get_theme_mod('frontpage_slidercontrol',1)==1) : ?>
            <a class="left carousel-control" href="#themeSlider" data-slide="prev">
            <span class="fa fa-chevron-left"></span> </a>
            <a class="right carousel-control" href="#themeSlider" data-slide="next">
              <span class="fa fa-chevron-right"></span></a>
          <?php endif; ?>
        </div>
    </section>
    <?php  endif; endif; 
    /*   ------------------------  About us   ----------------------------------*/
        $aboutus_sectionswitch  = get_theme_mod ( 'aboutus_sectionswitch' ,1);
        if ( ( current_user_can( 'edit_theme_options' ) and empty( $aboutus_sectionswitch ) ) or $aboutus_sectionswitch == '1' ) : ?>
          <section class="about-sec">
            <div class="container">
                <div class="row">
                    <div class="section--title">
                        <h2 class="h2"><?php echo esc_html(get_theme_mod('aboutus_category_title',esc_html__('About Us','digital-services'))); ?></h2>
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12" data-aos="zoom-in-right">
                        <div class="about-title clearfix">
                            <?php if(get_theme_mod('aboutus_category_sub_title',esc_html__('About Us Sub title','digital-services') )!='') :?>
                            <h3><?php echo esc_html(get_theme_mod('aboutus_category_sub_title',esc_html__('About Us Sub title','digital-services'))); ?></h3>
                            <?php endif; if(get_theme_mod('aboutus_category_content')!='') : ?>
                             <p><?php echo wp_kses_post(get_theme_mod('aboutus_category_content')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12" data-aos="zoom-in-right">
                        <div class="about-img">                            
                            <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('aboutus_category_img'))); ?>" >
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php     endif; 
    // Get theme options values.
    /*   ------------------------  Key feature   ----------------------------------*/
    $homepage_keyfeature_switch  = get_theme_mod ( 'homepage_keyfeature_switch',1 );
    $keyfeature_category = get_theme_mod ( 'homepage_keyfeature_category',0);
    // Output featured content areas
        if ( is_front_page() ) {
        if ( ( current_user_can( 'edit_theme_options' ) and empty( $homepage_keyfeature_switch ) ) or $homepage_keyfeature_switch == '1' ) {        

        $arg = ($keyfeature_category>0)?array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => 4,'category__in' => array($keyfeature_category)):array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => 4);

        $section_keyfeaturehomepage = new WP_Query($arg);
        $homepage_keyfeature_columns = 3;

        $homepage_keyfeature_icon[]  = get_theme_mod ( 'homepage_keyfeature1_icon','fa fa-thumbs-up' );
        $homepage_keyfeature_icon[]  = get_theme_mod ( 'homepage_keyfeature2_icon','fa fa-desktop' );
        $homepage_keyfeature_icon[]  = get_theme_mod ( 'homepage_keyfeature3_icon','fa fa-gears' );
        $homepage_keyfeature_icon[]  = get_theme_mod ( 'homepage_keyfeature4_icon','fa fa-users' );

        $counter= 0; ?>
        <section class="keyfeatures-sec">
            <div class="container">
                <div class="section--title">
                    <h2 class="h2"><?php echo esc_html(get_theme_mod('keyfeature_title',esc_html__('Key Feature','digital-services'))); ?></h2>
                </div>
                <div class="row">
                <?php while ( $section_keyfeaturehomepage->have_posts() ) : $section_keyfeaturehomepage->the_post();
                $featured_img_url = (has_post_thumbnail())?get_the_post_thumbnail_url(get_the_ID(),'full'):get_template_directory_uri().'/images/no-feature-image.jpg'; ?>
                    <div class="col-lg-<?php echo esc_attr($homepage_keyfeature_columns); ?> col-md-6 text-center mb-sm-30 mb-xs-30">
                        <div class="process-icon icon_down">
                            <div class="icon-container">
                                <a href="<?php the_permalink(); ?>">
                                  <span class="icon_bigger">
                                    <i class="fa <?php echo esc_attr($homepage_keyfeature_icon[$counter]); ?>"> </i>
                                  </span>
                                </a>
                            </div>
                            <div class="text_-work">
                                <h3><a href="<?php the_permalink(); ?>">
                                    <strong class="icon-number"><?php echo esc_html($counter+1); ?>.</strong> <?php echo esc_html(mb_strimwidth(get_the_title(), 0, 40, '...')); ?>
                                </a></h3>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php $counter++; endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <?php
        }
    } 

    // Get theme options values.
    /*   ------------------------  testimonial   ----------------------------------*/
    $homepage_testimonial_switch  = get_theme_mod ( 'homepage_testimonial_switch',1 );
    $category = get_theme_mod ( 'homepage_testimonial_category',0);
    $post_per_slider = get_theme_mod ( 'homepage_testimonial_count',3);
    // Output featured content areas
        if ( is_front_page() ) {
        if ( ( current_user_can( 'edit_theme_options' ) and empty( $homepage_testimonial_switch ) ) or $homepage_testimonial_switch == '1' ) {        

        $arg = ($category>0)?array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => $post_per_slider,'category__in' => array($category)):array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => $post_per_slider);

        $section_testimonialhomepage = new WP_Query($arg);
        $counter= 0; ?>
        <section class="testimonial" style="background-image:url(<?php echo esc_url(wp_get_attachment_url(get_theme_mod('testimonial_section_bg_img'))); ?>)">
            <div class="testimonial-overlay">
            <div class="container">
                <div class="section--title">
                    <h2 class="h2"><?php echo esc_html(get_theme_mod('testimonial_title',esc_html__('Testimonial','digital-services'))); ?></h2>
                </div>
                <div id="testimonial-section" class="owl-carousel">
                    <?php while ( $section_testimonialhomepage->have_posts() ) : $section_testimonialhomepage->the_post();
                $featured_img_url = (has_post_thumbnail())?get_the_post_thumbnail_url(get_the_ID(),'full'):get_template_directory_uri().'/images/no-feature-image.jpg'; ?>
                    <div class="item" data-aos="zoom-in-right">
                        <div class="demo-img">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_url);?>"></a>
                        </div>
                        <div class="demo-text">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html(mb_strimwidth(get_the_title(), 0, 40, '...')); ?></a></h2>                            
                            <?php the_excerpt(); ?>
                        </div>
                    </div>                
                    <?php $counter++; endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        </section>       
        <?php
        }
    } 
    /*   ------------------------  Services   ----------------------------------*/
    $homepage_service_switch  = get_theme_mod ( 'homepage_service_switch',1 );
    $category = get_theme_mod ( 'homepage_service_category',0);
    // Output featured content areas
        if ( is_front_page() ) {
        if ( ( current_user_can( 'edit_theme_options' ) and empty( $homepage_service_switch ) ) or $homepage_service_switch == '1' ) {        

        $arg = ($category>0)?array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => 4,'category__in' => array($category)):array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => 4);

        $section_servicehomepage = new WP_Query($arg);
        $homepage_service_columns = 3;

        $homepage_service_icon[]  = get_theme_mod ( 'homepage_service1_icon','fa fa-thumbs-up' );
        $homepage_service_icon[]  = get_theme_mod ( 'homepage_service2_icon','fa fa-desktop' );
        $homepage_service_icon[]  = get_theme_mod ( 'homepage_service3_icon','fa fa-gears' );
        $homepage_service_icon[]  = get_theme_mod ( 'homepage_service4_icon','fa fa-users' );

        $counter= 0; ?>
        <section id="what-we-do">
        <div class="container">
            <div class="row">
                <div class="section--title">
                    <h2 class="h2"><?php echo esc_html(get_theme_mod('service_title',esc_html__('Our Service','digital-services'))); ?></h2>
                </div>
                <?php while ( $section_servicehomepage->have_posts() ) : $section_servicehomepage->the_post();
                $featured_img_url = (has_post_thumbnail())?get_the_post_thumbnail_url(get_the_ID(),'full'):get_template_directory_uri().'/images/no-feature-image.jpg'; ?>
                <div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr($homepage_service_columns); ?> col-lg-<?php echo esc_attr($homepage_service_columns); ?>">
                    <div class="card">
                        <div class="card-block block-1">
                            <i class="fa <?php echo esc_attr($homepage_service_icon[$counter]); ?>"></i>
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html(mb_strimwidth(get_the_title(), 0, 40, '...')); ?></a></h3>                           
                           <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php esc_html__('Read more','digital-services'); ?>" class="read-more"><?php esc_html_e('Read more','digital-services'); ?> <i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php $counter++; endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
        <?php
        }
    } 
    if(is_front_page()): 
    // Get theme options values.
    /*   ------------------------  team   ----------------------------------*/
    $team_section_switch  = get_theme_mod ( 'team_section_switch',1 );
    
    $category = get_theme_mod ( 'team_category',0);     
    $arg = ($category>0)?array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => 4,'category__in' => array($category)):array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => 4);

    $section_team = new WP_Query($arg);  
    $counter = 0; 

    $team_section_social=array();
    for($i=1;$i<=3;$i++):       
        $temparray=array();
        $temparray['1_icon']  = get_theme_mod ( 'team_'.$i.'1_icon');
        $temparray['1_link']  = get_theme_mod ( 'team_'.$i.'1_link');
        $temparray['2_icon']  = get_theme_mod ( 'team_'.$i.'2_icon');
        $temparray['2_link']  = get_theme_mod ( 'team_'.$i.'2_link');
        $temparray['3_icon']  = get_theme_mod ( 'team_'.$i.'3_icon');
        $temparray['3_link']  = get_theme_mod ( 'team_'.$i.'3_link');           
        $team_section_social[]=$temparray;     
    endfor; 

     if ( is_front_page() ) {
        if ( ( current_user_can( 'edit_theme_options' ) and empty( $team_section_switch ) ) or $team_section_switch == '1' ) {
        $total_team = $section_team->post_count;  ?>
        <section class="section1">
            <div class="our-team">
                <div class="container">
                    <div class="section--title">
                        <h2 class="h2"> <?php echo esc_html(get_theme_mod('team_title',esc_html__('Our Team','digital-services'))); ?></h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="main-container">
                    <div class="section__content teamy-team">
                         <?php while ( $section_team->have_posts() ) : $section_team->the_post(); ?>   
                        <article class="teamy teamy_style1 teamy_mask-circle teamy_zoom-rotate-photo">
                            <div class="teamy__layout">
                                <div class="teamy__preview">                                
                                    <?php if ( has_post_thumbnail() ) :
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                    <img src="<?php echo esc_url($featured_img_url);?>" class="teamy__avatar">                               
                                    <?php else: $image=get_template_directory_uri().'/images/no-feature-image.jpg'; ?>
                                    <img src="<?php echo esc_url($image);?>" class="teamy__avatar">                                
                                    <?php endif; ?>
                                </div>
                                <div class="teamy__back">
                                    <div class="teamy__back-inner">
                                        <?php if(isset($team_section_social[$counter]['1_icon']) && $team_section_social[$counter]['1_icon']!='' && isset($team_section_social[$counter]['1_link']) ):?>
                                        <a class="social" href="<?php echo esc_url($team_section_social[$counter]['1_link']);?>">
                                            <i class="<?php echo esc_attr($team_section_social[$counter]['1_icon']); ?>"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if(isset($team_section_social[$counter]['2_icon']) && $team_section_social[$counter]['2_icon']!='' && isset($team_section_social[$counter]['2_link']) ):?>
                                        <a class="social" href="<?php echo esc_url($team_section_social[$counter]['2_link']);?>">
                                            <i class="<?php echo esc_attr($team_section_social[$counter]['2_icon']); ?>"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if(isset($team_section_social[$counter]['3_icon']) && $team_section_social[$counter]['3_icon']!='' && isset($team_section_social[$counter]['3_link']) ):?>
                                        <a class="social" href="<?php echo esc_url($team_section_social[$counter]['3_link']);?>">
                                            <i class="<?php echo esc_attr($team_section_social[$counter]['3_icon']); ?>"></i>
                                        </a>
                                        <?php endif; ?>                                 
                                        <a class="social" href="<?php the_permalink(); ?>">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="teamy__content">
                                <h3 class="teamy__name"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                                <span class="teamy__post"><?php echo wp_kses_post(get_the_tag_list('',' ')); ?></span>
                            </div>
                        </article>                    
                       <?php $counter++;  endwhile; wp_reset_postdata(); ?> 
                    </div>
                </div>
            </div>
        </section>
  <?php }
   } 
   endif; 
    // Get theme options values.
   /*   ------------------------  Portfolio   ----------------------------------*/
    $homepage_portfolio_switch  = get_theme_mod ( 'homepage_portfolio_switch',1 );
    $category = get_theme_mod ( 'homepage_portfolio_category',0);
    $post_per_slider = get_theme_mod ( 'homepage_portfolio_count',3);
    // Output featured content areas
        if ( is_front_page() ) {
        if ( ( current_user_can( 'edit_theme_options' ) and empty( $homepage_portfolio_switch ) ) or $homepage_portfolio_switch == '1' ) {        

        $arg = ($category>0)?array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => $post_per_slider,'category__in' => array($category)):array('post_type' => 'post' ,'post_status' => 'publish', 'posts_per_page' => $post_per_slider);

        $section_portfoliohomepage = new WP_Query($arg);
        $counter= 0; ?>
        <section class="portfoilo-sec">
            <div class="container">
                <div class="section--title">
                    <h2 class="h2"><?php echo esc_html(get_theme_mod('portfolio_title',esc_html__('Portfolio','digital-services'))); ?></h2>
                </div>                
                <div id="portfolio-section" class="owl-carousel">
                    <?php while ( $section_portfoliohomepage->have_posts() ) : $section_portfoliohomepage->the_post();
                $featured_img_url = (has_post_thumbnail())?get_the_post_thumbnail_url(get_the_ID(),'full'):get_template_directory_uri().'/images/no-feature-image.jpg'; ?>
                    <div class="item" data-aos="zoom-in-right">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_url);?>" class="image"></a>
                        <div class="overlay">
                            <a href="<?php the_permalink(); ?>" class="icon" title="<?php esc_attr_e('User Profile','digital-services'); ?>">
                            <i class="fa fa-link"></i></a>
                        </div>
                    </div>               
                    <?php $counter++; endwhile; wp_reset_postdata(); ?>
                </div>
                
            </div>
            <?php if (get_theme_mod('homepage_portfolio_view_all_link','')!='' && get_theme_mod('homepage_portfolio_view_all_link_text',esc_attr__('View all portfoilo','digital-services'))!=''): ?>
            <div class="container">
                <div class="all-view" data-aos="zoom-in-right">
                    <a href="<?php echo esc_url(get_theme_mod('homepage_portfolio_view_all_link','#')); ?>"><?php echo esc_html(get_theme_mod('homepage_portfolio_view_all_link_text',esc_attr__('View all portfoilo','digital-services'))); ?></a>
                </div>
            </div>
        <?php endif; ?>
        </section>       
        <?php
        }
    } ?>       
</div>
<?php get_footer();