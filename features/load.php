<?php
/**
 * Define constant used in language translation strings.
 */
define( 'WP_LIGHT', 'WP Light' );

/**
 * Load all enabled features of WPized Light.
 */
function wp_light_load_features() {
  $directory = dirname( __FILE__ );
  $features  = scandir( $directory );

  foreach ( $features as $feature ) {
    if ( current_theme_supports( $feature ) ) {
      require_once $directory . '/' . $feature . '/' . $feature . '.php';
    }
  }
}
add_action( 'after_setup_theme', 'wp_light_load_features' );
