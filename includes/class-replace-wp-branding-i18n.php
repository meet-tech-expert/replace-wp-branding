<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://www.linkedin.com/in/rinkesh-gupta/
 * @since      1.0.0
 *
 * @package    Replace_Wp_Branding
 * @subpackage Replace_Wp_Branding/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Replace_Wp_Branding
 * @subpackage Replace_Wp_Branding/includes
 * @author     Rinkesh Gupta <rinkesh412@gmail.com>
 */
class Replace_Wp_Branding_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'replace-wp-branding',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
