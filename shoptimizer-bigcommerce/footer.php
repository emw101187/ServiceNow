<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package shoptimizer-bigcommerce
 */

?>
	<?php do_action( 'shoptimizerbigcommerce_single_product_sidebar' ); ?>
		</div><!-- .col-full -->
	</div><!-- #content -->


	<?php do_action( 'shoptimizerbigcommerce_before_footer' ); ?>

			<?php
			/**
			 * Functions hooked in to shoptimizerbigcommerce_footer action
			 */
			do_action( 'shoptimizerbigcommerce_footer' );
			?>

	<?php do_action( 'shoptimizerbigcommerce_after_footer' ); ?>

</div><!-- #page -->
</div>

<?php wp_footer(); ?>

</body>
</html>
