<?php
/**
 * X5: Search
 *
 * @package WordPress
 * @subpackage X5
 */
get_header();
?>

<?php if ( have_posts() ) : ?>

	<?php get_search_query(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'partials/content', 'loop' ); ?>

	<?php endwhile; ?>

<?php else : ?>

	<?php get_search_form(); ?>

  <div class="not-found">
    <h2> <?php _e( 'Nothing Found', X5 ); ?> </h2>
    <p> <?php _e( 'Perhaps checking one of these categories could help you? ', X5 ); ?></p>
    <ul>
		<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
    </ul>
  </div>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer();
