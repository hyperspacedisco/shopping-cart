

<h3>Please enter your details</h3>


<form action="process-order.php" method="post">
	<div>
		<label for="full-name">Name: </label>
		<input type="text" id="full-name" placeholder="full name">
	</div>	
	<select id="cities" >

		<?php 

		 //connect to database
		$dbc = new mysqli('localhost', 'root', '', 'cities_and_suburbs');

		//get cities from db
		$sql = "SELECT cityID, cityName FROM cities";

		//run the query and capture the results
		$result = $dbc->query( $sql );

		//loop over the results and create an option element
		while ($city = $result->fetch_assoc() ) {
			echo '<option value='.$city['cityID'].'>'.$city['cityName'].'</option>';
		}
		?>

	</select>
	<select id="suburbs"></select>
	<div>
		<label for="address">Address: </label>
		<textarea name="address" id="address" cols="30" rows="10" placeholder="5 Road Street"></textarea>
	</div>
	<div>
		<label for="phone">Phone Number: </label>
		<input type="tel" id="phone" name="phone">
	</div>
	<div>
		<input type="submit" name="place-order">
	</div>
</form>

<script src="js/cities.js"></script>