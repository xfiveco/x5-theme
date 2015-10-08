<?php
/**
 * Include features initialization mechanism.
 */
require_once dirname( __FILE__ ) . '/features/load.php';

/**
 * Creates a nicely formatted and more specific title based on current view.
 */
add_theme_support( 'seo-title' );

/**
 * Register custom menu locations.
 *
 * 'example-menu' => 'Example Menu',
 */
add_theme_support( 'menus', array(

) );

/**
 * Register custom sidebars.
 *
 * array(
 *   'name' => 'Example Sidebar',
 *   'id'   => 'example-sidebar',
 * ),
 */
add_theme_support( 'sidebars', array(

) );

/**
 * Register custom thumbnail sizes.
 *
 * 'example-thumbnail' => array(
 *   'width'  => 400,
 *   'height' => 500,
 *   'crop'   => true,
 * ),
 */
add_theme_support( 'images', array(

) );

/**
 * Add custom post types to the theme.
 *
 * 'example-post' => array(
 *   'singular' => 'Example Post',
 *   'plural'   => 'Example Posts',
 *   'public'   => true,
 *   'rewrite'  => array( 'slug' => 'example-post, 'with_front' => true ),
 *   'supports' => array( 'title', 'editor' ),
 * ),
 */
add_theme_support( 'post-types', array(

) );

/**
 * Register custom taxonomies (categories) to posts.
 *
 * 'example-category' => array(
 *   'singular' => 'Example Category',
 *   'plural'   => 'Example Categories',
 *   'rewrite'  => array( 'slug' => 'example-category', 'with_front' => false ),
 *   'posts'    => array( 'example-post' ),
 * ),
 */
add_theme_support( 'taxonomies', array(

) );
