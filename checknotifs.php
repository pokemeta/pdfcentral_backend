<?php

/*

    This is the script that checks if there are any unread notifications in the database.

    The query is the key that makes this possible, it's currently set so it only reads
    entries that are less than 5 minutes recent, and by selecting the ones by 0, which means
    they're unread, and of course, by using the user's id to determine who's notifications are
    unread.

*/

require('connection.php'); //retrieving $conn from here

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