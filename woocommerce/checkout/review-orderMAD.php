<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="row "> <!-- shop_table woocommerce-checkout-review-order-table -->
	<div class="col-6 product-name-title">Produits</div>
	<div class="col-6 product-total-title">Total</div>
</div>


<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<div class="row <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="col-6 product-name">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
						</div>
						<div class="col-6 product-total">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</div>
					</div>
					<?php
				}
			}


			

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>





		<div class="row cart-subtotal">
			<div class="col-6"><?php _e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="col-6 text-right"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>



		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			<div class="row frais">
				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); // cart/cart-shipping.php ?>

				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
			</div>
		<?php endif; ?>


		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
					? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
					: '';

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
				<div class="row tva">
					<div class="col-6 text-left tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<span style="font-family: Montserrat; font-weight:bold; font-size: 0.6rem; text-transform: uppercase;">
							<?php echo esc_html( $tax->label ) . $estimated_text; ?>
							<!--TVA-->
						</span>
					</div>
					<div class="col-6 text-right " data-title="<?php echo esc_attr( $tax->label ); ?>">
						<?php echo wp_kses_post( $tax->formatted_amount ); ?>
					</div>
				</div>
				<?php endforeach; ?>
			<?php else : ?>
				<!--<tr class="tax-total">-->
					<div class="row tva">
					<div class="col-6 text-left">
						<span style="font-family: Montserrat; font-weight:bold; font-size: 0.6rem;">
							<!--<th>--><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?><!--</th>-->
							<!--TVA-->
						</span>
					</div>
					<div class="col-6 text-right" data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>">
						<?php wc_cart_totals_taxes_total_html(); ?>
					</div>
					</div>
					<!--<td data-title="--><?php //echo esc_attr( WC()->countries->tax_or_vat() ); ?><!--"></td>-->
				<!--</tr>-->
			<?php endif; ?>
		<?php endif; ?>
		



		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
		<div class="row order-total">
			<div class="col-6"><?php _e( 'Total', 'woocommerce' ); ?></div>
			<div class="col-6  text-right"><?php  wc_cart_totals_order_total_html(); ?></div>
		</div>



		<?php do_action( 'woocommerce_review_order_after_order_total' ); // payment.php ?>

				
