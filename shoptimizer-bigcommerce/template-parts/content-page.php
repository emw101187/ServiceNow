<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package shoptimizer-bigcommerce
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to shoptimizerbigcommerce_page add_action
	 *
	 * @hooked shoptimizerbigcommerce_page_header          - 10
	 * @hooked shoptimizerbigcommerce_page_content         - 20
	 */
	do_action( 'shoptimizerbigcommerce_page' );
	?>
</div><!-- #post-## -->
