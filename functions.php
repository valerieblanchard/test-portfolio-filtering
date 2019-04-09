<?php
/**
 * Twentythirteen-child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twentythirteen-child
 */

define( 'TWENTYCHILD_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'vblk_theme_enqueue_styles' );

function vblk_theme_enqueue_styles() {
	// Styles.
	$parent_style = 'twentythirteen-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), TWENTYCHILD_VERSION );
	wp_enqueue_style( 'portfolio-style', get_stylesheet_directory_uri() . '/portfolio.css', array( $parent_style ), TWENTYCHILD_VERSION );

	// Load Isotope Scripts for CPT realisation archive page.
	if ( is_post_type_archive( 'realisation' ) ) {
		// Load the library isotope.
		wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.js', array( 'jquery' ), '1.5.19', true );
		wp_enqueue_script( 'isotope' );
		// Load custom isotope js.
		wp_register_script( 'isotope-custom', get_stylesheet_directory_uri() . '/js/custom-portfolio-isotope.js', array( 'jquery' ), TWENTYCHILD_VERSION, true );
		wp_enqueue_script( 'isotope-custom' );
	}

	// Hover effect for touch device.
	wp_register_script( 'vblk-ontouch', get_stylesheet_directory_uri() . '/js/hover-effect.js', array( 'jquery' ), TWENTYCHILD_VERSION, true );
		wp_enqueue_script( 'vblk-ontouch' );
}

/**
 * Retrieve cpt with no limitation with the main query (generally max 10 in BO)
 *
 * @link https://stackoverflow.com/questions/18968916/unlimited-posts-per-page-for-a-custom-post-type-only
 */
function vblk_get_all_realisations( $query ) {
	if( !is_admin() && $query->is_main_query() && is_post_type_archive( 'realisation' ) ) {
			$query->set( 'posts_per_page', '-1' );
	}
}
add_action( 'pre_get_posts', 'vblk_get_all_realisations' );


// Add CPT "Realisation" and Taxonomy "Type".
require get_stylesheet_directory() . '/inc/cpt-realisation.php';

// Utilisation de Isotope Metafizzy pour le portfolio : https://isotope.metafizzy.co/ .
require get_stylesheet_directory() . '/inc/portfolio-filter-isotope.php';
