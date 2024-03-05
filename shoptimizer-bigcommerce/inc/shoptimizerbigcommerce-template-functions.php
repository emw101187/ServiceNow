<?php
/**
 * shoptimizerbigcommerce template functions.
 *
 * @package shoptimizer-bigcommerce
 */

if ( ! function_exists( 'shoptimizerbigcommerce_product_search' ) ) {
	/**
	 * Display Product Search
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_product_search() {
			$shoptimizerbigcommerce_layout_search_display = '';
			$shoptimizerbigcommerce_layout_search_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_search_display' );
		?>
			<?php if ( 'enable' === $shoptimizerbigcommerce_layout_search_display ) { ?>
			<div class="site-search">
				<?php echo do_shortcode( '[autocomplete]' ); ?>
			</div>
			<?php } ?>

			<?php if ( 'standard' === $shoptimizerbigcommerce_layout_search_display ) { ?>
			<div class="site-search">
				<?php the_widget( 'WP_Widget_Search', 'title=' ); ?> 
			</div>
			<?php } ?>
			<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_header_cart() {

		if ( has_nav_menu( 'cart' ) ) {
			?>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'cart',
							'fallback_cb'    => '',
							'container' => 'div',
							'container_class' => 'cart-menu-wrapper'
						)
					);
				?>
			<?php

		}
	}
}


if ( ! function_exists( 'shoptimizerbigcommerce_activate_cart_drawer' ) ) {

	function shoptimizerbigcommerce_activate_cart_drawer() {
		if ( is_bc4wp_active() ) {

			?>

			<?php

			$shoptimizerbigcommerce_cart_action = '';
			$shoptimizerbigcommerce_cart_action = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_cart_action' );

			if ( 'drawer' === $shoptimizerbigcommerce_cart_action ) {
				?>
				<div class="shoptimizer-mini-cart-wrap">
					<div id="ajax-loading">
						<div class="shoptimizer-loader">
							<div class="spinner">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
							</div>
						</div>
					</div>
					<div class="close-drawer"></div><?php dynamic_sidebar( 'cart-sidebar' ); ?></div>
				<?php

					$shoptimizerbigcommerce_cart_drawer_js  = '';
					$shoptimizerbigcommerce_cart_drawer_js .= "
						( function ( $ ) {

							// Open the drawer if a product is added to the cart
							$( '.bc-btn--add_to_cart' ).on( 'click', function( e ) {
								$( 'body' ).toggleClass( 'drawer-open' );
								$('.bigcommerce-cart__item-count').removeAttr('data-before');
							} );

							// Toggle cart drawer.
							$( '.cart-menu-wrapper a' ).on( 'click', function( e ) {
								e.stopPropagation();
								e.preventDefault();
								$( 'body' ).toggleClass( 'drawer-open' );
							} );

							// Close the drawer when clicking outside it
							$( document ).mouseup( function( e ) {
								var container = $( '.shoptimizer-mini-cart-wrap' );

								if ( ! container.is( e.target ) && 0 === container.has( e.target ).length ) {
									$( 'body' ).removeClass( 'drawer-open' );
								}
							} );

							// Close drawer - click the x icon
							$( '.close-drawer' ).on( 'click', function() {
								$( 'body' ).removeClass( 'drawer-open' );
							} );
						}( jQuery ) );
					";

				wp_add_inline_script( 'shoptimizerbigcommerce-main', $shoptimizerbigcommerce_cart_drawer_js );
			}
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_display_comments' ) ) {
	/**
	 * shoptimizerbigcommerce display comments
	 *
	 * @since  1.0.0
	 */
	function shoptimizerbigcommerce_display_comments() {
		if ( comments_open() || '0' !== get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_comment' ) ) {
	/**
	 * shoptimizerbigcommerce comment template
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_comment( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-body">
		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 128 ); ?>			
			</div>
					<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'shoptimizer-bigcommerce' ); ?></em>
				<br />
			<?php endif; ?>
		</div>
					<?php if ( 'div' !== $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-content">

		<?php endif; ?>
		<div class="comment_meta">
					<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'shoptimizer-bigcommerce' ), get_comment_author_link() ); ?>
		<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
					<?php echo '<time datetime="' . get_comment_date( 'c' ) . '">' . get_comment_date() . '</time>'; ?>
		</a>
		</div>
		<div class="comment-text">

					<?php comment_text(); ?>
		</div>
		<div class="reply">
					<?php
					comment_reply_link(
						array_merge(
							$args, array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
							)
						)
					);
					?>
		<?php edit_comment_link( __( 'Edit', 'shoptimizer-bigcommerce' ), '  ', '' ); ?>
		</div>
		</div>
					<?php if ( 'div' !== $args['style'] ) : ?>
		</div>
		<?php endif; ?>
					<?php
	}
}


if ( ! function_exists( 'shoptimizerbigcommerce_sticky_header_display' ) ) :

	/**
	 * Enable Sticky Header
	 */
	function shoptimizerbigcommerce_sticky_header_display() {

		$shoptimizerbigcommerce_sticky_header = '';
		$shoptimizerbigcommerce_sticky_header = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_sticky_header' );

		?>

		<?php
		if ( 'enable' === $shoptimizerbigcommerce_sticky_header ) {

			wp_enqueue_script( 'shoptimizerbigcommerce-sticky', get_template_directory_uri() . '/assets/js/sticky-kit.js', array( 'jquery' ), '20130134', true );
			?>

			<?php

			$shoptimizerbigcommerce_sticky_header_js  = '';
			$shoptimizerbigcommerce_sticky_header_js .= "
			( function ( $ ) {
				'use strict';
				 $( document ).ready(function() {
				 if ( $( window ).width() > 1024 ) {
		                $( 'body:not(.single-product) .shoptimizerbigcommerce-primary-navigation' ).stick_in_parent( {
		                parent: '.site',
		         } );		               
		        }
		        });
			}( jQuery ) );
		";

			wp_add_inline_script( 'shoptimizerbigcommerce-main', $shoptimizerbigcommerce_sticky_header_js );
			?>

		<?php } ?>
					<?php
	}

endif;


if ( ! function_exists( 'shoptimizerbigcommerce_header_widget_region' ) ) {
	/**
	 * Display header widget region
	 *
	 * @since  1.0.0
	 */
	function shoptimizerbigcommerce_header_widget_region() {
		if ( is_active_sidebar( 'header-1' ) ) {
			?>
		<div class="header-widget-region" role="complementary">
			<div class="col-full">
				<?php dynamic_sidebar( 'header-1' ); ?>
			</div>
		</div>
						<?php
		}
	}
}


if ( ! function_exists( 'shoptimizerbigcommerce_below_content' ) ) {
	/**
	 * Display before footer region
	 *
	 * @since  1.0.0
	 */
	function shoptimizerbigcommerce_below_content() {
		if ( is_active_sidebar( 'below-content' ) ) {

			$shoptimizerbigcommerce_below_content_display = '';
			$shoptimizerbigcommerce_below_content_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_below_content_display' );

			?>
			<?php if ( 'show' === $shoptimizerbigcommerce_below_content_display ) { ?>
		<div class="below-content">
			<div class="col-full">
							<?php dynamic_sidebar( 'below-content' ); ?>
			</div>
		</div>
		<?php } ?>	
						<?php
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_footer_widgets' ) ) {
	/**
	 * Display footer widgets
	 *
	 * @since  1.0.0
	 */
	function shoptimizerbigcommerce_footer_widgets() {
		if ( is_active_sidebar( 'footer' ) ) {

			$shoptimizerbigcommerce_footer_display = '';
			$shoptimizerbigcommerce_footer_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_footer_display' );

			?>
			<?php if ( 'show' === $shoptimizerbigcommerce_footer_display ) { ?>
		<footer class="site-footer">
			<div class="col-full">
							<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</footer>
		<?php } ?>	
						<?php
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_footer_copyright' ) ) {
	/**
	 * Display footer copyright
	 *
	 * @since  1.0.0
	 */
	function shoptimizerbigcommerce_footer_copyright() {
		if ( is_active_sidebar( 'copyright' ) ) {

			$shoptimizerbigcommerce_copyright_display = '';
			$shoptimizerbigcommerce_copyright_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_copyright_display' );

			?>
			<?php if ( 'show' === $shoptimizerbigcommerce_copyright_display ) { ?>
		<footer class="copyright">
			<div class="col-full">
							<?php dynamic_sidebar( 'copyright' ); ?>
			</div>
		</footer>
		<?php } ?>	
						<?php
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_top_bar' ) ) {
	/**
	 * Top bar
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_top_bar() {
		$shoptimizerbigcommerce_layout_top_bar_display = '';
		$shoptimizerbigcommerce_layout_top_bar_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_top_bar_display' );
		?>

		<?php if ( 'enable' === $shoptimizerbigcommerce_layout_top_bar_display ) { ?>
		<div class="top-bar">
			<div class="col-full">
						<?php dynamic_sidebar( 'top-bar-left' ); ?>
						<?php dynamic_sidebar( 'top-bar' ); ?>
						<?php dynamic_sidebar( 'top-bar-right' ); ?>
			</div>
		</div>
		<?php } ?>	
					<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_site_branding() {
		?>
		<div class="site-branding">
			<button class="menu-toggle" aria-label="Menu" aria-controls="site-navigation" aria-expanded="false">
				<span class="bar"></span><span class="bar"></span><span class="bar"></span>
			</button>
			<?php shoptimizerbigcommerce_site_title_or_logo(); ?>
		</div>
					<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 1.0.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function shoptimizerbigcommerce_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_front_page() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			// Copied from jetpack_the_site_logo() function.
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo.
			$logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
			$size    = site_logo()->theme_size();
			$html    = sprintf(
				'<a href="%1$s" class="site-logo-link" rel="home">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
					)
				)
			);

			$html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
		} else {
			$tag = is_front_page() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo shoptimizerbigcommerce_safe_html( $html );
	}
}

/**
 * Primary Menu Custom Walker - add a wrapper div.
 */
class shoptimizerbigcommerce_Submenuwrap extends Walker_Nav_Menu {

	/**
	 * Start outer output
	 *
	 * @param array $output the menu output.
	 * @param int   $depth the menu depth.
	 * @param int   $args menu args.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='sub-menu-wrapper'><div class='container'><ul class='sub-menu'>\n";
	}
	/**
	 * End outer output
	 *
	 * @param array $output the menu output.
	 * @param int   $depth the menu depth.
	 * @param int   $args menu args.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div></div>\n";
	}
	/**
	 * Start output
	 *
	 * @param array $output the menu output.
	 * @param array $item the menu item.
	 * @param int   $depth the menu depth.
	 * @param int   $args menu args.
	 * @param int   $id the menu args.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		// Passed Classes.
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'shoptimizerbigcommerce_nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// Build HTML.
		$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $class_names . '">';

		// If 'menu-item-product' exists in classes, don't add the HTML anchor tag.
		if ( in_array( 'menu-item-product', $classes ) ) {
			$item_output = apply_filters( 'shoptimizerbigcommerce_nav_the_title', $item->title, $item->ID );
		} else {

			// Link attributes.
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
				apply_filters( 'shoptimizerbigcommerce_the_title', $item->title, $item->ID ),
				$args->link_after,
				'<span class="sub">' . $item->markup . '</span>',
				$args->after
			);

		}

		// Build HTML.
		$output .= apply_filters( 'shoptimizerbigcommerce_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}

if ( ! function_exists( 'shoptimizerbigcommerce_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'shoptimizer-bigcommerce' ); ?>">

					<?php
					$shoptimizerbigcommerce_logo_mark_image = '';
					$shoptimizerbigcommerce_logo_mark_image = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_logo_mark_image' );

					if ( $shoptimizerbigcommerce_logo_mark_image ) {
						?>
			<div class="primary-navigation with-logo">
			<?php } else { ?>

			<div class="primary-navigation">				
			<?php } ?>

						<?php if ( $shoptimizerbigcommerce_logo_mark_image ) { ?>				
			<div class="logo-mark">
				<a href="#" rel="home">
					<img src="<?php echo shoptimizerbigcommerce_safe_html( $shoptimizerbigcommerce_logo_mark_image ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
				</a>    
			</div>

			<?php } ?>		
						<?php

						if ( has_nav_menu( 'primary' ) ) {
							?>
			<div class="menu-primary-menu-container">
							<?php
							wp_nav_menu(
								array(
									'container'      => '',
									'theme_location' => 'primary',
									'link_before'    => '<span>',
									'link_after'     => '</span>',
									'walker'         => new shoptimizerbigcommerce_Submenuwrap(),
								)
							);
							?>
			</div>
							<?php
						} else {
							?>
			<div class="menu-primary-menu-container">
				<ul id="menu-primary-menu" class="menu">
							<?php
								wp_list_pages(
									array(
										'container'   => '',
										'title_li'    => '',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									)
								);
							?>
				</ul>
			</div>			
					<?php } ?>	

		</div>
		</nav><!-- #site-navigation -->
					<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_secondary_navigation' ) ) {
	/**
	 * Display Secondary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_secondary_navigation() {
		if ( has_nav_menu( 'secondary' ) ) {
			?>
			<nav class="secondary-navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'shoptimizer-bigcommerce' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'secondary',
								'fallback_cb'    => '',
							)
						);
						?>
			</nav><!-- #site-navigation -->
			<?php
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shoptimizerbigcommerce_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'shoptimizer-bigcommerce' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'shoptimizer-bigcommerce' ); ?></a>
					<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_breadcrumbs' ) ) {
	/**
	 * Display the breadcrumbs from Yoast SEO
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_breadcrumbs() {
		?>
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<div class="shoptimizerbigcommerce-breadcrumbs"><p>', '</p></div>' );
			}
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_page_header() {
		?>
		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'shoptimizer-bigcommerce' ),
							'after'  => '</div>',
						)
					);
					?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
			shoptimizerbigcommerce_posted_on();
		} else {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			if ( 'post' === get_post_type() ) {
				shoptimizerbigcommerce_posted_on();
			}
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_archive_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_archive_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to shoptimizerbigcommerce_post_content_before action.
		 *
		 * @hooked shoptimizerbigcommerce_post_thumbnail - 10
		 */

		the_excerpt();

		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to shoptimizerbigcommerce_post_content_before action.
		 *
		 * @hooked shoptimizerbigcommerce_post_thumbnail - 10
		 */
		do_action( 'shoptimizerbigcommerce_post_content_before' );

		the_content(
			sprintf(
				__( 'Continue reading %s', 'shoptimizer-bigcommerce' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		do_action( 'shoptimizerbigcommerce_post_content_after' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'shoptimizer-bigcommerce' ),
				'after'  => '</div>',
			)
		);
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_post_meta() {
		?>
		<aside class="entry-meta">
			<?php
			if ( 'post' === get_post_type() ) : // Hide category and tag text for pages on Search.

				?>
			<div class="vcard author">

				<?php
					echo '<div class="avatar">';
					echo get_avatar( get_the_author_meta( 'ID' ), 256 );
					echo '</div>';
					echo '<div class="author-details">';
					echo sprintf(
						'<a href="%1$s" class="url fn" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author()
					);
					echo wp_kses_post( get_the_author_meta( 'description' ) );
					echo '</div>';
				?>
			</div>

			<div class="post-meta">
				<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'shoptimizer-bigcommerce' ) );

				if ( $categories_list ) :
					?>
				<div class="cat-links">
						<?php
						echo '<div class="label">' . esc_attr( __( 'Posted in:', 'shoptimizer-bigcommerce' ) ) . '</div>';
						echo wp_kses_post( $categories_list );
						?>
				</div>
				<?php endif; // End if categories. ?>

							<?php
							/* translators: used between list items, there is a space after the comma */
							$tags_list = get_the_tag_list( '', __( ', ', 'shoptimizer-bigcommerce' ) );

							if ( $tags_list ) :
								?>
				<div class="tags-links">
									<?php
									echo '<div class="label">' . esc_attr( __( 'Tagged:', 'shoptimizer-bigcommerce' ) ) . '</div>';
									echo wp_kses_post( $tags_list );
									?>
				</div>
							<?php endif; // End if $tags_list. ?>

			</div>

						<?php endif; // End if 'post' == get_post_type(). ?>

		</aside>
					<?php
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function shoptimizerbigcommerce_paging_nav() {
		global $wp_query;

		$args = array(
			'type'      => 'list',
			'next_text' => _x( 'Next', 'Next post', 'shoptimizer-bigcommerce' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'shoptimizer-bigcommerce' ),
		);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function shoptimizerbigcommerce_post_nav() {
		$args = array(
			'next_text' => '%title',
			'prev_text' => '%title',
		);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function shoptimizerbigcommerce_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: post date */
			_x( '%s', 'post date', 'shoptimizer-bigcommerce' ),
			'' . $time_string . ''
		);

		echo wp_kses(
			apply_filters( 'shoptimizerbigcommerce_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'rel'   => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
			)
		);
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_get_sidebar' ) ) {
	/**
	 * Display shoptimizerbigcommerce sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail with a link.
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			echo '<a class="post-thumbnail" href="' . esc_url( get_permalink() ) . '">';
			the_post_thumbnail( $size );
			echo '</a>';
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_post_thumbnail_no_link' ) ) {
	/**
	 * Display post thumbnail.
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0.0
	 */
	function shoptimizerbigcommerce_post_thumbnail_no_link( $size = 'full' ) {

		$shoptimizerbigcommerce_post_featured_image = '';
		$shoptimizerbigcommerce_post_featured_image = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_post_featured_image' );

		if ( true === $shoptimizerbigcommerce_post_featured_image ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( $size );
			}
		}
	}
}


add_action( 'shoptimizerbigcommerce_loop_post', 'shoptimizerbigcommerce_loop_wrapper_start', 8 );
add_action( 'shoptimizerbigcommerce_loop_post', 'shoptimizerbigcommerce_loop_wrapper_end', 35 );

/**
 * Blog loop. Add wrapper class start.
 */
function shoptimizerbigcommerce_loop_wrapper_start() {
	echo '<div class="blog-loop-content-wrapper">';
}

/**
 * Blog loop. Add wrapper class end.
 */
function shoptimizerbigcommerce_loop_wrapper_end() {
	echo '</div>';
}

/**
 *   Change excerpt length from default of 55.
 */
function shoptimizerbigcommerce_excerpt_length( $length ) {
	return 28;
}
add_filter( 'excerpt_length', 'shoptimizerbigcommerce_excerpt_length', 999 );

/**
 *  Remove category: from title.
 */
function shoptimizerbigcommerce_prefix_category_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'shoptimizerbigcommerce_prefix_category_title' );


add_action( 'template_redirect', 'shoptimizerbigcommerce_remove_title', 10 );

/**
 * Page template without title and breadcrumbs
 */
function shoptimizerbigcommerce_remove_title() {
	if ( is_page_template( 'template-fullwidth-no-heading.php' ) ) {
		remove_action( 'shoptimizerbigcommerce_page', 'shoptimizerbigcommerce_page_header', 10 );
		remove_action( 'shoptimizerbigcommerce_content_top', 'shoptimizerbigcommerce_breadcrumbs', 10 );
	}
}

add_action( 'shoptimizerbigcommerce_single_product_sidebar', 'shoptimizerbigcommerce_single_product', 30 );

function shoptimizerbigcommerce_single_product() {

	$shoptimizerbigcommerce_single_product_layout = '';
	$shoptimizerbigcommerce_single_product_layout = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_single_product_layout' );

	if ( is_singular( 'bigcommerce_product' ) ) {
		if ( 'single-right-sidebar' === $shoptimizerbigcommerce_single_product_layout ) {
			?>
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-product' ); ?>
			</aside><!-- #secondary -->

			<?php
		}
	}
}

/**
 * Single Product Page - Call me back feature.
 */
add_action( 'shoptimizerbigcommerce_single_product_sidebar', 'shoptimizerbigcommerce_call_back_feature', 80 );

function shoptimizerbigcommerce_call_back_feature() {

	$shoptimizerbigcommerce_layout_floating_button_display = '';
	$shoptimizerbigcommerce_layout_floating_button_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_floating_button_display' );

	$shoptimizerbigcommerce_layout_floating_button_text = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_floating_button_text' );

	if ( is_singular( 'bigcommerce_product' ) ) {
		if ( 'yes' === $shoptimizerbigcommerce_layout_floating_button_display ) {

			wp_enqueue_script( 'shoptimizerbigcommerce-bootstrap-modal', get_template_directory_uri() . '/assets/js/bootstrap.modal.min.js', array( 'jquery' ), '20161206', true );

			echo '<div class="call-back-feature"><a href="#" data-toggle="modal" data-target="#callBackModal">';

			echo shoptimizerbigcommerce_safe_html( $shoptimizerbigcommerce_layout_floating_button_text );

			echo '</a></div>';
			echo '
		<div class="modal fade" id="callBackModal" tabindex="-1" role="dialog" aria-labelledby="callBackModal" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			<div class="modal-body">';
			dynamic_sidebar( 'floating-button-content' );
			echo '</div>
			</div>
		  </div>
		</div>
		';
		}
	}
}

/**
 * Add a responsive container to embeds.
 *
 * @param text $html adds a wrapping div around videos for a better responsive display.
 */
function shoptimizerbigcommerce_embed_html( $html ) {
	return '<div class="video-container">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'shoptimizerbigcommerce_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'shoptimizerbigcommerce_embed_html' ); // Jetpack.

if ( ! function_exists( 'shoptimizerbigcommerce_primary_navigation_wrapper' ) ) {
	/**
	 * The primary navigation wrapper
	 */
	function shoptimizerbigcommerce_primary_navigation_wrapper() {

		if ( has_nav_menu( 'primary' ) ) {
			echo '<div class="shoptimizerbigcommerce-primary-navigation">';
		} else {
			echo '<div class="shoptimizerbigcommerce-primary-navigation simple-menu">';
		}
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_primary_navigation_wrapper_close' ) ) {
	/**
	 * The primary navigation wrapper close
	 */
	function shoptimizerbigcommerce_primary_navigation_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'shoptimizerbigcommerce_add_custom_menu_field' ) ) {
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0
	 * @param int $menu_item item instance.
	 */
	function shoptimizerbigcommerce_add_custom_menu_field( $menu_item ) {

		$menu_item->markup = get_post_meta( $menu_item->ID, '_menu_item_markup', true );
		return $menu_item;

	}
}

/**
 * Add a shortcode for Search products autocomplete drop down
 *
 * Use: [autocomplete]
 */
function shoptimizerbigcommerce_autocomplete_dropdown_shortcode( $atts ) {

	$shoptimizerbigcommerce_layout_search_display = '';
	$shoptimizerbigcommerce_layout_search_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_search_display' );

	if ( 'enable' === $shoptimizerbigcommerce_layout_search_display ) {

	$shoptimizerbigcommerce_search_placeholder_text = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_search_placeholder_text' );
	echo '<div class="products-search-wrapper"><input type="search" name="autocomplete" id="autocomplete" value="" placeholder="' . $shoptimizerbigcommerce_search_placeholder_text . '" /></div>';
	
	}
}
add_shortcode( 'autocomplete', 'shoptimizerbigcommerce_autocomplete_dropdown_shortcode' );


function shoptimizerbigcommerce_autocomplete_js() {

	$shoptimizerbigcommerce_layout_search_display = '';
	$shoptimizerbigcommerce_layout_search_display = shoptimizerbigcommerce_get_option( 'shoptimizerbigcommerce_layout_search_display' );

	if ( 'enable' === $shoptimizerbigcommerce_layout_search_display ) {

	$args = array(
		'post_type'      => 'bigcommerce_product',
		'post_status'    => 'publish',
		'posts_per_page' => -1, // all posts
	);

	$posts = get_posts( $args );

	if ( $posts ) :
		foreach ( $posts as $k => $post ) {
			$source[ $k ]['ID']        = $post->ID;
			$source[ $k ]['label']     = $post->post_title; // The name of the post
			$source[ $k ]['permalink'] = get_permalink( $post->ID );
		}

		?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var posts = <?php echo json_encode( array_values( $source ) ); ?>;

			jQuery( 'input[name="autocomplete"]' ).autocomplete({
				source: posts,
				minLength: 3,
				position: {
					my: "left+0 top+10",
				},

				select: function(event, ui) {
					var permalink = ui.item.permalink; // Get permalink from the datasource
					window.location.replace(permalink);
				}
			});

			// Solves width of results issue
			jQuery.ui.autocomplete.prototype._resizeMenu = function () {
			  var ul = this.menu.element;
			  ul.outerWidth(this.element.outerWidth());
			}
		});    
	</script>
		<?php
	endif;
}
}

add_action( 'wp_footer', 'shoptimizerbigcommerce_autocomplete_js' );
