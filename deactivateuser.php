<?php

/*

    It doesn't delete the user, what it does
    is deactive it with setting active to
    0.

*/

require('connection.php');

//$conn

$uid = $_POST["id"];

$query = "UPDATE users SET active = '0' WHERE id = $uid";
$statement = $conn->prepare($query);
$statement->execute();

echo json_encode("User has been deleted");

?>