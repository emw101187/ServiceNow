<?php
/**
 * Getting started template
 *
 * @package CommerceGurus
 * @subpackage shoptimizerbigcommerce
 */

$customizer_url = admin_url() . 'customize.php';
?>

<div id="usefulplugins" class="ccfw-tab-pane">

	<div class="ccfw-tab-pane-center">

		<h1 class="ccfw-welcome-title"><?php esc_html_e( 'Useful Plugins', 'shoptimizer-bigcommerce' ); ?></h1>
		<h2><?php esc_html_e( 'Enhance your store with these useful plugins for Shoptimizer for BigCommerce for WordPress. Just search within the "Plugins" section of WordPress for the name, then install and activate. You will need to consult the plugin documentation of each for setup instructions.', 'shoptimizer-bigcommerce' ); ?></h2>
		<br/>
		<table class="useful-table">

			<tbody>
				<tr>
					<td class="image">
						<img width="100" alt="MailChimp for WordPress" src="<?php echo get_template_directory_uri() . '/inc/setup/images/mailchimp.png'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'MailChimp for WordPress', 'shoptimizer-bigcommerce' ); ?></h3>
						<p><?php esc_html_e( 'Allows visitors to subscribe to your newsletters easily. Requires a free MailChimp account.', 'shoptimizer-bigcommerce' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/mailchimp-for-wp/' ); ?>"><?php esc_html_e( 'More information', 'shoptimizer-bigcommerce' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="Weglot" src="<?php echo get_template_directory_uri() . '/inc/setup/images/weglot.png'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'Weglot', 'shoptimizer-bigcommerce' ); ?></h3>
						<p><?php esc_html_e( 'The best and easiest translation solution to translate your store and go multilingual. You can be setup in minutes. Need more languages?', 'shoptimizer-bigcommerce' ); ?> <a target="_blank" href="<?php echo esc_url( 'https://commercegurus.com/go/weglot' ); ?>"><?php esc_html_e( 'See the premium version', 'shoptimizer-bigcommerce' ); ?></a></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/weglot/' ); ?>"><?php esc_html_e( 'More information', 'shoptimizer-bigcommerce' ); ?></a>
					</td>
				</tr>

				</tbody>

				</table>

	</div>

	<div class="ccfw-clear"></div>

</div>
