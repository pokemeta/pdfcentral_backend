<?php

require('connection.php');

//$conn

$userdest = $_POST["user"];
$file = $_POST["file"];
$area = $_POST["area"];

$query = "INSERT INTO sentfiles(idusersender, idfilesent, area_origin) VALUES($userdest, $file, '$area')";
$statement = $conn->prepare($query);
$statement->execute();

//echo json_encode($result);

?>