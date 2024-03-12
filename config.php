<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'ARNZrgicGlu7VIqEZZaR11-SCndSaI7kI8fgmuNSvJdI32yqGI8-Cj7jO-hQbZe8iTdJR1PCOcREkBiM');
define('CLIENT_SECRET', 'EAMhGzT4kYLGyupeew3ns1MPG6ZS_qLOfGwHMIAJMQFOCDnodX61DvwUgyHARt8PoXUfGBofHkITkSaF');
 
define('PAYPAL_RETURN_URL', 'http://localhost/Merchant_A/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/Merchant_A/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here
 
// Connect with the database
$db = new mysqli('localhost', 'root', '', 'merchant_a'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live

?>
