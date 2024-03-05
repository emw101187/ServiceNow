<?php

/**
 * shoptimizerbigcommerce functions.
 *
 * @package shoptimizer-bigcommerce
 */

/**
 * Assign the shoptimizerbigcommerce version to a var
 */
$theme                          = wp_get_theme( 'shoptimizer-bigcommerce' );
$shoptimizerbigcommerce_version = $theme['Version'];

/**
 * Global Paths
 */
define( 'shoptimizerbigcommerce_CORE', get_template_directory() . '/inc/core' );

// Is BC4WP active?
if ( ! function_exists( 'is_bc4wp_active' ) ) {
	/**
	 * Is BC4WP active?
	 */
	function is_bc4wp_active() {
		if ( class_exists( 'BigCommerce\Plugin' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

// Support for Yoast Breadcrumbs.
add_theme_support( 'yoast-seo-breadcrumbs' );

/**
 * Enqueue scripts and styles.
 */
function shoptimizerbigcommerce_scripts() {
	wp_enqueue_script( 'shoptimizerbigcommerce-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20161207', true );
	wp_enqueue_style( 'shoptimizerbigcommerce-style', get_stylesheet_uri() );

	$shoptimizerbigcommerce_layout_search_display = '';
	$shoptimizerbigcommerce_layout_search_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_search_display' );

	if ( 'enable' === $shoptimizerbigcommerce_layout_search_display ) {
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
	}

	$shoptimizerbigcommerce_general_speed_minify_main_css = '';
	$shoptimizerbigcommerce_general_speed_minify_main_css = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_general_speed_minify_main_css' );

	if ( 'yes' === $shoptimizerbigcommerce_general_speed_minify_main_css ) {
		wp_enqueue_style( 'shoptimizerbigcommerce-main-min', get_template_directory_uri() . '/assets/css/main/main.min.css' );
	} else {
		wp_enqueue_style( 'shoptimizerbigcommerce-main', get_template_directory_uri() . '/assets/css/main/main.css' );
	}

}

add_action( 'wp_enqueue_scripts', 'shoptimizerbigcommerce_scripts' );

/**
 * Allow shortcodes within the menu.
 */
add_filter( 'wp_nav_menu', 'shoptimizerbigcommerce_menu_enable_shortcode', 20, 2 );


/**
 * Returns a shortcode for the menu.
 */
function shoptimizerbigcommerce_menu_enable_shortcode( $menu, $args ) {
	return do_shortcode( $menu );
}

/**
 * Primary Menu Custom Walker - add a wrapper div.
 */
class submenuwrap extends Walker_Nav_Menu {


	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='sub-menu-wrapper'><div class='container'><ul class='sub-menu'>\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div></div>\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		// Passed Classes
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $class_names . '">';

		// If 'menu-item-product' exists in classes, don't add the HTML anchor tag.
		if ( in_array( 'menu-item-product', $classes ) ) {

			$item_output = apply_filters( 'the_title', $item->title, $item->ID );

		} else {

			// link attributes.
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

			$item_output = sprintf(
				'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}

		// build html.
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}

/**
 * Adds a plus icon for the mobile menu.
 */
function shoptimizerbigcommerce_mobile_menu_plus( $output, $item, $depth, $args ) {

	if ( 'primary' === $args->theme_location && $depth === 0 ) {
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$output .= '<span class="caret"></span>';
		}
	}
	return $output;
}

add_filter( 'shoptimizerbigcommerce_walker_nav_menu_start_el', 'shoptimizerbigcommerce_mobile_menu_plus', 10, 4 );

/**
 * Excludes some classes from Jetpack's lazy load.
 */
function shoptimizerbigcommerce_lazy_exclude( $blacklisted_classes ) {
	$blacklisted_classes = array(
		'skip-lazy',
		'wp-post-image',
		'post-image',
		'custom-logo',
	);
	return $blacklisted_classes;

}
add_filter( 'jetpack_lazy_images_blacklisted_classes', 'shoptimizerbigcommerce_lazy_exclude' );

/**
 * TGM Plugin Activation.
 */
require_once shoptimizerbigcommerce_CORE . '/functions/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'shoptimizerbigcommerce_register_required_plugins' );

/**
 * Recommended plugins
 *
 * @package shoptimizer-bigcommerce
 */
function shoptimizerbigcommerce_register_required_plugins() {
	$plugins = array(
		array(
			'name'     => esc_html__( 'BigCommerce', 'shoptimizer-bigcommerce' ),
			'slug'     => 'bigcommerce',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Elementor', 'shoptimizer-bigcommerce' ),
			'slug'     => 'elementor',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Kirki', 'shoptimizer-bigcommerce' ),
			'slug'     => 'kirki',
			'required' => true,
		),
		array(
			'name'               => 'CommerceGurus CommerceKit', // The plugin name
			'slug'               => 'commercegurus-commercekit', // The plugin slug (typically the folder name)
			'source'             => 'https://files.commercegurus.com/commercegurus-commercekit.zip', // The plugin source
			'required'           => true, // If false, the plugin is only 'recommended' instead of required
			'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'shoptimizer-bigcommerce' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
	);

	/**
	 * Array of configuration settings.
	 */
	$config = array(
		'domain'       => 'shoptimizer-bigcommerce',
		'default_path' => '',
		'parent_slug'  => 'themes.php',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'shoptimizer-bigcommerce' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'shoptimizer-bigcommerce' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'shoptimizer-bigcommerce' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'shoptimizer-bigcommerce' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'shoptimizer-bigcommerce' ),
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'shoptimizer-bigcommerce' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'shoptimizer-bigcommerce' ),
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'shoptimizer-bigcommerce' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'shoptimizer-bigcommerce' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'shoptimizer-bigcommerce' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'shoptimizer-bigcommerce' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'shoptimizer-bigcommerce' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'shoptimizer-bigcommerce' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'shoptimizer-bigcommerce' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'shoptimizer-bigcommerce' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'shoptimizer-bigcommerce' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'shoptimizer-bigcommerce' ),
			'nag_type'                        => 'updated',
		),
	);
	tgmpa( $plugins, $config );
}

/**
 * One Click Importer Demo Data.
 */
function shoptimizerbigcommerce_import_files() {
	return array(
		array(
			'import_file_name'         => esc_html__( 'Shoptimizer for BigCommerce Demo Data', 'shoptimizer-bigcommerce' ),
			'import_file_url'          => esc_url( 'https://files.commercegurus.com/shoptimizerbigcommerce-demodata/shoptimizerbigcommerce-demodata.xml', 'shoptimizer-bigcommerce' ),
			'import_widget_file_url'   => esc_url( 'https://files.commercegurus.com/shoptimizerbigcommerce-demodata/shoptimizerbigcommerce-widgets.wie', 'shoptimizer-bigcommerce' ),
			'import_preview_image_url' => esc_url( 'https://themedemo.commercegurus.com/shoptimizerbigcommerce/wp-content/themes/shoptimizerbigcommerce/screenshot.png', 'shoptimizer-bigcommerce' ),
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'shoptimizerbigcommerce_import_files' );

/**
 * Post demo stuff.
 */
function shoptimizerbigcommerce_after_demo_import_setup() {

	// Menus to import and assign.
	$main_menu      = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$secondary_menu = get_term_by( 'name', 'Secondary Menu', 'nav_menu' );
	$cart_menu      = get_term_by( 'name', 'Cart Menu', 'nav_menu' );
	set_theme_mod(
		'nav_menu_locations', array(
			'primary'   => $main_menu->term_id,
			'secondary' => $secondary_menu->term_id,
			'cart'      => $cart_menu->term_id,
		)
	);

	// Set options for front page and blog page.
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	esc_html_e( 'shoptimizerbigcommerce demo content imported!', 'shoptimizer-bigcommerce' );
}

add_action( 'pt-ocdi/after_import', 'shoptimizerbigcommerce_after_demo_import_setup' );

/**
 * Timeout call.
 */
function shoptimizerbigcommerce_change_time_of_single_ajax_call() {
	return 10;
}

add_action( 'pt-ocdi/time_for_one_ajax_call', 'shoptimizerbigcommerce_change_time_of_single_ajax_call' );

// Disable generation of smaller images during demo data import.
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// Remove plugin branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

add_action( 'after_setup_theme', 'shoptimizerbigcommerce_imagesizes' );
function shoptimizerbigcommerce_imagesizes() {
	add_image_size( 'bc-medium', '1280', 'false' );
}

$shoptimizerbigcommerce = (object) array(
	'version' => $shoptimizerbigcommerce_version,

	/**
	 * Initialize all the things.
	 */
	'main'    => require 'inc/class-shoptimizerbigcommerce.php',
);

require 'inc/template-functions.php';
require 'inc/shoptimizerbigcommerce-template-hooks.php';
require 'inc/shoptimizerbigcommerce-template-functions.php';
require get_parent_theme_file_path( 'inc/class-walker-nav-menu-edit-custom.php' );

/**
 * Theme Help page.
 */
require_once get_template_directory() . '/inc/setup/help.php';

/**
 * Inject Critical CSS to wp_head.
 */
function ccfw_criticalcss() {
	echo '<style>';
	if ( is_front_page() || is_home() ) {
		get_template_part( 'assets/css/criticalcss/home' );
	} elseif ( is_single() ) {
		get_template_part( 'assets/css/criticalcss/single-post' );
	} elseif ( is_page() ) {
		get_template_part( 'assets/css/criticalcss/single-post' );
	} elseif ( is_archive() ) {
		get_template_part( 'assets/css/criticalcss/blog-archive' );
	} elseif ( is_shop() || is_product_category() ) {
		get_template_part( 'assets/css/criticalcss/blog-archive' );
	} elseif ( is_product() ) {
		get_template_part( 'assets/css/criticalcss/single-product' );
	} else {
		get_template_part( 'assets/css/criticalcss/single-post' );
	}
	echo '</style>';
}

function ccfw_get_css_handle() {

	// Safe Default.
	$css_handle = 'shoptimizerbigcommerce-main';

	$shoptimizerbigcommerce_general_speed_minify_main_css = '';
	$shoptimizerbigcommerce_general_speed_minify_main_css = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_general_speed_minify_main_css' );

	if ( 'yes' === $shoptimizerbigcommerce_general_speed_minify_main_css ) {
		$css_handle = 'shoptimizerbigcommerce-main-min';
	} else {
		$css_handle = 'shoptimizerbigcommerce-main';
	}

	return $css_handle;
}

/**
 * Replaces a stylesheet link tag with a preload tag.
 *
 * @param string $tag     The link tag as generated by WordPress.
 * @param string $handle  The handle by which the stylesheet is known to WordPress.
 * @param string $href    The URL to the stylesheet, including version number.
 * @param string $media   The media attribute of the stylesheet.
 * @return string The original tag wrapped in a noscript element, followed by the preload tag.
 */
function ccfw_filter_style_loader_tag( $tag, $handle, $href, $media ) {
	global $wp_styles;

	$shoptimizerbigcommerce_css_handle = ccfw_get_css_handle();

	if ( $shoptimizerbigcommerce_css_handle === $handle ) {

		$rel          = 'stylesheet';
		$noscript_tag = $tag;
		$tag          = sprintf(
			'<link rel="preload" as="style" onload="%s" id="%s-css" href="%s" type="text/css" media="%s" />',
			"this.onload=null;this.rel='" . esc_js( $rel ) . "'",
			esc_attr( $handle . '-preload' ),
			esc_url_raw( $href ),
			esc_attr( $media )
		);
		$tag         .= sprintf( '<noscript>%s</noscript>', $noscript_tag );

		// $rel    = 'stylesheet';
		// $footag = $tag;
		// $tag    = sprintf( '<noscript>%s</noscript>', $footag );
		// $tag   .= sprintf(
		// '<link rel="preload" as="style" onload="%s" id="%s-css" href="%s" type="text/css" media="%s" />',
		// "this.onload=null;this.rel='" . esc_js( $rel ) . "'",
		// esc_attr( $handle . ':preload' ),
		// esc_url_raw( $href ),
		// esc_attr( $media )
		// );
		// $tag .= '<script>!function(e){"use strict";var n=function(n,t,o){function i(e){if(a.body)return e();setTimeout(function(){i(e)})}function r(){l.addEventListener&&l.removeEventListener("load",r),l.media=o||"all"}var d,a=e.document,l=a.createElement("link");if(t)d=t;else{var f=(a.body||a.getElementsByTagName("head")[0]).childNodes;d=f[f.length-1]}var s=a.styleSheets;l.rel="stylesheet",l.href=n,l.media="only x",i(function(){d.parentNode.insertBefore(l,t?d:d.nextSibling)});var u=function(e){for(var n=l.href,t=s.length;t--;)if(s[t].href===n)return e();setTimeout(function(){u(e)})};return l.addEventListener&&l.addEventListener("load",r),l.onloadcssdefined=u,u(r),l};"undefined"!=typeof exports?exports.loadCSS=n:e.loadCSS=n}("undefined"!=typeof global?global:this);</script>';
		$tag .= '<script>!function(n){"use strict";n.loadCSS||(n.loadCSS=function(){});var o=loadCSS.relpreload={};if(o.support=function(){var e;try{e=n.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),o.bindMediaToggle=function(t){var e=t.media||"all";function a(){t.media=e}t.addEventListener?t.addEventListener("load",a):t.attachEvent&&t.attachEvent("onload",a),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(a,3e3)},o.poly=function(){if(!o.support())for(var t=n.document.getElementsByTagName("link"),e=0;e<t.length;e++){var a=t[e];"preload"!==a.rel||"style"!==a.getAttribute("as")||a.getAttribute("data-loadcss")||(a.setAttribute("data-loadcss",!0),o.bindMediaToggle(a))}},!o.support()){o.poly();var t=n.setInterval(o.poly,500);n.addEventListener?n.addEventListener("load",function(){o.poly(),n.clearInterval(t)}):n.attachEvent&&n.attachEvent("onload",function(){o.poly(),n.clearInterval(t)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:n.loadCSS=loadCSS}("undefined"!=typeof global?global:this);</script>';
	}

	return $tag;
}

/**
 * Remove dashicons in frontend for unauthenticated users.
 */
add_action( 'wp_enqueue_scripts', 'shoptimizerbigcommerce_dequeue_dashicons' );
function shoptimizerbigcommerce_dequeue_dashicons() {
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}

/**
 * WPForms integration check.
 */
if ( ! defined( 'WPFORMS_SHAREASALE_ID' ) ) {
	define( 'WPFORMS_SHAREASALE_ID', '1478967' );
}

$shoptimizerbigcommerce_general_speed_critical_css = '';
$shoptimizerbigcommerce_general_speed_critical_css = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_general_speed_critical_css' );
if ( 'yes' === $shoptimizerbigcommerce_general_speed_critical_css ) {
	add_action( 'wp_head', 'ccfw_criticalcss', 5 );
	add_filter( 'style_loader_tag', 'ccfw_filter_style_loader_tag', 10, 4 );
}

/**
 * Revert to classic widgets.
 */
function shoptimizerbigcommerce_classic_widgets_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'shoptimizerbigcommerce_classic_widgets_theme_support' );

add_filter('bigcommerce/account/subnav/links', function ($links) {
	$links[] = [
	 'url'     => wp_logout_url(),
	 'label'   => __('Logout', 'bigcommerce'),
	 'current' => false,
	];
	return $links;
   }, 10, 1);