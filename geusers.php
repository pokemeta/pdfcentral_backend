<?php

/*

    this will only get the users from the database,
    and the active ones for that matter, nothing
    else.

*/

require('connection.php');

//$conn

$area = $_POST["area"];

$query = "SELECT * FROM users WHERE area = '$area' AND active = 1";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

echo json_encode($result);

?>