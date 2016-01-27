<?php 
session_start();

include "templates/header.template.php";

$dbc = new mysqli( 'localhost', 'root', '', 'shopping-cart');

//creates cart if one isn't already there.
if ( !isset($_SESSION[ 'cart']) ){

	$_SESSION[ 'cart' ] = [];
}

//if clearcart is in the get array, clear cart

if ( isset($_GET['clearcart'])) {


	$_SESSION[ 'cart' ] = [];
}

// add id of product to cart array when someone clicks "add to cart"
if ( isset($_POST[ 'add-to-cart']) ){

	$id = $dbc->real_escape_string($_POST['id']);

	$sql = "SELECT price FROM products WHERE id = $id";

	$result = $dbc->query( $sql );

	$result = $result->fetch_assoc();

	$_SESSION[ 'cart' ] [] = [
		'id'=>$_POST['product-id'],
		'name'=>$_POST['name'],
		'description'=>$_POST['description']
		];
}


?>


	<h1>Products</h1>


	<?php 

	

		//pulls data from database - query
		$sql = "SELECT * FROM products";

		//run the query
		

		//loop over results (fetch_assoc = fetches from  db individually)
		while( $row = $result->fetch_assoc() ){


		include "templates/products.template.php";

		};




	?>

<?php 
include "templates/footer.template.php";

?>
