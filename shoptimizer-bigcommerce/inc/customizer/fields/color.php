<?php
/**
 *
 * Color theme options
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

// Color fields.
$shoptimizerbigcommerce_default_options = shoptimizerbigcommerce_get_option_defaults();

// General colors.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'color',
		'settings'    => 'shoptimizerbigcommerce_color_general_swatch',
		'label'       => esc_html__( 'Primary swatch color', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Select the primary color of your brand.', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_color_section_general',
		'default'     => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_color_general_swatch'],
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '
				.widget-area .widget.widget_categories a:hover, #secondary .widget ul li a:hover, 
				.widget-area .widget a:hover, #secondary .widget_recent_comments ul li a:hover,
			body:not(.mobile-toggled) .main-navigation ul.menu li.full-width.menu-item-has-children ul li.highlight > a,
			body:not(.mobile-toggled) .main-navigation ul.menu li.full-width.menu-item-has-children ul li.highlight > a:hover,
			.search-results article h2 a:hover, .bc-product-single__meta p.bc-product__pricing, .bc-product-quick-view__content-inner .bc-product__price,
			.bc-alert--success::before, .site .bc-product__price--sale',
				'property' => 'color',
			),
			array(
				'element'  => '#secondary.widget-area .widget .tagcloud a:hover, footer .mc4wp-form input[type="submit"], .image-border .elementor-image:after, .shoptimizer-mini-cart-wrap .bc-loading:before',
				'property' => 'background-color',
			),
			array(
				'element'  => '',
				'property' => 'border-color',
			),

		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.widget-area .widget.widget_categories a:hover, #secondary .widget ul li a:hover, 
				.widget-area .widget a:hover, #secondary .widget_recent_comments ul li a:hover,
			body:not(.mobile-toggled) .main-navigation ul.menu li.full-width.menu-item-has-children ul li.highlight > a,
			body:not(.mobile-toggled) .main-navigation ul.menu li.full-width.menu-item-has-children ul li.highlight > a:hover,
			.search-results article h2 a:hover, .bc-product-single__meta p.bc-product__pricing, .bc-product-quick-view__content-inner .bc-product__price,
			.bc-alert--success::before, .site .bc-product__price--sale',
				'property' => 'color',
			),
			array(
				'element'  => '#secondary.widget-area .widget .tagcloud a:hover, footer .mc4wp-form input[type="submit"], .image-border .elementor-image:after, .shoptimizer-mini-cart-wrap .bc-loading:before',
				'property' => 'background-color',
			),
			array(
				'element'  => '',
				'property' => 'border-color',
			),

		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_color_general_links',
		'label'     => esc_html__( 'General links', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_general',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_color_general_links'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'a',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// General links hover.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_color_general_links_hover',
		'label'     => esc_html__( 'General links hover', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_general',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_color_general_links_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.entry-content p a:hover',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.entry-content p a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Body background color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'        => 'color',
		'settings'    => 'shoptimizerbigcommerce_color_body_bg',
		'label'       => esc_html__( 'Body background color', 'shoptimizer-bigcommerce' ),
		'description' => esc_html__( 'Visible if the grid is contained.', 'shoptimizer-bigcommerce' ),
		'section'     => 'shoptimizerbigcommerce_color_section_general',
		'default'     => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_color_body_bg'],
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Top Bar background.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_layout_top_bar_background',
		'label'     => esc_html__( 'Top bar background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_topbar',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_top_bar_background'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.col-full.topbar-wrapper',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.col-full.topbar-wrapper',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Top Bar text color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_layout_top_bar_text',
		'label'     => esc_html__( 'Top Bar text color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_topbar',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_top_bar_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.top-bar, .top-bar a',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.top-bar, .top-bar a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Top Bar border.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_layout_top_bar_border',
		'label'     => esc_html__( 'Top bar border', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_topbar',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_layout_top_bar_border'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.col-full.topbar-wrapper',
				'property' => 'border-bottom-color',
			),
		),
		'transport' => 'postMessage',
		'choices'   => array(
			'alpha' => true,
		),
		'js_vars'   => array(
			array(
				'element'  => '.col-full.topbar-wrapper',
				'function' => 'css',
				'property' => 'border-bottom-color',
			),
		),
	)
);

// Header Background Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_header_bg_color',
		'label'     => esc_html__( 'Header background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_header_bg_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.site-header',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.site-header',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Header Border Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_header_border_color',
		'label'     => esc_html__( 'Header border color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_header_border_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.fa.menu-item, .ri.menu-item',
				'property' => 'border-left-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.fa.menu-item, .ri.menu-item',
				'function' => 'css',
				'property' => 'border-left-color',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_header_divider',
		'section'  => 'shoptimizerbigcommerce_color_section_header',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #111; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Mobile', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// Mobile Header - Hamburger icon color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_mobile_hamburger',
		'label'     => esc_html__( 'Hamburger icon color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_mobile_hamburger'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.menu-toggle .bar',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.menu-toggle .bar',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Mobile Header - Navigation divider line color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_mobile_divider_line',
		'label'     => esc_html__( 'Navigation divider line color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_mobile_divider_line'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'body .menu-primary-menu-container > ul > li',
				'property' => 'border-top-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'body .menu-primary-menu-container > ul > li',
				'function' => 'css',
				'property' => 'border-top-color',
			),
		),
	)
);

// Mobile Header - Text Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_mobile_color',
		'label'     => esc_html__( 'Mobile navigation color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_mobile_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'     => '.main-navigation ul li a, body .main-navigation ul.menu > li.menu-item-has-children > span.caret::after',
				'property'    => 'color',
				'media_query' => '@media (max-width: 992px)',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'     => '.main-navigation ul li a, body .main-navigation ul.menu > li.menu-item-has-children > span.caret::after',
				'function'    => 'css',
				'property'    => 'color',
				'media_query' => '@media (max-width: 992px)',
			),
		),
	)
);

// Navigation Background Color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_navigation_bg_color',
		'label'     => esc_html__( 'Navigation background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_navigation',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_navigation_bg_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'     => '.shoptimizerbigcommerce-primary-navigation',
				'function'    => 'css',
				'property'    => 'background-color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'     => '.shoptimizerbigcommerce-primary-navigation',
				'function'    => 'css',
				'property'    => 'background-color',
				'media_query' => '@media (min-width: 992px)',
			),
		),
	)
);

// Below header background color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_below_header_bg',
		'label'     => esc_html__( 'Below header background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_below_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_below_header_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.header-widget-region',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.header-widget-region',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Below header text color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_below_header_text',
		'label'     => esc_html__( 'Below header text color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_below_header',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_below_header_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.header-widget-region',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.header-widget-region',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_color_bigcommerce_heading_1',
		'section'  => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #111; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Primary Button', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// BigCommerce primary button text color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_bigcommerce_button_text',
		'label'     => esc_html__( 'Primary button text color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_bigcommerce_button_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '
			.site-main input[type="submit"],
			.site-main div.wpforms-container-full .wpforms-form input[type=submit], 
			.site-main div.wpforms-container-full .wpforms-form button[type=submit],
			.entry-content .feature a, .image-feature figcaption span,
			.entry-content p.bigcommerce.add_to_cart_inline a.button,
			.entry-content p.bigcommerce.add_to_cart_inline a.button:hover,
			.site div.wpforms-container-full .wpforms-form button[type=submit],
			.image-feature figcaption span',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '
			.site-main input[type="submit"],
			.site-main div.wpforms-container-full .wpforms-form input[type=submit], 
			.site-main div.wpforms-container-full .wpforms-form button[type=submit],
			.entry-content .feature a, .image-feature figcaption span,
			.entry-content p.bigcommerce.add_to_cart_inline a.button,
			.entry-content p.bigcommerce.add_to_cart_inline a.button:hover,
			.site div.wpforms-container-full .wpforms-form button[type=submit],
			.image-feature figcaption span',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// BigCommerce primary button background color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_bigcommerce_button_bg',
		'label'     => esc_html__( 'Primary button background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_bigcommerce_button_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '
			.site-main input[type="submit"],
			.site-main div.wpforms-container-full .wpforms-form input[type=submit], 
			.site-main div.wpforms-container-full .wpforms-form button[type=submit],
			.entry-content .feature a, .image-feature figcaption span,
			.entry-content p.bigcommerce.add_to_cart_inline a.button,
			.image-feature figcaption span,
			.site div.wpforms-container-full .wpforms-form button[type=submit],
			.bc-product-single__meta .bc-form.bc-product-form button, .bc-product-card--single .bc-form.bc-product-form button, .site .bc-product-single__top button.bc-btn.bc-btn--add_to_cart, .site .bc-product-single__top a.bc-btn, .site .bc-product-single__top button.bc-btn[disabled], .site .bc-product-single__top a.bc-btn[disabled], .site .bc-product-single__top button.bc-btn[disabled]:hover, .site .bc-product-single__top a.bc-btn[disabled]:hover, .bc-product-quick-view__content-inner button.bc-btn',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '
			.site-main input[type="submit"],
			.site-main div.wpforms-container-full .wpforms-form input[type=submit], 
			.site-main div.wpforms-container-full .wpforms-form button[type=submit],
			.entry-content .feature a, .image-feature figcaption span,
			.entry-content p.bigcommerce.add_to_cart_inline a.button,
			.image-feature figcaption span,
			.site div.wpforms-container-full .wpforms-form button[type=submit],
			.bc-product-single__meta .bc-form.bc-product-form button, .bc-product-card--single .bc-form.bc-product-form button, .site .bc-product-single__top button.bc-btn.bc-btn--add_to_cart, .site .bc-product-single__top a.bc-btn, .site .bc-product-single__top button.bc-btn[disabled], .site .bc-product-single__top a.bc-btn[disabled], .site .bc-product-single__top button.bc-btn[disabled]:hover, .site .bc-product-single__top a.bc-btn[disabled]:hover, .bc-product-quick-view__content-inner button.bc-btn',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);


shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_color_bigcommerce_heading_4',
		'section'  => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #111; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( ' Ratings', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);

// Ratings color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_ratings_color',
		'label'     => esc_html__( 'Star ratings color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_ratings_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.bc-single-product__rating--top, .bc-single-product__rating',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.bc-single-product__rating--top, .bc-single-product__rating',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'     => 'custom',
		'settings' => 'shoptimizerbigcommerce_color_bigcommerce_heading_5',
		'section'  => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #111; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( ' Product Archives', 'shoptimizer-bigcommerce' ) . '</div>',
		'priority' => 10,
	)
);


// Floating button background color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_floating_button_bg',
		'label'     => esc_html__( 'Floating button background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_floating_button_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.call-back-feature a',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.call-back-feature a',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);


// Floating button text color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_floating_button_text',
		'label'     => esc_html__( 'Floating button text color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_bigcommerce',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_floating_button_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.call-back-feature a',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.call-back-feature a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Footer background color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_footer_bg',
		'label'     => esc_html__( 'Footer background', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_footer_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer.site-footer, footer.copyright',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer.site-footer, footer.copyright',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);


// Footer heading color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_footer_heading_color',
		'label'     => esc_html__( 'Footer headings color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_footer_heading_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer .widget .widget-title',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer .widget .widget-title',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Footer text color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_footer_color',
		'label'     => esc_html__( 'Footer text color', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_footer_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer.site-footer, footer.copyright',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer.site-footer, footer.copyright',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Footer links color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_footer_links_color',
		'label'     => esc_html__( 'Footer links', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_footer_links_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer.site-footer a:not(.button), footer.copyright a:not(.button)',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer.site-footer a:not(.button), footer.copyright a:not(.button)',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Footer links hover color.
shoptimizerbigcommerce_Kirki::add_field(
	'shoptimizerbigcommerce_config', array(
		'type'      => 'color',
		'settings'  => 'shoptimizerbigcommerce_footer_links_hover_color',
		'label'     => esc_html__( 'Footer links hover', 'shoptimizer-bigcommerce' ),
		'section'   => 'shoptimizerbigcommerce_color_section_footer',
		'default'   => $shoptimizerbigcommerce_default_options['shoptimizerbigcommerce_footer_links_hover_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer.site-footer a:not(.button):hover, footer.copyright a:not(.button):hover',
				'property' => 'color',
			),
			array(
				'element'  => 'footer.site-footer li a:after',
				'property' => 'border-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer.site-footer a:not(.button):hover, footer.copyright a:not(.button):hover',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => 'footer.site-footer li a:after',
				'property' => 'border-color',
			),
		),
	)
);
