<?php
/*
Plugin Name: My First plugin
Plugin URI: http://martinhorn.ikt.khk.ee/wordpress/
Description: This is my first WordPress Plugin
Author: Martin Horn
Author URI: http://martinhorn.ikt.khk.ee/wordpress/
Version: 1.0
*/
 
function my_plugin_test() {
	echo 'Hello World'; exit;
}
add_action('admin_head', 'my_plugin_test');