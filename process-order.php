<?php 

session_start();

$grandTotal = 0;

foreach ($_SESSION['cart'] as $product) {
	
	$grandTotal += $product['quantity'] * $product['price'];

};

//the order state (pending, processing, etc)
require 'PxPay_curl.inc.php';

//