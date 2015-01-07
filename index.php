<?php
/**
 * WPized Light: Index
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
get_header();
?>

<?php if ( have_posts() ) : ?>

	<?php posts_nav_link(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'partials/content', 'loop' ); ?>

	<?php endwhile; ?>

<?php else : ?>

	<?php // print empty info here (no posts found)  ?>

<?php endif; ?>

<?php // add pagination if needed here  ?>

<?php get_sidebar(); ?>
<?php get_footer();
