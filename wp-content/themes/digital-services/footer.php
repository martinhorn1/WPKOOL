<?php $footer_widget_style = get_theme_mod('footer_widget_style',3); 
    $hide_footer_widget_bar = get_theme_mod('hide_footer_widget_bar',1);
    if(($hide_footer_widget_bar == 1) || ($hide_footer_widget_bar == '')) : 
            $footer_widget_style = $footer_widget_style+1;
            $footer_column_value = floor(12/($footer_widget_style)); ?>    
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="block">
                    <?php for( $i=1; $i<=$footer_widget_style; $i++) {
                            if (is_active_sidebar('footer-'.$i)) { ?>
                                <div class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-<?php echo esc_attr($footer_column_value); ?> col-xs-12"><?php dynamic_sidebar('footer-'.$i); ?></div>
                            <?php }                            
                        } ?>                    
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="footer col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <section class="block">
                        <span><?php esc_html_e('Theme : ','digital-services'); ?><a href="<?php echo esc_url('https://wpdigipro.com/wordpress-themes/digital-services/'); ?>"><?php esc_html_e(' Digital Services WordPress Theme','digital-services'); ?></a></span>
                    </section>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright text-right">
                       <?php if(get_theme_mod('copyright_area_text') != '') : ?>
                            <p><?php echo wp_kses_post(get_theme_mod('copyright_area_text')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  <?php wp_footer(); ?>
</body>
</html>