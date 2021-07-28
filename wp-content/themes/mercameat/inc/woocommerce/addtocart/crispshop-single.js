jQuery('.single_add_to_cart_button').click(function(e) {
  e.preventDefault();
  jQuery(this).addClass('adding-cart');
  var product_id = jQuery(this).val();
  var quantity = jQuery('input[name="quantity"]').val();
  jQuery('.cart-dropdown-inner').empty();

  jQuery.ajax ({
    url: crispshop_ajax_object.ajax_url,
    type:'POST',
    data:'action=crispshop_add_cart_single&product_id=' + product_id + '&quantity=' + quantity,

    success:function(results) {
      jQuery('.widget_shopping_cart_content').html(results);
      $('.cart-mini').addClass('active');
      jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
    }
  });
});

