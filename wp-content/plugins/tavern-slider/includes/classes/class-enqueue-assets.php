<?php
/**
 * Enqueue Assets 
 * @package TavernSlider
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // Silence is golden!

 if( ! class_exists( 'AS_Assets' ) ) {
	class AS_Assets {
        /**
         * Constructor
         */
        public function __construct() {
            add_action( 'enqueue_block_assets', [ $this, 'enqueue_assets' ] );
        }

		/**
         * Enqueue scripts and styles
         * @return void 
         */
        public function enqueue_assets() {
            // Frontend Scripts
            wp_enqueue_script(
				'tavern-slider-block-script',
                TAVERNSLIDER_URL . 'assets/dist/scripts/main.min.js', [], TAVERNSLIDER_VERSION,
            );
        }
	}
}

new AS_Assets();