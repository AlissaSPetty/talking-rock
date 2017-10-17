<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Talking_Rock
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function talking_rock_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'talking_rock_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function talking_rock_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'talking_rock_pingback_header' );
