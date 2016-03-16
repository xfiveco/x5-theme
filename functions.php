<?php
/**
 * X5: Theme specific functionalities
 *
 * Do not close any of the php files included with ?> closing tag!
 *
 * @package WordPress
 * @subpackage X5
 */
define( 'X5', 'x5' ); // used in translation strings

function x5_load_features() {

	$features = scandir( dirname( __FILE__ ) . '/features/' );

	foreach ( $features as $feature ) {

		if ( current_theme_supports( $feature ) ) {
			require_once dirname( __FILE__ ) . '/features/' . $feature . '/' . $feature . '.php';
		}
	}
}

add_action( 'init', 'x5_load_features' );

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
	array(),
) );

add_theme_support( 'images', array(
	'400x500' => array(
	'width' => '400',
	'height' => '500',
	'crop' => true,
	),
) );

add_theme_support( 'cpt', array(
	// team post
	'x5-team' => array(
	'singular' => 'Team Member',
	'plural' => 'Team Members',
	'publicly_queryable' => true,
	'rewrite' => array( 'slug' => 'team', 'with_front' => true ),
	),
) );

add_theme_support( 'custom-tax', array(
	// taxonomy like category
	'x5-team-tag' => array(
	'singular' => 'Member Category',
	'plural' => 'Member Categories',
	'rewrite' => array( 'slug' => 'category', 'with_front' => false ),
	'posts' => array( 'x5-team' ),
	),
) );

add_theme_support( 'settings', array(
	'opt1' => array(
	'type' => 'text',
	'name' => 'fb',
	'desc' => 'Facebook link',
	),
	'opt2' => array(
	'type' => 'dropdown_pages',
	'name' => 'dropdown-pages',
	'desc' => 'Testing dropdown pages',
	),
	'opt3' => array(
	'type' => 'wp_editor',
	'name' => 'wp-editor',
	'desc' => 'Testing WP Editor',
	),
) );
