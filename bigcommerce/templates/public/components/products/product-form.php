<?php
/**
 * Product Single Form Actions
 *
 * @package BigCommerce
 *
 * @var Product $product
 * @var string  $options
 * @var string  $button
 * @var string  $message
 * @var int     $min_quantity
 * @var int     $max_quantity
 * @var bool    $ajax_add_to_cart
 * @var string  $quantity_field_type
 * @version 1.0.1
 */

use BigCommerce\Post_Types\Product\Product;

?>

<form action="<?php echo esc_url( $product->purchase_url() ); ?>" method="post" enctype="multipart/form-data"
      class="bc-form bc-product-form">
	<?php
		if (count($product->options) > 0) {
			echo '<div style="display: flex; align-items: flex-start; justify-content: space-between;">';
			foreach ($product->options as $option) {
				echo '<div><div style="font-weight: bold;">'. $option->display_name .'</div>';

				foreach ($option->option_values as $value) {
					echo '<div style="margin-bottom: 10px;">'. $value->label .'</div>';
				}

				echo '</div>';
			}

            foreach ($product->options as $option) {
				echo '<div><div style="font-weight: bold;">Quantity</div>';

				foreach ($option->option_values as $value) {
					$id = 0;

					foreach ($product->variants as $variant) {
						if ($variant->option_values[0]->id == $value->id) {
							$id = $variant->id;

							break;
						}
					}

					echo '<div style="margin-bottom: 10px;">
                        <input type="number" value="0" data-id="'. $id .'" data-option-id="'. $option->id .'" data-value-id="'. $value->id .'" class="bc4wp-quantity" style="padding: 5px;">
                    </div>';
				}

				echo '</div>';
			}
			echo '</div>';
		} else {
			echo $options;
		}
	?>

	<!-- data-js="bc-product-message" is required. -->
	<div class="bc-product-form__product-message" data-js="bc-product-message"></div>

	<!-- data-js="variant_id" is required. -->
	<input type="hidden" name="variant_id" class="variant_id" data-js="variant_id" value="">
	
	<?php if (count($product->options) == 0): ?>
		<div class="bc-product-form__quantity">
			<?php if ( $quantity_field_type !== 'hidden' ) { ?>
			<label for="quantity" class="bc-product-form__quantity-label">
				<span class="bc-product-single__meta-label"><?php esc_html_e( 'Quantity', 'bigcommerce' ); ?>:</span>
			</label>
			<?php } ?>
			<input class="bc-product-form__quantity-input"
				type="<?php echo esc_attr( $quantity_field_type ); ?>"
				name="quantity"
				id="quantity"
				value="<?php echo absint( $min_quantity ); ?>"
				min="<?php echo absint( $min_quantity ); ?>"
				<?php if ( $max_quantity > 0 ) { ?>max="<?php echo absint( $max_quantity ); ?>"<?php } ?>
			/>
		</div>
	<?php endif; ?>

	<?php if ( $message ) { ?>
		<span class="bc-product-form__purchase-message"><?php echo wp_strip_all_tags( $message ); ?></span>
	<?php } ?>
    
	<?php if (count($product->options) > 0): ?>
    	<button class="bc-btn bc-btn--form-submit bc-btn--add_to_cart" type="submit">Add to Cart</button>
		<div class="bc-ajax-add-to-cart__message-wrapper" data-js="bc-ajax-add-to-cart-message"></div>
	<?php else: ?>
		<?php echo $button; ?>
	<?php endif; ?>

	<?php if ( $ajax_add_to_cart ) { ?>
		<!-- data-js="bc-ajax-add-to-cart-message" is required. -->
		<div class="bc-ajax-add-to-cart__message-wrapper" data-js="bc-ajax-add-to-cart-message"></div>
	<?php } ?>
</form>

<?php if (count($product->options) > 0): ?>
	<script>
		jQuery(document).ready(function($) {
			var cart_id = '';

			function addItemsToCart(items, index = 0) {
				if (items[index]) {
					var item = items[index];
					var url = '/wp-json/bigcommerce/v1/cart';

					if (cart_id) {
						url += '/' + cart_id;
					}

					$.ajax({
						url: url,
						type: 'POST',
						data: item,
						success: function(response) {
							if (response['cart_id']) {
								cart_id = response['cart_id'];

								addItemsToCart(items, index + 1);
							} else {
								console.log(response)
							}
						},
						error: function(response) {
							var err = JSON.parse(response.responseText);

							$('.bc-ajax-add-to-cart__message-wrapper').html('<p class="bc-ajax-add-to-cart__message bc-alert bc-alert--error">'+ err.message +'</p>');
						}
					});
				} else {
					$('.bc-ajax-add-to-cart__message-wrapper').html('<p class="bc-ajax-add-to-cart__message bc-alert bc-alert--success">Product successfully added to your cart.</p>');

					$('.bc-product-form').find('button[type="submit"]').removeClass('bc-ajax-cart-processing').prop('disabled', false);
				}
			}

			$('.bc-product-form').on('submit', function(e) {
				e.preventDefault();

				var formAction = $(this).attr('action');
				var items = [];

				$(this).find('button[type="submit"]').addClass('bc-ajax-cart-processing').prop('disabled', true);

				$('.bc4wp-quantity').each(function(i, elem) {
					var id = $(elem).data('id');
					var quantity = $(elem).val();

					if (quantity > 0) {
						var optionId = $(elem).data('option-id');
						var valueId = $(elem).data('value-id');
						var data = {
							product_id: <?php echo $product->id; ?>,
							quantity: quantity,
							options: [
								{
									id: optionId,
									value: valueId
								}
							]
						};

						items.push(data);
					}
				});

				addItemsToCart(items);
			});
		});
	</script>
<?php endif; ?>