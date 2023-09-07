<?php

require('connection.php');

//$conn

$usr = $_POST["username"];
$pwd = $_POST["password"];

$query = "SELECT * FROM users WHERE username = '$usr' AND password = '$pwd'";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetch();

if($result){

    echo json_encode($result);

}
else{

    echo json_encode("INVALID USER");

}

?>