<?php
/**
 *
 * Typography theme options
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

// Main body fields.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_mainbody_fontfamily',
		'label'    => esc_html__( 'Font settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_mainbody',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
		),
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => 'html, body, button, input, select, textarea, h6',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-button__link, figcaption, .wp-block-table, .wp-block-pullquote__citation',
				'property' => 'font-size',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// Paragraph.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_p_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_p',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => 'regular',
			'font-size'      => '17px',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#323232',
			'text-transform' => 'none',
		),
		'priority' => 20,
		'output'   => array(
			array(
				'element'  => '.entry-content p, .entry-content ul, .entry-content ol',
				'property' => 'font-family',
			),
			array(
				'element'  => '.edit-post-visual-editor.editor-styles-wrapper p, .edit-post-visual-editor.editor-styles-wrapper li',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h1.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_h1_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_headings_h1',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '40px',
			'line-height'    => '1.3',
			'letter-spacing' => '-0.5px',
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 20,
		'output'   => array(
			array(
				'element'  => 'h1',
				'property' => 'font-family',
			),
			array(
				'element'  => '.editor-post-title__input',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h2.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_h2_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_headings_h2',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '28px',
			'line-height'    => '1.4',
			'letter-spacing' => '-0.2px',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 30,
		'output'   => array(
			array(
				'element'  => 'h2',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-heading h2',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h3.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_h3_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_headings_h3',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '24px',
			'line-height'    => '1.55',
			'letter-spacing' => '-0.3px',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 40,
		'output'   => array(
			array(
				'element'  => 'h3',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-heading h3',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h4.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_h4_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_headings_h4',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '20px',
			'line-height'    => '1.5',
			'letter-spacing' => '-0.3px',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 50,
		'output'   => array(
			array(
				'element'  => 'h4',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-heading h4',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h5.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_h5_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_headings_h5',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => 'regular',
			'font-size'      => '18px',
			'line-height'    => '1.6',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => 'h5',
				'property' => 'font-family',
			),
		),
	)
);

// Blockquote.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_blockquote_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_blockquote',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '400',
			'font-size'      => '20px',
			'line-height'    => '1.55',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.entry-content blockquote p',
				'property' => 'font-family',
			),
			array(
				'element'  => '.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote p, .edit-post-visual-editor.editor-styles-wrapper .wp-block-quote',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// Widget Titles.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_widget_title_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_headings_widget_title',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.5',
			'letter-spacing' => '0px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.widget .widget-title, .widget .widgettitle',
				'property' => 'font-family',
			),
		),
	)
);

// Blog Post Title.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_blog_post_title',
		'label'    => esc_html__( 'Blog Post Title', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_blog',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '34px',
			'line-height'    => '1.24',
			'letter-spacing' => '-0.5px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => 'body.single-post h1',
				'property' => 'font-family',
			),
		),
	)
);

// Single Product Title.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_bigcommerce_single_title',
		'label'    => esc_html__( 'Single Product Title', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_bigcommerce',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '30px',
			'letter-spacing' => '-0.5px',
			'line-height'    => '44px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.bc-product-single__meta .bc-product__title, .bc-product-single__meta .bc-product__title, .bc-product-card--single .bc-product__title',
				'property' => 'font-family',
			),
		),
	)
);

// Primary Buttons.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_typography_bigcommerce_primary_button',
		'label'    => esc_html__( 'Primary Buttons', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_typography_section_bigcommerce',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '600',
			'font-size'      => '18px',
			'letter-spacing' => '0px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '',
				'property' => 'font-family',
			),
		),
	)
);
