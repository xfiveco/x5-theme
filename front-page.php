<?php
/**
 * WPized Light: Front Page
 *
 * Can be used for Front Page display
 * see: http://codex.wordpress.org/Creating_a_Static_Front_Page
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
get_header();
?>

<?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'partials/content' ); ?>

  <?php endwhile; ?>

<?php else : ?>

  <?php // print empty info here (no posts found)  ?>

<?php endif; ?>

<?php // add pagination if needed here  ?>

<?php get_sidebar(); ?>
<?php get_footer();
