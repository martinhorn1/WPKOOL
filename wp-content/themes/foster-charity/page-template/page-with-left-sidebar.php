<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'foster_charity_pageright_header' ); ?>

<div class="container">
    <div class="wrapper">
         <div id="sidebar" class="col-md-4 col-sm-4">
            <?php dynamic_sidebar('sidebar-2'); ?>
        </div>
		<div class="col-md-8 col-sm-8" id="main-content">

			<?php while ( have_posts() ) : the_post(); ?>	
                
                <h1><?php the_title();?></h1>
                <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
                <?php the_content();

                	if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
            
        </div>       
        <div class="clearfix"></div>    
    </div>
</div>

<?php do_action( 'foster_charity_pageright_header' ); ?>

<?php get_footer(); ?>