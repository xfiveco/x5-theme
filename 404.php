<?php
/**
 * WPized Light: 404 page
 *
 * Contains some dummy HTML with sample content
 * http://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
get_header();
?>

<?php get_search_form(); ?>

<div class="not-found">
  <p> Perhaps checking one of these categories could help you? </p>
  <ul>
    <?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
  </ul>
</div>

<?php get_footer();
