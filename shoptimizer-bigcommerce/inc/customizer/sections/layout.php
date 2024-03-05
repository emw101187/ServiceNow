<?php
/**
 *
 * Kirki layout section
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */
function shoptimizerbigcommerce_kirki_section_layout( $wp_customize ) {

	$wp_customize->add_section(
		'shoptimizerbigcommerce_layout_section_grid', array(
			'title'    => esc_html__( 'Grid', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_layout',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_layout_section_blog', array(
			'title'    => esc_html__( 'Blog', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_layout',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_layout_section_bigcommerce', array(
			'title'       => esc_html__( 'BigCommerce', 'shoptimizer-bigcommerce' ),
			'description' => esc_html__( 'Publish and refresh to see the changes.', 'shoptimizer-bigcommerce' ),
			'panel'       => 'shoptimizerbigcommerce_panel_layout',
			'priority'    => 10,
		)
	);

	$wp_customize->add_section(
		'shoptimizerbigcommerce_layout_section_footer', array(
			'title'    => esc_html__( 'Footer', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_layout',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'shoptimizerbigcommerce_kirki_section_layout' );
