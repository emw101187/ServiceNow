<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package shoptimizer-bigcommerce
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shoptimizerbigcommerce_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'shoptimizerbigcommerce_pingback_header' );


/**
 * Minimal Page template - can be used on the checkout for example.
 */
function shoptimizerbigcommerce_minimal_template() {
	if ( is_page_template( 'template-minimal.php' ) ) {

		remove_action( 'shoptimizerbigcommerce_before_content', 'shoptimizerbigcommerce_sticky_header_display', 5 );
		remove_action( 'shoptimizerbigcommerce_before_content', 'shoptimizerbigcommerce_header_widget_region', 10 );

		remove_action( 'shoptimizerbigcommerce_topbar', 'shoptimizerbigcommerce_skip_links', 0 );
		remove_action( 'shoptimizerbigcommerce_topbar', 'shoptimizerbigcommerce_top_bar', 10 );

		remove_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_site_branding', 20 );
		remove_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_product_search', 25 );
		remove_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_secondary_navigation', 30 );
		remove_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_header_cart', 50 );

		remove_action( 'shoptimizerbigcommerce_content_top', 'shoptimizerbigcommerce_breadcrumbs', 10 );

		remove_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_primary_navigation_wrapper', 42 );
		remove_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_primary_navigation', 50 );
		remove_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_header_cart', 60 );
		remove_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_primary_navigation_wrapper_close', 68 );

		remove_action( 'shoptimizerbigcommerce_before_footer', 'shoptimizerbigcommerce_below_content', 10 );

		remove_action( 'shoptimizerbigcommerce_footer', 'shoptimizerbigcommerce_footer_widgets', 20 );
		remove_action( 'shoptimizerbigcommerce_footer', 'shoptimizerbigcommerce_footer_copyright', 30 );
	}
}
add_action( 'wp_head', 'shoptimizerbigcommerce_minimal_template' );

/**
 * Produces nice safe html for presentation.
 *
 * @param $input - accepts a string.
 * @return string
 */
function shoptimizerbigcommerce_safe_html( $input ) {

	$args = array(
		// formatting.
		'span'   => array(
			'class' => array(),
		),
		'h2'     => array(
			'class' => array(),
		),
		'del'    => array(),
		'ins'    => array(),
		'strong' => array(),
		'em'     => array(),
		'b'      => array(),
		'i'      => array(
			'class' => array(),
		),
		'img'    => array(
			'href'   => array(),
			'alt'    => array(),
			'class'  => array(),
			'scale'  => array(),
			'width'  => array(),
			'height' => array(),
			'src'    => array(),
			'srcset' => array(),
			'sizes'  => array(),
		),
		'p'      => array(),
		// links.
		'a'      => array(
			'href'  => array(),
			'class' => array(),
		),
	);

	return wp_kses( $input, $args );
}
