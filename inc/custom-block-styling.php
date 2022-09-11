<?php
/**
 * Custom styling of the frontend and backend of the block editor
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 * @package Fanagalo_underscores_core
 */

/**
 * Theme support for BACKEND Editor styles
 */
add_action( 
    'after_setup_theme', 
    function() {
        add_theme_support( 'editor-styles' );
    },
    10
);

/**
 * Enqueue BACKEND Editor styles.
 */
add_action(
	'enqueue_block_editor_assets',
	function() {
		// Editor styles.
		wp_enqueue_style( 'fngl-s-core', get_theme_file_uri( 'editor.css' ), null, wp_get_theme()->get( 'Version' ), 'all' );
	},
	10
);

/**
 * Custom Google font enqueue BACKEND
 */

add_action(
    'enqueue_block_editor_assets',
    function () {
        wp_enqueue_style('fngl-s-core-google-fonts', 'https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap', array(), null);
    },
    10
);




/** 
 * Replace default FRONTEND styles with custom styles
 */
add_action( 
    'wp_enqueue_scripts', 
    function () {
        // Dequeue Core block styles.
        wp_dequeue_style( 'wp-block-library' );

        // Overwrite core THEME styles with empty styles
        wp_dequeue_style( 'wp-block-library-theme' );

        // Future support for WooCommerce
        // wp_dequeue_style( 'wp-block-style' ); // https://smartwp.com/remove-gutenberg-css/

        // Enable custom FRONTEND styles; 'style' refers to style.css
        wp_enqueue_style( 'style', get_stylesheet_uri() );
    },
    10
);

add_action( 
	'enqueue_block_assets',
    function () {
        // Overwrite core BLOCK styles with empty styles
        wp_deregister_style( 'wp-block-library' );
        wp_register_style( 'wp-block-library', '' );

        // Overwrite core THEME styles with empty styles
        wp_deregister_style( 'wp-block-library-theme' );
        wp_register_style( 'wp-block-library-theme', '' );
     
    },
    10
);

/**
 * Remove default inline Normalization Styles in editor
 * @link https://github.com/WordPress/gutenberg/issues/18595
 */

add_filter(
    'block_editor_settings', 
    function ($editor_settings) {
        unset($editor_settings['styles'][0]);
        return $editor_settings;
    }
);

?>