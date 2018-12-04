    <div class="site-slider traza-owl-basic">

        <div id="traza-owl-basic" class="owl-carousel owl-theme">
    
    		<?php 
			
				if(get_theme_mod('traza_slider_num')){
					$traza_slider_num = get_theme_mod('traza_slider_num');
				}else{
					$traza_slider_num = '5';
				}
			
				if(get_theme_mod('traza_slider_cat')){
					$traza_slider_cat = get_theme_mod('traza_slider_cat');
				}else{
					$traza_slider_cat = 0;
				}			
			
				$traza_slider_args = array(
                    // Change these category SLUGS to suit your use.
                    'ignore_sticky_posts' => 1,
                    'post_type' => array('post'),
                    'posts_per_page'=> $traza_slider_num,
					'cat' => $traza_slider_cat
               );
        
			   $traza_slider = new WP_Query($traza_slider_args);
			
            if ( $traza_slider->have_posts() ) : ?>            
			<?php /* Start the Loop */ ?>
			<?php while ( $traza_slider->have_posts() ) : $traza_slider->the_post(); ?>
            <div class="owl-carousel-slide">
                
                <?php if ( has_post_thumbnail()) : ?>	
                <?php the_post_thumbnail(); ?>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/2000.png">
                <?php endif; ?>
                
                <div class="owl-carousel-caption-container">
                    <h3>
						<a href="<?php the_permalink() ?>">
						<?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="owl-carousel-caption">
						<?php the_excerpt(); ?>
						<p><a href="<?php the_permalink() ?>">Read More</a></p>
					</div>
                </div>
                 	
            </div>
    		<?php endwhile; wp_reset_postdata(); endif; ?>
            
         </div>
    
    </div><!-- .site-slider --> 