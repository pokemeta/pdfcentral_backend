<?php

require('connection.php');

//$conn
//SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_dg.filename FROM sentfiles JOIN files_dg WHERE files_dg.id = sentfiles.idfilesent AND sentfiles.iduserreceiver = 1;
$id = $_POST["id"];
$array_results = array();

$query = "SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_dg.filename FROM sentfiles JOIN files_dg WHERE files_dg.id = sentfiles.idfilesent AND sentfiles.area_origin = 'dg' AND sentfiles.iduserreceiver = $id";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

$query = "SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_pap.filename FROM sentfiles JOIN files_pap WHERE files_pap.id = sentfiles.idfilesent AND sentfiles.area_origin = 'pap' AND sentfiles.iduserreceiver = $id";
$statement = $conn->prepare($query);
$statement->execute();

$result2 = $statement->fetchAll();

$query = "SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_di.filename FROM sentfiles JOIN files_di WHERE files_di.id = sentfiles.idfilesent AND sentfiles.area_origin = 'di' AND sentfiles.iduserreceiver = $id";
$statement = $conn->prepare($query);
$statement->execute();

$result3 = $statement->fetchAll();

$query = "SELECT sentfiles.id, sentfiles.idusersender, sentfiles.area_origin, sentfiles.idfilesent, files_db.filename FROM sentfiles JOIN files_db WHERE files_db.id = sentfiles.idfilesent AND sentfiles.area_origin = 'db' AND sentfiles.iduserreceiver = $id";
$statement = $conn->prepare($query);
$statement->execute();

$result4 = $statement->fetchAll();

array_push($array_results, array("dg_res" => $result, "pap_res" => $result2, "di_res" => $result3, "db_res" => $result4));

echo json_encode($array_results);
//echo json_encode($result);

?>