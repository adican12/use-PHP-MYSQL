<?php

echo "<br>welcome congif!<br>";

$dsn = "35.237.162.70";
$user = "root";
$password = "1";
$dbname = "catif";
echo "dns: ".$dsn." , user: ".$user." , password: ".$password." ,db:".$dbname;


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo 'Connected to Database<br/>';


?>
