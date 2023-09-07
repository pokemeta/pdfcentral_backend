<?php
require('connection.php');

$id = $_POST["idnotif"];

$query = "UPDATE timestest SET sent_notified = 1 WHERE id = $id";
$statement = $conn->prepare($query);
$statement->execute();

?>