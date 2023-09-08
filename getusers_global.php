<?php

require('connection.php');

//$conn

$query = "SELECT * FROM users WHERE active = 1";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

echo json_encode($result);

?>