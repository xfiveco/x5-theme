<?php
/**
 * WPized Light: Comments Handler
 *
 * Cover the comments logic here
 * Taken directly from Twenty Eleven
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
?>

<?php if ( post_password_required() ) : ?>
  This post is password protected. Enter the password to view any comments.
	<?php
	/*
	* Stop the rest of comments.php from being processed,
	* but don't kill the script entirely -- we still have
	* to fully load the template.
	*/
	return;
endif;
?>
<?php if ( have_comments() ) : ?>
	<?php
	/*
	* List comments acording to custom_comment function specified
	* in commentstemplate.php file
	*/
	?>
	<?php wp_list_comments( array( 'callback' => 'wp_light_comment' ) ); ?>

	<?php paginate_comments_links(); ?>

	<?php
	/*
	* If there are no comments and comments are closed, let's leave a little note, shall we?
	* But we don't want the note on pages or post types that do not support comments.
	*/
	?>
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
  Comments closed
<?php endif; ?>

<?php
/*
 * Display comment form if comments are open and post type supports comments
 */
?>
<?php if ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<?php
	/*
	* Alter default values of form field
	* Name, Author and URL are edited in functions.php via
	* comment_form_default_fields filter hook
	*/
	$defaults = array(
	'comment_field' => '<li><label for="message-txt">Message</label><textarea cols="87" rows="7" id="comment" name="comment"></textarea></li>',
	'must_log_in' => '<p class="must-log-in">You must log in to post a comment.</p>',
	'logged_in_as' => '<p class="logged-in-as">Logged in.</p>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'id_form' => 'commentform',
	'id_submit' => 'button-add-comment',
	'title_reply' => __( 'Leave a reply', WP_LIGHT ),
	'title_reply_to' => __( 'Leave a Reply to %s', WP_LIGHT ),
	'cancel_reply_link' => __( 'Cancel comment', WP_LIGHT ),
	'label_submit' => __( 'Comment', WP_LIGHT ),
	);
	comment_form( $defaults );
	?>
<?php endif;
