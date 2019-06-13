<?php

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

//# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

// # Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;
//
// # Your Google Cloud Platform project ID
$projectId = 'catifi';
//
// # Instantiates a client
$storage = new StorageClient([
    'projectId' => $projectId
]);
//
// // # The name for the new bucket
// $bucketName = 'my-new-bucket';
// //
$bucket = $storage->bucket('catifi2');
?>
