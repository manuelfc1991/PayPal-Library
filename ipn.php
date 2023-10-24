<?php

include('class.paypal.php');

if($paypal->validate_ipn())
{
  $purchase_id                = $paypal->ipn_data['custom'];
  $item_number                = $paypal->ipn_data['item_number'];
  $first_name                 = $paypal->ipn_data['first_name'];
  $last_name                  = $paypal->ipn_data['last_name'];
  $payment_type               = $paypal->ipn_data['payment_type'];
  $txn_id                     = $paypal->ipn_data['txn_id'];
  $payer_email                = $paypal->ipn_data['payer_email'];
  $receiver_email             = $paypal->ipn_data['receiver_email'];
  $protection_eligibility     = $paypal->ipn_data['protection_eligibility'];
  $verify_sign                = $paypal->ipn_data['verify_sign'];
  $txn_type                   = $paypal->ipn_data['txn_type'];
  $payment_date               = $paypal->ipn_data['payment_date'];
  $payment_status             = $paypal->ipn_data['payment_status'];
  $business                   = $paypal->ipn_data['business'];
  $charset                    = $paypal->ipn_data['charset'];
  $ipn_track_id               = $paypal->ipn_data['ipn_track_id'];
  $notify_version             = $paypal->ipn_data['notify_version'];
  $mc_currency                = $paypal->ipn_data['mc_currency'];
  $mc_fee                     = $paypal->ipn_data['mc_fee'];
  $mc_gross                   = $paypal->ipn_data['mc_gross'];
  $payer_status               = $paypal->ipn_data['payer_status'];
  $quantity                   = $paypal->ipn_data['quantity'];
  $payment_fee                = $paypal->ipn_data['payment_fee'];
  $shipping_discount          = $paypal->ipn_data['shipping_discount'];
  $receiver_id                = $paypal->ipn_data['receiver_id'];
  $insurance_amount           = $paypal->ipn_data['insurance_amount'];
  $item_name                  = $paypal->ipn_data['item_name'];
  $discount                   = $paypal->ipn_data['discount'];
  $residence_country          = $paypal->ipn_data['residence_country'];
  $test_ipn                   = $paypal->ipn_data['test_ipn'];
  $shipping_method            = $paypal->ipn_data['shipping_method'];
  $transaction_subject        = $paypal->ipn_data['transaction_subject'];
  $payment_gross              = $paypal->ipn_data['payment_gross'];
  $payer_id                   = $paypal->ipn_data['payer_id'];

  $data = array();
  $data_format = array();

  $data['item_number'] = $wpdb->prepare('%s', $item_number);
  $data_format[] = '%s';

  $data['payer_first_name'] = $wpdb->prepare('%s', $first_name);
  $data_format[] = '%s';

  $data['payer_last_name'] = $wpdb->prepare('%s', $last_name);
  $data_format[] = '%s';

  $data['payment_type'] = $wpdb->prepare('%s', $payment_type);
  $data_format[] = '%s';

  $data['txn_id'] = $wpdb->prepare('%s', $txn_id);
  $data_format[] = '%s';

  $data['payer_email'] = $wpdb->prepare('%s', $payer_email);
  $data_format[] = '%s';

  $data['receiver_email'] = $wpdb->prepare('%s', $receiver_email);
  $data_format[] = '%s';

  $data['protection_eligibility'] = $wpdb->prepare('%s', $protection_eligibility);
  $data_format[] = '%s';

  $data['verify_sign'] = $wpdb->prepare('%s', $verify_sign);
  $data_format[] = '%s';

  $data['txn_type'] = $wpdb->prepare('%s', $txn_type);
  $data_format[] = '%s';

  $data['payment_date'] = $wpdb->prepare('%s', date('Y-m-d H:i:s', strtotime($payment_date)));
  $data_format[] = '%s';

  $data['payer_payment_status'] = $wpdb->prepare('%s', $payment_status);
  $data_format[] = '%s';

  $data['business'] = $wpdb->prepare('%s', $business);
  $data_format[] = '%s';

  $data['charset'] = $wpdb->prepare('%s', $charset);
  $data_format[] = '%s';

  $data['ipn_track_id'] = $wpdb->prepare('%s', $ipn_track_id);
  $data_format[] = '%s';

  $data['notify_version'] = $wpdb->prepare('%s', $notify_version);
  $data_format[] = '%s';

  $data['mc_currency'] = $wpdb->prepare('%s', $mc_currency);
  $data_format[] = '%s';

  $data['mc_fee'] = $wpdb->prepare('%s', $mc_fee);
  $data_format[] = '%s';

  $data['mc_gross'] = $wpdb->prepare('%s', $mc_gross);
  $data_format[] = '%s';

  $data['payer_status'] = $wpdb->prepare('%s', $payer_status);
  $data_format[] = '%s';

  $data['quantity'] = $wpdb->prepare('%s', $quantity);
  $data_format[] = '%s';

  $data['payment_fee'] = $wpdb->prepare('%s', $payment_fee);
  $data_format[] = '%s';

  $data['shipping_discount'] = $wpdb->prepare('%s', $shipping_discount);
  $data_format[] = '%s';

  $data['receiver_id'] = $wpdb->prepare('%s', $receiver_id);
  $data_format[] = '%s';

  $data['insurance_amount'] = $wpdb->prepare('%s', $insurance_amount);
  $data_format[] = '%s';

  $data['item_name'] = $wpdb->prepare('%s', $item_name);
  $data_format[] = '%s';

  $data['discount'] = $wpdb->prepare('%s', $discount);
  $data_format[] = '%s';

  $data['residence_country'] = $wpdb->prepare('%s', $residence_country);
  $data_format[] = '%s';

  $data['test_ipn'] = $wpdb->prepare('%s', $test_ipn);
  $data_format[] = '%s';

  $data['shipping_method'] = $wpdb->prepare('%s', $shipping_method);
  $data_format[] = '%s';

  $data['transaction_subject'] = $wpdb->prepare('%s', $transaction_subject);
  $data_format[] = '%s';

  $data['payment_gross'] = $wpdb->prepare('%s', $payment_gross);
  $data_format[] = '%s';

  $data['payer_id'] = $wpdb->prepare('%s', $payer_id);
  $data_format[] = '%s';

  // your insert code goes here 

  $content = $query;
  $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText-1.txt","wb");
  fwrite($fp,$content);
  fclose($fp);
}  