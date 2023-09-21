<?php

/*

    The code that sets the file of the user as viewed.

*/

require('connection.php');

//$conn

$id = $_POST["id"];

$query = "UPDATE sentfiles SET viewed = 1 WHERE id = $id";
$statement = $conn->prepare($query);
$statement->execute();

?>