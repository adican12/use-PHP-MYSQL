
<?php
/*--------------------includes--------------*/
require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

include("php/config.php");
  if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $storage = new StorageClient();
    $storage->registerStreamWrapper();

    $contents = file_get_contents('gs://catifi1/newImages/{$file}');
    // File Details

    //name of file
    $name = $file['name'];

    //tmp_name
    $tmp_name =$file['tmp_name'];
    $extension = explode('.',$name);
    print_r($extension);
    $tmp_file_name = "{$extension}";

    try {


    } catch(GoogleException $ex) {
      $ex->getMessage();
    }
  }
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>
