<?php
require('connection.php');

$id = $_POST["id"];

$query = "SELECT * FROM timestest WHERE datetimes > DATE_SUB(NOW(), INTERVAL 5 MINUTE) AND sent_notified = 0 AND useridlink = $id";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

if($result){

    echo json_encode($result);

}
else{

    echo json_encode(null);

}

?>