<?php
/**
 *
 * Kirki defaults
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

if ( ! function_exists( 'shoptimizerbigcommerce_get_option_defaults' ) ) {

	/**
	 *
	 * Sensible defaults ftw.
	 */
	function shoptimizerbigcommerce_get_option_defaults() {
		$defaults = array(

			// Top Bar.
			'shoptimizerbigcommerce_layout_top_bar_display' 				=> 'enable',
			'shoptimizerbigcommerce_layout_top_bar_background' 				=> '#fff',
			'shoptimizerbigcommerce_layout_top_bar_text'   					=> '#323232',
			'shoptimizerbigcommerce_layout_top_bar_border' 					=> '#eee',

			// Header.
			'shoptimizerbigcommerce_header_bg_color'       					=> '#fff',
			'shoptimizerbigcommerce_header_border_color'   					=> '#eee',
			'shoptimizerbigcommerce_layout_search_display' 					=> 'enable',
			'shoptimizerbigcommerce_mobile_hamburger'      					=> '#111',
			'shoptimizerbigcommerce_mobile_divider_line'   					=> '#eee',
			'shoptimizerbigcommerce_mobile_color'          					=> '#222',
			'shoptimizerbigcommerce_search_placeholder_text' 				=> 'Search all products...',

			// Navigation.
			'shoptimizerbigcommerce_navigation_bg_color'   					=> '#222',
			'shoptimizerbigcommerce_secondary_navigation_color' 			=> '#404040',
			'shoptimizerbigcommerce_navigation_color'      					=> '#fff',
			'shoptimizerbigcommerce_navigation_color_hover' 				=> '#dc9814',
			'shoptimizerbigcommerce_sticky_navigation_border' 				=> 'rgba(0, 0, 0, 0.0)',

			// Navigation Dropdowns.
			'shoptimizerbigcommerce_navigation_dropdown_background' 		=> '#fff',
			'shoptimizerbigcommerce_navigation_dropdown_color' 				=> '#323232',
			'shoptimizerbigcommerce_navigation_dropdown_hover_color' 		=> '#dc9814',

			// Navigation Cart.
			'shoptimizerbigcommerce_cart_color'            					=> '#dc9814',
			'shoptimizerbigcommerce_cart_color_hover'      					=> '#fff',
			'shoptimizerbigcommerce_cart_icon_color'       					=> '#dc9814',
			'shoptimizerbigcommerce_cart_action'							=> 'drawer',

			// Sticky Header.
			'shoptimizerbigcommerce_sticky_header'         					=> 'enable',
			'shoptimizerbigcommerce_logo_mark_image'       					=> '',

			// Below Header.
			'shoptimizerbigcommerce_below_header_bg'       					=> '#dc9814',
			'shoptimizerbigcommerce_below_header_text'     					=> '#fff',

			// BigCommerce.
			'shoptimizerbigcommerce_layout_floating_button_display' 		=> true,
			'shoptimizerbigcommerce_layout_floating_button_text' 			=> 'Questions? Request a Call Back',
			'shoptimizerbigcommerce_single_product_layout'					=> 'single-right-sidebar',

			// Blog.
			'shoptimizerbigcommerce_layout_blog'           					=> 'flow',
			'shoptimizerbigcommerce_layout_blog_summary_display' 			=> true,
			'shoptimizerbigcommerce_post_featured_image'              		=> true,

			// Colors.
			'shoptimizerbigcommerce_color_general_swatch'  					=> '#dc9814',

			'shoptimizerbigcommerce_color_general_links'   					=> '#3077d0',
			'shoptimizerbigcommerce_color_general_links_hover' 				=> '#111',

			'shoptimizerbigcommerce_color_body_bg'         					=> '#fff',

			'shoptimizerbigcommerce_ratings_color'         					=> '#ee9e13',

			'shoptimizerbigcommerce_bigcommerce_button_text' 				=> '#fff',
			'shoptimizerbigcommerce_bigcommerce_button_bg' 					=> '#3bb54a',
			'shoptimizerbigcommerce_bigcommerce_button_hover_bg' 			=> '#009245',

			'shoptimizerbigcommerce_floating_button_bg'    					=> '#dc9814',
			'shoptimizerbigcommerce_floating_button_text'  					=> '#fff',

			// Footer.
			'shoptimizerbigcommerce_below_content_display' 					=> 'show',
			'shoptimizerbigcommerce_footer_display'        					=> 'show',
			'shoptimizerbigcommerce_copyright_display'     					=> 'show',

			'shoptimizerbigcommerce_footer_bg'             					=> '#111',
			'shoptimizerbigcommerce_footer_heading_color'  					=> '#fff',
			'shoptimizerbigcommerce_footer_color'          					=> '#ccc',
			'shoptimizerbigcommerce_footer_links_color'    					=> '#999',
			'shoptimizerbigcommerce_footer_links_hover_color' 				=> '#fff',

			// Speed Settings.
			'shoptimizerbigcommerce_general_speed_critical_css' 			=> 'no',
			'shoptimizerbigcommerce_general_speed_minify_main_css' 			=> 'no',
		);

		return apply_filters( 'shoptimizerbigcommerce_get_option_defaults', $defaults );
	}
}// End if().
