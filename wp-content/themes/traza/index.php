<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package traza
 */

get_header();
?>

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main">

			<div class="homeRecentPosts">
				
				<?php
				
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
				
				?>
				
				<div class="recentPost">
					
					<div class="recentPostImage">
						
						<?php 
								
							if( has_post_thumbnail() ){
								the_post_thumbnail( 'home-recent-posts' ); 
							}else{
								echo '<img src="' . get_template_directory_uri() . '/assets/images/home-recent.png" />';
							}
							
						?>						
						
					</div><!-- .recentPostImage -->
					
					<div class="recentPostDesc">
						
						<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<div>
							<?php esc_html(the_excerpt()); ?>
						</div>
					</div><!-- .recentPostDesc -->					
					
				</div><!-- .recentPost -->
				<?php
				
				endwhile;

				the_posts_navigation();				
				
				endif;
				?>
				
			</div><!-- .homeRecentPosts -->
			
			<div class="homeCategoriesPosts">
				
				<?php
					
					$trazaCatOneId = get_theme_mod('traza_home_cat_one');
				
				?>
				<div class="homeCategoryContainer">
					
					<h2><?php echo esc_html(get_cat_name( $trazaCatOneId )); ?></h2>
					
					<?php
					
						$trazaCategoryArgs = array(
                                        // Change these category SLUGS to suit your use.
                                        'ignore_sticky_posts' => 1,
                                        'post_type' => array('post'),
                                        'posts_per_page'=> '5',
										'cat' => $trazaCatOneId
                                      );
						$trazaCategoryPosts = new WP_Query( $trazaCategoryArgs );
					
						if ( $trazaCategoryPosts->have_posts() ) :
					
						while ( $trazaCategoryPosts->have_posts() ) : $trazaCategoryPosts->the_post();
					
					?>
					<div class="homeCategoryPost">
						
						<div class="homeCategoryPostImage">
							<?php 
								
								if( has_post_thumbnail() ){
									the_post_thumbnail( 'home-category-posts' ); 
								}else{
									echo '<img src="' . get_template_directory_uri() . '/assets/images/home-category.png" />';
								}
								
							
							?>
						</div>

						<div class="homeCategoryPostText">
							<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
						</div>						
						
					</div>
					<?php
						
						endwhile;
						endif;
						wp_reset_postdata();
					
					?>
					
				</div><!-- .homeCategoryContainer -->
				
				<?php
					
					$trazaCatTwoId = get_theme_mod('traza_home_cat_two');
				
				?>
				<div class="homeCategoryContainer">
					
					<h2><?php echo esc_html(get_cat_name( $trazaCatTwoId )); ?></h2>
					
					<?php
					
						$trazaCategoryArgs = array(
                                        // Change these category SLUGS to suit your use.
                                        'ignore_sticky_posts' => 1,
                                        'post_type' => array('post'),
                                        'posts_per_page'=> '5',
										'cat' => $trazaCatTwoId
                                      );
						$trazaCategoryPosts = new WP_Query( $trazaCategoryArgs );
					
						if ( $trazaCategoryPosts->have_posts() ) :
					
						while ( $trazaCategoryPosts->have_posts() ) : $trazaCategoryPosts->the_post();
					
					?>
					<div class="homeCategoryPost">
						
						<div class="homeCategoryPostImage">
							<?php 
								
								if( has_post_thumbnail() ){
									the_post_thumbnail( 'home-category-posts' ); 
								}else{
									echo '<img src="' . get_template_directory_uri() . '/assets/images/home-category.png" />';
								}
								
							
							?>
						</div>

						<div class="homeCategoryPostText">
							<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
						</div>						
						
					</div>
					<?php
						
						endwhile;
						endif;
						wp_reset_postdata();
					
					?>
					
				</div><!-- .homeCategoryContainer -->	
				
				<?php
					
					$trazaCatThreeId = get_theme_mod('traza_home_cat_three');
				
				?>
				<div class="homeCategoryContainer">
					
					<h2><?php echo esc_html(get_cat_name( $trazaCatThreeId )); ?></h2>
					
					<?php
					
						$trazaCategoryArgs = array(
                                        // Change these category SLUGS to suit your use.
                                        'ignore_sticky_posts' => 1,
                                        'post_type' => array('post'),
                                        'posts_per_page'=> '5',
										'cat' => $trazaCatThreeId
                                      );
						$trazaCategoryPosts = new WP_Query( $trazaCategoryArgs );
					
						if ( $trazaCategoryPosts->have_posts() ) :
					
						while ( $trazaCategoryPosts->have_posts() ) : $trazaCategoryPosts->the_post();
					
					?>
					<div class="homeCategoryPost">
						
						<div class="homeCategoryPostImage">
							<?php 
								
								if( has_post_thumbnail() ){
									the_post_thumbnail( 'home-category-posts' ); 
								}else{
									echo '<img src="' . get_template_directory_uri() . '/assets/images/home-category.png" />';
								}
								
							
							?>
						</div>

						<div class="homeCategoryPostText">
							<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
						</div>						
						
					</div>
					<?php
						
						endwhile;
						endif;
						wp_reset_postdata();
					
					?>
					
				</div><!-- .homeCategoryContainer -->					
				
			</div><!-- .homeCategoriesPosts -->			

		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
