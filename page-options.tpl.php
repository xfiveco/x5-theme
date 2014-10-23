<?php
/**
 * Template Name: Options Page
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
get_header();

// get our options
$wp_light_options = get_option( 'wp_light_options' );

// conditionally check if values are set
$wp_light_text = isset( $wp_light_options['wp_light_text'] ) ? $wp_light_options['wp_light_text'] : '';
$wp_light_wp_editor = isset( $wp_light_options['wp_light_wp_editor'] ) ? $wp_light_options['wp_light_wp_editor'] : '';
$wp_light_dropdown_pages = isset( $wp_light_options['wp_light_dropdown_pages'] ) ? $wp_light_options['wp_light_dropdown_pages'] : '';
?>
<?php echo esc_attr( $wp_light_text ); ?>
<br />
<?php echo apply_filters( 'the_content', $wp_light_wp_editor ); ?>
<br />
<?php echo $wp_light_dropdown_pages; ?>

<?php get_sidebar(); ?>
<?php get_footer();
