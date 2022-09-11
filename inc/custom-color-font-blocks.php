<?php
/**
 * Custom colors and font sizes for block editor
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 * @package Fanagalo_underscores_core
 */

add_action( 'after_setup_theme', 'fngl_s_core_color_font_blocks' );

/* 
 * This action customizes colors (solids and gradients) and font sizes in the block editor.
 * 
 * Best practise is 
 * 1. make color variables in partial _colors.scss
 * 2. add the colors in this file
 * 3. add the colors in the core block partial _has-color.scss
 * 
 */

if ( ! function_exists( 'fngl_s_core_color_font_blocks' ) ) :
    function fngl_s_core_color_font_blocks() {

        // disable user generated colors
        add_theme_support( 'disable-custom-colors' );

		// customized color palette */
        	add_theme_support( 'editor-color-palette', array(
            array('name' => __( 'dark blue',  'fngl-s-core' ), 'slug' => 'fngl-dark-blue',  'color' => 'var(--fngl-dark-blue)',),
            array('name' => __( 'light blue', 'fngl-s-core' ), 'slug' => 'fngl-light-blue', 'color' => 'var(--fngl-light-blue)',),
            array('name' => __( 'purple',     'fngl-s-core' ), 'slug' => 'fngl-purple',     'color' => 'var(--fngl-purple)',),
            array('name' => __( 'magenta',    'fngl-s-core' ), 'slug' => 'fngl-magenta',    'color' => 'var(--fngl-magenta)',),
            array('name' => __( 'dark red',   'fngl-s-core' ), 'slug' => 'fngl-dark-red',   'color' => 'var(--fngl-dark-red)',),
            array('name' => __( 'red',        'fngl-s-core' ), 'slug' => 'fngl-red',        'color' => 'var(--fngl-red)',),
            array('name' => __( 'yellow',     'fngl-s-core' ), 'slug' => 'fngl-yellow',     'color' => 'var(--fngl-yellow)',),
        ) );

        // disable user generated gradients
        add_theme_support( 'disable-custom-gradients');

		// customized gradient palette */
        add_theme_support( 'editor-gradient-presets', array(
        /*    array(
                'name'     => esc_attr__( 'Fanagalo gradient', 'fngl-s-core' ),
                'gradient' => 'linear-gradient(100deg, var(--fngl-dark-blue) 0%, var(--fngl-light-blue) 17%, var(--fngl-purple) 33%, var(--fngl-magenta) 50%, var(--fngl-dark-red) 67%, var(--fngl-red) 83%, var(--fngl-yellow) 100%)',
                'slug'     => 'fanagalo-gradient'
            ), */
            array(
                'name'     => esc_attr__( 'Fanagalo gradient', 'fngl-s-core' ),
                'gradient' => 'linear-gradient(100deg, var(--fngl-dark-blue) 0%, var(--fngl-light-blue) 17%, var(--fngl-purple) 33%, var(--fngl-magenta) 50%, var(--fngl-dark-red) 67%, var(--fngl-red) 83%, var(--fngl-yellow) 100%)',
                'slug'     => 'fanagalo-gradient'
            ),
        ) );

        // disable user generated font sizes
        // add_theme_support( 'disable-custom-font-sizes' );

		// customized font sizes 
        // settings below from Twentytwenty theme
		add_theme_support( 'editor-font-sizes', array(
            array(
                'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'fngl-s-core' ),
                'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'fngl-s-core' ),
                'size'      => 18,
                'slug'      => 'small',
            ),
            array(
                'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'fngl-s-core' ),
                'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'fngl-s-core' ),
                'size'      => 21,
                'slug'      => 'normal',
            ),
            array(
                'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'fngl-s-core' ),
                'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'fngl-s-core' ),
                'size'      => 26.25,
                'slug'      => 'large',
            ),
            array(
                'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'fngl-s-core' ),
                'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'fngl-s-core' ),
                'size'      => 32,
                'slug'      => 'larger',
            ),
        ) );

    }
endif;

?>