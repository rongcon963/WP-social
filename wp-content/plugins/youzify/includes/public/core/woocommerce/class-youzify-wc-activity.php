<?php

class Youzify_WC_Activity {

    public function __construct() {

		// Add to cart with ajax.
		add_action( 'wp_ajax_woocommerce_ajax_add_to_cart', array( $this, 'add_to_cart' ) );
		add_action( 'wp_ajax_nopriv_woocommerce_ajax_add_to_cart', array( $this, 'add_to_cart' ) );

		// Register Activity Actions.
		add_action( 'bp_register_activity_actions', array( $this, 'activity_actions' ), 10 );
		add_action( 'youzify_show_wc_embed_product', array( $this, 'add_shared_post_image' ) );

	}

	/**
	 * Add Woocommerce Activity Actions.
	 */
	function activity_actions() {

		// Init Vars
		$bp = buddypress();

		bp_activity_set_action(
			$bp->activity->id,
			'new_wc_product',
			__( 'added a new Product', 'youzify' ),
			'youzify_activity_action_wall_posts',
			__( 'Products', 'youzify' ),
			array( 'activity', 'member' )
		);

		bp_activity_set_action(
			$bp->activity->id,
			'new_wc_purchase',
			__( 'purchased a new Product', 'youzify' ),
			'youzify_activity_action_wall_posts',
			__( 'Purchases', 'youzify' ),
			array( 'activity', 'member' )
		);

	}

	/**
	 * Add Shared Post Image
	 */
	function add_shared_post_image() {

		// Get Activity Type.
		$activity_type = bp_get_activity_type();

		if ( $activity_type == 'new_wc_purchase' || $activity_type == 'new_wc_product' ) {
			$product = wc_get_product( bp_get_activity_item_id()  );
	    	$args = youzify_wc_get_activity_product_args( $product );
	    	echo youzify_get_woocommerce_product( $args );
		}
	}

    /**
     * Add To Cart With Ajax.
     */
	function add_to_cart() {

		// Get Product Data.
        $product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
        $quantity = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
        $variation_id = absint( $_POST['variation_id'] );
        $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
        $product_status = get_post_status($product_id);

        if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id) && 'publish' === $product_status ) {

            do_action( 'woocommerce_ajax_added_to_cart', $product_id );

            if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
                wc_add_to_cart_message( array( $product_id => $quantity ), true);
            }

            WC_AJAX::get_refreshed_fragments();

        } else {

            $data = array(
                'error' => true,
                'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ) );

            echo wp_send_json( $data );
        }

        wp_die();
    }

}

new Youzify_WC_Activity();