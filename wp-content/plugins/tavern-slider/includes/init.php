<?php
/**
 * GutSliderBlocks Init 
 * @package GutSliderBlocks
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Silence is golden!

 if( ! class_exists( 'AS_Init' ) ) {
    class AS_Init {
        /**
         * Constructor
         * return void
         */
        public function __construct() {
            $this->includes();
        }

        /**
         * Include the files
         * return void
         */
        public function includes() {
            require_once TAVERNSLIDER_DIR . '/includes/classes/class-enqueue-assets.php';
            require_once TAVERNSLIDER_DIR . '/includes/classes/class-register-block.php';
        }
    }
}

new AS_Init();