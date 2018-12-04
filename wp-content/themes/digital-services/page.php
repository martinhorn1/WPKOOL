<?php
/**
 * The template for displaying single page
 * @package Digital Services
 */
get_header(); 
$sidebar_style = get_theme_mod('single_sidebar_style','right_sidebar');
$column_classes =($sidebar_style == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-8 col-xs-12';?>
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
                    <?php if($sidebar_style == 'left_sidebar'){ get_sidebar(); } ?>
                    <div class="<?php echo esc_attr($column_classes); ?>">
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
                                        <div class="section-title">
                                            <h2><?php the_title(); ?></h2>
                                        </div>
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
                   <?php if($sidebar_style == 'right_sidebar'){ get_sidebar(); } ?>
                </div>
            </div>
        </div>
    </section>    
<?php get_footer();