<?php
/**
 * Plugin Name:       Tavern Slider
 * Description:       A Gutenberg block (entire plugin meant for it!) to scrape and display posts from an API and then make a neat slider with posts out of it
 * Requires at least: 6.0
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tavern-slider
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Silence is golden!

/**
 * Blocks Final Class
 * return TavernSliderBlocks
 */
if( ! class_exists('TavernSliderBlocks') ) {

	final class TavernSliderBlocks {

		private static $instance = null;

		/**
		 * Constructor
		 * return void
		 */
		public function __construct() {
			$this->define_constants();
			$this->includes();
		}
	
		/**
		 * Define the plugin constants
		 * return void
		 */
		private function define_constants() {
			define( 'TAVERNSLIDER_VERSION', '0.1.0' );
			define( 'TAVERNSLIDER_URL', plugin_dir_url( __FILE__ ) );	
			define( 'TAVERNSLIDER_DIR_PATH', plugin_dir_path(__FILE__));
			define( 'TAVERNSLIDER_DIR', __DIR__ );
		}

		/**
		 * Initialize the plugin
		 * return TavernSliderBlocks
		 */
		public static function init() {
			if( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Include the files
		 * return void
		 */
		public function includes() {
			require_once TAVERNSLIDER_URL . '/includes/init.php';
		}
	}
}

function TavernSliderBlocks() {
	return TavernSliderBlocks::init();
}

TavernSliderBlocks();