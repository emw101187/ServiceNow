<?php
/**
 * shoptimizerbigcommerce hooks
 *
 * @package shoptimizer-bigcommerce
 */

add_action( 'shoptimizerbigcommerce_before_site', 'shoptimizerbigcommerce_activate_cart_drawer', 5 );

/**
 * General
 *
 * @see  shoptimizerbigcommerce_header_widget_region()
 * @see  shoptimizerbigcommerce_get_sidebar()
 */
add_action( 'shoptimizerbigcommerce_before_content', 'shoptimizerbigcommerce_sticky_header_display', 5 );
add_action( 'shoptimizerbigcommerce_before_content', 'shoptimizerbigcommerce_header_widget_region', 10 );
add_action( 'shoptimizerbigcommerce_sidebar', 'shoptimizerbigcommerce_get_sidebar', 10 );

/**
 * Topbar
 *
 * @see  shoptimizerbigcommerce_skip_links()
 * @see  shoptimizerbigcommerce_top_bar()
 */
add_action( 'shoptimizerbigcommerce_topbar', 'shoptimizerbigcommerce_skip_links', 0 );
add_action( 'shoptimizerbigcommerce_topbar', 'shoptimizerbigcommerce_top_bar', 10 );

/**
 * Header
 *
 * @see  shoptimizerbigcommerce_skip_links()
 * @see  shoptimizerbigcommerce_secondary_navigation()
 * @see  shoptimizerbigcommerce_site_branding()
 * @see  shoptimizerbigcommerce_primary_navigation()
 */
add_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_site_branding', 20 );
add_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_product_search', 25 );
add_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_secondary_navigation', 30 );
/*add_action( 'shoptimizerbigcommerce_header', 'shoptimizerbigcommerce_header_cart', 50 );*/

/**
 * Navigation
 *
 * @see  shoptimizerbigcommerce_primary_navigation_wrapper()
 * @see  shoptimizerbigcommerce_primary_navigation()
 * @see shoptimizerbigcommerce_primary_navigation_wrapper_close()
 */
add_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_primary_navigation_wrapper', 42 );
add_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_primary_navigation', 50 );
add_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_header_cart', 60 );
add_action( 'shoptimizerbigcommerce_navigation', 'shoptimizerbigcommerce_primary_navigation_wrapper_close', 68 );

/**
 * Content Top
 *
 * @see  shoptimizerbigcommerce_breadcrumbs()
 */
add_action( 'shoptimizerbigcommerce_content_top', 'shoptimizerbigcommerce_breadcrumbs', 10 );

/**
 * Footer
 *
 * @see  shoptimizerbigcommerce_footer_widgets()
 * @see  shoptimizerbigcommerce_footer_copyright()
 */
add_action( 'shoptimizerbigcommerce_before_footer', 'shoptimizerbigcommerce_below_content', 10 );
add_action( 'shoptimizerbigcommerce_footer', 'shoptimizerbigcommerce_footer_widgets', 20 );
add_action( 'shoptimizerbigcommerce_footer', 'shoptimizerbigcommerce_footer_copyright', 30 );

/**
 * Posts
 *
 * @see  shoptimizerbigcommerce_post_header()
 * @see  shoptimizerbigcommerce_post_meta()
 * @see  shoptimizerbigcommerce_post_content()
 * @see  shoptimizerbigcommerce_paging_nav()
 * @see  shoptimizerbigcommerce_single_post_header()
 * @see  shoptimizerbigcommerce_post_nav()
 * @see  shoptimizerbigcommerce_display_comments()
 */
add_action( 'shoptimizerbigcommerce_loop_post', 'shoptimizerbigcommerce_post_thumbnail', 5 );
add_action( 'shoptimizerbigcommerce_loop_post', 'shoptimizerbigcommerce_post_header', 10 );
remove_action( 'shoptimizerbigcommerce_loop_post', 'shoptimizerbigcommerce_post_content', 30 );

$shoptimizerbigcommerce_layout_blog_summary_display = '';
$shoptimizerbigcommerce_layout_blog_summary_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_blog_summary_display' );

if ( true === $shoptimizerbigcommerce_layout_blog_summary_display ) {
	add_action( 'shoptimizerbigcommerce_loop_post', 'shoptimizerbigcommerce_archive_post_content', 30 );
}

add_action( 'shoptimizerbigcommerce_loop_after', 'shoptimizerbigcommerce_paging_nav', 10 );
add_action( 'shoptimizerbigcommerce_single_post', 'shoptimizerbigcommerce_post_thumbnail_no_link', 5 );
add_action( 'shoptimizerbigcommerce_single_post', 'shoptimizerbigcommerce_post_header', 10 );
add_action( 'shoptimizerbigcommerce_single_post', 'shoptimizerbigcommerce_post_content', 30 );
add_action( 'shoptimizerbigcommerce_single_post', 'shoptimizerbigcommerce_post_meta', 40 );
add_action( 'shoptimizerbigcommerce_single_post_bottom', 'shoptimizerbigcommerce_display_comments', 20 );


/**
 * Pages
 *
 * @see  shoptimizerbigcommerce_page_header()
 * @see  shoptimizerbigcommerce_page_content()
 * @see  shoptimizerbigcommerce_display_comments()
 */

add_action( 'shoptimizerbigcommerce_page', 'shoptimizerbigcommerce_page_header', 10 );
add_action( 'shoptimizerbigcommerce_page', 'shoptimizerbigcommerce_page_content', 20 );
add_action( 'shoptimizerbigcommerce_page_after', 'shoptimizerbigcommerce_display_comments', 10 );
add_action( 'shoptimizerbigcommerce_homepage', 'shoptimizerbigcommerce_page_content', 20 );
