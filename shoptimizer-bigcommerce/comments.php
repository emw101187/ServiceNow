<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package shoptimizer-bigcommerce
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area" aria-label="<?php esc_html_e( 'Post Comments', 'shoptimizer-bigcommerce' ); ?>">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'shoptimizer-bigcommerce' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>
		<nav id="comment-nav-above" class="comment-navigation" aria-label="<?php esc_html_e( 'Comment Navigation Above', 'shoptimizer-bigcommerce' ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'shoptimizer-bigcommerce' ); ?></span>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'shoptimizer-bigcommerce' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'shoptimizer-bigcommerce' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
						'callback'   => 'shoptimizerbigcommerce_comment',
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation" aria-label="<?php esc_html_e( 'Comment Navigation Below', 'shoptimizer-bigcommerce' ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'shoptimizer-bigcommerce' ); ?></span>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'shoptimizer-bigcommerce' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'shoptimizer-bigcommerce' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
			<?php
		endif; // Check for comment navigation.

	endif;

	if ( ! comments_open() && '0' !== get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'shoptimizer-bigcommerce' ); ?></p>
		<?php
	endif;

	$args = apply_filters(
		'shoptimizerbigcommerce_comment_form_args', array(
			'title_reply_before' => '<span id="reply-title" class="gamma comment-reply-title">',
			'title_reply_after'  => '</span>',
		)
	);

	comment_form( $args );
	?>

</section><!-- #comments -->
