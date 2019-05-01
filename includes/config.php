<?php
// DB credentials.
// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','2520448_armentum');
//
// Establish database connection.
echo "<br>welcome congif!<br>";
/////////////////////////////////////////////////
// Connect to CloudSQL from App Engine.
$dsn = getenv('MYSQL_DSN');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
echo "dns: ".$dsn." , user: ".$user." , password: ".$password;
if (!isset($dsn, $user) || false === $password) {
    throw new Exception('Set MYSQL_DSN, MYSQL_USER, and MYSQL_PASSWORD environment variables');
}

/////////////////////////////////////////////////
//
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "adbasewifi";
//
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

try {
//
// ///////////////////////////////////////////
  //test
  //   $hostname='localhost';
  // $username='root';
  // $password='';
  // $dbh = new PDO("mysql:host=$hostname;dbname=stickercollections",$username,$password);
///////////////////////////////////////////
$db = new PDO($dsn, $user, $password);

// $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
echo 'Connected to Database<br/>';

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>
