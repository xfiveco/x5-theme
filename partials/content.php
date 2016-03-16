<?php
/**
 * X5: content-single
 *
 * The template for displaying content after all other content-{template} files
 * were either not used or not found, see:
 * http://codex.wordpress.org/Function_Reference/get_template_part
 *
 * @package WordPress
 * @subpackage X5
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <a href="<?php echo esc_attr( get_permalink() ); ?>"><?php the_title(); ?></a>

	<?php the_time( 'm/d/Y' ); ?>
	<?php // http://codex.wordpress.org/Formatting_Date_and_Time ?>

	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

  <div class="content"> <?php the_content(); ?></div>

	<?php comments_template() ?>

</div>
<!-- / post -->
