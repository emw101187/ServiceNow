<?php
/**
 *
 * Kirki options panels
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */
function shoptimizerbigcommerce_kirki_panels( $wp_customize ) {

	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_general', array(
			'priority'    => 10,
			'title'       => esc_html__( 'General', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage general theme settings', 'shoptimizer-bigcommerce' ),
		)
	);
	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_colors', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Colors', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage theme colors', 'shoptimizer-bigcommerce' ),
		)
	);
	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_mainmenu', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Header and Navigation', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage the header and navigation', 'shoptimizer-bigcommerce' ),
		)
	);
	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_heading', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Page Heading', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage the page heading', 'shoptimizer-bigcommerce' ),
		)
	);
	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_typography', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Typography', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage theme typography', 'shoptimizer-bigcommerce' ),
		)
	);
	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_layout', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Layout', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage theme header, footer and more', 'shoptimizer-bigcommerce' ),
		)
	);
	$wp_customize->add_panel(
		'shoptimizerbigcommerce_panel_blog', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Blog', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Manage blog settings', 'shoptimizer-bigcommerce' ),
		)
	);
}

add_action( 'customize_register', 'shoptimizerbigcommerce_kirki_panels' );
