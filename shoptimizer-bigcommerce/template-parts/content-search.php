<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoptimizer-bigcommerce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php shoptimizerbigcommerce_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php echo (sanitize_text_field($response->data->calculated_price)); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			shoptimizerbigcommerce_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php // shoptimizerbigcommerce_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
