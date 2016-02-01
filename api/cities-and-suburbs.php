<?php

$dbc = new mysqli('localhost', 'root', '', 'cities_and_suburbs');


$cityID = $dbc->real_escape_string( $_GET['city']);

$sql = "SELECT suburbName FROM suburbs WHERE cityID = $cityID";

$result = $dbc ->query( $sql );

// print_r($suburbs);


//converts data into json
$suburbs = json_encode( $result->fetch_all(MYSQLI_ASSOC) );

header('Content-Type: application/json');


echo $suburbs;

