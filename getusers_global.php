<?php

/*

    this will only get the users from the database,
    the active ones for that matter, all the users,
    nothing else.

*/

require('connection.php');

//$conn

$query = "SELECT * FROM users WHERE active = 1 AND NOT username = 'root'";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

echo json_encode($result);

?>