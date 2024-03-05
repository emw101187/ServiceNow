<?php
/**
 * Template used to display post content.
 *
 * @package shoptimizer-bigcommerce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to shoptimizerbigcommerce_loop_post action.
	 *
	 * @hooked shoptimizerbigcommerce_post_header          - 10
	 * @hooked shoptimizerbigcommerce_post_meta            - 20
	 * @hooked shoptimizerbigcommerce_post_content         - 30
	 */
	do_action( 'shoptimizerbigcommerce_loop_post' );
	?>

</article><!-- #post-## -->
