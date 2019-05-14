<?php

$link = mysqli_connect("35.237.162.70", "root", 1, "catifi");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);

// echo "<br>welcome congif!<br>";
//
// $servername = "localhost";
// $username = "root";
// $password = "1";
// $dbname = "catifi";
// echo "servername: $servername , user: $username , password: $password , db: $dbname<br>";
//
// // try{
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// echo "pass conn<br>";
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// // }catch{
// //   echo "not working";
// //
// // }
// echo 'Connected to Database<br/>';


?>
