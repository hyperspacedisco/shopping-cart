<ul>
	<li>ID: <?= $row['id']; ?> </li>
	<li>Name: <?= $row['name']; ?></li>
	<li>Description: <?= $row['description']; ?></li>
	<li>Price: <?= $row['price']; ?></li>
	<li>Stock: <?= $row['stock']; ?></li>
	<li>
		<form action="" method="post">
			<input type="hidden" name="product-id" value="<?= $row['id']?> ">
			<input type="hidden" name="name" value="<?= $row['name']?>">
			<input type="hidden" name="description" value="<?= $row['description']?>">
			<label for="quantity">Quantity</label>
			<input type="number" name="quantity" id="quantity" value="<?= $row['quantity']?>">
			<input type="submit" value="Add to Cart" name="add-to-cart">
			

		</form>
	</li>
</ul>