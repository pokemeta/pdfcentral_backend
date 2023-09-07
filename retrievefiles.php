<?php

require('connection.php');

//$conn

$uid = $_POST["userid"];
$area = $_POST["area"];

$query = "SELECT * FROM files_$area WHERE iduser = $uid AND active = 1";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

echo json_encode($result);

?>