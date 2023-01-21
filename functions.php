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

/**
 * Contact details
 */
function contact_details_section( $wp_customize ) {
    $wp_customize->add_section( 'contact-details', array(
       'title'=> __( 'Contact details', 'mob-biz' ),
       'priority' => 20,
    ) );
	//Phone
	$wp_customize->add_setting( 'phone' );
    $wp_customize->add_control( 'phone', array(
        'type'=> 'text',
        'label' => __( 'Phone', 'mob-biz' ),
        'section' => 'contact-details'
    ) );
}
add_action( 'customize_register', 'contact_details_section' );

/**
 * Footer
 */
function footer_section( $wp_customize ) {
    $wp_customize->add_section( 'footer', array(
       'title'=> __( 'Footer', 'mob-biz' ),
       'priority' => 20,
    ) );
	//Top text
	$wp_customize->add_setting( 'footer_top_text' );
    $wp_customize->add_control( 'footer_top_text', array(
        'type'=> 'text',
        'label' => __( 'Footer top text', 'mob-biz' ),
        'section' => 'footer'
    ) );
	//Page author text
	$wp_customize->add_setting( 'page_author_text' );
    $wp_customize->add_control( 'page_author_text', array(
        'type'=> 'text',
        'label' => __( 'Page author text', 'mob-biz' ),
        'section' => 'footer'
    ) );
}
add_action( 'customize_register', 'footer_section' );

/**
 * Register post type
 */
function codex_custom_init() {
	//Possibilities
	$args = array(
        'public'   => true,
        'label'    => 'Possibilities',
        'supports' => array( 'title' ),
    );
	register_post_type( 'possibilities', $args );
	//Report
	$args = array(
        'public'   => true,
        'label'    => 'Report',
        'supports' => array( 'title' ),
    );
	register_post_type( 'report', $args );
	//Service
	$args = array(
        'public'   => true,
        'label'    => 'Service',
        'supports' => array( 'title' ),
    );
	register_post_type( 'service', $args );
	//Blog grid
	$args = array(
        'public'   => true,
        'label'    => 'Blog grid',
        'supports' => array( 'title', "author" ),
    );
	register_post_type( 'blog-grid', $args );
}
add_action( 'init', 'codex_custom_init' );

/*
* Register shortcodes
*/
//Possibilities
function possibilities_shortcode($attr) {
	ob_start();
	get_template_part( 'template-parts/content', 'possibilities' );
	return ob_get_clean();
}
add_shortcode('possibilities', 'possibilities_shortcode');
//Report
function report_shortcode($attr) {
	ob_start();
	get_template_part( 'template-parts/content', 'report' );
	return ob_get_clean();
}
add_shortcode('report', 'report_shortcode');
//Service
function service_shortcode($attr) {
	ob_start();
	get_template_part( 'template-parts/content', 'service' );
	return ob_get_clean();
}
add_shortcode('service', 'service_shortcode');
//Blog grid
function blog_grid_shortcode($attr) {
	ob_start();
	get_template_part( 'template-parts/content', 'blog-grid' );
	return ob_get_clean();
}
add_shortcode('blog_grid', 'blog_grid_shortcode');
//Blog page
function blog_page_shortcode($attr) {
	ob_start();
	get_template_part( 'template-parts/content', 'blog-page' );
	return ob_get_clean();
}
add_shortcode('blog_page', 'blog_page_shortcode');

/*
* Retrieves the attachment ID from the file URL
*/
function pippin_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    return $attachment[0]; 
}