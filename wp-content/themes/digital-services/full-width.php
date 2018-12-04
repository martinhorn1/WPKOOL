<?php
/**
 * Template Name: Full Width
 * @package Digital Services
 */
get_header(); ?>
<section class="bg-sec image-bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="page-header--breadcrumb woo-breadcrumbs">
                    <?php digital_services_custom_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-section style-two">
        <div class="container">
            <div class="row">
                <div class="blog-main">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" class="left-side <?php post_class('post-publish'); ?>">
                            <div class="item-holder">
                                <div class="image-box">
                                    <?php if(has_post_thumbnail()):
                                        the_post_thumbnail(); 
                                    endif; ?>                                    
                                </div>
                                <div class="text-area">
                                    <div class="content-text">                                        
                                        <div class="text">
                                           <?php the_content(); ?> 
                                        </div>
                                    </div>                                    
                                </div>                                
                            </div>                            
                        </div>
                      <?php  endwhile;
                      endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>    
<?php get_footer();