<?php

if ( current_theme_supports( 'settings' ) ) {

	$settings = get_theme_support( 'settings' );

	// if some parameters have been added to the menus
	if ( is_array( $settings[0] ) ) {

		require_once('settings.class.php');

		if ( class_exists( 'X5_Settings' ) ) {
			$settings = new X5_Settings( $settings[0] );
		}
	}
}
