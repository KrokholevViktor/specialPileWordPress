<?php 
/*
Plugin Name: specialpile Core
Plugin URI: https://specialpile.com
Description: A plugin that impliments specialpile Functionality;
Version: 1.9\0
Author: CRIK0VA
Author URI: https://specialpile.com
License: GPLv2 or later
Text Domain: specialpile-core
 */

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

require plugin_dir_path( __FILE__ ) . '/inc/elementor.php';