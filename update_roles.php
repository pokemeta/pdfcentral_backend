<?php

/*

    The code that updates the user's role from the root
    page.

*/

require('connection.php');

//$conn

$id = $_POST["id"];
$rol = $_POST["rol"];

$query = "UPDATE users SET rol = '$rol' WHERE id = '$id'";
$statement = $conn->prepare($query);
$statement->execute();

?>