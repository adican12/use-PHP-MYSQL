<?php
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
// // # Creates the new bucket
//
echo 'Bucket ' . $bucket->name() . ' created';
echo "<h1>bucket succes</h1>";
?>
