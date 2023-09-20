<?php

/*

    This file handles the registration of the
    file that was sent to users.

    In this case, a for is used for every single
    user of the same type that will get said file.

*/

require('connection.php');

//$conn

$userdest = $_POST["usertype"];
$usersend = $_POST["usersender"];
$file = $_POST["file"];
$area = $_POST["area"];

$userstypes = null;

switch($userdest){

    case "directores":
        $userstypes = "director";
        break;
    
    case "lideres":
        $userstypes = "lider";
        break;

    case "usuarios":
        $userstypes = "usuario";
        break;

}

$queryusers = "SELECT * FROM users WHERE rol = '$userstypes'";
$tmpstatement = $conn->prepare($queryusers);
$tmpstatement->execute();

$userresults = $tmpstatement->fetchAll();

if($userresults){

    for($i = 0; $i < count($userresults); $i++){

        $userarraysingleid = $userresults[$i]["id"];
    
        $query = "INSERT INTO sentfiles(idusersender, iduserreceiver, idfilesent, area_origin) VALUES($usersend, $userarraysingleid, $file, '$area')";
        $statement = $conn->prepare($query);
        $statement->execute();
    
    }

}

?>