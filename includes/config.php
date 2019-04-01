<?php
// DB credentials.
// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','2520448_armentum');
// Establish database connection.
echo "<br>welcome congif!<br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adbasewifi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// try {
//
// ///////////////////////////////////////////
//   //test
//   //   $hostname='localhost';
//   // $username='root';
//   // $password='';
//   // $dbh = new PDO("mysql:host=$hostname;dbname=stickercollections",$username,$password);
// ///////////////////////////////////////////
//
// $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
// echo 'Connected to Database<br/>';
//
// }
// catch (PDOException $e)
// {
// exit("Error: " . $e->getMessage());
// }

?>
