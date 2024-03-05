// Main shoptimizerbigcommerce js.
;
( function( $ ) {
	'use strict';

	$( window ).on( 'load resize', function() {

		if ( 992 < $( window ).width() ) {

		// Make a standard hover menu work on touchscreens. Activate only on devices with a touch screen.
		if ( 'ontouchstart' in window ) {

			// Make the touch event add hover pseudoclass.
			document.addEventListener( 'touchstart', function() {}, true );

			// Modify click event.
			document.addEventListener( 'click', function( e ) {
				var el = $( e.target ).hasClass( 'menu-item-has-children' ) ? $( e.target ) : $( e.target ).closest( '.menu-item-has-children' );
				if ( ! el.length ) {
					return;
				}

				// Remove tapped class from old ones.
				$( '.menu-item-has-children.tapped' ).each( function() {
					if ( this !== el.get( 0 ) ) {
					$( this ).removeClass( 'tapped' );
					}
				} );
				if ( ! el.hasClass( 'tapped' ) ) {

					// First Tap.
					el.addClass( 'tapped' );
					e.preventDefault();
					return false;
				} else {

					// Second Tap.
					return true;
				}
			}, true );
		}
	}
	} );


	var cartCount = readCookie('bigcommerce_cart_item_count');
	if (cartCount != null) {
		if (cartCount == '0') {
			$('.bigcommerce-cart__item-count').attr('data-before','0');
		} 	
	} else {
		$('.bigcommerce-cart__item-count').attr('data-before','0');
	}

	// Mobile menu toggle.
	$( document ).ready( function() {
		$( '.menu-toggle' ).on( 'click', function() {
			$( this ).toggleClass( 'active' );
			$( 'body' ).toggleClass( 'mobile-toggled' );
			$( window ).scrollTop( 0 );
		return false;
		} );
	} );

	// Move the cart into the nav bar.
	/*$( document ).ready( function() {
		$(".cart-menu-wrapper").appendTo(".shoptimizerbigcommerce-primary-navigation");
	} );
	*/
	
	// Overlay when a full width menu item is hovered over.
	$( document ).ready( function() {
    $( 'header li.full-width' ).hover( function() {
        $( '.site-content' ).addClass( 'overlay' );
    },
    function() {
        $( '.site-content' ).removeClass( 'overlay' );
    } );
	} );

	// Reveal/Hide Mobile sub menus.
	$( 'body .main-navigation ul.menu > li.menu-item-has-children > .caret' ).on( 'click', function( e ) {
		$( this ).closest( 'li' ).toggleClass( 'dropdown-open' );
		e.preventDefault();
	} );

	// Scroll to top.
	$( '.logo-mark a' ).click( function() {
		$( 'html, body' ).animate( { scrollTop: 0 }, 'slow' );
		return false;
	} );


	var $j = jQuery.noConflict();

	$j( window ).on( 'load', function() {
		'use strict';

	// BigCommerce quantity buttons
		shoptimizerQuantityButtons();
	} );

	/**
	 * BigCommerce quantity buttons
	 * @param {number} $quantitySelector Quantity.
	 */
	function shoptimizerQuantityButtons( $quantitySelector ) {

		var $quantityBoxes;

		if ( ! $quantitySelector ) {
			$quantitySelector = '.bc-product-form__quantity-input';
		}

		$quantityBoxes = $j( '.bc-product-card--single div.bc-product-form__quantity:not(.buttons_added), .bc-product-single__meta div.bc-product-form__quantity:not(.buttons_added)' ).find( $quantitySelector );

		if ( $quantityBoxes && 'date' !== $quantityBoxes.prop( 'type' ) && 'hidden' !== $quantityBoxes.prop( 'type' ) ) {

			// Add plus and minus icons
			$quantityBoxes.parent().addClass( 'buttons_added' );
	        $quantityBoxes.after( '<div class="quantity-nav"><a href="javascript:void(0)" class="quantity-button quantity-up plus">&nbsp;</a><a href="javascript:void(0)" class="quantity-button quantity-down minus">&nbsp;</a></div>' );

			// Target quantity inputs on product pages
			$j( 'input' + $quantitySelector + ':not(.product-quantity input' + $quantitySelector + ')' ).each( function() {
					var $min = parseFloat( $j( this ).attr( 'min' ) );

					if ( $min && 0 < $min && parseFloat( $j( this ).val() ) < $min ) {
						$j( this ).val( $min );
					}
			} );

			$j( '.plus, .minus' ).unbind( 'click' );

			$j( '.plus, .minus' ).on( 'click', function() {
				// Get values
				var $quantityBox     = $j( this ).closest( '.bc-product-form__quantity' ).find( $quantitySelector ),
				$currentQuantity = parseFloat( $quantityBox.val() ),
				$maxQuantity     = parseFloat( $quantityBox.attr( 'max' ) ),
				$minQuantity     = parseFloat( $quantityBox.attr( 'min' ) ),
				$step            = $quantityBox.attr( 'step' );

				// Fallback default values
				if ( ! $currentQuantity || '' === $currentQuantity  || 'NaN' === $currentQuantity ) {
					$currentQuantity = 0;
				}
				if ( '' === $maxQuantity || 'NaN' === $maxQuantity ) {
					$maxQuantity = '';
				}

				if ( '' === $minQuantity || 'NaN' === $minQuantity ) {
					$minQuantity = 0;
				}
				if ( 'any' === $step || '' === $step  || undefined === $step || 'NaN' === parseFloat( $step )  ) {
					$step = 1;
				}

				// Change the value
				if ( $j( this ).is( '.plus' ) ) {

					if ( $maxQuantity && ( $maxQuantity === $currentQuantity || $currentQuantity > $maxQuantity ) ) {
						$quantityBox.val( $maxQuantity );
					} else {
						$quantityBox.val( $currentQuantity + parseFloat( $step ) );
					}

				} else {

					if ( $minQuantity && ( $minQuantity === $currentQuantity || $currentQuantity < $minQuantity ) ) {
						$quantityBox.val( $minQuantity );
					} else if ( 0 < $currentQuantity ) {
						$quantityBox.val( $currentQuantity - parseFloat( $step ) );
					}
				}

					// Trigger change event
					$quantityBox.trigger( 'change' );
				}
			);
		}
	}

	$( document ).ready( function() {
		var $loading = $( '#ajax-loading' ).hide();
		$( '.bc-btn--add_to_cart' ).on( 'click', function( e ) {
			var oldXHR = window.XMLHttpRequest;
			function newXHR() {
			    var realXHR = new oldXHR();
			    realXHR.addEventListener("readystatechange", function() {
			    	$loading.show();
			        if(realXHR.readyState==4){
			            $loading.hide();
			        }
			    }, false);
			    return realXHR;
			}
			window.XMLHttpRequest = newXHR;
		} );
	} );

}( jQuery ) );


function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

