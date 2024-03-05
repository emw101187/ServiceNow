<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package shoptimizer-bigcommerce
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<?php
	do_action( 'shoptimizerbigcommerce_before_site' );
	do_action( 'shoptimizerbigcommerce_before_header' );
	?>

	<header id="masthead" class="site-header">
		<div class="col-full topbar-wrapper">
			<?php
			do_action( 'shoptimizerbigcommerce_topbar' );
			?>
		</div>

		<div class="col-full main-header">

			<?php
			/**
			 * Functions hooked into shoptimizerbigcommerce_header action
			 *
			 * @hooked shoptimizerbigcommerce_site_branding                    - 20
			 * @hooked shoptimizerbigcommerce_secondary_navigation             - 30
			 * @hooked shoptimizerbigcommerce_product_search                   - 40
			 */
			do_action( 'shoptimizerbigcommerce_header' );
			?>

		</div>

		<div id="top_nav" class="col-full">

			<?php
			/**
			 * Functions hooked into shoptimizerbigcommerce_header action
			 *
			 * @hooked shoptimizerbigcommerce_primary_navigation_wrapper       - 42
			 * @hooked shoptimizerbigcommerce_primary_navigation               - 50
			 * @hooked shoptimizerbigcommerce_header_cart                      - 60
			 * @hooked shoptimizerbigcommerce_primary_navigation_wrapper_close - 68
			 */
			do_action( 'shoptimizerbigcommerce_navigation' );
			?>

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to shoptimizerbigcommerce_before_content
	 *
	 * @hooked shoptimizerbigcommerce_header_widget_region - 10
	 */
	do_action( 'shoptimizerbigcommerce_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="shoptimizerbigcommerce-archive">

			<div class="archive-header">
				<div class="col-full">
					<?php
					/**
					 * Functions hooked in to shoptimizerbigcommerce_content_top
					 */
					do_action( 'shoptimizerbigcommerce_content_top' );
					?>
				</div>
			</div>


		<div class="col-full">
