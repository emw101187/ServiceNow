<?php
/**
 *
 * Some wrappers for theme mods/options and their defaults
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

// Set sensible defaults.
require_once get_template_directory() . '/inc/customizer/defaults.php';

if ( ! function_exists( 'shoptimizerbigcommerce_get_option' ) ) {
	/**
	 * Main function used to call them options
	 *
	 * @param int $key The theme option argument.
	 */
	function shoptimizerbigcommerce_get_option( $key ) {
		$shoptimizerbigcommerce_options = shoptimizerbigcommerce_get_options();
		$shoptimizerbigcommerce_option  = get_theme_mod( $key, $shoptimizerbigcommerce_options[ $key ] );
		return $shoptimizerbigcommerce_option;
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_get_options' ) ) {

	/**
	 * Get theme option defaults
	 */
	function shoptimizerbigcommerce_get_options() {
		return wp_parse_args(
			get_theme_mods(), shoptimizerbigcommerce_get_option_defaults()
		);
	}
}
