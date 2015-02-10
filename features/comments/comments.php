<?php
if ( current_theme_supports( 'comments' ) ) {

	/**
	* Alter comments form default fields via filter function
	*/
	function wp_light_comment_fields($fields) {
		$fields['author'] = '<li><label for="name-txt">Name *</label><input type="text" id="name-txt" name="author" value="" /></li>';
		$fields['email'] = '<li><label for="email-txt">Email *</label><input type="text" id="email-txt" name="email" value="" /></li>';
		return $fields;
	}

	add_filter( 'comment_form_default_fields', 'wp_light_comment_fields' );

	if ( ! function_exists( 'wp_light_comment' ) ) :

		/**
		 * Template for comments, without pingbacks or trackbacks
		 * Based on Twenty Eleven Theme
		 */
		function wp_light_comment($comment, $args, $depth) {
			// @codingStandardsIgnoreStart
			$GLOBALS['comment'] = $comment;
			// @codingStandardsIgnoreEnd

			switch ( $comment->comment_type ) :
				case 'pingback' :
				case 'trackback' :
					?>
				  Pingback: <?php comment_author_link(); ?><?php edit_comment_link(); ?>
				<?php
				break;
			default :
				?>

				<?php
				$avatar_size = 49;
				if ( '0' != $comment->comment_parent ) {
					$avatar_size = 49; }
				?>

			  <div <?php comment_class( 'comment' ); ?> id="comment-<?php comment_ID(); ?>" ><?php echo get_avatar( $comment, $avatar_size ); ?>

            <div class="user-comment" id="comment-<?php comment_ID(); ?>">

              <ul class="meta">
                <li class="author"><?php echo get_comment_author_link(); ?> says:</li>
                <li class="time"><a href="#"><?php echo get_comment_date(); ?></a> at <?php echo get_comment_time(); ?></li>
              </ul>
				<?php comment_text(); ?> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', WP_LIGHT ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

				<?php edit_comment_link(); ?>
            </div>
			  </div>
			<?php if ( '0' == $comment->comment_approved ) : ?>
            Your comment is awaiting moderation.
			<?php endif; ?>
			<?php
			  break;
			endswitch;
		}

	endif; // ends check for ()
}
