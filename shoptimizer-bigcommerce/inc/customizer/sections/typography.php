<?php
/**
 *
 * Kirki typography section
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */
function shoptimizerbigcommerce_kirki_section_typography( $wp_customize ) {

	// Typography.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_mainbody', array(
			'title'    => esc_html__( 'Main Body', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Paragraphs.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_p', array(
			'title'    => esc_html__( 'Paragraphs', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Heading One.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_headings_h1', array(
			'title'    => esc_html__( 'Heading One', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Two.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_headings_h2', array(
			'title'    => esc_html__( 'Heading Two', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Three.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_headings_h3', array(
			'title'    => esc_html__( 'Heading Three', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Four.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_headings_h4', array(
			'title'    => esc_html__( 'Heading Four', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Five.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_headings_h5', array(
			'title'    => esc_html__( 'Heading Five', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Blockquote.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_blockquote', array(
			'title'    => esc_html__( 'Blockquotes', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Widget Title.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_headings_widget_title', array(
			'title'    => esc_html__( 'Widget Titles', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// Blog.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_blog', array(
			'title'    => esc_html__( 'Blog', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

	// bigcommerce.
	$wp_customize->add_section(
		'shoptimizerbigcommerce_typography_section_bigcommerce', array(
			'title'    => esc_html__( 'BigCommerce', 'shoptimizer-bigcommerce' ),
			'panel'    => 'shoptimizerbigcommerce_panel_typography',
			'priority' => 10,
		)
	);

}

add_action( 'customize_register', 'shoptimizerbigcommerce_kirki_section_typography' );
