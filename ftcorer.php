<?php
/**
	* Plugin Name: Rifa Core
	* Description: Rifa Core plugin.
	* Plugin URI:  https://softivuslab.com/wp/rifa
	* Version:     1.0.0
	* Author:      Pixelaxis
	* Author URI:   https://softivuslab.com/wp/rifa
	* Text Domain: rifa-core

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Controls_Manager;

/**
 * Define
*/
define('FTCORE_ADDONS_URL', plugins_url('/', __FILE__));
define('FTCORE_ADDONS_DIR', dirname(__FILE__));
define('FTCORE_ADDONS_PATH', plugin_dir_path(__FILE__));
define('FTCORE_ELEMENTS_PATH', FTCORE_ADDONS_DIR . '/include/elementor');
define('FTCORE_WIDGET_PATH', FTCORE_ADDONS_DIR . '/include/widgets');
define('FTCORE_INCLUDE_PATH', FTCORE_ADDONS_DIR . '/include');


include_once(FTCORE_ADDONS_DIR . '/include/custom-post-portfolio.php');
include_once(FTCORE_ADDONS_DIR . '/include/custom-post-services.php');
include_once(FTCORE_ADDONS_DIR . '/include/common-functions.php');
include_once(FTCORE_ADDONS_DIR . '/include/elementor-functions.php');
include_once(FTCORE_ADDONS_DIR . '/include/class-ocdi-importer.php');
include_once(FTCORE_ADDONS_DIR . '/include/allow-svg.php');
include_once(FTCORE_ADDONS_DIR . '/include/shortcode-elementor/elementor-shortcode.php');


/**
 * Include Custom Widget
*/
include_once(FTCORE_WIDGET_PATH . '/blog-post-sidebar.php');
include_once(FTCORE_WIDGET_PATH . '/sidebar-form-widget.php');
include_once(FTCORE_WIDGET_PATH . '/portfolio-info-widget.php');
include_once(FTCORE_WIDGET_PATH . '/service-list.php');







final class FT_Core {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

	
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
	}


	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'rifa-core' ),
			'<strong>' . esc_html__( 'Ft Core', 'rifa-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rifa-core' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rifa-core' ),
			'<strong>' . esc_html__( 'Ft Core', 'rifa-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rifa-core' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rifa-core' ),
			'<strong>' . esc_html__( 'Ft Core', 'rifa-core' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'rifa-core' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}


new FT_Core();