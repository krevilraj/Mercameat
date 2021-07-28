<?php

function crispshop_scripts()
{
  if (is_singular('product')) {
    wp_enqueue_script('crispshop-single', get_template_directory_uri() . '/inc/woocommerce/addtocart/crispshop-single.js', array('jquery'), '1.0.0', true);
    wp_localize_script('crispshop-single', 'crispshop_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
  }
}

add_action('wp_enqueue_scripts', 'crispshop_scripts');

function crispshop_add_cart_single_ajax() {
  $product_id = $_POST['product_id'];
  $variation_id = $_POST['variation_id'];
  $quantity = $_POST['quantity'];

  if ($variation_id) {
    WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
  } else {
    WC()->cart->add_to_cart( $product_id, $quantity);
  }

  $items = WC()->cart->get_cart();
  global $woocommerce;
  $item_count = $woocommerce->cart->cart_contents_count;

  echo wc_get_template( 'cart/mini-cart.php' );
  die();
  ?>


  <span class="item-count"><?php echo $item_count; ?></span>

  <h4>Shopping Bag</h4>

  <?php foreach($items as $item => $values) {
    $_product = $values['data']->post; ?>

    <div class="dropdown-cart-wrap">
      <div class="dropdown-cart-left">
        <?php $variation = $values['variation_id'];
        if ($variation) {
          echo get_the_post_thumbnail( $values['variation_id'], 'thumbnail' );
        } else {
          echo get_the_post_thumbnail( $values['product_id'], 'thumbnail' );
        } ?>
      </div>

      <div class="dropdown-cart-right">
        <h5><?php echo $_product->post_title; ?></h5>
        <p><strong>Quantity:</strong> <?php echo $values['quantity']; ?></p>
        <?php global $woocommerce;
        $currency = get_woocommerce_currency_symbol();
        $price = get_post_meta( $values['product_id'], '_regular_price', true);
        $sale = get_post_meta( $values['product_id'], '_sale_price', true);
        ?>

        <?php if($sale) { ?>
          <p class="price"><strong>Price:</strong> <del><?php echo $currency; echo $price; ?></del> <?php echo $currency; echo $sale; ?></p>
        <?php } elseif($price) { ?>
          <p class="price"><strong>Price:</strong> <?php echo $currency; echo $price; ?></p>
        <?php } ?>
      </div>

      <div class="clear"></div>
    </div>
  <?php } ?>

  <div class="dropdown-cart-wrap dropdown-cart-subtotal">
    <div class="dropdown-cart-left">
      <h6>Subtotal</h6>
    </div>

    <div class="dropdown-cart-right">
      <h6><?php echo WC()->cart->get_cart_total(); ?></h6>
    </div>

    <div class="clear"></div>
  </div>

  <?php $cart_url = $woocommerce->cart->get_cart_url();
  $checkout_url = $woocommerce->cart->get_checkout_url(); ?>

  <div class="dropdown-cart-wrap dropdown-cart-links">
    <div class="dropdown-cart-left dropdown-cart-link">
      <a href="<?php echo $cart_url; ?>">View Cart</a>
    </div>

    <div class="dropdown-cart-right dropdown-checkout-link">
      <a href="<?php echo $checkout_url; ?>">Checkout</a>
    </div>

    <div class="clear"></div>
  </div>

  <?php die();
}

add_action('wp_ajax_crispshop_add_cart_single', 'crispshop_add_cart_single_ajax');
add_action('wp_ajax_nopriv_crispshop_add_cart_single', 'crispshop_add_cart_single_ajax');