<?php
/**
 * The template for displaying archive pages like categories, tags, authors, months
 * @package Digital Services
 */
get_header(); 
$sidebar_style = get_theme_mod('sidebar_style','right_sidebar');
$column_classes =($sidebar_style == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-8 col-xs-12'; ?>
	 <section class="bg-sec image-bg overlay">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="section-title">
	                    <h2><?php the_archive_title(); ?></h2>
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
                        <div class="item-holder">
                            <div class="image-box">
                                <?php if(has_post_thumbnail()): ?><a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'digital-services-blog-image', array('class' => '') ); ?>
                                </a><?php endif; ?>
                                <div class="date-box">
                                    <span><?php the_date(); ?></span>
                                </div>
                            </div>
                            <div class="text-area">
                                <div class="content-text text-center">
                                    <div class="sec-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <h5><?php the_title(); ?></h5>
                                        </a>
                                    </div>
                                    <div class="text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                <?php digital_service_meta_data();?>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <div class="pagination">
                            <?php the_posts_pagination( array(
                                    'type'  => 'list',
                                    'screen_reader_text' => ' ',
                                    'prev_text'          => esc_html__( 'Previous', 'digital-services' ),
                                    'next_text'          => esc_html__('Next','digital-services'),
                                ) ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if($sidebar_style == 'right_sidebar'){ get_sidebar(); } ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();