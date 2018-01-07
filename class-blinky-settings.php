<?php
/**
 * Settings (ie, options) class file.
 *
 * @package blinky
 */

/**
 * Settings class.
 *
 * Handles the Settings API (ie, options) for the plugin and any sub-plugins.
 *
 * @since 1.0.0
 */
class Blinky_Settings {

	const SETTINGS_PAGE = 'blinky';

	/**
	 * Class constructor.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function __construct() {

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init_settings' ) );

	}

	/**
	 * Adds the Blinky admin menu.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function admin_menu() {
		$page_title = __( 'Blinky Settings', 'blinky' );
		$menu_title = __( 'Blinky', 'blinky' );
		$capability = 'manage_options';
		$menu_slug  = Blinky_Settings::SETTINGS_PAGE;
		$function   = array( $this, 'menu_page' );
		add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
	}

	/**
	 * Adds the settings for the Blinky plugin(s).
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function admin_init_settings() {

		register_setting( 'blinky-settings-group', Blinky::PREFIX . 'settings', array( $this, 'blinky_validate_and_sanitize' ) );

		/**
		 * Filters the settings for Blinky.
		 *
		 * Expected format:
		 *   array(
		 *       'setting_section' => array(
		 *             'section_name'     => name (translated already),
		 *             'section_callback' => callback,
		 *             'fields' => array(
		 *                 array(
		 *                     'field_name'     => field_name,
		 *                     'field_callback' => callback,
		 *                     'field_sanitize' => callback, // optional
		 *                 ), // repeatable
		 *             ),
		 *       ), // repeatable
		 *   )
		 */
		$settings = apply_filters( 'blinky_settings', array() );
		if ( ! empty( $settings ) ) {
			foreach ( $settings as $section_id => $section ) {
				add_settings_section( $section_id, $section['section_name'], $section['section_callback'], Blinky_Settings::SETTINGS_PAGE );
			}
		}

	}

	/**
	 * Validates and sanitizes the inputs from the Blinky plugin(s).
	 *
	 * @param  array $input The data input by the user.
	 * @return array        The sanitized & validated data.
	 * @since  1.0.0
	 * @todo   Actually, you know, sanitize and validate things.
	 */
	function validate_and_sanitize( $input = array() ) {
		$output = $input;
		return $output;
	}

	/**
	 * Callback for the settings menu page.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function menu_page() {
		$settings = apply_filters( 'blinky_settings', array() );
		echo '<div class="wrap">';
		echo '<h1>' . esc_html__( 'Blinky Settings', 'blinky' ) . '</h1>';
		if ( ! empty( $settings ) ) {
			settings_fields( 'blinky-settings-group' );
			do_settings_sections( Blinky_Settings::SETTINGS_PAGE );
		} else {
			echo '<p>' . esc_html__( 'Currently there are no settings enabled.', 'blinky' );
		}
		echo '</div> <!-- .wrap -->';
		echo "\n";
	}

}

new Blinky_Settings;
