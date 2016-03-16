<?php

if ( current_theme_supports( 'seo-title' ) ) {

	/**
	* Creates a nicely formatted and more specific title element text
	* for output in head of document, based on current view.
	*
	* @since X5 1.0
	*
	* @copy Twenty Twelve 1.0
	* @param string $title Default title text for current view.
	* @param string $sep Optional separator.
	* @return string Filtered title.
	*/
	function x5_wp_title($title, $sep) {

		global $paged, $page;

		if ( is_feed() ) {
			return $title; }

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description"; }

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Page %s', X5 ), max( $paged, $page ) ); }

		return $title;
	}

	add_filter( 'wp_title', 'x5_wp_title', 10, 2 );
}
