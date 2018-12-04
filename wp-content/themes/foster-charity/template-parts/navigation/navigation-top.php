<?php
/**
 * Displays top navigation
 */

?>

<div class="container">
	<div class="row">
		<div class="col-lg-10 col-md-10 p-0">
			<div class="header-menu">
				<div class="row">
					<div class="col-lg-11 col-md-11">
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'foster-charity' ); ?>">
							<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
								<?php
									esc_html_e( 'Menu', 'foster-charity' );
								?>
							</button>

							<?php wp_nav_menu( array(
								'theme_location' => 'top',
								'menu_id'        => 'top-menu',
							) ); ?>				
						</nav>
					</div>
					<div class="col-lg-1 col-md-1">
						<div class="search-box">
						    <span><i class="fas fa-search"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-lg-2 col-md-2 p-0">
			<?php if( get_theme_mod( 'foster_charity_call1','' ) != '') { ?>
			<div class="call">		        
			    <span><i class="fas fa-phone-volume"></i><?php echo esc_html( get_theme_mod('foster_charity_call1','') ); ?></span>
		    </div>
		    <?php } ?>
		</div>
	</div>
	<div class="serach_outer">
	    <div class="closepop"><i class="far fa-window-close"></i></div>
	    <div class="serach_inner">
	      <?php get_search_form(); ?>
	    </div>
	</div>
</div>