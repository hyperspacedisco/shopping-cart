<h3>Checkout</h3>

<table border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Description</th>
		<th>Unit Price</th>
		<th>Total Cost</th>
	</tr>	



<?php 

	foreach( $_SESSION['cart'] as $product) : ?>

		<tr>
			<td><?= $product['id']; ?></td>
			<td><?= $product['name']; ?></td>
			<td><?= $product['description']; ?></td>
			<td><?= $product['quantity']; ?></td>
			<td><?= $product['price']; ?></td>
			<td><?= $product['price'] * $product['quantity']; ?></td>
		</tr>

	<?php endforeach;
?>
</table>