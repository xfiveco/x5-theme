<?php

/**
 * WPized Light: Theme specific functionalities
 * 
 * Do not close any of the php files included with ?> closing tag!
 * 
 * @package WordPress
 * @subpackage WPized_Light
 */
define( 'WP_LIGHT', 'wp_light' ); // used in translation strings
define( 'WP_LIGHT_VERSION', 1.5 );

function wp_light_load_features() {

	$features = scandir( dirname( __FILE__ ) . '/features/' );

	foreach ( $features as $feature ) {

		if ( current_theme_supports( $feature ) ) {
			require_once dirname( __FILE__ ) . '/features/' . $feature . '/' . $feature . ".php";
		}
	}
}

add_action( 'init', 'wp_light_load_features' );

add_theme_support( 'seo-title' );
add_theme_support( 'threaded-comments' );
add_theme_support( 'comments' );

// add two navigation menus
add_theme_support( 'menus', array(
	'navigation-top' => __( 'Top Navigation Menu' ),
	'navigation-foot' => __( 'Footer Navigation Menu' ),
) );

// add 3 default sidebars
add_theme_support( 'sidebars', array(
	array(),
	array(),
	array()
) );

add_theme_support( 'images', array(
	'400x500' => array(
		'width' => '400',
		'height' => '500',
		'crop' => true,
	), ) );




