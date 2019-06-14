<?php
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;
// echo "<br>welcome congif!<br>";

// # Your Google Cloud Platform project ID
$projectId = 'catifi';
//
// # Instantiates a client
$storage = new StorageClient([
    'projectId' => $projectId
]);
$bucket = $storage->bucket('catifi2');

$servername = "localhost";
$username = "root";
$password = "1";
// $dbname = "catifi";
$dbname = "adiDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
