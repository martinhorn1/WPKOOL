<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php do_action( 'foster_charity_before_slider' ); ?>

<?php if( get_theme_mod('foster_charity_slider_arrows') != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'foster_charity_slide_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $pages[] = $mod;
            }
          }
          if( !empty($pages) ) :
          $args = array(
              'post_type' => 'page',
              'post__in' => $pages,
              'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h2><?php the_title();?></h2>                    
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( foster_charity_string_limit_words( $excerpt,30 ) ); ?></p>
                <div class ="readbutton">
                  <a href="<?php the_permalink(); ?>"> <?php echo esc_html(get_theme_mod('foster_charity_slide_page',__('READ MORE','foster-charity'))); ?></a>
                </div>
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
      </div>
      <?php else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
      </a>
    </div> 
    <div class="clearfix"></div>
  </section> 
<?php }?> 

<?php do_action( 'foster_charity_after_slider' ); ?>

<section id="services">
  <div class="container">
    <?php if( get_theme_mod( 'foster_charity_section_title','' ) != '') { ?>
      <h2><?php echo esc_html(get_theme_mod('foster_charity_section_title','')); ?></h2>
      <hr class="horizontal-line">
    <?php }?>
    <div class="row">
      <div class="col-md-4">            
        <?php
          $postData = get_theme_mod('foster_charity_single_post');
            if($postData){
            $args = array( 'name' => esc_html( $postData ,'foster-charity'));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
              </div>
              <div class="post-head">
                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
              </div> 
            <?php endwhile; 
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
        endif; }?>
      </div>
      <div class="col-md-4">
        <?php
          $postData = get_theme_mod('foster_charity_single_post1');
            if($postData){
            $args = array( 'name' => esc_html( $postData ,'foster-charity'));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                  </div>
                  <div class="post-head">
                    <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                  </div> 
                  
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; }?>
      </div>
      <div class="col-md-4">
        <div class="text-post">
          <?php
              $postData = get_theme_mod('foster_charity_single_post2');
              if($postData){
              $args = array( 'name' => esc_html( $postData ,'foster-charity'));
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="text">
                      <h5><?php the_title(); ?></h5>
                      <hr class="line">
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( foster_charity_string_limit_words( $excerpt,120) ); ?></p> 
                    </div> 
                <?php endwhile; 
                wp_reset_postdata();?>
                <?php else : ?>
                  <div class="no-postfound"></div>
                <?php
            endif; }?> 
        </div> 
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</section>

<?php do_action( 'foster_charity_after_how_can_you_help' ); ?>

<?php get_footer(); ?>