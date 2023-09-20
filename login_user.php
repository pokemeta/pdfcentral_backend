<?php

/*
    The script what does is make a query of the user
    based on the username and password.
    If the quiery returns empty, it will send the INVALID USER error,
    otherwise, it sends the user's data in case a result matches
*/

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