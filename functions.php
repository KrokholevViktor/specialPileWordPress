<?php
/**
 * specialpile functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package specialpile
 */


require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/redux-options.php';

add_action( 'tgmpa_register', 'specialpile_register_required_plugins' );
function specialpile_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'specialpile Core', // The plugin name.
			'slug'               => 'specialpile-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/specialpile-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

		array(
			'name'      => 'Gutenberg Template Library & Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'specialpile',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}


function specialpile_enqueue_scripts(){

	wp_enqueue_style('specialpile-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.1', 'all');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);
	wp_enqueue_script('specialpile-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '1.0', true);
	wp_enqueue_script('specialpile-YApi', 'https://api-maps.yandex.ru/2.1/?apikey=1997deae-7f1f-4cdb-bbee-84f7aafcaf39&lang=ru_RU', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'specialpile_enqueue_scripts', 100);

function enqueue_custom_scripts_for_elementor() {
    if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
        wp_enqueue_script( 'specialpile-script', get_template_directory_uri().'/assets/js/script.js', array( 'jquery' ), '1.0', true );
    }
}
add_action( 'elementor/editor/after_enqueue_scripts', 'enqueue_custom_scripts_for_elementor', 100 );

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');