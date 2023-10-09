<?php
/**
 * Fanagalo_underscores_core functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Fanagalo_underscores_core
 */

// Disable use XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

if ( ! function_exists( 'fngl_s_core_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fngl_s_core_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Healthmasters theme by Fanagalo, use a find and replace
		 * to change 'fngl-s-core' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fngl-s-core', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' ); 
	
		// Let WordPress manage the document title.
		// By adding theme support, we declare that this theme does not use a
		// hard-coded <title> tag in the document head, and expect WordPress to
		// provide it for us.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		// @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'fngl-s-core' ),
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fngl_s_core_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' ); // Add theme support for selective refresh for widgets.

		// Add support for core custom logo.
		//* @link https://codex.wordpress.org/Theme_Logo
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		add_theme_support( 'align-wide' ); // Register support for Gutenberg wide images in your theme

		add_theme_support( 'responsive-embeds' ); // Add theme support for responsive embeds.

	}
endif;
add_action( 'after_setup_theme', 'fngl_s_core_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fngl_s_core_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fngl-s-core' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fngl-s-core' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fngl_s_core_widgets_init' );


/**
 * Enqueue styles and scripts
 */
function fngl_s_core_scripts() {

	// Script for responsive mobile menu
	// source: https://www.customyou.nl/responsive-menu-wordpress-clean-tutorial/
		wp_enqueue_script( 'nav-menu.js', get_template_directory_uri() . '/js/nav-menu.js', array('jquery'), '20151111', true );

	// Helps with accessibility for keyboard only users. Original from _s
		wp_enqueue_script( 'fngl-s-core-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Makes threads in comments. Original from _s
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
add_action( 'wp_enqueue_scripts', 'fngl_s_core_scripts' );

/* Required functions from directory "inc". Optional functions in child theme. */ 
require get_template_directory() . '/inc/template-tags.php';             // Custom template tags for this theme.
require get_template_directory() . '/inc/template-functions.php';        // Functions which enhance the theme by hooking into WordPress.