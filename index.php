<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>




	<h1>Products</h1>


	<?php 

		//connects to the database
		$dbc = new mysqli( 'localhost', 'root', '', 'shopping-cart');

		//pulls data from database - query
		$sql = "SELECT * FROM products";

		//run the query
		$result = $dbc->query( $sql );

		//loop over results (fetch_assoc = fetches from  db individually)
		while( $row = $result->fetch_assoc() ){


			echo "<ul>";
			echo "<li>ID: ".$row['id']."</li>";
			echo "<li>Name: ".$row['name']."</li>";
			echo "<li>Description: ".$row['description']."</li>";
			echo "<li>Price: ".$row['price']."</li>";
			echo "<li>Stock: ".$row['stock']."</li>";
			echo "</ul>";


		};




	?>



</body>
</html>