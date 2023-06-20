<?php 
/*
 * Security Check, die if accessed directly.
 */
if( !defined( 'ABSPATH' ) ) {
    die( 'Forbidden.' );
}


/**
 * Enqueue assets for block on editor screen - custom style (styles.css) from assets/css folder.
 */


if( !function_exists( 'excelovitawp_setup' ) ) :
	function excelovitawp_setup() {

		add_theme_support( 'wp-block-styles' );
       
		add_editor_style( 'assets/css/styles.css' );
	}
	add_action( 'after_setup_theme', 'excelovitawp_setup' );
endif;

/**
 * Enqueue assets for front end
 */


 if( !function_exists( 'excelovitawp_assets' ) ) :
	function excelovitawp_assets() {
       

        // Enqueue custom style css file
		wp_enqueue_style( 'excelovitawp-editor', get_template_directory_uri() . '/assets/css/styles.css', [], wp_get_theme()->get( 'Version' ) );

        // Enqueue custom script js file
		wp_enqueue_script( 'excelovitawp-scripts', get_template_directory_uri() . '/assets/js/scripts.js', [], wp_get_theme()->get( 'Version' ), true );
	}
	add_action( 'wp_enqueue_scripts', 'excelovitawp_assets' );
endif;