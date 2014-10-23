<?php
/**
 * WPized Light: Header
 *
 * Contains dummy HTML to show the default structure of WordPress header file
 * 
 * Remember to always include the wp_head() call before the ending </head> tag
 *
 * Make sure that you include the <!DOCTYPE html> in the same line as ?> closing tag
 * otherwise ajax might not work properly
 * 
 * @package WordPress
 * @subpackage WPized_Light
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />

    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/css/main.css" />

    <!-- optional but recommended -->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="shortcut icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/images/theme/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!-- /optional -->

    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php
    // do not remove
    wp_head();
    ?>
  </head>
  <body <?php body_class( "no-js" ); ?>>

    <?php do_action( 'wp_light_head' ); ?>
    
    <div class="search"><?php get_search_form(); ?></div>

