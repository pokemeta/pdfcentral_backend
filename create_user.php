<?php

/*

    This is straightforward: it receives the username,
    password and area of the user, and then creates it
    in the database, and sends the message that it was
    created, pretty simple.

*/

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