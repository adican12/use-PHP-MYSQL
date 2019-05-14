<?php

echo "<br>welcome congif!<br>";

$servername = "35.237.162.70:3306";
$username = "catwifi808";
$password = "1";
$dbname = "catifi";
echo "servername: $servername , user: $username , password: $password , db: $dbname<br>";

try{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
}catch{
  echo "not working";

}
echo 'Connected to Database<br/>';


?>
