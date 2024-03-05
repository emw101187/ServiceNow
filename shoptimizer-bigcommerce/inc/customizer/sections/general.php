<?php
/**
 *
 * Kirki general section
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */
function shoptimizerbigcommerce_kirki_section_general( $wp_customize ) {

	$wp_customize->add_section(
		'shoptimizerbigcommerce_section_general_logo', array(
			'title'    => esc_html__( 'Site Logo', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_general',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_section_general_sticky_logo', array(
			'title'    => esc_html__( 'Sticky Logo', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_general',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_section_general_mobile_header', array(
			'title'    => esc_html__( 'Mobile Header', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_general',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_section_general_speed_settings', array(
			'title'    => esc_html__( 'Speed Settings', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_general',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'shoptimizerbigcommerce_kirki_section_general' );
