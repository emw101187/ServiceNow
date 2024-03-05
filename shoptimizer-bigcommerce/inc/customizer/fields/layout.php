<?php
/**
 *
 * Layout theme options
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

// Layout fields.
$shoptimizerbigcommerce_default_options = shoptimizerbigcommerce_get_option_defaults();


shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_layout_grid_heading_1',
		'section'  => 'shoptimizerbigcommerce_layout_section_grid',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #111; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Wrapper', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'select',
		'settings' => 'shoptimizerbigcommerce_layout_wrapper',
		'label'    => esc_attr__( 'Contain the grid?', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_layout_section_grid',
		'default'  => 'no',
		'choices'  => array(
			'yes' => esc_attr__( 'Yes', 'shoptimizer-bigcommerce' ),
			'no'  => esc_attr__( 'No', 'shoptimizer-bigcommerce' ),

		),
		'priority' => 10,
	)
);

// Wrapper width.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_wrapper_width_nb',
		'label'       => esc_html__( 'Wraper container width', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Adjust wrapper width in px.', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_layout_section_grid',
		'default'     => 2170,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 992,
			'max'  => 3000,
			'step' => 1,
		),
		'required'    => array(
			array(
				'setting'  => 'shoptimizerbigcommerce_layout_wrapper',
				'value'    => 'yes',
				'operator' => '==',
			),
		),
		'output'      => array(
			array(
				'element'  => '#page',
				'property' => 'max-width',
				'units'    => 'px',
			),
		),
	)
);

// Content Container width.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_container_width',
		'label'       => esc_html__( 'Content container width', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Adjust the width of your content container in pixels. Default is 1170px.', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_layout_section_grid',
		'default'     => 1170,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 992,
			'max'  => 2000,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'  => '.col-full, .single-product .site-content .shoptimizerbigcommerce-sticky-add-to-cart .col-full, body .bigcommerce-message',
				'property' => 'max-width',
				'units'    => 'px',
			),
			array(
				'element'       => '
			.product-details-wrapper,
			.single-product .bigcommerce-Tabs-panel,
			.single-product .archive-header .bigcommerce-breadcrumb,
			.related.products,
			.upsells.products,
			.main-navigation ul li.menu-item-has-children.full-width .container',
				'value_pattern' => '$px',
				'property'      => 'max-width',
				'units'         => '',
			),
			array(
				'element'       => '.below-content .col-full, footer .col-full',
				'value_pattern' => 'calc($px + 40px)',
				'property'      => 'max-width',
				'units'         => '',
			),
		),
	)
);

// Single Product Layout
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'select',
		'settings' => 'shoptimizerbigcommerce_single_product_layout',
		'label'    => esc_attr__( 'Single Product Layout', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'  => 'right',
		'choices'  => array(
			'single-right-sidebar' => esc_attr__( 'Right sidebar', 'shoptimizer-bigcommerce' ),
			'single-no-sidebar'  => esc_attr__( 'No sidebar', 'shoptimizer-bigcommerce' ),

		),
		'priority' => 10,
	)
);

// Display floating button.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'select',
		'settings' => 'shoptimizerbigcommerce_layout_floating_button_display',
		'label'    => esc_attr__( 'Display floating button', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'  => 'yes',
		'choices'  => array(
			'yes' => esc_attr__( 'Yes', 'shoptimizer-bigcommerce' ),
			'no'  => esc_attr__( 'No', 'shoptimizer-bigcommerce' ),

		),
		'priority' => 10,
	)
);

// Floating button text.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'text',
		'settings'  => 'shoptimizerbigcommerce_layout_floating_button_text',
		'label'     => esc_html__( 'Floating button text', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_floating_button_text'],
		'priority'  => 10,
		'transport' => 'auto',
		'required'  => array(
			array(
				'setting'  => 'shoptimizerbigcommerce_layout_floating_button_display',
				'value'    => 'yes',
				'operator' => '==',
			),
		),
		'js_vars'   => array(
			array(
				'element'  => '.call-back-feature',
				'function' => 'html',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_layout_bigcommerce_button_help',
		'section'  => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'  => '<div>' . esc_html__( 'The content is added within the widget: "Floating Button Modal Content"', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
		'required' => array(
			array(
				'setting'  => 'shoptimizerbigcommerce_layout_floating_button_display',
				'value'    => 'yes',
				'operator' => '==',
			),
		),
	)
);

/*
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_layout_bigcommerce_sidebar_heading_4',
		'section'  => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #111; text-transform: uppercase; letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Cart and Checkout', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);
*/

// Display progress bar.
/*
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'toggle',
		'settings' => 'shoptimizerbigcommerce_layout_progress_bar_display',
		'label'    => esc_attr__( 'Display progress bar', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'  => 1,
		'priority' => 10,
	)
);
*/


// Distration free checkout.
/*
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'toggle',
		'settings'    => 'shoptimizerbigcommerce_layout_bigcommerce_simple_checkout',
		'label'       => esc_attr__( 'Distraction-free checkout', 'shoptimizer-bigcommerce' ),
		'description' => esc_attr__( 'Simplifies the checkout experience for better conversions.', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'     => 1,
		'priority'    => 10,
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_layout_sidebars_heading_0',
		'section'  => 'shoptimizerbigcommerce_layout_section_sidebars',
		'default'  => '<div class="kirki-separator"
	style="margin: 10px -12px;
	padding: 12px 12px;
	color: #111;
	text-transform: uppercase;
	letter-spacing: 1px;
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	background-color: #fff;
	cursor: default;">' . esc_html__( 'bigcommerce', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);
*/



// Content Width.
/*
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_layout_content_width',
		'label'       => esc_html__( 'Content Width (%).', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Adjust the width of the content.', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_layout_section_sidebars',
		'default'     => 72,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'  => '.content-area',
				'property' => 'width',
				'units'    => '%',
			),
		),
	)
);
*/

// Blog Layout.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'select',
		'settings'  => 'shoptimizerbigcommerce_layout_blog',
		'label'     => esc_html__( 'Blog Layout', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_layout_section_blog',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_blog'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'list' => esc_html__( 'List', 'shoptimizer-bigcommerce' ),
			'flow' => esc_html__( 'Flow', 'shoptimizer-bigcommerce' ),
		),
	)
);

// Display single post featured image.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'toggle',
		'settings'  => 'shoptimizerbigcommerce_post_featured_image',
		'label'     => esc_html__( 'Display featured image', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_layout_section_blog',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);


// Footer fields.
// Display Below Content Area.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'select',
		'settings'  => 'shoptimizerbigcommerce_below_content_display',
		'label'     => esc_html__( 'Show Below Content?', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_layout_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_below_content_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'shoptimizer-bigcommerce' ),
			'hide' => esc_html__( 'Hide', 'shoptimizer-bigcommerce' ),
		),
	)
);

// Display Footer.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'select',
		'settings'  => 'shoptimizerbigcommerce_footer_display',
		'label'     => esc_html__( 'Show Footer?', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_layout_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_footer_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'shoptimizer-bigcommerce' ),
			'hide' => esc_html__( 'Hide', 'shoptimizer-bigcommerce' ),
		),
	)
);

// Display Copyright.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'select',
		'settings'  => 'shoptimizerbigcommerce_copyright_display',
		'label'     => esc_html__( 'Show Copyright?', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_layout_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_copyright_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'shoptimizer-bigcommerce' ),
			'hide' => esc_html__( 'Hide', 'shoptimizer-bigcommerce' ),
		),
	)
);

