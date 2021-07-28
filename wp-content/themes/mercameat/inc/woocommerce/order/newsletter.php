<?php
// Display Newsletter Subscription option before I agree Terms and Condition in Checkout Page
add_action('woocommerce_review_order_before_payment', 'dc_add_text_above_payment', 7);
function dc_add_text_above_payment()
{
  echo "<h3>Selecione o Método de Pagamento</h3>";
}

add_action('woocommerce_checkout_terms_and_conditions', 'dc_add_checkout_privacy_policy', 7);

function dc_add_checkout_privacy_policy()
{

  woocommerce_form_field('newsletter_option', array(
    'type' => 'checkbox',
    'class' => array('newsLetter_Chk'),
    'label_class' => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
    'input_class' => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
    'required' => false,
    'label' => 'Pretendo receber novidades e promoções.',
  ));

}


// Add same value to db and show on Admin, WooCommerce > Orders - minium order amount
add_action('woocommerce_checkout_update_order_meta', 'dc_save_new_checkout_field');

function dc_save_new_checkout_field($order_id)
{
  if ($_POST['newsletter_option']) update_post_meta($order_id, 'newsletter_option', esc_attr($_POST['newsletter_option']));
}

add_action('woocommerce_admin_order_data_after_billing_address', 'dc_show_new_checkout_field_order', 10, 1);

function dc_show_new_checkout_field_order($order)
{
  $order_id = $order->get_id();
  if (get_post_meta($order_id, 'newsletter_option', true)) echo '<p><strong>Newsletter: Submitted</strong> ' . '</p>';
}

// morning option checkbox
add_action('woocommerce_checkout_update_order_meta', 'dc_save_morning_option_checkout_field');

function dc_save_morning_option_checkout_field($order_id)
{
  if ($_POST['morning_option']) update_post_meta($order_id, 'morning_option', esc_attr($_POST['morning_option']));
}

add_action('woocommerce_admin_order_data_after_billing_address', 'dc_show_morning_option_checkout_field_order', 10, 1);

function dc_show_morning_option_checkout_field_order($order)
{
  $order_id = $order->get_id();
  if (get_post_meta($order_id, 'morning_option', true)) echo '<p><strong>Manhã 9h-12h: Checked</strong> ' . '</p>';
}


//dawn option checkbox
add_action('woocommerce_checkout_update_order_meta', 'dc_save_dawn_option_checkout_field');

function dc_save_dawn_option_checkout_field($order_id)
{
  if ($_POST['dawn_option']) update_post_meta($order_id, 'dawn_option', esc_attr($_POST['dawn_option']));
}

add_action('woocommerce_admin_order_data_after_billing_address', 'dc_show_dawn_option_checkout_field_order', 10, 1);

function dc_show_dawn_option_checkout_field_order($order)
{
  $order_id = $order->get_id();
  if (get_post_meta($order_id, 'dawn_option', true)) echo '<p><strong>Tarde 16h-20h: Checked</strong> ' . '</p>';
}


// Display other field

add_action('woocommerce_checkout_terms_and_conditions', 'dc_add_deliveries_option', 6);

function dc_add_deliveries_option()
{
  ?>
  <p>Entregas apenas no distrito de Lisboa de terça a sexta-feira.
    Selecione em que horário pretende receber a encomenda:</p>

  <?php
  woocommerce_form_field('morning_option', array(
    'type' => 'checkbox',
    'class' => array('newsLetter_Chk'),
    'label_class' => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
    'input_class' => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
    'required' => true,
    'label' => 'Manhã 9h-12h',
  ));

  woocommerce_form_field('dawn_option', array(
    'type' => 'checkbox',
    'class' => array('newsLetter_Chk'),
    'label_class' => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
    'input_class' => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
    'required' => true,
    'label' => 'Tarde 16h-20h',
  ));
  ?>
  <script>
    jQuery(function ($) {
      $('#place_order').click(function (e) {
        e.preventDefault();
        if (!$("#dawn_option").is(':checked') && !$("#morning_option").is(':checked')) {
          var message = '<div class="woocommerce-error"><p>Selecione o horário a que pretende receber a encomenda.</p> </div>';
          $("body").prepend(message);
          return false;
        }
      });
    });
  </script>
  <style>
      .newsLetter_Chk {
          display: block;
          width: 100%;
      }

      .newsLetter_Chk .woocommerce form .form-row label {
          text-transform: unset;
      }
  </style>
  <p>Mais informações sobre encomedas <a href="#" data-toggle="modal" data-target="#exampleModal">aqui</a></p>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th scope="col">Dia de Pagamento do Pedido</th>
              <th scope="col">Dia de entrega</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Sexta-feira, Sábado e Domingo</td>
              <td>Terça-feira</td>
            </tr>
            <tr>
              <td>Segunda-Feira (pagamento até às 14h00)</td>
              <td>Quarta-feira</td>
            </tr>
            <tr>
              <td>Terça-Feira (pagamento até às 14h00)</td>
              <td>Quinta-feira</td>
            </tr>
            <tr>
              <td>Quarta-Feira (pagamento até às 14h00)</td>
              <td>Sexta-Feira</td>
            </tr>
            <tr>
              <td>Quinta-Feira (pagamento até às 14h00)</td>
              <td>Segunda Feira</td>
            </tr>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <?php

  /**
   * Add a custom field (in an order) to the emails
   */

  add_filter('woocommerce_email_order_meta_fields', 'custom_woocommerce_email_order_morning_option', 10, 3);

  function custom_woocommerce_email_order_morning_option($fields, $sent_to_admin, $order)
  {
    $fields['morning_option'] = array(
      'label' => __('Manhã 9h-12h'),
      'value' => get_post_meta($order->get_order_number(), 'morning_option', true),
    );
    $fields['dawn_option'] = array(
      'label' => __('Tarde 16h-20h'),
      'value' => get_post_meta($order->get_order_number(), 'dawn_option', true),
    );
    return $fields;
  }

  add_action('woocommerce_email_order_meta', 'misha_add_email_order_meta', 10, 3);
  /*
   * @param $order_obj Order Object
   * @param $sent_to_admin If this email is for administrator or for a customer
   * @param $plain_text HTML or Plain text (can be configured in WooCommerce > Settings > Emails)
   */
  function misha_add_email_order_meta($order_obj, $sent_to_admin, $plain_text)
  {

    // this order meta checks if order is marked as a gift
    $is_gift = get_post_meta($order_obj->get_order_number(), 'is_gift', true);

    // we won't display anything if it is not a gift
    if (empty($is_gift))
      return;

    // ok, if it is the gift order, get all the other fields
    $morning_option = get_post_meta($order_obj->get_order_number(), 'morning_option', true);
    $dawn_option = get_post_meta($order_obj->get_order_number(), 'dawn_option', true);


    // ok, we will add the separate version for plaintext emails
    if ($plain_text === false) {

      // you shouldn't have to worry about inline styles, WooCommerce adds them itself depending on the theme you use
      echo '<h2>Delivery Information</h2>
		<ul>
		<li><strong>Manhã 9h-12h:</strong> ' . $morning_option . '</li>
		<li><strong>Tarde 16h-20h:</strong> ' . $dawn_option . '</li>
		</ul>';

    } else {

      echo "Delivery Information\n
		Manhã 9h-12h: $morning_option\n
		Tarde 16h-20h: $dawn_option";

    }

  }
}

