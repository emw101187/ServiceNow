<?php
/**
 * The template for displaying full width pages without a heading.
 *
 * Template Name: Full width (no heading)
 *
 * @package shoptimizer-bigcommerce
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'shoptimizerbigcommerce_page_before' );

				get_template_part( 'template-parts/content', 'page' );

				/**
				 * Functions hooked in to shoptimizerbigcommerce_page_after action
				 *
				 * @hooked shoptimizerbigcommerce_display_comments - 10
				 */
				do_action( 'shoptimizerbigcommerce_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
