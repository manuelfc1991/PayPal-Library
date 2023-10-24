<?php 
  include('class.paypal.php');

  $success_url = 'paypal-success.php'; // success page
  $return_url = 'paypal-failed.php'; // cancellation page
  $notify_url = 'ipn.php'; 
  $paypal_id  = ''; // your paypal id goes here
  $server = 'sandbox'; // sandbox or live
  $currency = 'USD';
  $tax = '';

  if(isset($_POST['rc-processing-paypal-btn'])){
        $paypal->add_field('return', $success_url);
        $paypal->add_field('cancel_return', $return_url);
        $paypal->add_field('notify_url', $notify_url);
        $paypal->add_field('item_name', $title);
        $paypal->add_field('custom', $id);
        $paypal->add_field('amount', $price);
        $paypal->add_field('business', $paypal_id);
        $paypal->add_field('cmd', '_xclick');
        $paypal->add_field('currency_code', $currency); 
        $paypal->add_field('no_shipping', 1);
        $paypal->add_field('tax_rate', $tax);
        echo $paypal_html = $paypal->submit_paypal_post('full'); 
    } 