<?php
require('connection.php');

$query = "SELECT * FROM timestest WHERE datetimes > DATE_SUB(NOW(), INTERVAL 1 MINUTE) AND sent_notified = 0";
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