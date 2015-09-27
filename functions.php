<?php
/**
 * Include features initialization mechanism.
 */
require_once dirname( __FILE__ ) . '/features/load.php';

add_theme_support( 'seo-title' );

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

add_theme_support( 'post-types', array(
	// team post
	'wp-light-team' => array(
	'singular' => 'Team Member',
	'plural' => 'Team Members',
	'publicly_queryable' => true,
	'rewrite' => array( 'slug' => 'team', 'with_front' => true ),
	),
) );

add_theme_support( 'taxonomies', array(
	// taxonomy like category
	'wp-light-team-tag' => array(
	'singular' => 'Member Category',
	'plural' => 'Member Categories',
	'rewrite' => array( 'slug' => 'category', 'with_front' => false ),
	'posts' => array( 'wp-light-team' ),
	),
) );
