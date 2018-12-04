<?php
/**
 * Displays header site branding
 */

?>

<div class="site-branding">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<?php the_custom_logo(); ?>

				<div class="site-branding-text">
					<?php if ( is_front_page() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );

					if ( $description || is_customize_preview() ) :
					?>
						<p class="site-description"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class=" col-md-3 col-sm-3 col-xs-12 p-0">
				<div class="mail">
					<?php if( get_theme_mod( 'foster_charity_email','' ) != '') { ?>
                  		<i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('foster_charity_email','') ); ?></span>
	                <?php } ?>
             	</div>
		    </div>
		    <div class=" col-md-3 col-xs-12 col-sm-3 p-0">
		    	<?php if( get_theme_mod( 'foster_charity_donate_link','' ) != '') { ?>
			      	<div class="donate">
	                   <a href="<?php echo esc_url(get_theme_mod('foster_charity_donate_link','')); ?>"><i class="fas fa-heart"></i> <?php echo esc_html(get_theme_mod('foster_charity_donate','')); ?> </a>
		            </div>
	        	<?php } ?>
		    </div>
		    <div class=" col-md-3 col-xs-12 col-sm-3 p-0">
	      		<div class="social-media">
		          	<?php if( get_theme_mod( 'foster_charity_facebook_url') != '') { ?>
		            	<a href="<?php echo esc_url( get_theme_mod( 'foster_charity_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
		          	<?php } ?>
		          	<?php if( get_theme_mod( 'foster_charity_google_plus_url') != '') { ?>
		            	<a href="<?php echo esc_url( get_theme_mod( 'foster_charity_google_plus_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i></a>
		          	<?php } ?>
		          	<?php if( get_theme_mod( 'foster_charity_youtube_url') != '') { ?>
		            	<a href="<?php echo esc_url( get_theme_mod( 'foster_charity_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
		          	<?php } ?>	          
		          	<?php if( get_theme_mod( 'foster_charity_linkdin_url') != '') { ?>
		            	<a href="<?php echo esc_url( get_theme_mod( 'foster_charity_linkdin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
		         	<?php } ?>	
		         	<?php if( get_theme_mod( 'foster_charity_instagram_url') != '') { ?>
		            	<a href="<?php echo esc_url( get_theme_mod( 'foster_charity_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
		         	<?php } ?>	          	           
		         	<?php if( get_theme_mod( 'foster_charity_twitter_url') != '') { ?>
		            	<a href="<?php echo esc_url( get_theme_mod( 'foster_charity_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
		         	<?php } ?>	
    	        </div>
		    </div>
		</div>		
	</div>
</div>