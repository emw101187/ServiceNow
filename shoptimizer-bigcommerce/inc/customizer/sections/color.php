<?php
/**
 *
 * Kirki color section
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */
function shoptimizerbigcommerce_kirki_section_color( $wp_customize ) {

	// Colors.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_topbar', array(
			'title'    => esc_html__( 'Top Bar', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_header', array(
			'title'    => esc_html__( 'Header', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_below_header', array(
			'title'    => esc_html__( 'Below Header', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_navigation', array(
			'title'    => esc_html__( 'Navigation', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_general', array(
			'title'    => esc_html__( 'General', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_bigcommerce', array(
			'title'    => esc_html__( 'BigCommerce', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_color_section_footer', array(
			'title'    => esc_html__( 'Footer', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_colors',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'shoptimizerbigcommerce_kirki_section_color' );
