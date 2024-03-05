<?php
/**
 *
 * Kirki menu section
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */
function shoptimizerbigcommerce_kirki_section_mainmenu( $wp_customize ) {

	// Top Bar.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_header_section_top_bar', array(
			'title'    => esc_html__( 'Top Bar', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Header Layout.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_header_section_layout', array(
			'title'    => esc_html__( 'Header', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Navigation.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_navigation_section_layout', array(
			'title'    => esc_html__( 'Navigation', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Responsive Breakpoint.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_mainmenu_section_responsive_breakpoint', array(
			'title'    => esc_html__( 'Responsive Breakpoint', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_mainmenu',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'shoptimizerbigcommerce_kirki_section_mainmenu' );
