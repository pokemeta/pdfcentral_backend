<?php

require('connection.php');

//$conn

$usr = $_POST["username"];
$pwd = $_POST["password"];

$query = "INSERT INTO users(username, password) VALUES('$usr', '$pwd')";
$statement = $conn->prepare($query);
$statement->execute();

echo json_encode("account created");

?>