<?php

require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;
// echo "<br>welcome congif!<br>";

$servername = "localhost";
$username = "root";
$password = "1";
//$dbname = "catifi";
$dbname ="adiDB";
// echo "servername: $servername , user: $username , password: $password , db: $dbname<br>";

// try{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
//echo "pass conn<br>";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// }catch{
//   echo "not working";
//
// }
// echo 'Connected to Database<br/>';


?>
