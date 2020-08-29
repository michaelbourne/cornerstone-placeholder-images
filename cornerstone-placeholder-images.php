<?php
/*
Plugin Name: Cornerstone Placeholder Images
Plugin URI:  https://michaelbourne.ca
Description: Creates a Cornerstone/Pro Builder element for Placeholder.com images for use in layouts and mockups
Version:     0.0.4
Author:      Michael Bourne
Author URI:  https://ursa6.com
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
Text Domain: placeholder-images-cornerstone
*/

/**
*  Check for Cornerstone/X Pro. If not installed, deactivate plugin and die with error. 
*  Run on after_setup_theme to ensure Cornerstone is loaded, but prior to init so our CPT can be registered properly.
*/

function cspi_element_plugin_init() {

	if( class_exists( 'Cornerstone_Plugin' ) || function_exists('cornerstone_boot') ){
	// Cornerstone enabled
		$cornerstone = TRUE;
	}
	else {
	// No Cornerstone, no X, get lost
		$cornerstone = FALSE;
	}

	// If Cornerstone is NOT active
	if ( current_user_can( 'activate_plugins' ) && $cornerstone === FALSE ) {

		add_action( 'admin_init', 'cspi_element_deactivate' );
		add_action( 'admin_notices', 'cspi_element_admin_notice' );

		// Deactivate the Global Blocks Plugin
		function cspi_element_deactivate()
		{
			deactivate_plugins(plugin_basename(__FILE__));
		}

		// Throw an error up for disclosure
		function cspi_element_admin_notice()
		{
			$global_blocks_child_plugin = __('Placeholder Images', 'placeholder-images-cornerstone');
			$global_blocks_parent_plugin = __('Cornerstone or Pro Theme', 'placeholder-images-cornerstone');
			echo '<div class="error"><p>Current theme is ' . wp_get_theme()->get( 'Name' ) . ', but ' .sprintf(__('%1$s requires %2$s to function correctly. Please activate %2$s before activating %1$s. For now, this plugin has been deactivated.', 'placeholder-images-cornerstone') , '<strong>' . esc_html($global_blocks_child_plugin) . '</strong>', '<strong>' . esc_html($global_blocks_parent_plugin) . '</strong>') . '</p></div>';
			if (isset($_GET['activate'])) {
				unset($_GET['activate']);
			}
		}

	} else {

		// Cornerstone is active, build plugin
		// Define constants
		define('PLACEHOLDER_IMAGES_CS_PATH', plugin_dir_path(__FILE__));
		define('PLACEHOLDER_IMAGES_CS_URL', plugin_dir_url(__FILE__));

		require_once(PLACEHOLDER_IMAGES_CS_PATH . 'element.php');

	}
}
add_action( 'after_setup_theme', 'cspi_element_plugin_init' );