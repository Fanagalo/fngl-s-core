<?php
/**
 * Custom styling of the frontend and backend of the block editor
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 * @package Fanagalo_underscores_core
 */

add_action( 'after_setup_theme', 'fngl_s_core_support_editor_styles' );
/** 
 * TODO: What is the function of this part?
 */
if ( ! function_exists( 'fngl_s_core_support_editor_styles' ) ) :
	function fngl_s_core_support_editor_styles() {
		add_theme_support( 'editor-styles' );
	}
endif;

add_action( 'enqueue_block_editor_assets', 'fngl_s_core_enqueue_editor_styles', 1, 1 );
/**
 * Enqueue block editor styles.
 */
function fngl_s_core_enqueue_editor_styles() {
	wp_enqueue_style( 'fngl_s-core', get_theme_file_uri( 'editor.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
}

add_action( 'wp_enqueue_scripts', 'fngl_s_core_block_styles' );
/** 
 * Replace default FRONTEND styles with custom styles
 */
function fngl_s_core_block_styles() {
    // Overwrite core BLOCK styles with empty styles
    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_style( 'wp-block-library' );
    wp_register_style( 'wp-block-library', '' );

    // Overwrite core THEME styles with empty styles
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_deregister_style( 'wp-block-library-theme' );
    wp_register_style( 'wp-block-library-theme', '' );

    // Future support for WooCommerce
    // wp_dequeue_style( 'wp-block-style' ); // https://smartwp.com/remove-gutenberg-css/
    // Question: should a wp_deregister option be added?

    // Enable custom frontend styles; 'style' refers to style.css
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

?>