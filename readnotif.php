<?php
/*

    The way this is set, is to work at one call at a time,
    this is handled by the app component front end.

    What it does is to update said notification based on it's id,
    so it sets it to 1, and with that, the code knows that the
    notifications were read, and as such, will not be sent again.

*/


require('connection.php');

$id = $_POST["idnotif"];

$query = "UPDATE timestest SET sent_notified = 1 WHERE id = $id";
$statement = $conn->prepare($query);
$statement->execute();

?>