<?php

if ( current_theme_supports( 'menus' ) ) {

	$menus = get_theme_support( 'menus' );

	// if some parameters have been added to the menus
	if ( is_array( $menus[0] ) ) {
		// get them
		$menus = $menus[0]; }
	else {
		$menus = array( 'navigation-top' => __( 'Top Navigation Menu' ) );
	}

	register_nav_menus( $menus );

	add_action( 'x5_head', 'default_menu' );
}

/**
 * Print a default menu
 *
 * @hook x5_head
 */
function default_menu() {
	if ( has_nav_menu( 'navigation-top' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'navigation-top',
			'container' => false,
			'items_wrap' => '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>',
		) );
	}
}
