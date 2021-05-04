<?php

if ( ! function_exists( 'corazon_support' ) ) :
	function corazon_support()  {

		// Adding support for featured images.
		add_theme_support( 'post-thumbnails' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Adding support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'editor.css' );
		add_editor_style( 'style.css' );

		// Add support for custom units.
		add_theme_support( 'custom-units' );
	}
	add_action( 'after_setup_theme', 'corazon_support' );
endif;

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {

	// Fonts
	wp_enqueue_style(
		'corazon-font-style',
		get_template_directory_uri() . '/assets/fonts.css',
	);

	// Enqueue theme stylesheet.
	wp_enqueue_style(
		'corazon-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);

} );

add_filter('body_class', function ( $classes ) {
	if ( is_single() ) {
		global $post;
		foreach ( ( get_the_category( $post->ID ) ) as $category ) {
			$classes[] = 'category-' . $category->category_nicename;
		}
	}
    return $classes;
} );

