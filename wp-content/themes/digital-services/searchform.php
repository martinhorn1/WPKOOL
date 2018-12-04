<?php
/**
 * The template for displaying search form
 * @package Digital Services
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" placeholder="<?php esc_attr_e('Search...','digital-services'); ?>" class="form-control" required="">
	<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
</form>