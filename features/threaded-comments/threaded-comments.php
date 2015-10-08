<?php

if ( current_theme_supports( 'threaded-comments' ) ) {

	/**
	* Theme configuration setup
	* Load comment reply link in case of page and post pages
	* if threaded comments are enabled
	*
	* @since WPized Light 1.0
	* @hook after_setup_theme
	*/
	function wp_light_setup() {

		// add threaded comments
		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' ); }
	}

	add_action( 'after_setup_theme', 'wp_light_setup' );
}
