<?php
// DB credentials.
// define('DB_HOST','localhost');

define('DB_HOST','35.233.17.192');

define('DB_USER','catwifi808');
define('DB_PASS','1');
define('DB_NAME','catifi2');
//
// Establish database connection.
echo "<br>welcome congif!<br>";
/////////////////////////////////////////////////
// Connect to CloudSQL from App Engine.

// env_variables:
  # Replace USER, PASSWORD, DATABASE, and CONNECTION_NAME with the
  # values obtained when configuring your Cloud SQL instance.
  // MYSQL_DSN: mysql:unix_socket=/cloudsql/catifi2;dbname=catifi
  // MYSQL_USER: catwifi808
  // MYSQL_PASSWORD: 1
// $dsn = getenv('MYSQL_DSN');
// $user = getenv('MYSQL_USER');
// $password = getenv('MYSQL_PASSWORD');


// $dsn = "mysql:unix_socket=/cloudsql/catifi2;dbname=catifi";
// $user = "catwifi808";
// $password = "1";
// echo "dns: ".$dsn." , user: ".$user." , password: ".$password;
//
// if (!isset($dsn, $user) || false === $password) {
//     throw new Exception('Set MYSQL_DSN, MYSQL_USER, and MYSQL_PASSWORD environment variables');
// }

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
// $db = new PDO($dsn, $user, $password);

$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
echo 'Connected to Database<br/>';

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>
