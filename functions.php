<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {


	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register our slider scripts.
	wp_register_style( 'flickicity', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), '2' );
	wp_register_script( 'flickicity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), '2', true );
	wp_register_script( 'slider', get_stylesheet_directory_uri() . '/js/slider.js', array(), '2', true );

	// Enqueue our slider scripts.
	// wp_enqueue_style( 'flickicity' );
	// wp_enqueue_script( 'flickicity' );
	// wp_enqueue_script( 'slider' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );




function understrap_enqueue_block_editor_assets() {
	wp_enqueue_script( 'remove-blocks', get_stylesheet_directory_uri() . '/js/editor.js', array( 'wp-blocks', 'wp-dom', 'wp-edit-post' ), filemtime( get_stylesheet_directory() . '/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'understrap_enqueue_block_editor_assets' );


/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );



/**
 * Register our ACF blocks.
 */
function acf_blocks_register() {
	register_block_type( __DIR__ . '/acf-blocks/hero/block.json' );
	register_block_type( __DIR__ . '/acf-blocks/featured-posts/block.json' );
	register_block_type( __DIR__ . '/acf-blocks/about-product/block.json' );
	register_block_type( __DIR__ . '/acf-blocks/slider/block.json' );
}
add_action( 'init', 'acf_blocks_register' );


/**
 * Override the default excerpt link.
 *
 * @param [type] $post_excerpt
 * @return void
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	if ( is_admin() || ! get_the_ID() ) {
		return $post_excerpt;
	}

	$permalink = esc_url( get_permalink( (int) get_the_ID() ) ); // @phpstan-ignore-line -- post exists

	// Trim post_excerpt to 15 words.
	$post_excerpt = wp_trim_words( $post_excerpt, 15, '...' );

	return $post_excerpt . ' <p><a class="btn btn-outline-primary btn-sm mt-4 understrap-read-more-link" href="' . $permalink . '">' . __(
		'Read More...',
		'understrap'
	) . '<span class="screen-reader-text"> from ' . get_the_title( get_the_ID() ) . '</span></a></p>';

}
