<?php

require('connection.php');

//$conn

$usr = $_POST["username"];
$pwd = $_POST["password"];
$area = $_POST["area"];

$query = "INSERT INTO users(username, password, area) VALUES('$usr', '$pwd', '$area')";
$statement = $conn->prepare($query);
$statement->execute();

echo json_encode("account created");

?>