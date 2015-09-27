<?php

if ( current_theme_supports( 'sidebars' ) ) {

  $sidebars = get_theme_support( 'sidebars' );

  // have we defined any custom sidebars?
  if ( is_array( $sidebars[0] ) ) {

    // get them
    $sidebars = $sidebars[0];

    $count_sidebars = 0;

    // iterate through each sidebar
    foreach ( $sidebars as $key => $sidebar ) {

      ++$count_sidebars;

      $defaults = array(
      'name' => __( esc_attr( "Sidebar-{$count_sidebars}" ), WP_LIGHT ),
      'id' => "sidebar-{$count_sidebars}",
      'before_widget' => '<section id="%1$s"class="%2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      );

      // parse the defaults with sidebar specific arguments
      $sidebar = wp_parse_args( $sidebar, $defaults );

      register_sidebar( $sidebar );
    }
  } else {

    // default behavior
    $sidebar = array(
    'name' => __( 'Sidebar-1', WP_LIGHT ),
    'id' => 'sidebar-1',
    'before_widget' => '<section id="%1$s"class="%2$s">',
    'after_widget' => '</section>',
    'before_title' => '</h3>',
    'after_title' => '</h3>',
    );

    register_sidebar( $sidebar );
  }
}
