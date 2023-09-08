<?php

require('connection.php');

//$conn
//SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_dg.filename FROM sentfiles JOIN files_dg WHERE files_dg.id = sentfiles.idfilesent AND sentfiles.iduserreceiver = 1;
$id = $_POST["id"];

$query = "SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_dg.filename FROM sentfiles JOIN files_dg WHERE files_dg.id = sentfiles.idfilesent AND sentfiles.iduserreceiver = $id";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

echo json_encode($result);

?>