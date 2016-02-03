<?php
session_start();


require 'PxPay_Curl.inc.php';
require '../secret.php';

// Create instance
$pxpay = new PxPay_Curl( 'https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY );

// Convert the response into something we can use
$response = $pxpay->getResponse( $_GET['result'] );

// Was the transaction unsuccessful?
if( $response->getSuccess() == 0 ) {
	// Update the database order to say failed
	echo '<pre>';
	print_r($response);
	// E-Mail the client
}