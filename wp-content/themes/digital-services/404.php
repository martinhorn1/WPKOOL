<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Digital Services
 */
get_header(); ?>
<section class="bg-sec image-bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><?php esc_html_e( "Oops! That page can't be found.", 'digital-services' ); ?></h2>
                </div>                
            </div>
        </div>
    </div>
</section>
<section class="blog-section style-two">
    <div class="container">
        <div class="row">
            <div class="blog-main">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  	<?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'digital-services'); ?>
                   	<?php get_search_form(); ?>
                </div>                    
             </div>
        </div>
    </div>
</section>
<?php get_footer();