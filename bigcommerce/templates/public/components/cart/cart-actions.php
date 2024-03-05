<?php
//Add Business button:
//    - plugin file: /wp-content/plugins/bigcommerce/templates/public/components/cart/cart-actions.php
//    - can be overriden inside themes folder like: {current active theme}/bigcommerce/components/cart/cart-actions.php
//
//Screenshot: https://i.gyazo.com/8c4451620f7d24c9eca3e98d4f7bec07.png
//
/**
 * Cart Actions
 *
 * @package BigCommerce
 *
 * @var array $cart
 * @var array $actions
 * @version 1.0.0
 */

?>

<div class="bc-cart-actions">
	<form
			action="<?php echo esc_url( home_url( '/bigcommerce/checkout/' . $cart['cart_id'] ) ); ?>"
			method="post"
			enctype="multipart/form-data"
	>
		<?php foreach ( $actions as $action ) {
			echo $action;
		} ?>

        <a href="/checkout/" VALUE="business" id="business" class="bc-btn bc-cart-actions__checkout-button">BUSINESS ORDER CHECKOUT</a>
		<p class="business_cart"> A business purchase is any purchase made on behalf of the company and will require manager approval in order to proceed. </p>

        <?php
            if (isset($cart['subtotal']) && isset($cart['subtotal']['raw']) && $cart['subtotal']['raw'] > 10000) {
            ?>
                <p class="alert">ATTENTION: Your order requires a Purchase Order, please follow the instructions at <a href="https://surf.service-now.com/esc?id=surf_kb_article&sys_id=fca5793cdb30f4105e6a474d1396198d">How to raise a PO.</a></p>
    
            <?php
            }
        ?>
	</form>
</div>