<?php 
/**
 * The template for displaying sidebar
 * @package Digital Services
 */  
if (is_active_sidebar('sidebar-1')) { ?>	
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
             <?php dynamic_sidebar('sidebar-1'); ?>	
        </div>
    </div>	    
<?php } ?>
