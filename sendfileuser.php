<?php

require('connection.php');

//$conn

$userdest = $_POST["user"];
$usersend = $_POST["usersender"];
$file = $_POST["file"];
$area = $_POST["area"];

$query = "INSERT INTO sentfiles(idusersender, iduserreceiver, idfilesent, area_origin) VALUES($usersend, $userdest, $file, '$area')";
$statement = $conn->prepare($query);
$statement->execute();

//echo json_encode($result);

?>