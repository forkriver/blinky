<?php
/**
 * Include and set up custom metaboxes and fields.
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @package  blinky
 * @subpackage metaboxes
 */

/**
 * Metabox class.
 */
class Blinky_Metaboxes {
	/**
	 * Class constuctor.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function __construct() {
		add_action( 'admin_init', array( $this, 'initialize_metaboxes' ) );
	}

	/**
	 * Initialize the metaboxes.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function initialize_metaboxes() {
		require_once dirname( __FILE__ ) . '/lib/cmb2/init.php';
	}
}
