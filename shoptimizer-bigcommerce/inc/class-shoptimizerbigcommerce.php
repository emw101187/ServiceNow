<?php
/**
 * shoptimizerbigcommerce Class
 *
 * @author   CommerceGurus
 * @since    1.0.0
 * @package  shoptimizerbigcommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'shoptimizer-bigcommerce' ) ) :

	/**
	 * The main shoptimizerbigcommerce class
	 */
	class shoptimizerbigcommerce {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts', array( $this, 'child_scripts' ), 30 );
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args', array( $this, 'page_menu_args' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			load_theme_textdomain( 'shoptimizer-bigcommerce', trailingslashit( WP_LANG_DIR ) . 'themes/' );
			load_theme_textdomain( 'shoptimizer-bigcommerce', get_stylesheet_directory() . '/languages' );
			load_theme_textdomain( 'shoptimizer-bigcommerce', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo
			 */
			add_theme_support(
				'custom-logo', apply_filters(
					'shoptimizerbigcommerce_custom_logo_args', array(
						'height'      => 110,
						'width'       => 470,
						'flex-height' => true,
						'flex-width'  => true,
					)
				)
			);

			// This theme uses wp_nav_menu() in three locations.
			register_nav_menus(
				apply_filters(
					'shoptimizerbigcommerce_register_nav_menus', array(
						'primary'   => __( 'Primary Menu', 'shoptimizer-bigcommerce' ),
						'secondary' => __( 'Secondary Menu', 'shoptimizer-bigcommerce' ),
						'cart'      => __( 'Cart Menu', 'shoptimizer-bigcommerce' ),
					)
				)
			);

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5', apply_filters(
					'shoptimizerbigcommerce_html5_args', array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
						'widgets',
					)
				)
			);

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support(
				'site-logo', apply_filters(
					'shoptimizerbigcommerce_site_logo_args', array(
						'size' => 'full',
					)
				)
			);

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Declare Gutenberg wide images support.
			add_theme_support( 'align-wide' );
		}

		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar'] = array(
				'name'        => __( 'Sidebar', 'shoptimizer-bigcommerce' ),
				'id'          => 'sidebar-1',
				'description' => 'The main sidebar.',
			);

			$sidebar_args['sidebar-posts'] = array(
				'name'        => __( 'Sidebar Posts', 'shoptimizer-bigcommerce' ),
				'id'          => 'sidebar-posts',
				'description' => __( 'The posts sidebar.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args['sidebar-product'] = array(
				'name'        => __( 'Product Sidebar', 'shoptimizer-bigcommerce' ),
				'id'          => 'sidebar-product',
				'description' => __( 'The single product sidebar.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args['header'] = array(
				'name'        => __( 'Below Header', 'shoptimizer-bigcommerce' ),
				'id'          => 'header-1',
				'description' => __( 'Widgets added to this region will appear beneath the header and above the main content.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args['top-bar-left'] = array(
				'name'          => __( 'Top Bar Left', 'shoptimizer-bigcommerce' ),
				'id'            => 'top-bar-left',
				'description'   => __( 'A widget added to this region will appear at the very top of the site to the left.', 'shoptimizer-bigcommerce' ),
				'before_widget' => '<div class="top-bar-left  %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['top-bar'] = array(
				'name'          => __( 'Top Bar Center', 'shoptimizer-bigcommerce' ),
				'id'            => 'top-bar',
				'description'   => __( 'A widget added to this region will appear at the very top of the site in the center.', 'shoptimizer-bigcommerce' ),
				'before_widget' => '<div class="top-bar-center  %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['top-bar-right'] = array(
				'name'          => __( 'Top Bar Right', 'shoptimizer-bigcommerce' ),
				'id'            => 'top-bar-right',
				'description'   => __( 'A widget added to this region will appear at the very top of the site to the right.', 'shoptimizer-bigcommerce' ),
				'before_widget' => '<div class="top-bar-right  %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['cart-sidebar'] = array(
				'name'          => __( 'Cart Sidebar', 'shoptimizer-bigcommerce' ),
				'id'            => 'cart-sidebar',
				'description'   => __( 'Add the BigCommerce Mini Cart widget to this area.', 'shoptimizer-bigcommerce' ),
				'before_widget' => '<div class="cart-sidebar  %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['floating-button-content'] = array(
				'name'        => __( 'Floating Button Modal Content', 'shoptimizer-bigcommerce' ),
				'id'          => 'floating-button-content',
				'description' => __( 'A widget added to this region will appear within a modal window on a single product page. It is intended for a form shortcode, e.g. WPforms - but you can add any content you wish.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args['below-content'] = array(
				'name'        => __( 'Below Content', 'shoptimizer-bigcommerce' ),
				'id'          => 'below-content',
				'description' => __( 'A widget added to this region will appear below the main content area.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args['footer'] = array(
				'name'        => __( 'Footer', 'shoptimizer-bigcommerce' ),
				'id'          => 'footer',
				'description' => __( 'A widget added to this region will appear within the footer area.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args['copyright'] = array(
				'name'        => __( 'Copyright', 'shoptimizer-bigcommerce' ),
				'id'          => 'copyright',
				'description' => __( 'A widget added to this region will appear within the copyright area.', 'shoptimizer-bigcommerce' ),
			);

			$sidebar_args = apply_filters( 'shoptimizerbigcommerce_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				);

				$filter_hook = sprintf( 'shoptimizerbigcommerce_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			global $shoptimizerbigcommerce_version;

			/**
			 * Styles
			 */
			// wp_enqueue_style( 'shoptimizerbigcommerce-style', get_template_directory_uri() . '/style.css', '', $shoptimizerbigcommerce_version );
			wp_enqueue_style( 'shoptimizerbigcommerce-rivolicons', get_template_directory_uri() . '/assets/css/base/rivolicons.css', '', $shoptimizerbigcommerce_version );

			/**
			 * Scripts
			 */
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'shoptimizerbigcommerce-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), '20130115', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css
		 *
		 * @since  1.0.0
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				$child_theme = wp_get_theme( get_stylesheet() );
				wp_enqueue_style( 'shoptimizerbigcommerce-child-style', get_stylesheet_uri(), array(), $child_theme->get( 'Version' ) );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {

			$shoptimizerbigcommerce_single_product_layout = '';
			$shoptimizerbigcommerce_single_product_layout = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_single_product_layout' );

			// Adds a class if the full width single product template is selected in the customizer.
			if ( 'single-no-sidebar' === $shoptimizerbigcommerce_single_product_layout ) {
				$classes[] = 'single-product-fullwidth';
			}

			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// If BigCommerce is active, add a body class.
			if ( is_bc4wp_active() ) {
				$classes[] = 'bigcommerce-active';
			}

			// If Yoast Breadcrumbs are active, add a body class.
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				$classes[] = 'breadcrumbs-active';
			}

			// If the main sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'shoptimizerbigcommerce-full-width-content';
			}

			return $classes;
		}

	}
endif;

return new shoptimizerbigcommerce();
