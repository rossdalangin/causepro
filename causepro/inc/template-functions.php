<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CausePro
 */

/**
 * Adds a custom class to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function causepro_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'causepro_body_classes' );

/**
 * Changes the excerpt more string.
 */
function causepro_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'causepro_excerpt_more' );

/**
 * Custom function to get an excerpt with a specific word count.
 *
 * @param int $limit The word count limit.
 * @return string The truncated excerpt.
 */
function causepro_get_custom_excerpt( $limit ) {
    return wp_trim_words( get_the_excerpt(), $limit, '...' );
}
