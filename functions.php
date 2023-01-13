<?php
/**
 * mob-biz functions and definitio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mob_biz_setup() {

	/*
		* Let WordPress manage the document title.
	*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
	*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Header', 'mob-biz' ),
			'footer-menu' => esc_html__( 'Footer', 'mob-biz' ),
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mob_biz_setup' );

/**
 * Enqueue scripts and styles.
 */
function mob_biz_scripts() {
	// Styles
	wp_enqueue_style( 'mob-biz-main-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'mob-biz-app-style', get_stylesheet_directory_uri() . '/dist/app.css', array(), null, 'all' );
	// Scripts
	wp_enqueue_script( 'mob-biz-app-script', get_template_directory_uri() . '/dist/app.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'mob_biz_scripts' );

