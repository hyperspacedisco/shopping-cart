<ul>
	<li>ID: <?= $row['id']; ?> </li>
	<li>Name: <?= $row['name']; ?></li>
	<li>Description: <?= $row['description']; ?></li>
	<li>Price: <?= $row['price']; ?></li>
	<li>Stock: <?= $row['stock']; ?></li>
	<li>
		<form>
			<input type="submit" value="Add to Cart">
		</form>
	</li>
</ul>