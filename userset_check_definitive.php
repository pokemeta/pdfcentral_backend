<?php

require('connection.php');

//$conn

$id = $_POST["id"];

$query = "UPDATE sentfiles SET checked = 1 WHERE id = $id";
$statement = $conn->prepare($query);
$statement->execute();

?>