<?php

/*
 * WPIzed Light: Post
 * 
 * @package WordPress
 * @subpackage WPized_Light
 */
get_header();
the_post();
?>

<?php get_template_part( 'partials/content' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); 