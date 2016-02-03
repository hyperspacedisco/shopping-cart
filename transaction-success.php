<?php
session_start();


require 'PxPay_Curl.inc.php';
require '../secret.php';

// Create instance
$pxpay = new PxPay_Curl( 'https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY );

// Convert the response into something we can use
$response = $pxpay->getResponse( $_GET['result'] );

// Was the transaction successful?
if( $response->getSuccess() == 1 ) {
	// Update the database order to say paid
	
	$dbc = new mysqli('localhost', 'root', '', 'shopping-cart');

	//extract order ID from the session
	$orderID = $_SESSION['orderID'];

	$sql = "UPDATE orders SET status = 'approved' WHERE id = $orderID";


	// E-Mail the client
	// E-Mail the website owner
	// Clear the cart

	$_SESSION['cart'] = [];
}