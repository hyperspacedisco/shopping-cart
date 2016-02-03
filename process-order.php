<?php 

session_start();

$grandTotal = 0;

foreach ($_SESSION['cart'] as $product) {
	
	$grandTotal += $product['quantity'] * $product['price'];

};

// Prepare the order in a "pending" state
// Connect to the database
$dbc = new mysqli( 'localhost', 'root', '', 'shopping-cart' );

// Prepare SQL
$name    = $dbc->real_escape_string( $_POST['full-name'] );
$email   = $dbc->real_escape_string( $_POST['email'] );
$phone   = $dbc->real_escape_string( $_POST['phone'] );
$suburb  = $dbc->real_escape_string( $_POST['suburb'] );
$address = $dbc->real_escape_string( $_POST['address'] );

$sql = "INSERT INTO orders VALUES(NULL, '$name', $suburb, '$address', '$phone', '$email', 'pending')";

// Run the query
$dbc->query( $sql );

// Get the ID of this order
$orderID = $dbc->insert_id;

$_SESSION['orderID'] = $orderID;

// Loop over the cart contents and add them to the ordered_products table
foreach( $_SESSION['cart'] as $product ) {
	$productID = $product['id'];
	$quantity = $product['quantity'];
	$price = $product['price'];
	$sql = "INSERT INTO ordered_products VALUES( NULL, $productID, $orderID, $quantity, $price )";
	$dbc->query( $sql );
}

// Include the PxPay library
require 'PxPay_Curl.inc.php';

// Create instance of the PxPay class
$pxpay = new PxPay_Curl( 'https://sec.paymentexpress.com/pxpay/pxaccess.aspx', PXPAY_USER, PXPAY_KEY );

// Create instance of request object
$request = new PxPayRequest();

// Get the text values of the city and suburb for the transaction
// Populate the request with transaction details
$request->setAmountInput( $grandTotal );
$request->setTxnType( 'Purchase' );
$request->setCurrencyInput( 'NZD' );
$request->setUrlSuccess( 'http://localhost/~sarah.lyne/shopping_cart/transaction-success.php' );
$request->setUrlFail( 'http://localhost/~sarah.lyne/shopping_cart/transaction-fail.php' );
$request->setTxnData1( $_POST['full-name'] );
$request->setTxnData2( $_POST['phone'] );
$request->setTxnData3( $_POST['email'] );

// Convert the request object into XML
$requestString = $pxpay->makeRequest( $request );

// Send the request away and wait for a response
$response = new MifMessage( $requestString );

// Extract the URL from the response and redirect the user
$url = $response->get_element_text('URI');

// Redirect our visitor
header('Location: '.$url);


//