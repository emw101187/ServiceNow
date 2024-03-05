<?php
/**
 * Template used to display post content on single pages.
 *
 * @package shoptimizer-bigcommerce
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'shoptimizerbigcommerce_single_post_top' );

	/**
	 * Functions hooked into shoptimizerbigcommerce_single_post add_action
	 *
	 * @hooked shoptimizerbigcommerce_post_header          - 10
	 * @hooked shoptimizerbigcommerce_post_meta            - 20
	 * @hooked shoptimizerbigcommerce_post_content         - 30
	 */
	do_action( 'shoptimizerbigcommerce_single_post' );

	?>

</div><!-- #post-## -->
