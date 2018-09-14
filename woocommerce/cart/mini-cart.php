<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<ul class="cart_list product_list_widget <?php echo $args['list_class']; ?>">

	<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

		<?php 
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    
                    $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                    $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                    ?>
			        <li>
                    
           	            <a href="<?php echo get_permalink( $product_id ); ?>" class="product-image">

					        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) ?>
                            
                        </a>
                        
                        <div class="product-details">
                        
                            <a href="<?php echo get_permalink( $product_id ); ?>" class="product-name">
                            
                                <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                
                            </a>
                            
                            <?php echo WC()->cart->get_item_data( $cart_item ); ?>

                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                        
                        </div>
                        
                        <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key ); ?>
				        
			        </li>
                <?php
                }
            }
        ?>

	<?php else : ?>

		<li class="empty"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></li>

	<?php endif; ?>

</ul><!-- end product list -->

<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

<div class="minicart-actions clearfix">
	
    <p class="total"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="button btn-inverse cart-link wc-forward"><?php _e( 'Cart', 'woocommerce' ); ?></a>
		<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="button checkout checkout-link wc-forward"><?php _e( 'Checkout', 'woocommerce' ); ?></a>
	</p>
    
</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
