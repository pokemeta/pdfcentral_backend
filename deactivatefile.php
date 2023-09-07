<?php

require('connection.php');

//$conn

$id = $_POST["pdfid"];
$area = $_POST["area"];

$query = "UPDATE files_$area SET active = '0' WHERE id = $id";
$statement = $conn->prepare($query);
$statement->execute();

echo json_encode("deleted file");

?>