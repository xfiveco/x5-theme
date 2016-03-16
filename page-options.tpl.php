<?php
/**
 * Template Name: Options Page
 *
 * @package WordPress
 * @subpackage X5
 */
get_header();

// get our options
$x5_options = get_option( 'x5_options' );

// conditionally check if values are set
$x5_text = isset( $x5_options['x5_text'] ) ? $x5_options['x5_text'] : '';
$x5_wp_editor = isset( $x5_options['x5_wp_editor'] ) ? $x5_options['x5_wp_editor'] : '';
$x5_dropdown_pages = isset( $x5_options['x5_dropdown_pages'] ) ? $x5_options['x5_dropdown_pages'] : '';
?>
<?php echo esc_attr( $x5_text ); ?>
<br />
<?php echo esc_html( apply_filters( 'the_content', $x5_wp_editor ) ); ?>
<br />
<?php echo esc_html( $x5_dropdown_pages ); ?>

<?php get_sidebar(); ?>
<?php get_footer();
