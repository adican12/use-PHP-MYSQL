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
<<<<<<< HEAD
echo 'Bucket ' . $bucket->name() . ' created';
echo "<h1>bucket succes</h1>";
=======
<<<<<<< HEAD
echo 'Bucket ' . $bucket->name() . ' created';
echo "<h1>bucket succes</h1>";
=======
// echo 'Bucket ' . $bucket->name() . ' created.';
echo "<h1>yaron Hatol adi a gaver </h1>";
>>>>>>> ef6570b3bc58db2a5747e96a717bef32e40683ce
>>>>>>> 7912d7a90fd35c419ae24dab70b477f4237dba61
?>
