<?php
/**
 * Template part for displaying posts
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogger">
	 	<h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
		
		<div class="row">
			<?php if(has_post_thumbnail()) { ?>
			<div class="col-lg-4">
				<div class="post-image">
				    <?php the_post_thumbnail(); ?>
			 	</div>
	 		</div>
	 		<?php } ?>
	 		<div class="<?php if(has_post_thumbnail()) { ?>col-lg-8"<?php } else { ?>col-lg-12"<?php } ?>>
	 			
			 	<div class="text">
			    	<?php the_excerpt();?>
			  	</div>
			  	<div class="post-link">
			  		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_attr_e( 'Continue Reading....','foster-charity' ); ?></a>
			  	</div>
			</div>
		</div>
		<div class="post-heading">
			<div class="row">
				<div class="col-lg-6">
					<div class="post-info">
					    <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
					    <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','foster-charity'), __('0 Comments','foster-charity'), __('% Comments','foster-charity') ); ?></span>					    
					</div>
				</div>
				<div class="col-lg-6">
					<div class="blog-date">Posted on <?php the_time( get_option( 'date_format' ) ); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
