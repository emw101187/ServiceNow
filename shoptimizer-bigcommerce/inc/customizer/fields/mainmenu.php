<?php
/**
 *
 * Main menu theme options
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

// Main Menu.
$shoptimizerbigcommerce_default_options = shoptimizerbigcommerce_get_option_defaults();

// Display top bar.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'select',
		'settings'    => 'shoptimizerbigcommerce_layout_top_bar_display',
		'label'       => esc_html__( 'Display top bar?', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Enable or disable the top bar', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_header_section_top_bar',
		'default'     => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_top_bar_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'shoptimizer-bigcommerce' ),
			'disable' => esc_html__( 'Disable', 'shoptimizer-bigcommerce' ),
		),
	)
);

// Header Padding Top.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_header_top_padding',
		'label'       => esc_html__( 'Header Top Padding', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Adjust the header top padding', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_header_section_layout',
		'default'     => 30,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'     => '.col-full.main-header',
				'property'    => 'padding-top',
				'units'       => 'px',
				'media_query' => '@media (min-width: 992px)',
			),

		),
	)
);

// Header Padding Bottom.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_header_bottom_padding',
		'label'       => esc_html__( 'Header Bottom Padding', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Adjust the header bottom padding', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_header_section_layout',
		'default'     => 30,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'     => '.col-full.main-header',
				'property'    => 'padding-bottom',
				'units'       => 'px',
				'media_query' => '@media (min-width: 992px)',
			),
		),
	)
);

// Display the search.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'select',
		'settings'    => 'shoptimizerbigcommerce_layout_search_display',
		'label'       => esc_html__( 'Display the search?', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Enable or disable the search', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_header_section_layout',
		'default'     => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_search_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'   => esc_html__( 'BigCommerce Product Search', 'shoptimizer-bigcommerce' ),
			'standard' => esc_html__( 'Standard WordPress Search', 'shoptimizer-bigcommerce' ),
			'disable'  => esc_html__( 'Disable', 'shoptimizer-bigcommerce' ),
		),
	)
);

// Search placeholder text.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'text',
		'settings'  => 'shoptimizerbigcommerce_search_placeholder_text',
		'label'     => esc_html__( 'Product search placeholder text', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_header_section_layout',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_search_placeholder_text'],
		'priority'  => 10,
		'transport' => 'auto',
		'required'  => array(
			array(
				'setting'  => 'shoptimizerbigcommerce_layout_search_display',
				'value'    => 'enable',
				'operator' => '==',
			),
		),
		'js_vars'   => array(
			array(
				'element'  => '.placeholder-text',
				'function' => 'html',
			),
		),
	)
);

// Navigation Height.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_navigation_height',
		'label'       => esc_html__( 'Navigation Height', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Adjust the navigation height', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_navigation_section_layout',
		'default'     => 60,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'  => '.menu-primary-menu-container > ul > li > a, .cart-menu-wrapper li a, .logo-mark',
				'property' => 'line-height',
				'units'    => 'px',
			),
			array(
				'element'  => '.site-header-cart',
				'property' => 'height',
				'units'    => 'px',
			),
		),
	)
);

// Sticky Header.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'select',
		'settings'    => 'shoptimizerbigcommerce_sticky_header',
		'label'       => esc_html__( 'Sticky Header', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Stick the header on scroll', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_header_section_layout',
		'default'     => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_sticky_header'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'shoptimizer-bigcommerce' ),
			'disable' => esc_html__( 'Disable', 'shoptimizer-bigcommerce' ),
		),
	)
);

// Main Navigation Links Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_navigation_color',
		'label'     => esc_html__( 'Navigation links', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_navigation_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'     => '.menu-primary-menu-container > ul > li > a, .cart-menu-wrapper li a',
				'property'    => 'color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'     => '.menu-primary-menu-container > ul > li > a, .cart-menu-wrapper li a',
				'function'    => 'css',
				'property'    => 'color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
	)
);

// Main Navigation Links Hover/Selected Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_navigation_color_hover',
		'label'     => esc_html__( 'Navigation links hover/selected', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_navigation_color_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.menu-primary-menu-container > ul > li > a span:before',
				'property' => 'border-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.menu-primary-menu-container > ul > li > a span:before',
				'property' => 'border-color',
			),
		),
	)
);

// Fade out other menu items on hover.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'slider',
		'settings'    => 'shoptimizerbigcommerce_navigation_color_other_hover',
		'label'       => esc_html__( 'Fade out other links when hovering over a menu item.', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Opacity (%).', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_color_section_navigation',
		'default'     => 0.65,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.01,
		),
		'output'      => array(
			array(
				'element'  => '.menu-primary-menu-container > ul#menu-primary-menu:hover > li > a',
				'property' => 'opacity',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_colors_navigation_heading_1',
		'section'  => 'shoptimizerbigcommerce_color_section_navigation',
		'default'  => '<div class="kirki-separator" 
	style="margin: 10px -12px;
	padding: 12px 12px;
	color: #111;
	text-transform: uppercase;
	letter-spacing: 1px;
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	background-color: #fff;
	cursor: default;">' . esc_html__( 'Dropdowns', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// Navigation Dropdown Background Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_navigation_dropdown_background',
		'label'     => esc_html__( 'Navigation dropdown background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_navigation_dropdown_background'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'     => '.main-navigation ul.menu ul.sub-menu',
				'property'    => 'background-color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'     => '.main-navigation ul.menu ul.sub-menu',
				'function'    => 'css',
				'property'    => 'background-color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
	)
);

// Navigation Dropdown Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_navigation_dropdown_color',
		'label'     => esc_html__( 'Navigation dropdown text', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_navigation_dropdown_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'     => '.main-navigation ul.menu ul li a, .main-navigation ul.nav-menu ul li a',
				'property'    => 'color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'     => '.main-navigation ul.menu ul li a, .main-navigation ul.nav-menu ul li a',
				'function'    => 'css',
				'property'    => 'color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
	)
);

// Main Navigation Dropdown Hover Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_navigation_dropdown_hover_color',
		'label'     => esc_html__( 'Navigation dropdown hover', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_navigation_dropdown_hover_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'     => '.main-navigation ul.menu ul a:hover',
				'property'    => 'color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'     => '.main-navigation ul.menu ul a:hover',
				'function'    => 'css',
				'property'    => 'color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_colors_navigation_heading_2',
		'section'  => 'shoptimizerbigcommerce_color_section_navigation',
		'default'  => '<div class="kirki-separator" 
	style="margin: 10px -12px;
	padding: 12px 12px;
	color: #111;
	text-transform: uppercase;
	letter-spacing: 1px;
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	background-color: #fff;
	cursor: default;">' . esc_html__( 'Secondary Navigation', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// Secondary Navigation Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_secondary_navigation_color',
		'label'     => esc_html__( 'Secondary navigation color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_secondary_navigation_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'body .secondary-navigation .menu a, .ri.menu-item:before, .fa.menu-item:before',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'body .secondary-navigation .menu a, .ri.menu-item:before, .fa.menu-item:before',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_colors_navigation_heading_21',
		'section'  => 'shoptimizerbigcommerce_color_section_navigation',
		'default'  => '<div class="kirki-separator" 
	style="margin: 10px -12px;
	padding: 12px 12px;
	color: #111;
	text-transform: uppercase;
	letter-spacing: 1px;
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	background-color: #fff;
	cursor: default;">' . esc_html__( 'Sticky Navigation', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// Sticky navigation border.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_sticky_navigation_border',
		'label'     => esc_html__( 'Sticky navigation border', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_topbar',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_sticky_navigation_border'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.shoptimizerbigcommerce-primary-navigation.is_stuck',
				'property' => 'border-bottom-color',
			),
		),
		'transport' => 'postMessage',
		'choices'   => array(
			'alpha' => true,
		),
		'js_vars'   => array(
			array(
				'element'  => '.shoptimizerbigcommerce-primary-navigation.is_stuck',
				'function' => 'css',
				'property' => 'border-bottom-color',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_colors_navigation_heading_3',
		'section'  => 'shoptimizerbigcommerce_color_section_navigation',
		'default'  => '<div class="kirki-separator" 
	style="margin: 10px -12px;
	padding: 12px 12px;
	color: #111;
	text-transform: uppercase;
	letter-spacing: 1px;
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	background-color: #fff;
	cursor: default;">' . esc_html__( 'Cart', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// Navigation Cart Icon Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_cart_icon_color',
		'label'     => esc_html__( 'Cart icon', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_cart_icon_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.site-header .site-header-cart a.cart-contents .count, .site-header .site-header-cart a.cart-contents .count:after,
				.cart-menu-wrapper .bigcommerce-cart__item-count::after, .cart-menu-wrapper .bigcommerce-cart__item-count',
				'property' => 'border-color',
			),
			array(
				'element'  => '.site-header .site-header-cart a.cart-contents .count',
				'property' => 'color',
			),
			array(
				'element'  => '.cart-menu-wrapper a:hover .bigcommerce-cart__item-count',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.site-header .site-header-cart a.cart-contents .count, .site-header .site-header-cart a.cart-contents .count:after,
				.cart-menu-wrapper .bigcommerce-cart__item-count::after, .cart-menu-wrapper .bigcommerce-cart__item-count',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => '.site-header .site-header-cart a.cart-contents .count',
				'property' => 'color',
			),
			array(
				'element'  => '.cart-menu-wrapper a:hover .bigcommerce-cart__item-count',
				'property' => 'background-color',
			),
		),
	)
);

// Navigation Cart - slide out drawer or direct link.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'select',
		'settings' => 'shoptimizerbigcommerce_cart_action',
		'label'    => esc_attr__( 'Navigation Cart Action', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_layout_section_bigcommerce',
		'default'  => 'slide-out',
		'choices'  => array(
			'drawer'      => esc_attr__( 'Use Slide Out Cart Drawer', 'shoptimizer-bigcommerce' ),
			'direct-link' => esc_attr__( 'Link to the Cart Page', 'shoptimizer-bigcommerce' ),

		),
		'priority' => 10,
	)
);

// Navigation Cart Text Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_cart_color',
		'label'     => esc_html__( 'Cart text', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_cart_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.cart-menu-wrapper a .bigcommerce-cart__item-count',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.cart-menu-wrapper a .bigcommerce-cart__item-count',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Navigation Cart Text Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_cart_color_hover',
		'label'     => esc_html__( 'Cart text hover', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_cart_color_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.cart-menu-wrapper a:hover .bigcommerce-cart__item-count',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.cart-menu-wrapper a:hover .bigcommerce-cart__item-count',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Main Navigation Level 1 Menu Font.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_mainmenu_level1_fontfamily',
		'label'    => esc_html__( 'Level 1 Font settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_navigation_section_layout',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '400',
			'font-size'      => '16px',
			'text-transform' => 'none',
			'letter-spacing' => '-0.3px',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => '.menu-primary-menu-container > ul > li > a, .menu-cart-menu-container li a',
				'property' => 'font-family',
			),
		),
	)
);

// Main Navigation Level 2 Menu Font.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'typography',
		'settings' => 'shoptimizerbigcommerce_mainmenu_level2_family',
		'label'    => esc_html__( 'Level 2 Font settings', 'shoptimizer-bigcommerce' ),
		'section'  => 'shoptimizerbigcommerce_navigation_section_layout',
		'default'  => array(
			'font-family'    => 'IBM Plex Sans',
			'variant'        => '400',
			'font-size'      => '15px',
			'text-transform' => 'none',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => '.main-navigation ul.menu ul li a, .main-navigation ul.nav-menu ul li a',
				'property' => 'font-family',
			),
		),
	)
);
