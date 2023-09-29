<?php

/*

    this will only get the users from the database,
    the active ones for that matter, and from the area
    nothing else.

*/

require('connection.php');

//$conn

$area = $_POST["area"];

$query = "SELECT * FROM users WHERE area = '$area' AND active = 1 AND NOT username = 'root'";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

echo json_encode($result);

?>