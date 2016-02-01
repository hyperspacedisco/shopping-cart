<?php 
session_start();



$dbc = new mysqli( 'localhost', 'root', '', 'shopping-cart');

//creates cart if one isn't already there.
if ( !isset($_SESSION[ 'cart']) ){

	$_SESSION[ 'cart' ] = [];
}

//if clearcart is in the get array, clear cart

if ( isset($_GET['clearcart'])) {


	$_SESSION[ 'cart' ] = [];

	header('Location: index.php');
}

// add id of product to cart array when someone clicks "add to cart"
if ( isset($_POST[ 'add-to-cart']) ){

	$id = $dbc->real_escape_string($_POST['product-id']);

	$sql = "SELECT price FROM products WHERE id = $id";

	$result = $dbc->query( $sql );

	$result = $result->fetch_assoc();

	for($i=0; $i<count($_SESSION['cart']); $i++){


		$cartItemID = $_SESSION['cart'][$i];

		$addItemID = $_POST['product-id'];

		if($cartItemID == $addItemID) {

			$_SESSION['cart'][$i]['quantity'] += $_POST['quantity'];
			$productFound = true;
		}


	};

	if($productFound == false ) {

		$_SESSION[ 'cart' ] [] = [
			'id'=>$_POST['product-id'],
			'name'=>$_POST['name'],
			'description'=>$_POST['description'],
			'price'=>$result['price'],
			'quantity'=>$_POST['quantity']

			];
		};
}

include "templates/header.template.php";

?>


	<h1>Products</h1>


	<?php 

	

		//pulls data from database - query
		$sql = "SELECT id, name, description, price, stock FROM products";


		//run the query
		$result = $dbc->query( $sql );

		//loop over results (fetch_assoc = fetches from  db individually)
		while( $row = $result->fetch_assoc() ){


		include "templates/products.template.php";

		};




	?>

<?php 
include "templates/footer.template.php";

?>
