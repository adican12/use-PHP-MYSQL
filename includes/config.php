<?php

echo "<br>welcome congif!<br>";

$servername = "35.237.162.70";
$username = "root";
$password = "1";
$dbname = "catif";
echo "servername: $servername , user: $username , password: $password , db: $dbname<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo 'Connected to Database<br/>';


?>
