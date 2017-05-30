<?php
/*
Plugin Name: AMP WordPress Example Theme
Plugin URI: https://ampforwp.com/
Description: AMP for WP - Accelerated Mobile Pages for WordPress
Version: 1.0
Author: Ahmed Kaludi, Mohammed Kaludi
Author URI: https://ampforwp.com/
Donate link: https://www.paypal.me/Kaludi/25
License: GPL2
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('init','ampforwp_remove_old_header_file',11);
function ampforwp_remove_old_header_file(){
	remove_filter( 'amp_post_template_file', 'ampforwp_custom_header', 10, 3 );
}
// Register New Files
add_action('init','ampforwp_custom_header_files_register', 10);
function ampforwp_custom_header_files_register(){
	add_filter( 'amp_post_template_file', 'ampforwp_custom_header_file', 10, 2 );
}
// Custom Header
function ampforwp_custom_header_file( $file, $type ) { 
	if ( 'header-bar' === $type ) {
		$file =  plugin_dir_path( __FILE__ ) . '/template/header-bar.php';
	}
	return $file;
}