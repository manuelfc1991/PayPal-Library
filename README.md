# PayPal PHP IPN Library

This PHP library provides a simple and convenient way to integrate PayPal payments and handle Instant Payment Notifications (IPN) in your PHP applications.

## Installation

Clone the repository or download the ZIP file and include the `paypal.class.php` file in your project.

```php
require_once('class.paypal.php');
$paypal = new paypal();
```

## Usage

### Setting Up PayPal Object

Create a PayPal object by including the `class.paypal.php` file in your PHP script. Customize the configuration by modifying the `__construct()` method in the `paypal.class.php` file. You can set the PayPal environment (sandbox or live), CSS and image paths, PayPal URLs, IPN log file path, etc.

```php
include('class.paypal.php');
$paypal = new paypal();
```

### PayPal Payment Form

Create a form in your HTML with the necessary payment details and include a submit button. When the form is submitted, it adds the PayPal fields and redirects the user to PayPal for payment processing.

```html
<form method="post" action="">
    <!-- Include your product details and other necessary form fields here -->

    <input type="submit" name="rc-processing-paypal-btn" value="Pay with PayPal">
</form>
```

### Handling IPN Response

In your form processing script, handle the IPN response from PayPal. Validate the response using the `validate_ipn()` method, and process the payment accordingly based on the validation result.

```php
$success_url = 'paypal-success.php'; // Success page
$return_url = 'paypal-failed.php'; // Cancellation page
$notify_url = 'ipn.php'; // IPN handler script
$paypal_id  = ''; // Your PayPal ID goes here
$server = 'sandbox'; // Sandbox or live
$currency = 'USD';
$tax = '';

if(isset($_POST['rc-processing-paypal-btn'])){
    $paypal->add_field('return', $success_url);
    $paypal->add_field('cancel_return', $return_url);
    $paypal->add_field('notify_url', $notify_url);
    // Add more fields as needed
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
```


Create a PHP file that handles the IPN response from PayPal and processes the data received. Below is a PHP file that handles the IPN response and writes the data to a text file. Please note that you need to replace `"your_insert_code_here"` with the actual code that inserts the data into your database.

```php
<?php
// Include the PayPal class
include('class.paypal.php');

// Instantiate the PayPal class
$paypal = new paypal();

// Validate the IPN response from PayPal
if($paypal->validate_ipn()) {
    // Extract IPN data
    $purchase_id                = $paypal->ipn_data['custom'];
    $item_number                = $paypal->ipn_data['item_number'];
    $first_name                 = $paypal->ipn_data['first_name'];
    // ... (continue extracting other IPN variables)

    // Prepare data for insertion into the database
    $data = array();
    $data_format = array();

    // Add more fields as needed
    $data['item_number'] = $wpdb->prepare('%s', $item_number);
    $data_format[] = '%s';

    $data['payer_first_name'] = $wpdb->prepare('%s', $first_name);
    $data_format[] = '%s';

    // ... (continue adding other fields)

    // Perform the database insertion - Replace "your_insert_code_here" with actual database insertion code
    $query = "INSERT INTO your_table_name (" . implode(", ", array_keys($data)) . ") VALUES (" . implode(", ", $data_format) . ")";
    // mysql_query($query); // For MySQL, use appropriate database query function
    // mysqli_query($connection, $query); // For MySQLi, use appropriate database query function
    // $pdo->prepare($query)->execute($data); // For PDO, use appropriate database query function

    // Write the IPN data to a text file for logging
    $content = json_encode($paypal->ipn_data);
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/ipn_data.txt", "wb");
    fwrite($fp, $content);
    fclose($fp);
}
```

In this code, `your_table_name` should be replaced with the actual name of your database table where you want to insert the IPN data. Also, the database insertion code (`$query`) should be replaced with the appropriate code based on the database system you are using (MySQL, MySQLi, PDO, etc.).

Make sure the file has the appropriate permissions to write to the file system where `ipn_data.txt` is being saved.

## Documentation

For detailed information about the available methods and their usage, please refer to the inline comments in the `paypal.class.php` file.

## License

This PayPal PHP IPN Library is open-source software licensed under the [MIT License](LICENSE.md).

## Donate link

https://www.buymeacoffee.com/rabbitcreators


