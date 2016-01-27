<?php 
include "templates/header.template.php";

?>


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


		include "templates/products.template.php";

		};




	?>

<?php 
include "templates/footer.template.php";

?>
