<?php
/*

  This is the connection setup for the database interactions in PHP, by using the PDO approach.

  the variables set the necessary credentials on the PDO object creation, this is done in order
  to make it less hard to read and easier to set up, but more importantly, it helps in migrating
  the type of database that it's being used in the server, in this case, mysql is being used.

  Final note: $conn is the variable that will be used by all php scripts so the pdo calls to
  make queries for the database will be applied, hence why the "require('connection.php');" line
  in every single one of them.

*/

$servername = "localhost";
$username = "root";
$password = "";

try {

  $conn = new PDO("mysql:host=$servername;dbname=pdfcentraldb", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

} catch(PDOException $e) {

  //echo "Connection failed: " . $e->getMessage();
  
}

?>