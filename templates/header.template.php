<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="checkout.php">Checkout</a></li>
	</ul>
</nav>

<?php 
	
	echo "<pre>";
	print_r($_SESSION['cart']);
	echo "</pre>";
?>