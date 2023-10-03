<?php
/**
 * Register Blocks 
 * @package TavenSliderBlocks
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Silence is golden!

if( ! class_exists( 'TavernSlider_Register_Block' ) ) {

    class TavernSlider_Register_Block {

        /**
         * Constructor
         * return void 
         */
        public function __construct() {
            add_action( 'init', [ $this, 'register_blocks' ] );
        }

        /**
         * Register Blocks
         * return void
         */
        public function register_blocks() {

            $blocksFolder = TAVERNSLIDER_DIR . '/build';

            if ( is_dir( $blocksFolder ) ) {
                register_block_type( TAVERNSLIDER_DIR . '/build' );
            } 
        }

    }

}

new TavernSlider_Register_Block();