<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package zoetrecepten
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function zoet__jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'zoet__jetpack_setup' );
